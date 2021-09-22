@extends('layouts.backend')
@section('title', '訂單區')
@section('content')
  <div class="col-9 content">
    <!-- 選取區 -->
    <form>
      <div class="pt-1 form-group row">
        <label for="mainCategory" class="col-2 col-form-label">搜尋訂單</label>
        <div class="col-4">
          <input type="text" class="form-control" id="mainCategory" placeholder="請輸入訂單編號">
        </div>
        <button type="button" class="btn btn-info">搜尋</button>
      </div>
    </form>

    <!-- 顯示區 -->
    <table class="mt-4 table  table-bordered table-hover">
      <thead class="thead-dark">
        <tr>
          <!-- <tr class="table-active font-weight-bolder"> -->
          <th scope="col" class="col-2">訂單編號</th>
          <th scope="col" class="col-2">訂購日期</th>
          <th scope="col" class="col-2">會員帳號</th>
          <th scope="col" class="col-2">狀態</th>
          <th scope="col" class="col-4">操作</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>33345678</td>
          <td>2021/07/22</td>
          <td>testtest12</td>
          <td>待出貨</td>
          <td>
            <button type="button" class="btn btn-outline-secondary" title="檢視訂單內容">
              <i class="fas fa-eye"></i>
            </button>
            <button type="button" class="btn btn-outline-secondary" title="設定為已出貨">
              <i class="fas fa-check-circle"></i>
            </button>
            <button type="button" class="btn btn-outline-secondary" title="取消訂單">
              <i class="fas fa-store-slash"></i>
            </button>
            <button type="button" class="btn btn-outline-secondary" title="設定為退貨退款">
              <i class="fas fa-undo-alt"></i>
            </button>
            <button type="button" class="btn btn-outline-secondary" title="刪除訂單資料">
              <i class="fas fa-trash-alt"></i>
            </button>
          </td>
        </tr>
        <tr>
          <td>12345678</td>
          <td>2021/07/22</td>
          <td>testtestte</td>
          <td>已出貨</td>
          <td>
            <button type="button" class="btn btn-outline-secondary" title="檢視訂單內容">
              <i class="fas fa-eye"></i>
            </button>
            <button type="button" disabled class="btn btn-outline-secondary" title="設定為已出貨">
              <i class="fas fa-check-circle"></i>
            </button>
            <button type="button" class="btn btn-outline-secondary" title="取消訂單">
              <i class="fas fa-store-slash"></i>
            </button>
            <button type="button" class="btn btn-outline-secondary" title="設定為退貨退款">
              <i class="fas fa-undo-alt"></i>
            </button>
            <button type="button" class="btn btn-outline-secondary" title="刪除訂單資料">
              <i class="fas fa-trash-alt"></i>
            </button>
          </td>
        </tr>
        <tr>
          <td>33345678</td>
          <td>2021/07/22</td>
          <td>testte</td>
          <td>已取消</td>
          <td>
            <button type="button" class="btn btn-outline-secondary" title="檢視訂單內容">
              <i class="fas fa-eye"></i>
            </button>
            <button type="button" disabled class="btn btn-outline-secondary" title="設定為已出貨">
              <i class="fas fa-check-circle"></i>
            </button>
            <button type="button" disabled class="btn btn-outline-secondary" title="取消訂單">
              <i class="fas fa-store-slash"></i>
            </button>
            <button type="button" disabled class="btn btn-outline-secondary" title="設定為退貨退款">
              <i class="fas fa-undo-alt"></i>
            </button>
            <button type="button" class="btn btn-outline-secondary" title="刪除訂單資料">
              <i class="fas fa-trash-alt"></i>
            </button>
          </td>
        </tr>
        <tr>
          <td>33345678</td>
          <td>2021/07/22</td>
          <td>test</td>
          <td>已退貨</td>
          <td>
            <button type="button" class="btn btn-outline-secondary" title="檢視訂單內容">
              <i class="fas fa-eye"></i>
            </button>
            <button type="button" disabled class="btn btn-outline-secondary" title="設定為已出貨">
              <i class="fas fa-check-circle"></i>
            </button>
            <button type="button" disabled class="btn btn-outline-secondary" title="取消訂單">
              <i class="fas fa-store-slash"></i>
            </button>
            <button type="button" disabled class="btn btn-outline-secondary" title="設定為退貨退款">
              <i class="fas fa-undo-alt"></i>
            </button>
            <button type="button" class="btn btn-outline-secondary" title="刪除訂單資料">
              <i class="fas fa-trash-alt"></i>
            </button>
          </td>
        </tr>
        <tr>
          <td>33345678</td>
          <td>2021/07/22</td>
          <td>test22</td>
          <td>待出貨</td>
          <td>
            <button type="button" class="btn btn-outline-secondary" title="檢視訂單內容">
              <i class="fas fa-eye"></i>
            </button>
            <button type="button" class="btn btn-outline-secondary" title="設定為已出貨">
              <i class="fas fa-check-circle"></i>
            </button>
            <button type="button" class="btn btn-outline-secondary" title="取消訂單">
              <i class="fas fa-store-slash"></i>
            </button>
            <button type="button" class="btn btn-outline-secondary" title="設定為退貨退款">
              <i class="fas fa-undo-alt"></i>
            </button>
            <button type="button" class="btn btn-outline-secondary" title="刪除訂單資料">
              <i class="fas fa-trash-alt"></i>
            </button>
          </td>
        </tr>

      </tbody>
    </table>
  </div>
@endsection
