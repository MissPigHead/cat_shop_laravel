@extends('layouts.frontend')
@section('title', $title)
@section('content')
  @if (session('msg'))
    @include('swal',['msg'=>'msg','icon'=>'warning'])
  @endif
  <main>
    <div class="container">
      <div class="row my-4">
        <!---------------------- 左側目錄 ----------------------->
        <div class="col-12 col-sm-4 col-md-3 row align-self-start mx-0 mb-2" id="category">
          <a href="{{ route('category.show', 'all') }}" class="col-4 col-sm-12 p-0">
            <div class="list-group-item-danger text-center text-sm-left py-2 px-2 px-sm-3 px-md-4">所有商品
            </div>
          </a>
          <div class="col-1 pl-0 py-2 list-group-item-danger text-center d-block d-sm-none cate-all"><i
              class="fas fa-caret-right"></i>
          </div>
          <div class="w-100"></div>
          @foreach ($categories as $key => $value)
            @foreach ($categories[$key] as $cate)
              @if ($key == 0)
                <a href="{{ route('category.show', $cate->id) }}"
                  class="col-4 col-sm-12 p-0 cate parent p{{ $cate->id }}">
                  <div class="list-group-item-warning text-center text-sm-left py-2 px-2 px-sm-3 px-md-4">
                    {{ $cate->title }}
                  </div>
                </a>
              @else
                <script>
                  $('#category a.p{{ $cate->parent }}').last().after(`
                        <a href="{{ route('category.show', $cate->id) }}" class="col-4 col-sm-12 p-0 cate child p{{ $cate->parent }}">
                            <div class="list-group-item-light text-center text-sm-left py-2 px-2 px-sm-3 px-md-4">{{ $cate->title }}</div>
                        </a>
                        `);
                </script>
              @endif
            @endforeach
          @endforeach
          </ul>
        </div>
        <!---------------------- 右側 ----------------------->
        <div class="col-12 col-sm-8 col-md-9 px-sm-0">
          <!---------------------- 右上麵包屑 ----------------------->
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="{{ route('category.show', 'all') }}">所有商品</a></li>
              @if ($cate_breadcrumb)
                @if ($cate_breadcrumb->parent_name)
                  <li class="breadcrumb-item">
                    <a href="{{ route('category.show', $cate_breadcrumb->parent) }}">
                      {{ $cate_breadcrumb->parent_name }}
                    </a>
                  </li>
                @endif
                <li class="breadcrumb-item active" aria-current="page">
                  @if ($include == 'productDetail')
                    <a href="{{ route('category.show', $cate_breadcrumb->id) }}">
                  @endif
                  {{ $cate_breadcrumb->title }}
                  @if ($include == 'productDetail')
                    </a>
                  @endif
                </li>
              @endif
            </ol>
          </nav>
          <!---------------------- 右下商品內容 ----------------------->
          @include('frontend.'.$include)
        </div>
      </div>
    </div>
  </main>
  <script>
    // product image owl carousel
    $('#products .owl-carousel').owlCarousel({
      loop: true,
      dots: false,
      autoplay: true,
      center: true,
      items: 1,
      animateOut: 'fadeOut',
    });

    // 控制目錄顯示狀態
    $('#category .cate-all').click(function(e) {
      e.preventDefault();
      toggleCategories();
    });
    $(document).ready(showCategories());
    $(window).resize(()=>showCategories());

    function showCategories() {
      if ($('#category .cate-all').css('display') != 'none') {
        $('#category .cate').hide();
      } else {
        $('#category .cate').show();
      }
    }

    function toggleCategories() {
      $('#category .cate').toggle();
    }
  </script>
@endsection
