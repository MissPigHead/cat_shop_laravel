@extends('layouts.frontend')
@section('title', '購物車')
@section('content')
  <main>
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-12 col-md-9 col-lg-7 col-xl-6">
          <div class="row mt-4 mb-sm-2">
            <div class="col">
              <h4>{{ Auth::user()->name }}的購物車</h4>
            </div>
          </div>
          @if (count($items)!=0)
            @php
              $total = 0;
            @endphp
            @foreach ($items as $item)
              <!------------------- 一組商品 -------------------->
              <div class="row py-2 mb-2 mb-md-3 bg-white align-items-center justify-content-sm-between">
                <!-------圖------->
                <div class="col-4 col-sm-3">
                  @foreach ($item->product->image_path as $k => $image_path)
                    @if ($k == 0)
                      <img src="{{ $image_path }}" class="w-100 my-0 my-sm-2 mylg-3">
                    @endif
                  @endforeach
                </div>
                <!-------文字------->
                <div class="col-8 col-sm-9 row align-items-center justify-content-end px-0 px-sm-3 mr-sm-0 text-secondary">
                  <!--名字-->
                  <div class="col-9 col-md-10 col-lg-12 py-lg-2 order-lg-1 h6">
                    {{ $item->product->name }}
                    <input type="hidden" name="cart_id" value="{{ $item->id }}">
                  </div>
                  <!--刪除-->
                  <div class="col-3 col-md-2 order-lg-5 pl-0 pr-0 text-right">
                    <button type="button" class="btn btn-outline-secondary px-2 py-1 py-lg-2">
                      <i class="fas fa-trash-alt px-lg-1"></i>
                    </button>
                  </div>
                  <!--數量-->
                  <div class="col-8 col-sm-5 order-lg-2 col-lg-4">
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text px-1 px-sm-2" id="addQty">+</span>
                      </div>
                      <input type="number" value="{{ $item->quantity }}" v-model="item5.OUTPUT" min="0" step="1"
                        class="form-control text-center NUM-INPUT"
                        oninput="this.value=this.value.replace(/[^0-9.]+/g,'');">
                      <div class="input-group-append">
                        <span class="input-group-text px-1 px-sm-2" id="decQty">-</span>
                      </div>
                    </div>
                  </div>
                  <!--單價-->
                  <div class="col-4 col-sm-2 order-lg-3 pl-0 pr-0 text-right">
                    NT {{ $item->product->price }}
                  </div>
                  <!--金額-->
                  <div class="col-12 col-sm-5 col-lg-4 order-lg-4 pr-0 text-right">
                    小計：<span class="h6 text-pink">{{ $item->product->price * $item->quantity }}</span>
                  </div>
                </div>
              </div>
              @php
                $total = $total + $item->product->price * $item->quantity;
              @endphp
            @endforeach
            <!-- 總金額 -->
            <div class="row">
              <div class="col-12 text-right">
                <p class="h5">總金額：<span class="text-pink">{{ $total }}</span></p>
              </div>
            </div>
            <!-- 結帳 -->
            <div class="row my-2 justify-content-center">
              <button type="button" class="btn btn-info m-2">
                {{-- <i class="fas fa-undo-alt"></i> --}}
                繼續購物</button>
              <button type="button" class="btn btn-secondary m-2" name="clearAll">
                {{-- <i class="fas fa-trash-alt"></i> --}}
                清空購物車</button>
              <a href="order.html">
                <button type="button" class="btn btn-warning m-2">
                  {{-- <i class="fas fa-chevron-right"></i> --}}
                  前往結帳</button>
              </a>
            </div>
          @else
            <div class="row my-5 justify-content-center text-secondary h5 font-weight-normal">尚未選購商品</div>
          @endif
        </div>
      </div>
    </div>
  </main>
  <script>
    // 清空購物車
    $('button[name=clearAll]').click(function(e) {
      e.preventDefault();
      let id=[];
      let url="/api/cart/";
      $.each($('input[name=cart_id]'), function(i, e) {
        id[i] = $(this).val();
      });
      $.ajax({
        type: "DELETE",
        url: "/api/cart/"+id,
        data: {
            _token: '{{ csrf_token() }}',
        },
        dataType: "json",
        error: function(response) {
          if (response.status == 200) {
            location.reload();
          } else {
            console.log(response)
          }
        }
      });
    });
  </script>
@endsection
