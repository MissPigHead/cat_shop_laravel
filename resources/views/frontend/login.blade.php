@extends('layouts.frontend')
@section('title','登入')
@section('content')
@if ($errors->any())
  @include('swal')
@endif
  <main>
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-12 col-md-8 col-lg-6 col-xl-5">
          <div class="row mt-4 mb-sm-2">
            <div class="col">
              <h4>會員登入</h4>
            </div>
          </div>
          <form method="POST" action="{{ route('login') }}">
            @csrf
            <div class="form-group row align-items-center">
              <label for="account" class="col-3 col-sm-2 col-form-label">帳號</label>
              <div class="col-9 col-sm-10">
                <input type="text" class="form-control" id="account">
              </div>
            </div>
            <div class="form-group row">
              <label for="email" class="col-3 col-sm-2 col-form-label pr-0">E-mail</label>
              <div class="col-9 col-sm-10">
                <input type="text" class="form-control" id="email">
              </div>
            </div>
            <div class="form-group row">
              <label for="password" class="col-3 col-sm-2 col-form-label">密碼</label>
              <div class="col-9 col-sm-10">
                <input type="password" class="form-control" id="password" placeholder="英文大小寫或數字6～12個字元">
              </div>
            </div>
            <div class="row my-2 justify-content-center">
              <button type="button" class="btn btn-info mx-2">確認</button>
              <button type="button" class="btn btn-secondary mx-2" data-dismiss="modal">取消</button>
            </div>
          </form>
          <div class="row my-4 px-3 justify-content-between">
            <a href="{{ route('forget') }}">忘記密碼？</a>
            <a href="{{ route('register') }}">註冊帳號</a>
          </div>
        </div>
      </div>
    </div>
  </main>
@endsection
