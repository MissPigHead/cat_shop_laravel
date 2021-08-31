@extends('layouts.backend')
@section('title', '會員區')
@section('content')
  @if ($errors->any())
    @include('swal')
  @endif
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
            <div class="table-responsive">
              <table class="table table-bordered table-fix table-w-470">
                <tr>
                  <td class="table-secondary">累計訂單數</td>
                  <td id="order_length" colspan="2"></td>
                  <td class="table-secondary">累計消費額</td>
                  <td id="total_spent" colspan="2"></td>
                </tr>
                <tr>
                  <td class="table-secondary">註冊日期</td>
                  <td id="created_at" colspan="2"></td>
                  <td class="table-secondary">生日</td>
                  <td colspan="2"><input type="date" id="birthday" class="td-input"></td>
                </tr>
                <tr>
                  <td class="table-secondary">電話號碼</td>
                  <td colspan="5"><input type="text" id="phone_no" class="td-input"></td>
                </tr>
              </table>
            </div>
            <div class="d-flex justify-content-end">
              <button type="button" class="btn btn-info mr-2" onclick="updateUserInfo()">修改</button>
              <button type="button" class="btn btn-secondary" data-dismiss="modal">取消</button>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-info" onclick="deleteRevipients()">刪除</button>
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
            <div class="table-responsive-sm">
              <table class="table table-bordered table-fix table-w-470">
                <tr class="table-secondary">
                  <td colspan="3">商品名稱</td>
                  <td colspan="2">圖片</td>
                  <td colspan="2">價格</td>
                  <td>數量</td>
                  <td colspan="2">金額</td>
                </tr>
                <tr>
                  <td colspan="3">PPPPPPPQQQQQ</td>
                  <td colspan="2"><img src="/image/Banner01.jpg" class="w-100"></td>
                  <td colspan="2">2580</td>
                  <td>2</td>
                  <td colspan="2">5160</td>
                </tr>
                <tr>
                  <td class="table-secondary" colspan="3">總金額</td>
                  <td colspan="7"></td>
                </tr>
                <tr>
                  <td colspan="10"></td>

                </tr>
                <tr>
                  <td class="table-secondary" colspan="1">收件者</td>
                  <td colspan="4"></td>
                  <td class="table-secondary">電話</td>
                  <td colspan="4"></td>
                </tr>
                <tr>
                  <td class="table-secondary">地址</td>
                  <td colspan="9"></td>
                </tr>
              </table>
            </div>

          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-info" onclick="updateUserOrder()">確認</button>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">取消</button>
          </div>
        </div>
      </div>
    </div>
    <!-- 顯示區 -->
    <table class="mt-4 table  table-bordered table-hover">
      <thead class="thead-dark">
        <tr>
          <th scope="col" class="col-1">會員編號</th>
          <th scope="col" class="col-1">使用者名稱</th>
          <th scope="col" class="col-3">E-mail</th>
          <th scope="col" class="col-2">註冊日期</th>
          <th scope="col" class="col-2">累計消費額</th>
          <th scope="col" class="col-3">操作</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($users as $user)
          <tr>
            <td>{{ $user->id }}</td>
            <td>{{ $user->name }}</td>
            <td>{{ $user->email }}</td>
            <td>{{ substr($user->created_at, 0, 10) }}</td>
            <td>{{ $user->total_spent }}</td>
            <td>
              <button type="button" class="btn btn-outline-secondary" title="檢視或編輯帳號資訊" data-toggle="modal"
                data-target="#editUser" onclick="getUserInfo({{ $user->id }})">
                <i class="fas fa-address-card"></i>
              </button>

              <button type="button" class="btn btn-outline-secondary" title="檢視或編輯訂單資訊" data-toggle="modal"
                data-target="#editUserOrder" onclick="getUserOrder({{ $user->id }})">
                <i class="far fa-list-alt"></i>
              </button>
              <button type="button" class="btn btn-{{ $user->status ? 'outline-' : '' }}secondary"
                title="{{ $user->status ? '暫時停止該帳號訂購權限' : '取消停權' }}"
                onclick="changeUserStatus({{ $user->id }},{{ $user->status ? '0' : '1' }})">
                <i class="fas {{ $user->status ? 'fa-user' : 'fa-user-slash' }}"></i>
              </button>
              <button type="button" class="btn btn-outline-secondary" title="永久刪除帳號"
                onclick="destroy({{ $user->id }})">
                <i class="fas fa-trash-alt"></i>
              </button>
            </td>
          </tr>
        @endforeach
      </tbody>
    </table>
    <div class="row justify-content-center">{{ $users->onEachSide(2)->links() }}</div>
  </div>
  <script>
    function updateUserInfo() { // 更新會員資訊
      id = $('#editUser .modal-footer .btn-info').prop('id')
      phone_no = $("#phone_no").val()
      birthday = $("#birthday").val()
      console.log(phone_no,birthday)
      $.ajax({
        url: "/api/user/" + id,
        method: "PATCH",
        dataType: "json",
        data: {
          phone_no: phone_no,
          birthday: birthday,
          _token: '{{ csrf_token() }}',
        },
        error: function(result) {
          console.log(result)
          if (result.status == 200) {
            location.reload()
          } else if (result.status == 422) {

          }
        }
      })
    }

    function deleteRevipients() { // 刪除會員的收件者資訊 ？？？？ 這個功能有必要嗎？可能會造成歷史訂單查無收件資訊？
      re_id = []
      $('tr[data=recipient] input:checked').each((k, v) => {
        re_id.push($(v).val())
      })
      if (re_id.length != 0) {
        Swal.fire({
          title: '確認刪除收件者資訊？可能造成收件者不明',
          icon: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#6cb2eb',
          cancelButtonColor: '#afafaf',
          cancelButtonText: '取消',
          confirmButtonText: '確定刪除'
        }).then((result) => {
          if (result.isConfirmed) {
            $.ajax({
              url: "/api/recipient/" + re_id,
              method: "DELETE",
              dataType: "text",
              data: {
                _token: '{{ csrf_token() }}',
              },
              success: function(result) {
                location.reload()
              },
              error: function(result) {
                console.log(result)
              }
            })
          }
        })
      }
    }

    function updateUserOrder() {
      // 需要從這裏執行嗎？或是只能從訂單頁面執行？
    }

    function getUserOrder(id) { // 取得會員歷史訂單
      $('#editUserOrder .modal-body').empty()
      $.ajax({
        url: "/api/user/" + id + "/order",
        method: "GET",
        dataType: "json",
        success: function(result) {
          let user = result
          $("#editUserOrderLabel").text(`${user.id} - ${user.name} - ${user.email}`)
          if (user.orders.length != 0) {
            $.each(user.orders, (orderK, order) => {
              $("#editUserOrder .modal-body").append(`<h5 class="text-primary">訂單編號 ${order.id}</h5>`)
              $("#editUserOrder .modal-body").append(`
                <div class="table-responsive-sm">
                    <table class="table table-bordered table-fix table-w-470 table-${orderK}"></table>
                </div>
                `)
              $(`.table-${orderK}`).append(`
                <tr class="table-secondary">
                    <td colspan="3">商品名稱</td>
                    <td colspan="2">圖片</td>
                    <td colspan="2">價格</td>
                    <td>數量</td>
                    <td colspan="2">金額</td>
                </tr>
                `)

              let status = ['', '未出貨', '已出貨', '未出貨取消訂單', '出貨後退貨'];
              let total = 0
              $.each(order.order_details, (detailK, detail) => {
                $(`.table-${orderK}`).append(`
              <tr>
                  <td colspan="3">${detail.product_name}</td>
                  <td colspan="2">${detail.image_path?"<img src="+detail.image_path[0]+">":""}</td>
                  <td colspan="2">${detail.price}</td>
                  <td>${detail.quantity}</td>
                  <td colspan="2">${detail.amount}</td>
                </tr>
              `)
                total = total + detail.amount
              })
              $(`.table-${orderK} tr.table-secondary`).before(`
                <tr>
                    <td class="table-secondary" colspan="3">總金額</td>
                    <td colspan="4">${total}</td>
                    <td colspan="3">${status[order.status]}</td>
                </tr>
                <tr><td colspan="10"></td></tr>
                `)
            })
          } else {
            $('#editUserOrder .modal-body').append(`<h5 class="text-primary mt-2">該使用者無訂單記錄</h5>`)
          }
        },
        error: function(result) {
          console.log('err', result)
        },
      })
    }

    function getUserInfo(id) { // 取得會員 會員資訊 及 收件者資訊
      $.ajax({
        url: "/api/user/" + id,
        method: "GET",
        dataType: "json",
        success: function(result) {
          let user = result
          let code = ''
          $('#editUser .modal-footer .btn-info').prop('id', user.id)
          $(".data-remove").remove()
          $("#editUserLabel").text(`${user.id} - ${user.name} - ${user.email}`)
          $("#created_at").text(`${(user.created_at).substr(0,10)}`)
          $("#phone_no").val(`${user.phone_no}`)
          $("#birthday").val(`${user.birthday}`)
          $("#total_spent").text(`${user.total_spent}`)
          $("#order_length").text(`${user.order_length}`)
          if (user.recipients.length != 0) {
            $('#editUser .modal-footer .btn-info').before(`
                <h5 class="text-primary mt-2 data-remove w-100">收件資訊</h5>
                <div class="table-responsive data-remove">
                    <table class="table table-bordered table-hover table-fix table-w-470" id="recipientTable">
                        <tr class="table-secondary">
                        <td>刪除</td>
                        <td colspan="5">收件者資訊</td>
                        </tr>
                    </table>
                </div>
            `)
          }
          $.each(user.recipients, (k, recipient) => {
            code = code + `
                <tr data='recipient'>
                    <td rowspan="3"><input type="checkbox" value="${ recipient.id}"></td>
                    <td class="table-secondary">收件者名稱</td>
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

    function changeUserStatus(id, status) { // 更新會員是否停權
      $.ajax({
        url: "/api/user/" + id,
        method: "PATCH",
        dataType: "text",
        data: {
          status: status,
          _token: '{{ csrf_token() }}',
        },
        success: function(result) {
          location.reload()
        },
        error: function(result) {
          console.log(result)
        }
      })
    }

    function destroy(id) { //刪除使用者
      Swal.fire({
        title: '確認刪除該使用者？',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#6cb2eb',
        cancelButtonColor: '#afafaf',
        cancelButtonText: '取消',
        confirmButtonText: '確定刪除'
      }).then((result) => {
        if (result.isConfirmed) {
          $.ajax({
            url: "/api/user/" + id,
            method: "DELETE",
            dataType: "text",
            data: {
              _token: '{{ csrf_token() }}',
            },
            success: function(result) {
              location.reload()
            },
            error: function(result) {
              console.log(result)
            }
          })
        }
      })
    }
  </script>
@endsection
