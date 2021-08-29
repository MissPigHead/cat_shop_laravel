@extends('layouts.backend')
@section('title','商品區')
@section('content')
@if($data)
OO
{{ $data->collection }}
@else
XX
@endif
      <div class="col-9 content">

        <!-- 選取區 -->
        <form>
          <div class="form-group row">
            <label for="category" class="col-2 col-form-label">商品類別</label>
            <div class="col-4">
              <select id="category" class="form-control">
                <option value="" disabled selected>所有商品</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
              </select>
            </div>
            <button type="button" class="btn btn-info">選取</button>
          </div>
        </form>

        <!-- 顯示區 -->
        <table class="mt-4 table table-hover">
          <thead class="thead-dark">
            <tr>
            <!-- <tr class="table-active font-weight-bolder"> -->
              <th scope="col" class="col-2">商品編號</th>
              <th scope="col" class="col-4">品名</th>
              <th scope="col" class="col-1">庫存</th>
              <th scope="col" class="col-2">狀態</th>
              <th scope="col" class="col-3">操作</th>
            </tr>
          </thead>
          <tbody>
            <!-- <tr>
              <th scope="row">1</th>
              <td>Mark</td>
              <td>Otto</td>
              <td>Otto</td>
            </tr> -->
            <tr>
              <td>12345678001</td>
              <td>item1</td>
              <td>20</td>
              <td>銷售中</td>
              <td>
                <button type="button" class="btn btn-outline-secondary">
                  <i class="fas fa-toggle-off"></i>
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
              <td>12345678001</td>
              <td>item1</td>
              <td>20</td>
              <td>銷售中</td>
              <td>
                <button type="button" class="btn btn-outline-secondary">
                  <i class="fas fa-toggle-off"></i>
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
              <td>12345678001</td>
              <td>item1</td>
              <td>2</td>
              <td>已下架</td>
              <td>
                <button type="button" class="btn btn-outline-secondary">
                  <i class="fas fa-toggle-on"></i>
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
              <td>12345678001</td>
              <td>item1</td>
              <td>20</td>
              <td>銷售中</td>
              <td>
                <button type="button" class="btn btn-outline-secondary">
                  <i class="fas fa-toggle-off"></i>
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
              <td>12345678001</td>
              <td>item1</td>
              <td>2</td>
              <td>已下架</td>
              <td>
                <button type="button" class="btn btn-outline-secondary">
                  <i class="fas fa-toggle-on"></i>
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
              <td>12345678001</td>
              <td>item1</td>
              <td>20</td>
              <td>銷售中</td>
              <td>
                <button type="button" class="btn btn-outline-secondary">
                  <i class="fas fa-toggle-off"></i>
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
