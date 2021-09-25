@extends('layouts.frontend')
@section('title','會員註冊')
@section('content')
  <main>
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-12 col-md-8 col-lg-6 col-xl-5">
          <div class="row mt-4 mb-sm-2">
            <div class="col">
              <h4>會員註冊</h4>
            </div>
          </div>
          <form method="POST" action="{{ route('register') }}">
            @csrf
            <div class="form-group row align-items-center">
              <label for="name" class="col-3 col-sm-2 col-form-label">帳號</label>
                <div class="col-9 col-sm-10">
                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus placeholder="英文大小寫或數字，20個字元內">
              </div>
            </div>
            <div class="form-group row">
              <label for="email" class="col-3 col-sm-2 col-form-label pr-0">E-mail</label>
              <div class="col-9 col-sm-10">
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
              </div>
            </div>
            <div class="form-group row">
              <label for="birthday" class="col-3 col-sm-2 col-form-label">生日</label>
              <div class="col-9 col-sm-10">
                <input type="date" class="form-control @error('birthday') is-invalid @enderror" id="birthday" name="birthday" value="{{ old('birthday')?:"2000-01-01" }}" min="1920-01-01" max="2020-12-31">
              </div>
            </div>
            <div class="form-group row">
              <label for="phone_no" class="col-3 col-sm-2 col-form-label pr-0">手機號碼</label>
              <div class="col-9 col-sm-10">
                <input type="text" class="form-control @error('phone_no') is-invalid @enderror" name="phone_no" id="phone_no" value="{{ old('phone_no') }}" placeholder="請輸入不含符號的數字">
              </div>
            </div>
            <div class="form-group row">
              <label for="password" class="col-3 col-sm-2 col-form-label">密碼</label>
              <div class="col-9 col-sm-10">
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="需含英文大小寫及數字，8～20個字元">
              </div>
            </div>
            <div class="form-group row">
              <label for="password2" class="col-3 col-sm-2 col-form-label pr-0">確認密碼</label>
              <div class="col-9 col-sm-10">
                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" placeholder="請再次輸入密碼">
              </div>
            </div>
            <div class="row my-2 justify-content-center">
              <button type="submit" class="btn btn-info mx-2">確認</button>
              <button type="reset" class="btn btn-secondary mx-2">取消</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </main>
@endsection
