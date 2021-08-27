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
          <div class="col-6 col-md-4 col-lg-3 text-center">
            <img src="https://fakeimg.pl/500x500/acedfa" class="w-100">
            <h6 class="mt-2 text-gray">豆腐砂</h6>
            <p class="mb-2">小茜豆腐砂</p>
            <p class="font-weight-bolder text-danger">NT$ 250</p>
          </div>
          <div class="col-6 col-md-4 col-lg-3 text-center">
            <img src="https://fakeimg.pl/500x500/cedfaa" class="w-100">
            <h6 class="mt-2 text-gray">豆腐砂</h6>
            <p class="mb-2">小茜豆腐砂</p>
            <p class="font-weight-bolder text-danger">NT$ 250</p>
          </div>
          <div class="col-6 col-md-4 col-lg-3 text-center">
            <img src="https://fakeimg.pl/500x500/bafafe" class="w-100">
            <h6 class="mt-2 text-gray">豆腐砂</h6>
            <p class="mb-2">小茜豆腐砂</p>
            <p class="font-weight-bolder text-danger">NT$ 250</p>
          </div>
          <div class="col-6 col-md-4 col-lg-3 text-center">
            <img src="https://fakeimg.pl/500x500/edfaed" class="w-100">
            <h6 class="mt-2 text-gray">豆腐砂</h6>
            <p class="mb-2">小茜豆腐砂</p>
            <p class="font-weight-bolder text-danger">NT$ 250</p>
          </div>
          <div class="col-6 col-md-4 col-lg-3 text-center">
            <img src="https://fakeimg.pl/500x500/acedfa" class="w-100">
            <h6 class="mt-2 text-gray">豆腐砂</h6>
            <p class="mb-2">小茜豆腐砂</p>
            <p class="font-weight-bolder text-danger">NT$ 250</p>
          </div>
          <div class="col-6 col-md-4 col-lg-3 text-center">
            <img src="https://fakeimg.pl/500x500/cedfaa" class="w-100">
            <h6 class="mt-2 text-gray">豆腐砂</h6>
            <p class="mb-2">小茜豆腐砂</p>
            <p class="font-weight-bolder text-danger">NT$ 250</p>
          </div>
          <div class="col-6 col-md-4 col-lg-3 text-center d-none d-lg-block">
            <img src="https://fakeimg.pl/500x500/bafafe" class="w-100">
            <h6 class="mt-2 text-gray">豆腐砂</h6>
            <p class="mb-2">小茜豆腐砂</p>
            <p class="font-weight-bolder text-danger">NT$ 250</p>
          </div>
          <div class="col-6 col-md-4 col-lg-3 text-center d-none d-lg-block">
            <img src="https://fakeimg.pl/500x500/edfaed" class="w-100">
            <h6 class="mt-2 text-gray">豆腐砂</h6>
            <p class="mb-2">小茜豆腐砂</p>
            <p class="font-weight-bolder text-danger">NT$ 250</p>
          </div>
        </div>
      </div>
    </section>

    <section id="news">
      <div class="container my-4">
        <div class="row justify-content-center">
          <div class="col-12 my-2">
            <h4>育貓新知</h4>
          </div>
          <ul class="col-12 col-md-10 col-lg-8 list-group list-group-flush">
            @foreach ($news as $news)
              <li class="list-group-item bg-transparent py-2"><a
                  href="{{ route('news.show', ['news' => $news->id]) }}">{{ $news->title }}</a></li>
            @endforeach
          </ul>
        </div>
      </div>
    </section>
  </main>

  <script>
    // owl carousel   for banner
    $('.owl-carousel').owlCarousel({
      loop: true,
      dots: true,
      autoplay: true,
      center: true,
      items: 1,
      animateOut: 'fadeOut',
    });
  </script>
@endsection
