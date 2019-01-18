<nav class="navbar navbar-expand-lg navbar-light bg-light navbar-static-top">
  <div class="container">
    <!-- Branding Image -->
    <a class="navbar-brand " href="{{ url('/') }}">
      Laravel Shop
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <!-- Left Side Of Navbar -->
      <ul class="navbar-nav mr-auto">

      </ul>

      <!-- Right Side Of Navbar -->
      <ul class="navbar-nav navbar-right">
        {{-- Authentication Links --}}
        @guest
        <li class="nav-item"><a class="nav-link" href="{{ route('login') }}">登录</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ route('register') }}">注册</a></li>
        @else
        <li class="nav-item dropdown">
            <a href="#" class="nav-link dropdown-toggle" id="navbarDropdown" role="botton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="https://iocaffcdn.phphub.org/uploads/images/201709/20/1/PtDKbASVcz.png?imageView2/1/w/60/h/60"
             alt="image" width="30px" height="30px" class="img-responsive img-circle">{{ Auth::user()->name }}</a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a href="#" class="dropdown-item" id="logout" onclick="event.preventDefault();document.getElementById('logout-form').submit();">退出登录</a>
                <form action="{{ route('logout') }}" id="logout-form" method="POST" style="display: none;">{{ csrf_field() }}</form>
            </div>
        </li>
        @endguest
        {{-- 登录注册链接结束 --}}
      </ul>
    </div>
  </div>
</nav>
