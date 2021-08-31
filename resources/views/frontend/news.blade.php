@extends('layouts.frontend')
@section('title', $news->title ?? '育貓新知')
@section('content')
  <main>
    <!-- 最上層沒有選文章時 顯示 banner -->
    @if ($banners)
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
    @endif
    <!-- 目前文章內容 -->
    @if ($news)
      <section id="mainNews">
        <div class="container my-1 my-md-2">
          <div class="row justify-content-center">
            <div class="col-12 col-md-10 col-lg-8 col-xl-6 my-2 my-lg-4">
              <h3 class="text-dark mb-md-3">{{ $news->title }}</h3>
              @if ($news->image_path)
                <img src="{{ $news->image_path }}" class="mb-3">
              @endif
              <p class="text-secondary text-justify">
                {{ $news->article }}
              </p>
            </div>
          </div>
        </div>
      </section>
    @endif
    <!-- 文章清單 -->
    <section id="news">
      <div class="container my-3">
        <div class="row justify-content-center">
          <div class="col-12 my-2">
            <a href="{{ route('news.index') }}">
              <h4>育貓新知</h4>
            </a>
          </div>
          <ul class="col-12 col-md-10 list-group list-group-flush">
            @foreach ($newsList as $n)
              <li class="list-group-item bg-transparent py-2"><a
                  href="{{ route('news.show', $n->id) }}">{{ $n->title }}</a></li>
            @endforeach
          </ul>
        </div>
        <div class="row justify-content-center align-self-end">
          {{ $newsList->onEachSide(2)->links() }}
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
