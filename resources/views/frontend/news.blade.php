@extends('layouts.frontend')
@section('title', '育貓新知')
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
    <section id="news">
      <div class="container my-3">
        <div class="row justify-content-center">
          <div class="col-12 my-2">
            <h4>育貓新知</h4>
          </div>
          <!-- 清單 -->
          <ul class="col-12 col-md-10 list-group list-group-flush">
            @foreach ($newsList as $news)
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
