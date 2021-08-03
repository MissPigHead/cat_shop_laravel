@extends('layouts.frontend')
@section('title','購物完成')
@section('content')
  <main>
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-12 col-md-9 col-lg-7 col-xl-6">
          <div class="row my-5">
            <div class="col text-center h3 text-pink">
              <i class="far fa-check-circle"></i>
              訂單已送出，感謝您的訂購
            </div>
          </div>
          <!-- 結帳 -->
          <div class="row my-2 justify-content-center">
            <a href="orderList.html">
              <button type="button" class="btn btn-secondary m-2"><i class="fas fa-undo-alt"></i> 檢視歷史訂單</button>
            </a>
            <a href="confirmed.html">
              <button type="button" class="btn btn-info m-2"><i class="fas fa-chevron-right"></i> 繼續購物</button>
            </a>
          </div>
        </div>
      </div>
    </div>

  </main>
@endsection