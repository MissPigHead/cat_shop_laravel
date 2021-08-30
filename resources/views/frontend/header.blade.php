<header>
  <div class="container">
    <nav class="navbar navbar-expand-lg navbar-light bg-yellow01 px-2">
      <a class="navbar-brand" href="{{ route('home') }}">
        <img src="{{ asset('image/00cat-256.png') }}" alt="logo" height="30" class="d-inline-block align-top"
          loading="lazy">
        <span class="h4 text-pink00 text-Pacifico">Ling's Shop</span>
      </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>


      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ml-auto align-items-lg-center">
          <li class="nav-item">
            <a class="nav-link" href="{{ route('home') }}">首頁</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="categoriesDropDown" role="button" data-toggle="dropdown"
              aria-haspopup="true" aria-expanded="false">商品目錄</a>
            <div class="dropdown-menu" aria-labelledby="categoriesDropDown">
              <a class="dropdown-item" href="{{ route('category.show','all') }}">所有商品</a>
              <div class="dropdown-divider"></div>
              @foreach ($mainCategories as $category)
                <a class="dropdown-item"
                  href="{{ route('category.show', $category->id) }}">{{ $category->title }}</a>
              @endforeach
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('home') }}">購物說明</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('news.index') }}">育貓新知</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="http://220.128.133.15/s1090423/adopt/" target="_blank">領養貓咪</a>
          </li>
          {{-- 以下套官網範例 --}}
          <!-- Authentication Links -->
          @guest {{-- 沒有登入就是guest --}}

            <li class="nav-item my-2 my-lg-0 ml-lg-2">
              <a href="{{ route('register') }}">
                <button class="btn btn-outline-info px-2  py-1" type="button">註冊
                </button>
              </a>
              <a href="{{ route('login') }}">
                <button class="btn btn-outline-pink px-2  py-1" type="button">登入
                </button>
              </a>
            </li>


          @else {{-- 登入後 --}}
            @can('admin')
              <!-- 系統管理者 -->
              <li class="nav-item dropdown">
                <a id="adminDropDown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown"
                  aria-haspopup="true" aria-expanded="false" v-pre>
                  <i class="fas fa-cog"></i>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="adminDropDown">
                  <a class="dropdown-item" href="{{ route('admin') }}" target="_blank">管理後台</a>

                @else
                  <!-- 一般使用者 -->
              <li class="nav-item dropdown">
                <a id="userDropDown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown"
                  aria-haspopup="true" aria-expanded="false" v-pre>
                  <i class="fas fa-user-cog"></i>
                </a>

                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropDown">
                  <p class="px-4 my-2">Hi! {{ Auth::user()->name }}</p>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href="{{ route('user.profile', ['user'=>Auth::user()->id]) }}">個人資訊</a>
                  <a class="dropdown-item" href="{{ route('user.cart', ['id'=>Auth::user()->id]) }}">購物車</a>
                  <a class="dropdown-item" href="{{ route('user.orders', ['id'=>Auth::user()->id]) }}">歷史訂單</a>
                  {{-- <a class="dropdown-item" href="{{ route('') }}">收件資訊</a> --}}


                @endcan
                {{-- 登出 --}}
                <a class="dropdown-item" href="{{ route('logout') }}"
                  onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                  <button class="btn btn-outline-pink px-2 py-1 my-sm-0" type="button">登出
                  </button>
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                  @csrf
                </form>
                {{-- 登出 --}}

              </div>
            </li>


          @endguest
        </ul>
      </div>
    </nav>
  </div>
</header>
