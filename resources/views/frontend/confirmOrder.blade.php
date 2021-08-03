@extends('layouts.frontend')
@section('title','確認訂購資訊')
@section('content')
  <main>
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-12 col-md-9 col-lg-7 col-xl-6">
          <div class="row mt-4 mb-sm-2">
            <div class="col">
              <h4>訂單詳情</h4>
            </div>
          </div>
          <!-- 商品清單 -->
          <table class="table table-bordered" id="orderTable">
            <thead class="thead-light">
              <tr>
              <!-- <tr class="table-active font-weight-bolder"> -->
                <th scope="col" class="col-5">品名</th>
                <th scope="col" class="col-2">單價</th>
                <th scope="col" class="col-2">數量</th>
                <th scope="col" class="col-3">金額</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>小茜豆腐砂1</td>
                <td>12500</td>
                <td>2</td>
                <td>25000</td>
              </tr>
              <tr>
                <td>小茜豆腐砂2</td>
                <td>12500</td>
                <td>2</td>
                <td>25000</td>
              </tr>
              <tr>
                <td>小茜豆腐砂3</td>
                <td>12500</td>
                <td>2</td>
                <td>25000</td>
              </tr>  
              <tr>
                <td>小茜豆腐砂小茜豆腐砂小茜豆腐砂4</td>
                <td>12500</td>
                <td>2</td>
                <td>25000</td>
              </tr>
              <tr>
                <td>小茜豆腐砂小茜豆腐砂5</td>
                <td>12500</td>
                <td>2</td>
                <td>25000</td>
              </tr>  
            </tbody>
          </table>
  
          <!-- 總金額 -->
          <div class="row">
            <div class="col-12 text-right">
              <p class="h5">總金額：<span class="text-pink">125000</span></p>
            </div>
          </div>
          <!-- 收件資訊 -->
          <div class="row mt-4 mb-1 mb-sm-2">
            <div class="col-12 d-flex justify-content-between align-items-center">
              <h4 class="d-inline-block">收件者資訊</h4>
              <span class="btn btn-outline-secondary">使用預設資訊</span>
            </div>
          </div>
          <div class="form-group row mb-2">
            <label for="receipient" class="col-3 col-sm-2 col-form-label pr-0">收件者</label>
            <div class="col-9 col-sm-10">
              <input type="text" class="form-control" id="receipient" placeholder="吱吱貓">
            </div>
          </div>
          <div class="form-group row mb-2 justify-content-end">
            <label for="addressLine1" class="col-3 col-sm-2 col-form-label mt-1">地址</label>
            <div class="col-9 col-sm-4 mt-1">
              <select id="city" class="form-control">
                <option value="" disabled selected>選取城市</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
              </select>
            </div>
            <div class="col-9 col-sm-4 mt-1">
              <select id="region" class="form-control">
                <option value="" disabled selected>鄉鎮區域</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
              </select>
            </div>
            <div class="d-none d-sm-inline-block col-sm-2 mt-1">
              <input type="text" class="form-control" id="ZIP" placeholder="231">
            </div>
            <div class="col-9 col-sm-10 mt-1">
              <input type="text" class="form-control" id="addressDetail" placeholder="安祥路388巷588號1樓">
            </div>
          </div>
          <div class="form-group row mb-2">
            <label for="receipientTel" class="col-3 col-sm-2 col-form-label">電話</label>
            <div class="col-9 col-sm-10">
              <input type="text" class="form-control" id="receipientTel" placeholder="0927775101">
            </div>
          </div>
          <div class="form-group row mb-2">
            <label for="remark" class="col-3 col-sm-2 col-form-label">備註</label>
            <div class="col-9 col-sm-10">
              <textarea class="form-control" id="remark" placeholder="若有特殊需求，請在此標註。"></textarea>
            </div>
          </div>
          <!-- 結帳 -->
          <div class="row my-2 justify-content-center">
            <button type="button" class="btn btn-secondary m-2"><i class="fas fa-undo-alt"></i> 返回購物車</button>
            <a href="confirmed.html">
              <button type="button" class="btn btn-info m-2"><i class="fas fa-chevron-right"></i> 確認下單</button>
            </a>
          </div>
        </div>
      </div>
    </div>
  </main>
@endsection