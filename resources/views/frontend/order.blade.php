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
          @foreach ($items as $k => $item)
            @if ($loop->last)
              <div
                class="row py-1 m-0 justify-content-center align-items-center bg-white border border-gray text-secondary">
              @else
                <div
                  class="row py-1 m-0 justify-content-center align-items-center bg-white border border-gray border-bottom-0 text-secondary">
            @endif
            <div class="col-3 col-sm-2">
              @foreach ($item->product->image_path as $image_path)
                @if ($loop->first)
                  <img src="{{ $image_path }}" class="w-100">
                @endif
              @endforeach
            </div>
            <div class="col-9 col-sm-8 col-lg-7">
              <div class="row m-0 justify-content-between">
                {{-- <div class="col-12 p-0 justify-content-between"> --}}
                <span>{{ $item->product->name }}</span>
                <span>x {{ $item->quantity }}</span>
              </div>
              <div class="row m-0 justify-content-between">
                <span>NT {{ $item->product->price }}</span>
                <span>小計： {{ $item->quantity * $item->product->price }}</span>
              </div>
            </div>
        </div>
        @php
          $total = $total + $item->quantity * $item->product->price;
        @endphp
        @endforeach
        <!-- 總金額 -->
        <div class="row my-2">
          <div class="col-12 text-right">
            <p class="h5">總金額：<span class="text-pink">{{ $total }}</span></p>
          </div>
        </div>
        <!-- 收件資訊 -->
        <div class="row mt-4 mb-1 mb-sm-2">
          <div class="col-12 d-flex justify-content-between align-items-center">
            <h4>收件者資訊</h4>
          </div>
        </div>

        <div class="form-group row mb-2">
          <label for="receipient" class="col-3 col-sm-2 col-form-label pr-0">收件者</label>
          <div class="col-9 col-sm-10">
            <input type="text" class="form-control" id="receipient" value="吱吱貓" disabled>
          </div>
        </div>
        <div class="form-group row mb-2 justify-content-end">
          <label for="addressLine1" class="col-3 col-sm-2 col-form-label mt-1">地址</label>
          <div class="col-9 col-sm-4 mt-1">
            <select id="city" class="form-control" disabled>
              <option value="台北市" selected>台北市</option>
            </select>
          </div>
          <div class="col-9 col-sm-4 mt-1">
            <select id="region" class="form-control" disabled>
              <option value="森林區" selected>森林區</option>
            </select>
          </div>
          <div class="d-none d-sm-inline-block col-sm-2 mt-1">
            <input type="text" class="form-control" id="ZIP" value="231" disabled>
          </div>
          <div class="col-9 col-sm-10 mt-1">
            <input type="text" class="form-control" id="addressDetail" value="安祥路388巷588號1樓" disabled>
          </div>
        </div>
        <div class="form-group row mb-2">
          <label for="receipientTel" class="col-3 col-sm-2 col-form-label">電話</label>
          <div class="col-9 col-sm-10">
            <input type="text" class="form-control" id="receipientTel" value="0927775101" disabled>
          </div>
        </div>
        <div class="form-group row mb-2">
          <label for="remark" class="col-3 col-sm-2 col-form-label">備註</label>
          <div class="col-9 col-sm-10">
            <textarea class="form-control" id="remark" disabled>貓砂請送至管理室，請警衛代收，謝謝。</textarea>
          </div>
        </div>
        <!-- 結帳 -->
        <div class="row my-2 justify-content-center">
          <a href="orderList.html">
            <button type="button" class="btn btn-secondary m-2"><i class="fas fa-undo-alt"></i> 返回歷史訂單</button>
          </a>
        </div>
      </div>
    </div>
    </div>
  </main>
@endsection
