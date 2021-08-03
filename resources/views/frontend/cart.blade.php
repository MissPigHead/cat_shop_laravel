@extends('layouts.frontend')
@section('title','購物車')
@section('content')
  <main>
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-12 col-md-9 col-lg-7 col-xl-6">
          <div class="row mt-4 mb-sm-2">
            <div class="col">
              <h4>購物車</h4>
            </div>
          </div>
          <!-- 一組商品 -->
          <div class="row mb-2 mb-md-3 bg-white align-items-center justify-content-sm-between">
            <div class="col-4 col-sm-3">
              <img src="https://fakeimg.pl/500x500/acdefa" class="w-100 my-0 my-sm-2 mylg-3">
            </div>
            <div class="col-8 col-sm-9 row align-items-center justify-content-end px-0 px-sm-3 text-secondary">
              <div class="col-9 col-md-10 col-lg-12 py-lg-2 order-lg-1 h6">
                <span>小茜豆腐砂</span>
              </div>
              <div class="col-3 col-md-2 order-lg-5 text-sm-right">
                <button type="button" class="btn btn-outline-secondary">
                  <i class="fas fa-trash-alt"></i>
                </button>
              </div>
              <div class="col-8 col-sm-5 order-lg-2 col-lg-4">
                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text px-1 px-sm-2" id="addQty">+</span>
                  </div>
                  <div class="custom-file">
                    <input type="number" name="" id="" value="2" min="1" max="38" class="form-control px-1 px-sm-2 text-center">
                  </div>
                  <div class="input-group-append">
                    <span class="input-group-text px-1 px-sm-2" id="decQty">-</span>
                  </div>
                </div>
              </div>
              <div class="col-4 col-sm-2 order-lg-3 text-right">
                *<span>12500</span>
              </div>
              <div class="col-12 col-sm-5 col-lg-4 order-lg-4 text-right">
                小計：<span class="h6 text-pink">25000</span>
              </div>
            </div>
          </div>
          <!-- 一組商品 -->
          <div class="row mb-2 mb-md-3 bg-white align-items-center justify-content-sm-between">
            <div class="col-4 col-sm-3">
              <img src="https://fakeimg.pl/500x500/acdefa" class="w-100 my-0 my-sm-2 mylg-3">
            </div>
            <div class="col-8 col-sm-9 row align-items-center justify-content-end px-0 px-sm-3 text-secondary">
              <div class="col-9 col-md-10 col-lg-12 py-lg-2 order-lg-1 h6">
                <span>小茜豆腐砂</span>
              </div>
              <div class="col-3 col-md-2 order-lg-5 text-sm-right">
                <button type="button" class="btn btn-outline-secondary">
                  <i class="fas fa-trash-alt"></i>
                </button>
              </div>
              <div class="col-8 col-sm-5 order-lg-2 col-lg-4">
                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text px-1 px-sm-2" id="addQty2">+</span>
                  </div>
                  <div class="custom-file">
                    <input type="number" name="" id="" value="2" min="1" max="38" class="form-control px-1 px-sm-2 text-center">
                  </div>
                  <div class="input-group-append">
                    <span class="input-group-text px-1 px-sm-2" id="decQty2">-</span>
                  </div>
                </div>
              </div>
              <div class="col-4 col-sm-2 order-lg-3 text-right">
                *<span>12500</span>
              </div>
              <div class="col-12 col-sm-5 col-lg-4 order-lg-4 text-right">
                小計：<span class="h6 text-pink">25000</span>
              </div>
            </div>
          </div>
          <!-- 一組商品 -->
          <div class="row mb-2 mb-md-3 bg-white align-items-center justify-content-sm-between">
            <div class="col-4 col-sm-3">
              <img src="https://fakeimg.pl/500x500/acdefa" class="w-100 my-0 my-sm-2 mylg-3">
            </div>
            <div class="col-8 col-sm-9 row align-items-center justify-content-end px-0 px-sm-3 text-secondary">
              <div class="col-9 col-md-10 col-lg-12 py-lg-2 order-lg-1 h6">
                <span>小茜豆腐砂</span>
              </div>
              <div class="col-3 col-md-2 order-lg-5 text-sm-right">
                <button type="button" class="btn btn-outline-secondary">
                  <i class="fas fa-trash-alt"></i>
                </button>
              </div>
              <div class="col-8 col-sm-5 order-lg-2 col-lg-4">
                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text px-1 px-sm-2" id="addQty3">+</span>
                  </div>
                  <div class="custom-file">
                    <input type="number" name="" id="" value="2" min="1" max="38" class="form-control px-1 px-sm-2 text-center">
                  </div>
                  <div class="input-group-append">
                    <span class="input-group-text px-1 px-sm-2" id="decQty3">-</span>
                  </div>
                </div>
              </div>
              <div class="col-4 col-sm-2 order-lg-3 text-right">
                *<span>12500</span>
              </div>
              <div class="col-12 col-sm-5 col-lg-4 order-lg-4 text-right">
                小計：<span class="h6 text-pink">25000</span>
              </div>
            </div>
          </div>
          <!-- 一組商品 -->
          <div class="row mb-2 mb-md-3 bg-white align-items-center justify-content-sm-between">
            <div class="col-4 col-sm-3">
              <img src="https://fakeimg.pl/500x500/acdefa" class="w-100 my-0 my-sm-2 mylg-3">
            </div>
            <div class="col-8 col-sm-9 row align-items-center justify-content-end px-0 px-sm-3 text-secondary">
              <div class="col-9 col-md-10 col-lg-12 py-lg-2 order-lg-1 h6">
                <span>小茜豆腐砂</span>
              </div>
              <div class="col-3 col-md-2 order-lg-5 text-sm-right">
                <button type="button" class="btn btn-outline-secondary">
                  <i class="fas fa-trash-alt"></i>
                </button>
              </div>
              <div class="col-8 col-sm-5 order-lg-2 col-lg-4">
                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text px-1 px-sm-2" id="addQty4">+</span>
                  </div>
                  <div class="custom-file">
                    <input type="number" name="" id="" value="2" min="1" max="38" class="form-control px-1 px-sm-2 text-center">
                  </div>
                  <div class="input-group-append">
                    <span class="input-group-text px-1 px-sm-2" id="decQty4">-</span>
                  </div>
                </div>
              </div>
              <div class="col-4 col-sm-2 order-lg-3 text-right">
                *<span>12500</span>
              </div>
              <div class="col-12 col-sm-5 col-lg-4 order-lg-4 text-right">
                小計：<span class="h6 text-pink">25000</span>
              </div>
            </div>
          </div>
          <!-- 一組商品 -->
          <div class="row mb-2 mb-md-3 bg-white align-items-center justify-content-sm-between">
            <div class="col-4 col-sm-3">
              <img src="https://fakeimg.pl/500x500/acdefa" class="w-100 my-0 my-sm-2 mylg-3">
            </div>
            <div class="col-8 col-sm-9 row align-items-center justify-content-end px-0 px-sm-3 text-secondary">
              <div class="col-9 col-md-10 col-lg-12 py-lg-2 order-lg-1 h6">
                <span>小茜豆腐砂</span>
              </div>
              <div class="col-3 col-md-2 order-lg-5 text-sm-right">
                <button type="button" class="btn btn-outline-secondary">
                  <i class="fas fa-trash-alt"></i>
                </button>
              </div>
              <div class="col-8 col-sm-5 order-lg-2 col-lg-4">
                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text px-1 px-sm-2" id="addQty5">+</span>
                  </div>
                  <div class="custom-file">
                    <input type="number" name="" id="" value="2" min="1" max="38" class="form-control px-1 px-sm-2 text-center">
                  </div>
                  <div class="input-group-append">
                    <span class="input-group-text px-1 px-sm-2" id="decQty5">-</span>
                  </div>
                </div>
              </div>
              <div class="col-4 col-sm-2 order-lg-3 text-right">
                *<span>12500</span>
              </div>
              <div class="col-12 col-sm-5 col-lg-4 order-lg-4 text-right">
                小計：<span class="h6 text-pink">25000</span>
              </div>
            </div>
          </div>
          <!-- 總金額 -->
          <div class="row">
            <div class="col-12 text-right">
              <p class="h5">總金額：<span class="text-pink">125000</span></p>
            </div>
          </div>
          <!-- 結帳 -->
          <div class="row my-2 justify-content-center">
            <button type="button" class="btn btn-secondary m-2"><i class="fas fa-undo-alt"></i> 繼續購物</button>
            <button type="button" class="btn btn-secondary m-2"><i class="fas fa-trash-alt"></i> 清空購物車</button>
            <a href="order.html">
              <button type="button" class="btn btn-info m-2"><i class="fas fa-chevron-right"></i> 前往結帳</button>
            </a>
          </div>
        </div>
      </div>
    </div>

  </main>
@endsection