@extends('layouts.frontend')
@section('title', '確認訂單')
@section('content')
  <main>
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-12 col-md-9 col-lg-7 col-xl-6">
          <div class="row mt-4 mb-sm-2">
            <div class="col">
              <h4>確認訂單</h4>
            </div>
          </div>
          <!-- 商品清單 -->
          @php
            $total = 0;
          @endphp
          @foreach (Auth::user()->carts as $cart)
            @if ($loop->last)
              <div
                class="row py-1 m-0 justify-content-center align-items-center bg-white border border-gray text-secondary">
              @else
                <div
                  class="row py-1 m-0 justify-content-center align-items-center bg-white border border-gray border-bottom-0 text-secondary">
            @endif
            <div class="col-3 col-sm-2">
              @foreach ($cart->product->image_path as $image_path)
                @if ($loop->first)
                  <img src="{{ $image_path }}" class="w-100">
                @endif
              @endforeach
            </div>
            <div class="col-9 col-sm-8 col-lg-7">
              <div class="row m-0 justify-content-between">
                <span>{{ $cart->product->name }}</span>
                <span>x {{ $cart->quantity }}</span>
              </div>
              <div class="row m-0 justify-content-between">
                <span>NT {{ $cart->product->price }}</span>
                <span>小計： {{ $cart->quantity * $cart->product->price }}</span>
              </div>
            </div>
        </div>
        @php
          $total = $total + $cart->quantity * $cart->product->price;
        @endphp
        @endforeach
        <!-- 總金額 -->
        <div class="row my-2">
          <div class="col-12 text-right">
            <p class="h5">總金額：<span class="text-pink" id="amount_total">{{ $total }}</span></p>
          </div>
        </div>
        <hr>
        <!-- 收件資訊 -->
        <div class="row mt-4 mb-1 mb-sm-2 align-items-center">
          <div class="col-6 col-sm-8">
            <h4 class="m-0">收件者資訊</h4>
          </div>
          @foreach (Auth::user()->recipients as $k => $recipient)
            @if ($loop->first)
              <div class="col-6 col-sm-4 text-right">
                <a href="{{ route('recipient') }}">
                  <button type="button" class="btn btn-secondary py-1">選擇收件者</button>
                </a>
              </div>
            @endif
          @endforeach
        </div>
        @forelse (Auth::user()->recipients as $recipient)
          @if ($recipient->default_r == 1)
            <!---------- 收件者 ---------->
            <div class="row justify-content-center align-items-baseline mx-0" id="recipient">
              <div class="col-2 text-center px-0 pt-1">名稱</div>
              <div class="col-10 col-sm-6 px-0">{{ $recipient->name }}</div>
              <div class="w-100"></div>
              <div class="col-2 text-center px-0 pt-1">電話</div>
              <div class="col-10 col-sm-6 px-0">{{ $recipient->phone_no }}</div>
              <div class="w-100"></div>
              <div class="col-2 text-center px-0 pt-1">地址</div>
              <div class="col-4 col-sm-2 px-0">{{ $recipient->postcode->city_name }}</div>
              <div class="col-4 col-sm-2 px-0">{{ $recipient->postcode->name }}</div>
              <div class="col-2 px-0">{{ $recipient->postcode->code }}</div>
              <div class="w-100"></div>
              <div class="col-2 px-0"></div>
              <div class="col-10 col-sm-6 px-0 pb-2">{{ $recipient->addr }}</div>
              <input type="hidden" name="recipient_id" value="{{ $recipient->id }}">
            </div>
            <!---------- 備註 ---------->
            <div class="form-group row justify-content-center mx-0 mb-2">
              <label for="remark" class="col-2 text-center px-0 pt-1 col-form-label">備註</label>
              <div class="col-10 col-sm-6 px-0 ">
                <textarea class="form-control" name="description"></textarea>
              </div>
            </div>
          @endif
        @empty
          <div class="row justify-content-center">
            <a href="{{ route('recipient') }}">
              請填寫收件者
            </a>
          </div>
        @endforelse
        <hr>
        <!-- 下單確認條文 -->
        <div class="row mt-4 mb-1 mb-sm-2 align-items-center rules">
          <div class="col-4 pr-0">
            <h4 class="m-0">購物條款</h4>
          </div>
          <div class="col-8 pl-0 text-right text-info">
            <span>請仔細閱讀，同意後可以下單。</span>
          </div>
        </div>
        <div class="row justify-content-center align-items-baseline mx-0 rules">
          <div class="col-12 my-2" style="text-align: justify;text-justify:inter-ideograph;">
            <input type="checkbox" name="purchaserule1" class="mr-1">
            主角少年本帖品牌只是開通，藍色經銷商歡迎光臨開展再次虛擬最為貨幣原本上述是由帶著，逐漸出席這樣少女留言右鍵不需要排行溝通強化詳細，每年請求歡迎您查詢，分析注重。
          </div>
          <div class="col-12 my-2" style="text-align: justify;text-justify:inter-ideograph;">
            <input type="checkbox" name="purchaserule2" class="mr-1">
            房屋具體生態無數圖形外資從而屬於觀點程度有一些能力，瀏覽器距離中港路努力突出您現在這麼多楠雅，眼睛委託減肥隊伍財經，當前位置空氣普遍適合出售隨意掌握勝利結婚，告訴你自由考生一身內心後果似乎熟悉就不不肯，民國一番作為，今天才是明星卻是不行說到，威脅不然，不。
          </div>
        </div>
        <!-- 結帳 -->
        <div class="row my-2 justify-content-center" id="checkout">
          <a href="{{ route('category.index') }}">
            <button type="button" class="btn btn-info m-2">繼續購物</button>
          </a>
          <button type="button" name="checkout" class="btn btn-warning m-2">前往付款</button>
        </div>
      </div>
    </div>
    </div>
  </main>
  <script>
    $('#checkout').hide()

    // 購物車不得為空 && 收件者不得為空 才顯示購物條款
    if ({{ count(Auth::user()->carts) }} * $('#recipient').length) $('.rules').show()
    else $('.rules').hide()

    // 確認是否勾選所有購物條款
    $('input[type=checkbox]').change(function(e) {
      e.preventDefault();
      let
        ans1 = $('input[name=purchaserule1]').is(':checked'),
        ans2 = $('input[name=purchaserule2]').is(':checked');
      // 都勾選 && 購物車不得為空 才顯示前往結帳
      if (ans1 * ans2 * {{ count(Auth::user()->carts) }}) $('#checkout').show()
      else $('#checkout').hide()
    });

    // 轉入付款頁面，記得將備註加入訂單！
    $('button[name=checkout]').click(function(e) {
      e.preventDefault();
      let data = {
        _token: '{{ csrf_token() }}',
        amount_total: $('#amount_total').text(),
        recipient_id: $('input[name=recipient_id]').val(),
        description: $('textarea[name=description]').val()
      }
      $.ajax({
        type: "POST",
        url: "/api/order",
        data: data,
        dataType: "json",
        error: function(result) {
          if (result.status == 200) {
            // 綠界付款這頁應該放在哪裡？
            // 購物車轉訂單 -> 綠界付款 -> 付款成功或失敗 -> 歷史訂單
            location.replace("{{ route('checkout') }}");
          } else if (result.status == 422) {
            let err = ''
            $.each(result.responseJSON.errors, function(indexInArray, valueOfElement) {
              $.each(valueOfElement, function(i, e) {
                err = err + `<li class='text-left'>${e}</li>`
              });
            });
            Swal.fire({
              icon: 'error',
              html: `<ul>${err}</ul>`,
            })
          } else {
            console.log(result)
            console.log('status', result.status)
            console.log('statusText', result.statusText)
            console.log('responseJSON', result.responseJSON)
            console.log('responseText', result.responseText)
          }
        }
      });
    });
  </script>
@endsection
