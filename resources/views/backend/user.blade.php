@extends('layouts.backend')
@section('title', '會員區')
@section('content')

  <div class="col-9 content">
    <div class="row justify-content-center">
      <button type="button" class="btn btn-info" data-toggle="modal" data-target="#addUser">手動新增會員</button>
    </div>
    <!-- 新增用Modal -->
    <div class="modal fade" id="addUser" tabindex="-1" aria-labelledby="addUserLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="addUserLabel">手動新增會員</h5>
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
    <!-- 修改user資訊用Modal -->
    <div class="modal fade" id="editUser" tabindex="-1" aria-labelledby="editUserLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="editUserLabel"></h5>
          </div>
          <div class="modal-body">
            <h5 class="text-primary">會員資訊</h5>
            <table class="table table-bordered table-hover table-fix">
              <tr>
                <td class="table-secondary">累計訂單數</td>
                <td id="order_length">21</td>
                <td class="table-secondary">累計消費額</td>
                <td id="total_spent"></td>
              </tr>
              <tr>
                <td class="table-secondary">註冊日期</td>
                <td id="created_at"></td>
                <td class="table-secondary">生日</td>
                <td id="birthday"></td>
              </tr>
              <tr>
                <td class="table-secondary">電話號碼</td>
                <td id="phone_no" colspan="3"></td>
              </tr>
            </table>
            <h5 class="text-primary mt-2">收件資訊</h5>
            <table class="table table-bordered table-hover table-fix" id="recipientTable">
              <tr class="table-secondary">
                <td>刪除</td>
                <td colspan="5">收件者資訊</td>
              </tr>
            </table>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-info">確認</button>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">取消</button>
          </div>
        </div>
      </div>
    </div>
    <!-- 修改user訂單用Modal -->
    <div class="modal fade" id="editUserOrder" tabindex="-1" aria-labelledby="editUserOrderLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="editUserOrderLabel"></h5>
          </div>
          <div class="modal-body">
            <h5 class="text-primary">會員資訊</h5>
            <table class="table table-bordered table-hover table-fix">
              <tr>
                <td class="table-secondary">累計訂單數</td>
                <td id="orderNum">21</td>
                <td class="table-secondary">累計消費額</td>
                <td id="spentMoney">30000</td>
              </tr>
              <tr>
                <td class="table-secondary">註冊日期</td>
                <td id="created_at"></td>
                <td class="table-secondary">生日</td>
                <td id="birthday"></td>
              </tr>
              <tr>
                <td class="table-secondary">電話號碼</td>
                <td id="phone_no" colspan="3"></td>
              </tr>
            </table>
            <h5 class="text-primary mt-2">收件資訊</h5>
            <table class="table table-bordered table-hover table-fix" id="recipientTable">
              <tr class="table-secondary">
                <td>刪除</td>
                <td colspan="5">收件者資訊</td>
              </tr>
            </table>
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
          <th scope="col" class="col-2">帳號</th>
          <th scope="col" class="col-3">E-mail</th>
          <th scope="col" class="col-2">註冊日期</th>
          <th scope="col" class="col-2">累計消費額</th>
          <th scope="col" class="col-3">操作</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($users as $user)
          <tr>
            <td>{{ $user->name }}</td>
            <td>{{ $user->email }}</td>
            <td>{{ substr($user->created_at, 0, 10) }}</td>
            <td>{{ $user->total_spent }}</td>
            <td>
              <button type="button" class="btn btn-outline-secondary" title="檢視或編輯帳號資訊" data-toggle="modal"
                data-target="#editUser" onclick="getUserInfo({{ $user->id }})">
                {{-- <i class="fas fa-edit"></i> --}}
                <i class="fas fa-address-card"></i>
              </button>

              <button type="button" class="btn btn-outline-secondary" title="檢視或編輯訂單資訊" data-toggle="modal"
                data-target="#editUserOrder" onclick="getUserOrder({{ $user->id }})">
                <i class="far fa-list-alt"></i>
              </button>

              {{-- <button type="button" class="btn btn-outline-secondary" title="暫時停權該帳號">
                    <i class="fas fa-user"></i>
                  </button> --}}

              <button type="button" class="btn btn-secondary" title="取消停權">
                <i class="fas fa-user-slash"></i>
              </button>
              <button type="button" class="btn btn-outline-secondary" title="永久刪除帳號">
                <i class="fas fa-trash-alt"></i>
              </button>
            </td>
          </tr>
        @endforeach
      </tbody>
    </table>
  </div>
  <script>
    function getUserOrder(id) {
      console.log(id)
      $.ajax({
        url: "/api/user/" + id + "/order",
        method: "GET",
        dataType: "json",
        success: function(result) {
          console.log('suc', result)
          let user = result
          console.log(`${user.name}-${user.email}`)
          $.each(user.orders, (k, order) => {
            console.log(`第${k+1}單`, order)
            $.each(order.order_details, (k, detail) => {
              console.log(detail)
            })
          })
        },
        error: function(result) {
          console.log('err', result)
        },
      })
    }

    function getUserInfo(id) {
      $.ajax({
        url: "/api/user/" + id,
        method: "GET",
        dataType: "json",
        success: function(result) {
          let user = result
          let code = ''
          $("[data=recipient]").remove()
          $("#editUserLabel").text(`${user.name} - ${user.email}`)
          $("#created_at").text(`${(user.created_at).substr(0,10)}`)
          $("#phone_no").text(`${user.phone_no}`)
          $("#birthday").text(`${user.birthday}`)
          $("#total_spent").text(`${user.total_spent}`)
          $("#order_length").text(`${user.order_length}`)
          $.each(user.recipients, (k, recipient) => {
            code = code + `
                <tr data='recipient'>
                    <td rowspan="3"><input type="checkbox" name="" id=""></td>
                    <td class="table-secondary">收件人名稱</td>
                    <td colspan="4">${recipient.name}</td>
                </tr>
                <tr data='recipient'>
                    <td class="table-secondary">電話</td>
                    <td colspan="2">${recipient.phone_no}</td>
                    <td class="table-secondary">郵遞區號</td>
                    <td>${recipient.postcode}</td>
                </tr>
                <tr data='recipient'>
                    <td class="table-secondary">地址</td>
                    <td id="phone_no" colspan="4">${recipient.addr}</td>
                </tr>
                `
          })
          $("#recipientTable").append(code)
        },
        error: function(result) {
          console.log('err', result)
        },
      })
    }
  </script>
@endsection
