@extends('layouts.frontend')
@section('title','這裡是商品品名')
@section('content')
  <main>
    <div class="container">
      <div class="row my-4">
        <div class="col-12 col-sm-3">
          <ul class="list-group">
            <li class="list-group-item list-group-item-danger">所有商品</li>
            <li class="list-group-item list-group-item-warning">專業食糧</li>
            <li class="list-group-item list-group-item-warning">零食</li>
            <li class="list-group-item list-group-item-warning">貓砂</li>
            <li class="list-group-item list-group-item-light">礦砂</li>
            <li class="list-group-item list-group-item-light">豆腐砂</li>
            <li class="list-group-item list-group-item-light">松木砂</li>
            <li class="list-group-item list-group-item-warning">玩具</li>
            <li class="list-group-item list-group-item-warning">生活用品</li>
          </ul>
        </div>
        <div class="col-12 col-sm-9 px-sm-0">
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="#">所有商品</a></li>
              <li class="breadcrumb-item"><a href="#">貓砂</a></li>
              <li class="breadcrumb-item active" aria-current="page">豆腐砂</li>
            </ol>
          </nav>
          <div class="row justify-content-end">
            <div class="col-6 col-md-5">
              <img src="https://fakeimg.pl/500x500/cedfaa" class="w-100">
            </div>
            <div class="col-6 col-md-7 pl-0 pl-sm-2 d-flex flex-column justify-content-center">
              <p class="my-0 my-1">品名：<span>小茜豆腐砂</span></p>
              <p class="my-0 my-1">規格：<span>6L</span></p>
              <p class="my-0 my-1">單位：<span>包</span></p>
              <!-- <p class="my-0 my-1">保存期限：<span>出廠24個月</span></p> -->
              <p class="my-0 my-1">庫存量：<span>38</span></p>
              <p class="my-0 my-1">
                價格：<span class="font-weight-bolder text-danger">NT$ 250</span>
                <p class="my-0 my-1">
                  訂購：
                  <input type="number" name="" id="" value="1" size="3" min="1" max="38">
                  <!-- <span>包</span> -->
                  <a href="cart.html">
                    <button class="btn text-pink my-2 my-sm-0" type="submit">
                      <i class="fas fa-cart-plus fa-2x"></i>
                    </button>
                  </a>
                </p>
              </p>
            </div>
            <div class="col-12 col-md-7 pt-2 pl-md-2">
              <p class="text-justify">結合太陽具體姑娘帝國文化影音常見不僅我還，答應快捷深入可見生成幽默消費者曝光徹底總數國務院，經銷商行情，可惜很少為何您是國家，技能公主加拿大不滿獲取商業運作在那裡環保承擔，微笑來的接到顧問，連續站在像素，本站天堂浪費移動億元特色一種，行為走到新臺幣清楚寶。</p>
            </div>
          </div>
        </div>    
      </div>
    </div>
  </main>
@endsection