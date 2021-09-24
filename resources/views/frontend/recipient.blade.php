@extends('layouts.frontend')
@section('title', '個人資訊')
@section('content')
  @if (session('msg'))
    @include('swal',['msg'=>'msg','icon'=>'success'])
  @endif
  <main>
    <div class="container" id="recipients">
      <!------------------------- 收件者資訊 -------------------------->
      <div class="row justify-content-center">
        <div class="col-12 col-md-8 col-lg-6 col-xl-5">
          <div class="row my-4">
            <div class="col-7 col-sm-8">
              <h4>收件者資訊</h4>
            </div>
            <div class="col-5 col-sm-4">
              <button type="button" class="btn btn-info px-1 w-100" data-toggle="modal"
                data-target="#newRecipient">新增收件者</button>
            </div>
          </div>


          <!------------------------- 新增收件者modal -------------------------->
          <div class="modal fade" id="newRecipient" tabindex="-1" aria-labelledby="newRecipientLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
              <div class="modal-content">
                <form method="POST" action="{{ route('api.recipient.store') }}" enctype="multipart/form-data">
                  @csrf

                  <div class="modal-header">
                    <h5 class="modal-title" id="newRecipientLabel">新增收件者</h5>
                  </div>
                  <div class="modal-body">
                    <div class="form-group row my-2">
                      <label for="receipient" class="col-2 col-form-label pr-0">名稱</label>
                      <div class="col-10 pl-0">
                        <input type="text" class="form-control" name="name" value="{{ old('name') }}">
                      </div>
                    </div>
                    <div class="form-group row my-2">
                      <label for="receipientTel" class="col-2 col-form-label pr-0">電話</label>
                      <div class="col-10 pl-0">
                        <input type="text" class="form-control" name="phone_no" placeholder="請輸入10位數字不含符號"
                          value="{{ old('phone_no') }}">
                      </div>
                    </div>
                    <div class="form-group row my-2">
                      <label for="addr" class="col-2 col-form-label pr-0">地址</label>
                      <select name="city" class="col-4 pl-2 pr-1 form-control">
                        <option selected disabled>選取城市</option>
                        @foreach ($cities as $city)
                          <option value="{{ $city->id }}">{{ $city->city_name }}</option>
                        @endforeach
                      </select>
                      <select name="postcode_id" class="col-4 pl-2 pr-1 form-control" disabled>
                        <option selected disabled>鄉鎮區域</option>
                        @foreach ($cities as $city)
                          @foreach ($city->postcodes as $postcode)
                            <option value="{{ $postcode->id }}" class="p{{ $postcode->city_id }}"
                              data-code="{{ $postcode->code }}">{{ $postcode->name }}</option>
                          @endforeach
                        @endforeach
                      </select>
                      <input type="text" class="col-2 pl-1 form-control text-center" name="postcode" readonly>
                      <div class="col-2"></div>
                      <div class="col-10 pl-0 mt-1">
                        <input type="text" class="form-control" name="addr" required autocomplete="address"
                          value="{{ old('addr') }}">
                      </div>
                    </div>
                  </div>
                  <div class="modal-footer">
                    <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                    <button type="submin" class="btn btn-info">上傳</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">取消</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
          <!------------------------- 顯示已建立的收件者 ------------------------->
          @if ($recipients)
            @forelse ($recipients as $k => $recipient)
              @if ($k != 0)
                <hr>
              @endif
              <div class="r{{ $recipient->id }}">
                <div class="form-group row mb-2 justify-content-center">
                  <label for="receipient" class="col-2 col-form-label pr-0">名稱</label>
                  <div class="col-5 col-sm-6 pl-0 pr-1">
                    <input type="text" class="form-control" name="name" value="{{ $recipient->name }}" disabled>
                  </div>
                  <div class="col-4 col-sm-3 row px-0 mx-0 justify-content-end">
                    <button type="button" class="btn btn-warning text-black-50 px-2 mr-1 eRE"
                      onclick="enableRecipientUpdate({{ $recipient->id }})">編輯</button>
                    <button type="button" class="btn btn-secondary px-2 mr-1 dR"
                      onclick="destroyRecipient({{ $recipient->id }})">刪除</button>
                    <button type="button" class="btn btn-info px-2 mr-1 uR"
                      onclick="updateRecipient({{ $recipient->id }})">確定</button>
                    <button type="button" class="btn btn-dark-gray px-2 mr-1 cUR"
                      onclick="disableUpdateRecipient({{ $recipient->id }})">取消</button>
                  </div>
                </div>
                <div class="form-group row mb-2 justify-content-center">
                  <label for="receipientTel" class="col-2 col-form-label pr-0">電話</label>
                  <div class="col-9 pl-0 pr-1">
                    <input type="text" name="phone_no" class="form-control" value="{{ $recipient->phone_no }}"
                      disabled>
                  </div>
                </div>
                <div class="form-group row mb-2 justify-content-center">
                  <label for="addressLine1" class="col-2 col-form-label pr-0">地址</label>
                  <select name="city" class="col-3 pl-2 pr-1 form-control" disabled>
                    @foreach ($cities as $city)
                      <option value="{{ $city->id }}">{{ $city->city_name }}</option>
                    @endforeach
                  </select>
                  <select name="postcode_id" class="col-3 pl-0 pr-1 form-control" disabled>
                    @foreach ($cities as $city)
                      @foreach ($city->postcodes as $postcode)
                        <option value="{{ $postcode->id }}" class="p{{ $postcode->city_id }}"
                          data-code="{{ $postcode->code }}">{{ $postcode->name }}</option>
                      @endforeach
                    @endforeach
                  </select>
                  <input type="text" class="col-3 form-control text-center" name="postcode"
                    value="{{ $recipient->postcode->code }}" readonly>
                  <script>
                    $('div.r{{ $recipient->id }} select[name=city]').val({{ $recipient->postcode->city_id }})
                    $('div.r{{ $recipient->id }} select[name=postcode_id]').val({{ $recipient->postcode->id }})
                  </script>
                  <div class="col-2"></div>
                  <div class="col-9 pl-0 pr-1 mt-1">
                    <input type="text" class="form-control" name="addr" value="{{ $recipient->addr }}" disabled>
                  </div>
                </div>
              </div>
            @empty
              <p class="text-secondary text-center my-md-4">尚未建立收件者</p>
            @endforelse
          @endif
        </div>
      </div>
    </div>
  </main>
  <script>
    // 選擇城市及區域
    $('select[name=city]').change(function(e) {
      e.preventDefault();
      let next = $(this).next()
      let city_id = $(this).val()
      let first_v = next.find(`option.p${city_id}`).eq(0).val()
      let code = next.find(`option.p${city_id}`).eq(0).data('code')
      next.attr('disabled', false)
      next.find(`option`).hide()
      next.find(`option.p${city_id}`).show()
      next.find(`option[value=${first_v}]`).attr('selected', true)個it
    });

    $('select[name=postcode_id]').change(function(e) {
      e.preventDefault();
      let code = $(this).find(':selected').data('code')
      $(this).next().val(code)
    });

    // 控制現有收件者的編輯按鈕
    $('.uR').hide()
    $('.cUR').hide()

    function enableRecipientUpdate(id) {
      $(`div.r${id} [disabled]`).attr('disabled', false)
      $(`div.r${id} .uR`).show()
      $(`div.r${id} .cUR`).show()
      $(`div.r${id} .eRE`).hide()
      $(`div.r${id} .dR`).hide()
    }

    // 更新DB內的收件者資料
    function updateRecipient(id) {
      $(`div.r${id} [disabled]`).prop('disabled', false)
      $.ajax({
        url: "/api/recipient/" + id,
        method: "POST",
        dataType: "json",
        data: {
          _method: 'PATCH',
          user_id: {{ Auth::user()->id }},
          name: $(`div.r${id} [name=name]`).val(),
          phone_no: $(`div.r${id} [name=phone_no]`).val(),
          postcode_id: $(`div.r${id} select[name=postcode_id]`).val(),
          addr: $(`div.r${id} [name=addr]`).val(),
          _token: '{{ csrf_token() }}',
        },
        error: function(result) {
          if (result.status == 200) {
            disableUpdateRecipient(id)
          } else if (result.status == 422) {
            let err = ''
            $.each(result.responseJSON.errors, function(indexInArray, valueOfElement) {
              $.each(valueOfElement, function(i, e) {
                err = err + `<li class='text-left'>${e}</li>`
              });
            });
            Swal.fire({
              icon: 'error',
              html: `<ul>${err}</ul>`,
            })
          } else {
            console.log(result)
          }
        }
      })
    }

    // 刪除收件者
    function destroyRecipient(id) {
      $.ajax({
        type: 'DELETE',
        url: '/api/recipient/' + id,
        dataType: 'text',
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

    // 取消編輯 恢復至該收件者的值 按鈕顯示狀態初始化
    function disableUpdateRecipient(id) {
      $.ajax({
        type: 'GET',
        url: '/api/recipient/' + id,
        success: function(re) {
          $(`div.r${id} [name=name]`).val(re.name)
          $(`div.r${id} [name=phone_no]`).val(re.phone_no)
          $(`div.r${id} select[name=city]`).val(re.postcode.city_id)
          $(`div.r${id} select[name=postcode_id]`).val(re.postcode_id)
          $(`div.r${id} [name=postcode]`).val(re.postcode.code)
          $(`div.r${id} [name=addr]`).val(re.addr)
        },
      })
      $(`div.r${id} .uR`).hide()
      $(`div.r${id} .cUR`).hide()
      $(`div.r${id} .eRE`).show()
      $(`div.r${id} .dR`).show()
      $(`div.r${id} :input:not(button)`).attr('disabled', true)
    }
  </script>
@endsection