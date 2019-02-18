<?php
namespace App\Listeners;

use App\Events\OrderPaid;
use App\Models\Order;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class UpdateCrowdfundingProductProgress implements ShouldQueue
{
    public function handle(OrderPaid $event)
    {
        $order = $event->getOrder();
        // 如果订单类型不是众筹商品订单，无需处理
        if ($order->type !== Order::TYPE_CROWDFUNDING) {
            return;
        }
        $crowdfunding = $order->items[0]->product->crowdfunding;

        $data = Order::query()
            // 查出订单类型为众筹订单
            ->where('type', Order::TYPE_CROWDFUNDING)
            // 并且是已支付的
            ->whereNotNull('paid_at')
            ->whereHas('items', function ($query) use ($crowdfunding) {
                // 并且包含了本商品
                $query->where('product_id', $crowdfunding->product_id);
            })
            ->first([
                // 取出订单总金额
                \DB::raw('sum(total_amount) as total_amount'),
                // 取出去重的支持用户数
                \DB::raw('count(distinct(user_id)) as user_count'),
            ]);

        $crowdfunding->update([
            'total_amount' => $data->total_amount,
            'user_amount'   => $data->user_count,
        ]);
    }
}
// namespace App\Listeners;

// use App\Events\OrderPaid;
// use App\Models\Order;
// use Illuminate\Queue\InteractsWithQueue;
// use Illuminate\Contracts\Queue\ShouldQueue;

// class UpdateCrowdfundingProductProgress implements ShouldQueue
// {
//     /**
//      * Handle the event.
//      *
//      * @param  OrderPaid  $event
//      * @return void
//      */
//     public function handle(OrderPaid $event)
//     {
//         $order = $event->getOrder();
//         // 如果订单类型不是众筹商品订单，无需处理
//         if ($order->type !== Order::TYPE_CROWDFUNDING) {
//             return;
//         }
//         $crowdfunding = $order->items[0]->product->crowdfunding;

//         $data = Order::query()
//             // 查出订单类型为众筹订单
//             ->where('type', Order::TYPE_CROWDFUNDING)
//             // 并且是已支付的
//             ->whereNotNull('paid_at')
//             ->whereHas('items', function ($query) use ($crowdfunding) {
//                 // 并且包含了本商品
//                 $query->where('product_id', $crowdfunding->product_id);
//             })
//             ->first([
//                 // 取出订单总金额
//                 \DB::raw('sum(total_amount) as total_amount'),
//                 // 取出去重的支持用户数
//                 \DB::raw('count(distinct(user_id)) as user_count'), //少一个括号，查了一夜
//             ]);
//         $crowdfunding->update([
//             'total_amount'  => $data->total_amount,
//             'user_amount'    => $data->user_count,
//         ]);
//     }
// }
