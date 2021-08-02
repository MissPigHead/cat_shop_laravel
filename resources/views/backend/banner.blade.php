@extends('layouts.backend')
@section('title','Banner廣告')
@section('content')
      <div class="col-9 content">
        <!--新增取區 -->
        <div class="row justify-content-center">
          <button type="button" class="btn btn-info" data-toggle="modal" data-target="#addBanner">新增Banner廣告</button>
        </div>
        <div class="modal fade" id="addBanner" tabindex="-1" aria-labelledby="addBannerLabel" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="addBannerLabel">新增Banner廣告</h5>
              </div>
              <div class="modal-body">
                <form>
                  <div class="form-group">
                    <label for="newBanner" class="col-form-label">請上傳圖片</label>
                    <input type="file" class="form-control-file" id="newBanner">
                  </div>
                </form>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-info">上傳</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">取消</button>
              </div>
            </div>
          </div>
        </div>
        <!-- 顯示區 -->
        <table class="mt-4 table  table-bordered table-hover">
          <thead class="thead-dark">
            <tr>
            <!-- <tr class="table-active font-weight-bolder"> -->
              <th scope="col" class="col-8">圖片</th>
              <th scope="col" class="col-1">狀態</th>
              <th scope="col" class="col-1">操作</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td><img src="http://fakeimg.pl/1200x480/20c997/?text=BANNER-1" height="200"></td>
              <td>顯示中</td>
              <td>
                <button type="button" class="btn btn-outline-secondary">
                  <i class="far fa-eye-slash"></i>
                </button>
                <button type="button" class="btn btn-outline-secondary">
                  <i class="fas fa-trash-alt"></i>
                </button>
              </td>
            </tr>
            <tr>
              <td><img src="http://fakeimg.pl/1200x480/20c997/?text=BANNER-2" height="200"></td>
              <td>顯示中</td>
              <td>
                <button type="button" class="btn btn-outline-secondary">
                  <i class="far fa-eye-slash"></i>
                </button>
                <button type="button" class="btn btn-outline-secondary">
                  <i class="fas fa-trash-alt"></i>
                </button>
              </td>
            </tr>
            <tr>
              <td><img src="http://fakeimg.pl/1200x480/6c757d/?text=BANNER-3" height="200"></td>
              <td>已隱藏</td>
              <td>
                <button type="button" class="btn btn-outline-secondary">
                  <i class="far fa-eye"></i>
                </button>
                <button type="button" class="btn btn-outline-secondary">
                  <i class="fas fa-trash-alt"></i>
                </button>
              </td>
            </tr>
            <tr>
              <td><img src="http://fakeimg.pl/1200x480/20c997/?text=BANNER-4" height="200"></td>
              <td>顯示中</td>
              <td>
                <button type="button" class="btn btn-outline-secondary">
                  <i class="far fa-eye-slash"></i>
                </button>
                <button type="button" class="btn btn-outline-secondary">
                  <i class="fas fa-trash-alt"></i>
                </button>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
@endsection