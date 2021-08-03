@extends('layouts.frontend')
@section('title','購物說明')
@section('content')
  <main>
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-12 col-md-8 col-lg-6 col-xl-5">


            <div class="row mt-4 mb-sm-2">
              <div class="col">
                <h4>購物說明</h4>
              </div>
            </div>

            <div class="accordion text-secondary" id="rules">
              <div class="card">
                <div class="card-header" id="title001">
                  <h2 class="mb-0">
                    <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#content001" aria-expanded="true" aria-controls="collapseOne">
                      付款方式
                    </button>
                  </h2>
                </div>
            
                <div id="content001" class="collapse" aria-labelledby="title001" data-parent="#rules">
                  <div class="card-body">
                    <ol>
                      <li>ATM自動櫃檯機轉帳</li>
                      <li>信用卡</li>
                    </ol>
                  </div>
                </div>
              </div>
              <div class="card">
                <div class="card-header" id="title002">
                  <h2 class="mb-0">
                    <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#content002" aria-expanded="true" aria-controls="collapseOne">
                      出貨時間與交貨方式
                    </button>
                  </h2>
                </div>
                <div id="content002" class="collapse" aria-labelledby="title002" data-parent="#rules">
                  <div class="card-body">
                    <ol>
                      <li>現貨商品完成付款的5個工作天內寄出，約寄出3天後可到貨</li>
                      <li>交貨方式 : 郵局包裹或黑貓宅急便</li>
                      <li>送貨範圍 : 黑貓宅急便限台灣本島地區，外島請選擇郵局</li>
                    </ol>
                  </div>
                </div>
              </div>
              <div class="card">
                <div class="card-header" id="title003">
                  <h2 class="mb-0">
                    <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#content003" aria-expanded="true" aria-controls="collapseOne">
                      運費說明及免運門檻
                    </button>
                  </h2>
                </div>
            
                <div id="content003" class="collapse" aria-labelledby="title001" data-parent="#rules">
                  <div class="card-body">
                    <ol>
                      <li>不分郵局或黑貓，運費一律150元</li>
                      <li>滿2000元即可免運</li>
                      <li class="text-danger">慶祝開幕，目前滿1000元即可免運</li>
                    </ol>
                  </div>
                </div>
              </div>
              <div class="card">
                <div class="card-header" id="title004">
                  <h2 class="mb-0">
                    <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#content004" aria-expanded="true" aria-controls="collapseOne" disabled>
                      退貨方式說明
                    </button>
                  </h2>
                </div>
            
                <div id="content004" class="collapse" aria-labelledby="title001" data-parent="#rules">
                  <div class="card-body">
                  </div>
                </div>
              </div>
            </div>
    

          </div>
        </div>
      </div>
  </main>
@endsection