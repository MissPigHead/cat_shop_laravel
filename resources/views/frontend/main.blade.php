@extends('layouts.frontend')
@section('title', '喵喵商城首頁')
@section('content')
  <main>
    <section id="banner">
      <div class="container my-3">
        <div class="row justify-content-center">
          <div class="owl-carousel owl-theme">
            @foreach ($banners as $banner)
              <div class="item"><img src="{{ $banner->image_path }}" alt="{{ $banner->text }}"></div>
            @endforeach
          </div>
        </div>
      </div>
    </section>

    <section id="products">
      <div class="container my-4">
        <div class="row my-2">
          <div class="col">
            <h4>最新商品</h4>
          </div>
        </div>
        <div class="row">
          @foreach ($products as $product)
            <div class="col-6 col-md-4 col-lg-3 text-center product">
              <a href="{{ route('products.show', ['product' => $product->id]) }}">
                <div class="owl-carousel owl-theme bg-dark">
                  @foreach ($product->image_path as $image_path)
                    <div class="item"><img src="{{ $image_path }}"></div>
                  @endforeach
                </div>
                <p class="my-2 text-gray">{{ $product->specification }}</p>
                <h5 class="mb-2">{{ $product->name }}</h5>
                <p class="font-weight-bolder text-danger">NTD {{ $product->price }}</p>
              </a>
            </div>
          @endforeach
        </div>
      </div>
    </section>

    <section id="news">
      <div class="container my-4">
        <div class="row justify-content-center">
          <div class="col-12 my-2">
            <h4>育貓新知</h4>
          </div>
          <ul class="col-12 col-md-10 list-group list-group-flush">
            @foreach ($news as $news)
              <li class="list-group-item bg-transparent py-2"><a
                  href="{{ route('news.show', ['news' => $news->id]) }}" class="ml-md-4">{{ $news->title }}</a></li>
            @endforeach
          </ul>
        </div>
      </div>
    </section>
  </main>

  <script>
    // owl carousel for banner
    $('#banner .owl-carousel').owlCarousel({
      loop: true,
      dots: true,
      autoplay: true,
      center: true,
      items: 1,
      animateOut: 'fadeOut',
    });

    // owl carousel for product
    $('#products .owl-carousel').owlCarousel({
      loop: true,
      dots: false,
      autoplay: true,
      center: true,
      items: 1,
      animateOut: 'fadeOut',
    });

    // 配合版面 控制最新商品顯示數量
    $('#products .product').eq(6).addClass('d-none d-md-block')
    $('#products .product').eq(7).addClass('d-none d-md-block')
    $('#products .product').eq(8).addClass('d-none d-md-block d-lg-none')
  </script>
@endsection
