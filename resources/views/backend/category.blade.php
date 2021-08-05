@extends('layouts.backend')
@section('title','商品目錄')
@section('content')
  <div class="col-9 content">
    <!-- 新增區 123-->
    <form action="/api/category" method="post">
      @csrf
      <div class="mt-1 form-group row">
        <label for="mainCategory" class="col-2 col-form-label">新增主目錄</label>
        <div class="col-4">
          <input type="text" class="form-control" id="addParent">
        </div>
        <button type="button" class="btn btn-info">新增</button>
      </div>
      <div class="form-group row">
        <label for="subCategory" class="col-2 col-form-label">新增子目錄</label>
        <div class="col-4">
          <select id="subCategory-main" class="form-control">
            <option value="" disabled selected>請先選擇主目錄...</option>
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
          </select>
        </div>
        <div class="col-4">
          <input type="text" class="form-control" id="subCategory">
        </div>
        <button type="button" class="btn btn-info">新增</button>
      </div>
    </form>
    <!-- 顯示區 -->
    <table class="mt-4 table table-hover">
      <thead class="thead-dark">
        <tr>
        <!-- <tr class="table-active font-weight-bolder"> -->
          <th scope="col" class="col-1">#</th>
          <th scope="col" class="col-3">主目錄</th>
          <th scope="col" class="col-3">子目錄</th>
          <th scope="col" class="col-1">狀態</th>
          <th scope="col" class="col-4">操作</th>
        </tr>
      </thead>
      <tbody>
        <!-- <tr>
          <th scope="row">1</th>
          <td>Mark</td>
          <td>Otto</td>
          <td>Otto</td>
        </tr> -->
        <tr class="bg-yellow02">
          <th scope="row">2</th>
          <td>Main</td>
          <td></td>
          <td>顯示</td>
          <td>
            <button type="button" class="btn btn-outline-secondary">
              <i class="fas fa-toggle-off"></i>
            </button>
            <button type="button" class="btn btn-outline-secondary">
              <i class="fas fa-caret-up"></i>
            </button>
            <button type="button" class="btn btn-outline-secondary">
              <i class="fas fa-caret-down"></i>
            </button>
            <button type="button" class="btn btn-outline-secondary">
              <i class="fas fa-edit"></i>
            </button>
            <button type="button" class="btn btn-outline-secondary">
              <i class="fas fa-trash-alt"></i>
            </button>
          </td>
        </tr>
        <tr>
          <th scope="row">2</th>
          <td></td>
          <td>Thornton</td>
          <td>顯示</td>
          <td>
            <button type="button" class="btn btn-outline-secondary">
              <i class="fas fa-toggle-off"></i>
            </button>
            <button type="button" class="btn btn-outline-secondary">
              <i class="fas fa-caret-up"></i>
            </button>
            <button type="button" class="btn btn-outline-secondary">
              <i class="fas fa-caret-down"></i>
            </button>
            <button type="button" class="btn btn-outline-secondary">
              <i class="fas fa-edit"></i>
            </button>
            <button type="button" class="btn btn-outline-secondary">
              <i class="fas fa-trash-alt"></i>
            </button>
          </td>
        </tr>
        <tr>
          <th scope="row">2</th>
          <td></td>
          <td>Thornton</td>
          <td>顯示</td>
          <td>
            <button type="button" class="btn btn-outline-secondary">
              <i class="fas fa-toggle-off"></i>
            </button>
            <button type="button" class="btn btn-outline-secondary">
              <i class="fas fa-caret-up"></i>
            </button>
            <button type="button" class="btn btn-outline-secondary">
              <i class="fas fa-caret-down"></i>
            </button>
            <button type="button" class="btn btn-outline-secondary">
              <i class="fas fa-edit"></i>
            </button>
            <button type="button" class="btn btn-outline-secondary">
              <i class="fas fa-trash-alt"></i>
            </button>
          </td>
        </tr>
        <tr class="bg-yellow02">
          <th scope="row">3</th>
          <td>MainMainMainMainMain</td>
          <td></td>
          <td>顯示</td>
          <td>
            <button type="button" class="btn btn-outline-secondary">
              <i class="fas fa-toggle-off"></i>
            </button>
            <button type="button" class="btn btn-outline-secondary">
              <i class="fas fa-caret-up"></i>
            </button>
            <button type="button" class="btn btn-outline-secondary">
              <i class="fas fa-caret-down"></i>
            </button>
            <button type="button" class="btn btn-outline-secondary">
              <i class="fas fa-edit"></i>
            </button>
            <button type="button" class="btn btn-outline-secondary">
              <i class="fas fa-trash-alt"></i>
            </button>
          </td>
        </tr>
        <tr>
          <th scope="row">3</th>
          <td></td>
          <td>Thornton</td>
          <td>顯示</td>
          <td>
            <button type="button" class="btn btn-outline-secondary">
              <i class="fas fa-toggle-off"></i>
            </button>
            <button type="button" class="btn btn-outline-secondary">
              <i class="fas fa-caret-up"></i>
            </button>
            <button type="button" class="btn btn-outline-secondary">
              <i class="fas fa-caret-down"></i>
            </button>
            <button type="button" class="btn btn-outline-secondary">
              <i class="fas fa-edit"></i>
            </button>
            <button type="button" class="btn btn-outline-secondary">
              <i class="fas fa-trash-alt"></i>
            </button>
          </td>
        </tr>
        <tr>
          <th scope="row">2</th>
          <td></td>
          <td>Thornton</td>
          <td>顯示</td>
          <td>
            <button type="button" class="btn btn-outline-secondary">
              <i class="fas fa-toggle-off"></i>
            </button>
            <button type="button" class="btn btn-outline-secondary">
              <i class="fas fa-caret-up"></i>
            </button>
            <button type="button" class="btn btn-outline-secondary">
              <i class="fas fa-caret-down"></i>
            </button>
            <button type="button" class="btn btn-outline-secondary">
              <i class="fas fa-edit"></i>
            </button>
            <button type="button" class="btn btn-outline-secondary">
              <i class="fas fa-trash-alt"></i>
            </button>
          </td>
        </tr>
        <tr>
          <th scope="row">2</th>
          <td></td>
          <td>Thornton</td>
          <td>顯示</td>
          <td>
            <button type="button" class="btn btn-outline-secondary">
              <i class="fas fa-toggle-off"></i>
            </button>
            <button type="button" class="btn btn-outline-secondary">
              <i class="fas fa-caret-up"></i>
            </button>
            <button type="button" class="btn btn-outline-secondary">
              <i class="fas fa-caret-down"></i>
            </button>
            <button type="button" class="btn btn-outline-secondary">
              <i class="fas fa-edit"></i>
            </button>
            <button type="button" class="btn btn-outline-secondary">
              <i class="fas fa-trash-alt"></i>
            </button>
          </td>
        </tr>
        <tr class="bg-yellow02">
          <th scope="row">2</th>
          <td>MainMainMain</td>
          <td></td>
          <td>隱藏</td>
          <td>
            <button type="button" class="btn btn-outline-secondary">
              <i class="fas fa-toggle-on"></i>
            </button>
            <button type="button" class="btn btn-outline-secondary">
              <i class="fas fa-caret-up"></i>
            </button>
            <button type="button" class="btn btn-outline-secondary">
              <i class="fas fa-caret-down"></i>
            </button>
            <button type="button" class="btn btn-outline-secondary">
              <i class="fas fa-edit"></i>
            </button>
            <button type="button" class="btn btn-outline-secondary">
              <i class="fas fa-trash-alt"></i>
            </button>
          </td>
        </tr>
        <tr>
          <th scope="row">2</th>
          <td></td>
          <td>Thornton</td>
          <td>隱藏</td>
          <td>
            <button type="button" class="btn btn-outline-secondary">
              <i class="fas fa-toggle-on"></i>
            </button>
            <button type="button" class="btn btn-outline-secondary">
              <i class="fas fa-caret-up"></i>
            </button>
            <button type="button" class="btn btn-outline-secondary">
              <i class="fas fa-caret-down"></i>
            </button>
            <button type="button" class="btn btn-outline-secondary">
              <i class="fas fa-edit"></i>
            </button>
            <button type="button" class="btn btn-outline-secondary">
              <i class="fas fa-trash-alt"></i>
            </button>
          </td>
        </tr>
        <tr>
          <th scope="row">3</th>
          <td></td>
          <td>Thornton</td>
          <td>隱藏</td>
          <td>
            <button type="button" class="btn btn-outline-secondary">
              <i class="fas fa-toggle-on"></i>
            </button>
            <button type="button" class="btn btn-outline-secondary">
              <i class="fas fa-caret-up"></i>
            </button>
            <button type="button" class="btn btn-outline-secondary">
              <i class="fas fa-caret-down"></i>
            </button>
            <button type="button" class="btn btn-outline-secondary">
              <i class="fas fa-edit"></i>
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