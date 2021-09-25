@extends('layouts.frontend')
@section('title', '購物車')
@section('content')
  <main>
    <div class="container" id="cart">
      <div class="row justify-content-center">
        <div class="col-12 col-md-9 col-lg-7 col-xl-6">
          <div class="row mt-4 mb-sm-2">
            <div class="col">
              <h4>{{ Auth::user()->name }}的購物車</h4>
            </div>
          </div>
          @if (count($items) != 0)
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
                  <!--刪除icon-->
                  <div class="col-3 col-md-2 order-lg-5 pl-0 pr-0 text-right">
                    <button type="button" class="btn btn-outline-secondary px-2 py-1 py-lg-2"
                      data-id="{{ $item->id }}">
                      <i class="fas fa-trash-alt px-lg-1"></i>
                    </button>
                  </div>
                  <!--數量-->
                  <div class="col-8 col-sm-5 order-lg-2 col-lg-4">
                    <div class="input-group">
                      <div class="input-group-prepend addQty" data-stock="{{ $item->product->in_stock }}">
                        <span class="input-group-text px-1 px-sm-2">+</span>
                      </div>
                      <input type="number" name="quantity" value="{{ $item->quantity }}" data-id="{{ $item->id }}"
                        min="0" step="1" class="form-control text-center NUM-INPUT"
                        oninput="this.value=this.value.replace(/[^0-9.]+/g,'');">
                      <div class="input-group-append decQty">
                        <span class="input-group-text px-1 px-sm-2">-</span>
                      </div>
                    </div>
                  </div>
                  <!--單價-->
                  <div class="col-4 col-sm-2 order-lg-3 pl-0 pr-0 text-right" data-id="{{ $item->id }}"
                    data-price="{{ $item->product->price }}">
                    NT <span></span>
                  </div>
                  <!--金額-->
                  <div class="col-12 col-sm-5 col-lg-4 order-lg-4 pr-0 text-right" data-id="{{ $item->id }}">
                    {{-- 小計：<span class="h6 text-pink">{{ $item->product->price * $item->quantity }}</span> --}}
                    小計：<span class="h6 text-pink"></span>
                  </div>
                </div>
              </div>
            @endforeach
            <!-- 總金額 -->
            <div class="row">
              <div class="col-12 text-right">
                <p class="h5">總金額：<span class="text-pink" data="total"></span></p>
              </div>
            </div>
            <!-- 結帳 -->
            <div class="row my-2 justify-content-center">
              <a href="{{ route('category.index') }}">
                <button type="button" class="btn btn-info m-2">
                  {{-- <i class="fas fa-undo-alt"></i> --}}
                  繼續購物</button>
              </a>
              <button type="button" class="btn btn-secondary m-2" name="clearAll">
                {{-- <i class="fas fa-trash-alt"></i> --}}
                清空購物車</button>
              <a href="{{ route('order') }}">
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
    calculate()

    // 計算 小計及總金額
    function calculate() {
      let total = 0;
      $('input[name=quantity]').each((i, e) => {
        let
          id = $(e).data('id'),
          qty = $(e).val(),
          price = $(`.order-lg-3[data-id=${id}]`).data('price');
        total = total + qty * price
        $(`.order-lg-3[data-id=${id}] span`).text(price)
        $(`.order-lg-4[data-id=${id}] span`).text(qty * price)
      })
      $(`span[data=total]`).text(total)
    }

    // 鍵盤輸入數量 檢查數量不得超過上下限
    $('input[name=quantity]').change(function(e) {
      e.preventDefault();
      let
        id = $(this).data('id')
      in_stock = $(this).prev().data('stock'),
        replaceQty = $(this).val();
      if (replaceQty > in_stock) {
        replaceQty = in_stock;
      } else if (replaceQty < 1) {
        replaceQty = 1;
      }
      updateCart(id, '', replaceQty);
    });

    // 增加數量按鈕 效果
    $('.addQty').hover(function() {
      if ($(this).next().val() < $(this).data('stock')) {
        $(this).addClass('enable')
      }
    }, function() {
      $(this).removeClass('enable')
    });

    // 增加數量按鈕 點擊即增加
    $('.addQty').click(function(e) {
      e.preventDefault();
      let
        id = $(this).next().data('id'),
        quantity = $(this).next().val();
      if (quantity < $(this).data('stock')) {
        console.log('t')
        updateCart(id, 1)
      } else {
        Swal.fire({
          icon: 'warning',
          title: '已達庫存上限',
          confirmButtonText: '確定'
        });
      }
    });

    // 減少數量按鈕 效果
    $('.decQty').hover(function() {
      if ($(this).prev().val() > 1) {
        $(this).addClass('enable')
      }
    }, function() {
      $(this).removeClass('enable')
    });

    // 減少數量按鈕 點擊即減少
    $('.decQty').click(function(e) {
      e.preventDefault();
      let
        id = $(this).prev().data('id'),
        quantity = $(this).prev().val();
      if (quantity > 1) {
        updateCart(id, -1)
      } else {
        Swal.fire({
          icon: 'warning',
          title: '刪除此商品？',
          showCancelButton: true,
          confirmButtonText: '確定',
          cancelButtonText: '取消',
        }).then((re) => {
          if (re.isConfirmed) {
            deleteCart(id);
            calculate()
          }
        });
      }
    });

    // 刪除單項商品
    $('button i.fa-trash-alt').parent().click(function(e) {
      e.preventDefault();
      let id = $(this).data('id')
      deleteCart(id);
    });

    // 刪除所有商品 清空購物車
    $('button[name=clearAll]').click(function(e) {
      e.preventDefault();
      let id = [];
      $.each($('input[name=cart_id]'), function(i, e) {
        id[i] = $(this).val();
      });
      deleteCart(id);
    });

    // 對DB 刪除
    function deleteCart(id) {
      $.ajax({
        type: "DELETE",
        url: "/api/cart/" + id,
        data: {
          _token: '{{ csrf_token() }}',
        },
        dataType: "json",
        error: function(response) {
          if (response.status == 200) {
            if (typeof(id) == 'array') {
              location.reload()
            } else {
              $(`button[data-id=${id}]`).parents('.row .bg-white').remove()
              calculate()
            }
          } else {
            console.log(response)
          }
        }
      });
    }

    // 對DB 更新
    function updateCart(id, qty, replaceQty) {
      let
        data = {
          _token: '{{ csrf_token() }}'
        },
        input = $(`input[name=quantity][data-id=${id}]`),
        quantity = $(`input[name=quantity][data-id=${id}]`).val();
      if (qty != '') {
        data.quantity = qty
      } else {
        data.replaceQty = replaceQty
      }
      $.ajax({
        type: "PATCH",
        url: "/api/cart/" + id,
        data: data,
        dataType: "json",
        error: function(response) {
          if (response.status == 200) { // 不要刷新頁面，直接改值
            if (replaceQty != '') {
              quantity = replaceQty
            } else {
              quantity = parseInt(quantity) + qty
            }
            input.val(quantity)
            calculate()
          } else {
            console.log(response)
          }
        }
      });
    }
  </script>
@endsection
