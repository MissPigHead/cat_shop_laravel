@extends('layouts.frontend')
@section('title', '這裡是文章標題')
@section('content')
  <main>
    <section id="news">
      <div class="container my-3">
        <div class="row justify-content-center">
          <!-- 目前內容 -->
          <div class="col-12 col-md-10 col-lg-8 col-xl-6 my-2 my-lg-4">
            <h3 class="text-dark mb-md-3">{{ $news->title }}</h3>
            @if ($news->image_path)
              <img src="{{ $news->image_path }}" class="mb-3">
            @endif
            <p class="text-secondary text-justify newsText">
              {{ $news->article }}
            </p>
          </div>
          <div class="col-12 my-2">
            <h4>育貓新知
                {{-- <i class="fas fa-paw mx-1"></i><i class="fas fa-paw"></i><i class="fas fa-paw mx-1"></i> --}}
            </h4>
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
@endsection
