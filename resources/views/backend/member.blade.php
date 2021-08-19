@extends('layouts.backend')
@section('title','會員區')
@section('content')
      <div class="col-9 content">


        <!-- 新增區 -->
        <div class="row justify-content-center">
          <button type="button" class="btn btn-info" data-toggle="modal" data-target="#addMember">手動新增會員</button>
        </div>
        <div class="modal fade" id="addMember" tabindex="-1" aria-labelledby="addMemberLabel" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="addMemberLabel">手動新增會員</h5>
              </div>
              <div class="modal-body">
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-info">確認</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">取消</button>
              </div>
            </div>
          </div>
        </div>
        <!-- 顯示區 -->
        <table class="mt-4 table  table-bordered table-hover">
          <thead class="thead-dark">
            <tr>
              <th scope="col" class="col-1 small">會員編號</th>
              <th scope="col" class="col-2">帳號</th>
              <th scope="col" class="col-3">E-mail</th>
              <th scope="col" class="col-2">註冊日期</th>
              <th scope="col" class="col-2">累計消費額</th>
              <th scope="col" class="col-2">操作</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td class="small">12345678</td>
              <td>testtesttest@testtesttest.com</td>
              <td>我是名稱很長的名字</td>
              <td>2021/07/22</td>
              <td>30000</td>
              <td>
                <button type="button" class="btn btn-outline-secondary">
                  <i class="fas fa-edit"></i>
                </button>
                <button type="button" class="btn btn-outline-secondary">
                  <i class="fas fa-trash-alt"></i>
                </button>
              </td>
            </tr>
            <tr>
              <td class="small">12345678</td>
              <td>testtesttest@testtesttest.com</td>
              <td>我是名稱很長的名字</td>
              <td>2021/07/22</td>
              <td>30000</td>
              <td>
                <button type="button" class="btn btn-outline-secondary">
                  <i class="fas fa-edit"></i>
                </button>
                <button type="button" class="btn btn-outline-secondary">
                  <i class="fas fa-trash-alt"></i>
                </button>
              </td>
            </tr>
            <tr>
              <td class="small">12345678</td>
              <td>testtesttest@testtesttest.com</td>
              <td>我是名稱很長的名字</td>
              <td>2021/07/22</td>
              <td>30000</td>
              <td>
                <button type="button" class="btn btn-outline-secondary">
                  <i class="fas fa-edit"></i>
                </button>
                <button type="button" class="btn btn-outline-secondary">
                  <i class="fas fa-trash-alt"></i>
                </button>
              </td>
            </tr>
            <tr>
              <td class="small">12345678</td>
              <td>testtesttest@testtesttest.com</td>
              <td>我是名稱很長的名字</td>
              <td>2021/07/22</td>
              <td>30000</td>
              <td>
                <button type="button" class="btn btn-outline-secondary">
                  <i class="fas fa-edit"></i>
                </button>
                <button type="button" class="btn btn-outline-secondary">
                  <i class="fas fa-trash-alt"></i>
                </button>
              </td>
            </tr>
            <tr>
              <td class="small">12345678</td>
              <td>testtesttest@testtesttest.com</td>
              <td>我是名稱很長的名字</td>
              <td>2021/07/22</td>
              <td>30000</td>
              <td>
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