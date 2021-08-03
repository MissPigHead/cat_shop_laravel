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
          <form>
            <div class="form-group row align-items-center">
              <label for="account" class="col-3 col-sm-2 col-form-label">帳號</label>
              <div class="col-9 col-sm-7">
                <input type="text" class="form-control" id="account" placeholder="英文大小寫或數字4～8個字元">
              </div>
              <div class="d-none d-sm-inline-block col-sm-3">
                <button type="button" class="btn btn-info w-100">檢查帳號</button>
              </div>
            </div>
            <div class="form-group row">
              <label for="email" class="col-3 col-sm-2 col-form-label pr-0">E-mail</label>
              <div class="col-9 col-sm-10">
                <input type="text" class="form-control" id="email">
              </div>
            </div>
            <div class="form-group row">
              <label for="email" class="col-3 col-sm-2 col-form-label">生日</label>
              <div class="col-9 col-sm-10">
                <input type="date" class="form-control" id="birthday" value="2000-01-01" min="1920-01-01" max="2020-12-31">
              </div>
            </div>
            <div class="form-group row">
              <label for="password" class="col-3 col-sm-2 col-form-label">密碼</label>
              <div class="col-9 col-sm-10">
                <input type="password" class="form-control" id="password" placeholder="英文大小寫或數字6～12個字元">
              </div>
            </div>
            <div class="form-group row">
              <label for="password2" class="col-3 col-sm-2 col-form-label pr-0">確認密碼</label>
              <div class="col-9 col-sm-10">
                <input type="password" class="form-control" id="password2" placeholder="請再次輸入密碼">
              </div>
            </div>
            <div class="row my-2 justify-content-center">
              <a href="personal.html">
                <button type="button" class="btn btn-info mx-2">確認</button>
              </a>
              <!-- <button type="button" class="btn btn-info mx-2">確認</button> -->
              <button type="button" class="btn btn-secondary mx-2" data-dismiss="modal">取消</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </main>
@endsection