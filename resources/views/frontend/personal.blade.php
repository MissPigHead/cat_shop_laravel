@extends('layouts.frontend')
@section('title', '個人資訊')
@section('content')
@if ($errors->any())
  @include('swal')
@endif
  <main>
    <div class="container" id="profile">
      {{-- ---------------- 會員資訊 --------------- --}}
      <div class="row justify-content-center">
        <div class="col-12 col-md-8 col-lg-6 col-xl-5">
          <div class="row mt-4 mb-sm-2">
            <div class="col">
              <h4>會員資訊</h4>
            </div>
          </div>
          <form action method="post" id="updateUser">
            @csrf
            <div class="form-group row mb-2 align-items-center">
              <label for="account" class="col-3 col-sm-2 col-form-label">帳號</label>
              <div class="col-9 col-sm-10">
                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                  value="{{ $user->name }}" required autocomplete="name" autofocus placeholder="英文大小寫或數字，20個字元內"
                  disabled>
              </div>
            </div>
            <div class="form-group row mb-2 mb-2">
              <label for="email" class="col-3 col-sm-2 col-form-label pr-0">E-mail</label>
              <div class="col-9 col-sm-{{ $user->email_verified_at ? 10 : 7 }}">
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email"
                  value="{{ $user->email }}" required autocomplete="email" disabled>
              </div>
              <div
                class="{{ $user->email_verified_at ? 'd-none' : 'd-flex justify-content-end align-items-center' }} col-12 col-sm-3">
                <span class="small text-danger">尚未通過驗證</span>
              </div>
            </div>
            <div class="form-group row mb-2">
              <label for="birthday" class="col-3 col-sm-2 col-form-label">生日</label>
              <div class="col-9 col-sm-10">
                <input type="date" class="form-control @error('birthday') is-invalid @enderror" id="birthday"
                  name="birthday" value="{{ $user->birthday }}" min="1920-01-01" max="2020-12-31" disabled>
              </div>
            </div>
            <div class="form-group row mb-2">
              <label for="phone_no" class="col-3 col-sm-2 col-form-label pr-0">手機號碼</label>
              <div class="col-9 col-sm-10">
                <input type="text" class="form-control @error('phone_no') is-invalid @enderror" name="phone_no"
                  id="phone_no" value="{{ $user->phone_no }}" placeholder="請輸入不含符號的數字" disabled>
              </div>
            </div>
            <div class="row my-2 justify-content-center">
              <button type="button" class="btn btn-info col-3 mx-2" data-toggle="modal"
                data-target="#updatePassword">變更密碼</button>
              <button type="button" class="btn btn-warning text-black-50 col-3 mx-2" onclick="enableUpdateUser()">編輯資料</button>
              <button type="button" class="btn btn-secondary col-3 mx-2" onclick="destroyUser()">註銷帳號</button>
              <button type="submit" class="btn btn-info mx-2">確認</button>
              <button type="reset" class="btn btn-secondary mx-2" onclick="disableUpdateUser()">取消</button>
            </div>
          </form>
          {{-- ---------------- 修改密碼modal --------------- --}}
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
                        <input type="password" class="form-control" name="newPassword" required autocomplete="new-password" placeholder="需含英文大小寫及數字，8～20個字元">
                      </div>
                    </div>
                    <div class="form-group row mb-2">
                      <label for="receipient" class="col-3 col-sm-2 col-form-label pr-0">確認新密碼</label>
                      <div class="col-9 col-sm-10">
                        <input type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" placeholder="請再次輸入密碼">
                      </div>
                    </div>
                  </div>
                    <div class="modal-footer">
                        <input type="hidden" name="email" value="{{ $user->email }}">
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
        $("#updateUser [type=submit]").hide()
        $("#updateUser [type=reset]").hide()

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

        function destroyUser() {
          Swal.fire({
            title: '確認註銷您的帳號？',
            text: '帳號一旦註銷，所有記錄都將消失，且無法恢復！',
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: '我要註銷',
          }).then(function() {
            swal.fire(
              '删除！',
              '你的文件已经被删除。',
              'success'
            );
          })
        }

        function addRecipient() {

        }

        $('input[name=confirm]').change(function (e) {
            e.preventDefault();
            if($('input[name=newPassword]').val()!=$('input[name=confirm]').val()){
                console.log(0)
            }else{
                console.log(1)
            }
        });
      </script>

      {{-- ---------------- 收件者資訊 --------------- --}}
      <div class="row justify-content-center">
        <div class="col-12 col-md-8 col-lg-6 col-xl-5">
          <div class="row mt-5 mb-2">
            <div class="col-7 col-sm-9">
              <h4>收件者資訊</h4>
            </div>
            <div class="col-5 col-sm-3">
              <button type="button" class="btn btn-pink w-100" data-toggle="modal"
                data-target="#newRecipient">新增收件者</button>
            </div>
          </div>
          {{-- ---------------- 新增收件者modal --------------- --}}
          <div class="modal fade" id="newRecipient" tabindex="-1" aria-labelledby="newRecipientLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
              <div class="modal-content">
                <form method="POST" action="" enctype="multipart/form-data">
                  @csrf

                  <div class="modal-header">
                    <h5 class="modal-title" id="newRecipientLabel">新增收件者</h5>
                  </div>

                  <div class="modal-body">
                    <div class="form-group row mb-2">
                      <label for="receipient" class="col-3 col-sm-2 col-form-label pr-0">收件者</label>
                      <div class="col-9 col-sm-10">
                        <input type="text" class="form-control" name="name">
                      </div>
                    </div>
                    <div class="form-group row mb-2">
                      <label for="receipientTel" class="col-3 col-sm-2 col-form-label">電話</label>
                      <div class="col-9 col-sm-10">
                        <input type="text" class="form-control" name="phone_no" placeholder="請輸入10位數字不含符號">
                      </div>
                    </div>
                    <div class="form-group row mb-2 justify-content-end">
                      <label for="addr" class="col-3 col-sm-2 order-1 col-form-label">地址</label>
                      <div class="col-9 col-sm-4 order-2">
                        <select name="city" class="form-control">
                          <option disabled selected>選取城市</option>
                          @foreach ($cities as $city)
                            <option value="{{ $city->id }}">{{ $city->city_name }}</option>
                          @endforeach
                        </select>
                      </div>
                      <div class="col-9 col-sm-4 order-4 order-sm-3">
                        <select name="postcode" class="form-control" disabled>
                          <option disabled selected>鄉鎮區域</option>
                          @foreach ($cities as $city)
                            @foreach ($city->postcodes as $postcode)
                              <option value="{{ $postcode->id }}" class="p{{ $postcode->city_id }}"
                                data-code="{{ $postcode->code }}">{{ $postcode->name }}</option>
                            @endforeach
                          @endforeach
                        </select>
                      </div>
                      <div class="col-3 col-sm-2 order-3 order-sm-4">
                        <input type="text" class="form-control" name="ZIP" disabled>
                      </div>
                      <div class="col-12 col-sm-10 order-5 mt-1">
                        <input type="text" class="form-control" name="addr" required autocomplete="address">
                      </div>
                    </div>
                  </div>
                  <div class="modal-footer">
                    <button type="submin" class="btn btn-info">上傳</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal"
                      onclick="cancelNewRecipient()">取消</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
          <script>
            $('#newRecipient').hide()

            function cancelNewRecipient() {
              $('#newRecipient').hide()
            }

            $('#newRecipient select[name=city]').change(function(e) {
              e.preventDefault();
              let $c_id = $('#newRecipient select[name=city]').val()
              $('#newRecipient select[name=postcode] option').hide()
              $(`#newRecipient select[name=postcode] option.p` + $c_id).show()
              $('#newRecipient select[name=postcode]').prop('disabled', false)
            });

            $('#newRecipient select[name=postcode]').change(function(e) {
              e.preventDefault();
              let $code = $('#newRecipient select[name=postcode]').find(':selected').data('code')
              $('#newRecipient input[name=ZIP]').val($code)
            });
          </script>
          {{-- ---------------- 顯示已建立的收件者 --------------- --}}
          @if ($user->recipients)
            @foreach ($user->recipients as $k => $recipient)
              @if ($k != 0)
                <hr>
              @endif
              <div class="form-group row mb-2">
                <label for="receipient" class="col-3 col-sm-2 col-form-label pr-0">收件者</label>
                <div class="col-7 col-sm-8">
                  <input type="text" class="form-control" name="name" value="{{ $recipient->name }}" readonly>
                </div>
                <div class="col-2 pl-0">
                  <button type="button" class="btn btn-secondary px-0 w-100"
                    onclick="destroyRecipient({{ $recipient->id }})">刪除</button>
                </div>
              </div>
              <div class="form-group row mb-2">
                <label for="receipientTel" class="col-3 col-sm-2 col-form-label">電話</label>
                <div class="col-9 col-sm-10">
                  <input type="text" name="phone_no" class="form-control" value="{{ $recipient->phone_no }}"
                    readonly>
                </div>
              </div>
              <div class="form-group row mb-2 justify-content-end">
                <label for="addressLine1" class="col-3 col-sm-2 order-1 col-form-label">地址</label>
                <div class="col-9 col-sm-4 order-2">
                  <input type="text" class="form-control" value="{{ $recipient->postcode->city_name }}" readonly>

                </div>
                <div class="col-9 col-sm-4 order-4 order-sm-3">
                  <input type="text" class="form-control" value="{{ $recipient->postcode->name }}" readonly>
                </div>
                <div class="col-3 col-sm-2 order-3 order-sm-4">
                  <input type="text" class="form-control" value="{{ $recipient->postcode->code }}" readonly>
                </div>
                <div class="col-12 col-sm-10 order-5 mt-1">
                  <input type="text" class="form-control" id="addressDetail" value="{{ $recipient->addr }}"
                    readonly>
                </div>
              </div>
            @endforeach
          @endif
        </div>
      </div>
    </div>
  </main>
@endsection
