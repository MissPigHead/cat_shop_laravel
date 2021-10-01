@extends('layouts.frontend')
@section('title','購物完成')
@section('content')
  <main>
      <div class="container">
          <div class="row">
              <div class="col-12 h3">1. 已將購物車資料轉訂單 含orders & order_details</div>
              <div class="col-12 h3">2. 待串ECPay，暫時先測試Credit付款</div>
              <div class="col-12 h3">3. ECPay回傳付款完成就扣庫存</div>
              <div class="col">
                  {{-- <form action="/api/order" method="post">
                      @csrf
                      <input type="submit" value="SEND">
                  </form> --}}
                  <a href="{{ route('order.paid') }}"><button class="btn btn-secondary">確認已付款成功</button></a>
              </div>
          </div>
      </div>




  </main>
@endsection
