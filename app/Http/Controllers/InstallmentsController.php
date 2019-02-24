<?php

namespace App\Http\Controllers;

use App\Models\Installment;
use Illuminate\Http\Request;
use App\Exceptions\InvalidRequestException;
use App\Events\OrderPaid;
use Carbon\Carbon;

class InstallmentsController extends Controller
{
    public function index(Request $request)
    {
        $installments = Installment::query()
            ->where('user_id', $request->user()->id)
            ->paginate(10);
        return view('installments.index', ['installments' => $installments]);
    }

    public function show(Installment $installment)
    {
        $this->authorize('own', $installment);
        // 取出当前分期付款的所有的还款计划，并按还款顺序排序
        $items = $installment->items()->orderBy('sequence')->get();
        //dd($items->where('paid_at', null)->first());
        return view('installments.show', [
            'installment'   => $installment,
            'items'         => $items,
            // 下一个未还款的还款计划
            'nextItem'      => $items->where('paid_at', null)->first(),
        ]);
    }
    public function payByAlipay(Installment $installment)
    {
        if ($insatllment->order->closed) {
            throw new InvalidRequestException('对应的商品订单已被关闭');
        }
        if ($installment->status === Installment::STATUS_FINISHED) {
            thrwo new InvalidRequestException('该分期订单已结清');
        }
        // 获取当前分期付款最近的一个未支付的还款计划
        if (!$nextItem = $installment->items()->whereNull('paid_at')->orderBy('sequence')->first()) {
            // 如果没有未支付的付款，原则上不可能，因为如果分期已结清则在上一个判断就退出了
            throw new InvalidRequestException('该分期订单已结清');
        }
        // 调用支付宝的网页支付
        return app('alipay')->web([
            // 支付订单号使用分期流水号+还款计划编号
            'out_trade_no'      => $installment->no.'_'.$nextItem->sequence,
            'total_amount'      => $nextItem->total,
            'subject'           => '支付 Laravel Shop 的分期订单：'.$installment->no,
            // 这里的notify_url 和 return_url 可以覆盖掉在 AppServiceProvider 设置的回调地址
            'notify_url'        => '', //todo
            'return_url'        => '', //todo
        ]);
    }
    // 支付宝前端回调
    public function alipayReturn()
    {
        try {
            app('alipay')->verify();
        } catch (\Exception $e) {
            return view('pages.error', ['msg' => '数据不正确']);
        }
        return view('pages.success', ['msg' => '付款成功']);
    }

    // 支付宝后端回调
    public function alipayNotify()
    {
        // 校验支付宝回调参数是否正确
        $data = app('alipay')->verify();
        // 如果订单状态不是成功或者结束，则不走后续的逻辑
        if (!in_array($data->trade_status, ['TRADE_SUCCESS', 'TRADE_FINISHED'])) {
            return app('alipay')->success();
        }
        // 拉起支付时使用的支付订单号是由分期流水号 + 还款计划编号组成的
        // 因此可以通过支付订单号来还原出这笔还款时哪个分期付款的哪个还款计划
        list($no, $sequence) = explode('-', $data->out_trade_no);
        // 根据分期流水号查询对应的分期记录，原则上会找不到，这里的判断只是增强代码健壮性
        if (!item = $installment->items()->where('no', $no)->first()) {
            return 'fail';
        }
        // 如果这个还款计划的支付状态是已支付，则告知支付宝此订单已完成，并不再执行后续逻辑
        if ($item->paid_at) {
            return app('alipay')->success();
        }
        // 使用事务，保证数据一致性
        \DB::transaction(function () use ($data, $no, $installment, $item) {

        })
    }
}
