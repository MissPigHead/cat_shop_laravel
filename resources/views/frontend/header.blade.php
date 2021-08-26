<header>
  <div class="container">
    <nav class="navbar navbar-expand-lg navbar-light bg-yellow01 px-2">
      <a class="navbar-brand" href="{{ route('main') }}">
        <img src="image/00cat-256.png" alt="logo" height="30" class="d-inline-block align-top" loading="lazy">
        <span class="h4 text-pink00 text-Pacifico">Ling's Shop</span>
      </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>


      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a class="nav-link" href="{{ route('main') }}">首頁</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
              aria-haspopup="true" aria-expanded="false">商品目錄</a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="{{ route('categories') }}">所有商品</a>
              <div class="dropdown-divider"></div>
              @foreach($categories as $category)
              <a class="dropdown-item" href="{{ route('categories.show',['id',$category->id]) }}">{{ $category->title }}</a>
                    @endforeach
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('main') }}">購物說明</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('news') }}">育貓新知</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="http://220.128.133.15/s1090423/adopt/" target="_blank">領養貓咪</a>
          </li>
          <li>
            @auth
              <a href="{{ url('/home') }}">Home</a>
            @else
              <a href="{{ route('login') }}">
                <button class="btn btn-outline-pink px-2 py-1 m-2 my-sm-0" type="button">登入
                </button>
              </a>
              {{-- @if (Route::has('register'))  看不懂這段生成的方式
                    <a href="{{ route('register') }}">Register</a>
                @endif --}}
            @endauth
          </li>
        </ul>
      </div>
    </nav>
  </div>
</header>
