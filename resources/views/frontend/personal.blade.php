@extends('layouts.frontend')
@section('title', '個人資訊')
@section('content')
  @if (session('msg'))
    @include('swal',['msg'=>'msg','icon'=>'success'])
  @endif
  <main>
    <div class="container" id="profile">
      <div class="row justify-content-center">
        <div class="col-12 col-md-8 col-lg-6 col-xl-5">
          <div class="row my-4">
            <div class="col">
              <h4>會員資訊</h4>
            </div>
          </div>
          <form action="{{ route('api.user.update', Auth::user()->id) }}" method="post" id="updateUser" class="text-dark">
            @csrf
            @method('patch')
            <div class="form-group row mb-1 justify-content-center">
              <label for="name" class="col-3 col-sm-2 col-form-label">帳號</label>
              <div class="col-9 col-sm-8">
                <input type="text" class="form-control" name="name" value="{{ Auth::user()->name }}" autofocus
                  disabled>
              </div>
            </div>
            <div class="form-group row mb-1 justify-content-center">
              <label for="email" class="col-3 col-sm-2 col-form-label pr-0">E-mail</label>
              <div class="col-9 col-sm-8">
              {{-- <div class="col-9 col-sm-{{ Auth::user()->email_verified_at ? 8 : 6 }}"> --}}
                <input id="email" type="email" class="form-control" name="email" value="{{ Auth::user()->email }}" required
                  autocomplete="email" disabled>
              </div>
              <div class="w-100"></div>
              <div class="col-3 col-sm-2"></div>
              <div class="{{ Auth::user()->email_verified_at ? 'd-none' : 'd-block' }} col-9 col-sm-8 mb-2">
                <span class="small text-danger ml-3">*尚未通過驗證</span>
              </div>
            </div>
            <div class="form-group row mb-1 justify-content-center">
              <label for="birthday" class="col-3 col-sm-2 col-form-label">生日</label>
              <div class="col-9 col-sm-8">
                <input type="date" class="form-control" id="birthday" name="birthday" value="{{ Auth::user()->birthday }}"
                  min="1920-01-01" max="2020-12-31" disabled>
              </div>
            </div>
            <div class="form-group row mb-1 justify-content-center">
              <label for="phone_no" class="col-3 col-sm-2 col-form-label pr-0">手機號碼</label>
              <div class="col-9 col-sm-8">
                <input type="text" class="form-control" name="phone_no" id="phone_no" value="{{ Auth::user()->phone_no }}"
                  placeholder="請輸入不含符號的數字" disabled>
              </div>
            </div>
            <div class="row my-4 justify-content-center">
              <button type="button" class="btn btn-info col-3 px-2 mx-2" data-toggle="modal"
                data-target="#updatePassword">變更密碼</button>
              <button type="button" class="btn btn-warning text-black-50 col-3 px-2 mx-2"
                onclick="enableUpdateUser()">編輯資料</button>
              <button type="button" class="btn btn-secondary col-3 px-2 mx-2" onclick="destroyUser()">註銷帳號</button>
              <button type="submit" class="btn btn-info mx-2">確認</button>
              <button type="reset" class="btn btn-secondary mx-2" onclick="disableUpdateUser()">取消</button>
            </div>
          </form>
          <!------------------------------- 修改密碼modal ------------------------------->
          <div class="modal fade" id="updatePassword" tabindex="-1" aria-labelledby="updatePasswordLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
              <div class="modal-content">
                <form method="POST" action="{{ route('password.reset.web') }}" enctype="multipart/form-data">
                  @csrf
                  <div class="modal-header">
                    <h5 class="modal-title" id="updatePasswordLabel">變更密碼</h5>
                  </div>
                  <div class="modal-body">
                    <div class="form-group row mb-2">
                      <label for="receipient" class="col-3 col-sm-2 col-form-label pr-0">原始密碼</label>
                      <div class="col-9 col-sm-10">
                        <input type="password" class="form-control" name="password" required>
                      </div>
                    </div>
                    <div class="form-group row mb-2">
                      <label for="receipient" class="col-3 col-sm-2 col-form-label pr-0">新密碼</label>
                      <div class="col-9 col-sm-10">
                        <input type="password" class="form-control" name="newPassword" required
                          autocomplete="new-password" placeholder="需含英文大小寫及數字，8～20個字元">
                      </div>
                    </div>
                    <div class="form-group row mb-0">
                      <label for="receipient" class="col-3 col-sm-2 col-form-label pr-0">確認新密碼</label>
                      <div class="col-9 col-sm-10">
                        <input type="password" class="form-control" name="password_confirmation" required
                          autocomplete="new-password" placeholder="請再次輸入密碼">
                      </div>
                    </div>
                    <div class="form-group row justify-content-end mb-0 warning-span">
                      <div class="col-9 col-sm-10 small text-danger">
                        <span><i class="far fa-heart"></i> 請輸入相同的新密碼</span>
                      </div>
                    </div>
                  </div>
                  <div class="modal-footer">
                    <input type="hidden" name="email" value="{{ Auth::user()->email }}">
                    <button type="submin" class="btn btn-info">變更</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">取消</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
      <script>
        // 初始化 功能按鈕 & 錯誤訊息 顯示狀態
        $("#updateUser [type=submit]").hide()
        $("#updateUser [type=reset]").hide()
        $('.warning-span').hide()

        function enableUpdateUser() {
          $("#updateUser [type=submit]").show()
          $("#updateUser [type=reset]").show()
          $("#updateUser [type=button]").hide()
          $("#updateUser [name=phone_no]").prop('disabled', false)
          $("#updateUser [name=birthday]").prop('disabled', false)
        }

        function disableUpdateUser() {
          $("#updateUser [type=submit]").hide()
          $("#updateUser [type=reset]").hide()
          $("#updateUser [type=button]").show()
          $("#updateUser [name=phone_no]").prop('disabled', true)
          $("#updateUser [name=birthday]").prop('disabled', true)
        }

        // 檢查新密碼兩次輸入是否相同
        $('input[name=password_confirmation]').change(function(e) {
          e.preventDefault();
          if ($('input[name=newPassword]').val() != $('input[name=password_confirmation]').val()) {
            $('.warning-span').show()
            $('input[name=password_confirmation]').addClass('is-invalid')
          } else {
            $('.warning-span').hide()
            $('input[name=password_confirmation]').removeClass('is-invalid')
          }
        });

        // 刪除帳號
        function destroyUser() {
          Swal.fire({
            title: '確認註銷您的帳號？',
            text: '帳號一旦註銷，所有記錄都將消失，且無法恢復！',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#dc3545',
            cancelButtonColor: '#6c757d',
            confirmButtonText: '我要註銷',
            cancelButtonText: '取消',
          }).then((result) => {
            if (result.isConfirmed) {
              $.ajax({
                type: 'DELETE',
                url: `{{ route('api.user.destroy', Auth::user()->id) }}`,
                data: {
                  'id': `{{ Auth::user()->id }}`,
                  _token: '{{ csrf_token() }}',
                },
                success: function(response) {
                  Swal.fire({
                    icon: 'success',
                    title: '帳號已刪除',
                  }).then(function() {
                    window.location.replace(`{{ route('home') }}`)
                  })
                }
              })
            }
          })
        }
      </script>
    </div>
  </main>
@endsection
