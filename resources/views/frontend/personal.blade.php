@extends('layouts.frontend')
@section('title','個人資訊')
@section('content')
  <main>
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-12 col-md-8 col-lg-6 col-xl-5">
          <div class="row mt-4 mb-sm-2">
            <div class="col">
              <h4>會員資訊</h4>
            </div>
          </div>
          <form>
            <div class="form-group row align-items-center">
              <label for="account" class="col-3 col-sm-2 col-form-label">帳號</label>
              <div class="col-9 col-sm-7">
                <input type="text" class="form-control" id="account" placeholder="QiQiCat">
              </div>
              <div class="d-none d-sm-inline-block col-sm-3">
                <button type="button" class="btn btn-info w-100">刪除帳號</button>
              </div>
            </div>
            <div class="form-group row">
              <label for="email" class="col-3 col-sm-2 col-form-label pr-0">E-mail</label>
              <div class="col-9 col-sm-10">
                <input type="email" class="form-control" id="email" placeholder="qiqicat20170608@testqiqi.com">
              </div>
            </div>
            <div class="form-group row">
              <label for="email" class="col-3 col-sm-2 col-form-label">生日</label>
              <div class="col-9 col-sm-10">
                <input type="date" class="form-control" id="birthday" value="2017-06-08">
              </div>
            </div>
            <div class="form-group row">
              <label for="password" class="col-3 col-sm-2 col-form-label">密碼</label>
              <div class="col-9 col-sm-10">
                <input type="password" class="form-control" id="password" placeholder="************">
              </div>
            </div>
            <div class="form-group row">
              <label for="password2" class="col-3 col-sm-2 col-form-label pr-0">確認密碼</label>
              <div class="col-9 col-sm-10">
                <input type="password" class="form-control" id="password2" placeholder="************">
              </div>
            </div>
            <div class="row mt-5 mb-2">
              <div class="col">
                <h4>預設收件資訊</h4>
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
            <div class="row my-2 justify-content-center">
              <button type="button" class="btn btn-info mx-2">確認</button>
              <button type="button" class="btn btn-secondary mx-2" data-dismiss="modal">取消</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </main>
@endsection