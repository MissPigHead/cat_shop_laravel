@extends('layouts.frontend')
@section('title', '商品區')
@section('content')
  <main>
    <div class="container">
      <div class="row my-4">
        {{-- ---------------- 左側目錄 -------------- --}}
        <div class="col-12 col-sm-4 col-md-3 row align-self-start mx-0 mb-2" id="category">
          <a href="{{ route('category.show', 'all') }}" class="col-4 col-sm-12 p-0">
            <div class="cate-all text-center text-sm-left text-pink00 py-2 px-2 px-sm-3 px-md-4">所有商品</div>
          </a>
          @foreach ($categories as $key => $value)
            @foreach ($categories[$key] as $cate)
              @if ($key == 0)
                <a href="{{ route('category.show', $cate->id) }}"
                  class="col-4 col-sm-12 p-0 parent p{{ $cate->id }}">
                  <div class="cate-p text-center text-sm-left text-pink00 py-2 px-2 px-sm-3 px-md-4">{{ $cate->title }}
                  </div>
                </a>
              @else
                <script>
                  $('#category a.p{{ $cate->parent }}').last().after(`
                        <a href="{{ route('category.show', $cate->id) }}" class="col-4 col-sm-12 p-0 child p{{ $cate->parent }}">
                            <div class="cate-c text-center text-sm-left text-pink00 py-2 px-2 px-sm-3 px-md-4">{{ $cate->title }}</div>
                        </a>
                        `)
                </script>
              @endif
            @endforeach
          @endforeach
          </ul>
        </div>
        {{-- ---------------- 右側商品 -------------- --}}
        <div class="col-12 col-sm-8 col-md-9 px-sm-0">
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="{{ route('category.show', 'all') }}">所有商品</a></li>
              @if ($cate_breadcrumb)
                @if ($cate_breadcrumb->parent_name)
                  <li class="breadcrumb-item"><a
                      href="{{ route('category.show', $cate_breadcrumb->parent) }}">{{ $cate_breadcrumb->parent_name }}</a>
                  </li>
                @endif
                <li class="breadcrumb-item active" aria-current="page">{{ $cate_breadcrumb->title }}</li>
              @endif

            </ol>
          </nav>
          <div class="row" id="products">
            @foreach ($products as $product)
              <div class="col-6 col-md-4 col-lg-3 text-center">
                <a href="{{ route('product.show', [$product->category_id, $product->id]) }}">

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
          <div class="row justify-content-center">
            {{ $products->onEachSide(2)->links() }}
          </div>
        </div>
      </div>
    </div>
  </main>
  <script>
    // owl carousel for product
    $('#products .owl-carousel').owlCarousel({
      loop: true,
      dots: false,
      autoplay: true,
      center: true,
      items: 1,
      animateOut: 'fadeOut',
    });
  </script>
@endsection
