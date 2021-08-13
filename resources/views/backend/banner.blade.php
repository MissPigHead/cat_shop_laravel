@extends('layouts.backend')
@section('title', 'Banner廣告')
@section('content')
<div class="col-9 content">
  <!--新增取區 -->
  <div class="row justify-content-center">
    <button type="button" class="btn btn-info" data-toggle="modal" data-target="#addBanner">新增Banner廣告</button>
  </div>
  <!--新增用Modal -->
  <div class="modal fade" id="addBanner" tabindex="-1" aria-labelledby="addBannerLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <form method="POST" action="{{ route('banner.store') }}" enctype="multipart/form-data">
          @csrf
          <div class="modal-header">
            <h5 class="modal-title" id="addBannerLabel">新增Banner廣告</h5>
          </div>
          <div class="modal-body">
            <div class="form-group">
              <label for="imageBanner" class="col-form-label">請上傳圖片</label>
              <input type="file" class="form-control-file" name="image" id="imageBanner">
            </div>
            <div class="form-group">
              <label for="textBanner">請輸入圖片備註文字</label>
              <input type="text" class="form-control" name="text" id="textBanner" placeholder="此欄位可不填寫">
            </div>
            <img class="w-100" id="previewNew">
          </div>
          <div class="modal-footer">
            <button type="submin" class="btn btn-info">上傳</button>
            <button type="reset" class="btn btn-light">重填</button>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">取消</button>
          </div>
        </form>
      </div>
    </div>
  </div>
  <!-- 顯示區 -->
  <table class="mt-4 table  table-bordered table-hover">
    <thead class="thead-dark">
      <tr>
        <!-- <tr class="table-active font-weight-bolder"> -->
        <th scope="col" class="col-8">圖片</th>
        <th scope="col" class="col-2">備註文字</th>
        <th scope="col" class="col-1">狀態</th>
        <th scope="col" class="col-1">操作</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($banners as $banner)
        <tr>
          <td><img src="{{ $banner->image_path }}" height="180"></td>
          <td>{{ $banner->text }}</td>

          <td>{{ $banner->show ? '顯示中' : '已隱藏' }}</td>
          <td>
            <button type="button" class="btn btn-outline-secondary btn-w-35-h-30 my-1"
              title="在前台{{ $banner->show ? '隱藏' : '顯示' }}該圖"
              onclick="show({{ $banner->id }},{{ $banner->show ? 0 : 1 }})">
              <i class="{{ $banner->show ? 'fas fa-toggle-on' : 'fas fa-toggle-off' }}"></i>
            </button><br>
            <button type="button" class="btn btn-outline-secondary btn-w-35-h-30 my-1" title='向上移動顯示順序'
              onclick="move({{ $banner->id }},'{{ $loop->first ? 'min' : $loop->iteration }}','up')">
              <i class="fas fa-caret-up"></i>
            </button><br>
            <button type="button" class="btn btn-outline-secondary btn-w-35-h-30 my-1" title='向下移動顯示順序'
              onclick="move({{ $banner->id }},'{{ $loop->last ? 'max' : $loop->iteration }}','down')">
              <i class="fas fa-caret-down"></i>
            </button><br>
            <button type="button" class="btn btn-outline-secondary btn-w-35-h-30 my-1" title='修改備註文字'
              data-toggle="modal" data-target="#updateBanner" onclick="updateModal({{ $banner->id }})">
              <i class="fas fa-edit"></i>
            </button><br>
            <button type="button" class="btn btn-outline-secondary btn-w-35-h-30 my-1" title='刪除此圖'
              onclick="deleteBanner({{ $banner->id }},'p')">
              <i class="fas fa-trash-alt"></i>
            </button>
          </td>
        </tr>
      @endforeach
    </tbody>
  </table>
  <!-- 修改用Modal -->
  <div class="modal fade" id="updateBanner" tabindex="-1" aria-labelledby="updateBannerLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-sm">
      <div class="modal-content">
        <div class="modal-body">
          <label for="updateText" class="col-form-label">修改備註文字</label>
          <input type="text" class="form-control" name="text" id="updateText">
          <img src="" class="w-100 my-2" id="previewUpdate">
        </div>
        <div class="modal-footer">
          <input type="hidden" name="id" id="targetID">
          <button type="button" class="btn btn-info" onclick="updateBannerText()">上傳</button>
          <button type="reset" class="btn btn-light">重填</button>
          <button type="button" class="btn btn-secondary" data-dismiss="modal">取消</button>
        </div>
      </div>
    </div>
  </div>
</div>
<script>
  $('input[type=file]').on('change', function(e) { // 預覽上傳的圖片
    const file = this.files[0];

    const fr = new FileReader();
    fr.onload = function(e) {
      $('#previewNew').attr('src', e.target.result);
    };

    fr.readAsDataURL(file);
    // 使用 readAsDataURL 將圖片轉成 Base64 少這句就讀不出來了
  });

  function updateModal(id) { // 要update 的banner 資訊寫入Modal 顯示給user 確認
    $('#targetID').val(id)
    $.ajax({
      url: "/api/banner/" + id,
      method: "GET",
      dataType: "json",
      success: function(result) {
        $("#updateText").attr('placeholder', result.text)
        $("#previewUpdate").attr('src', result.image_path)
      },
    })
  }

  function updateBannerText() { // 要update 的banner 資訊寫入資料庫
    let id=$('#targetID').val()
    let data = {
      text: $('#updateText').val(),
      _token: '{{ csrf_token() }}',
    }
    console.log(data)
    $.ajax({
      url: "/api/banner/" + id,
      method: "PATCH",
      dataType: "text",
      data: data,
      success: function(result) {
        alert('修改成功')
        location.reload()
      },
      error: function(result) {
        alert('修改失敗，請通知管理員！')
        location.reload()
      }
    })
  }

  function show(id, show) { // ajax 更新是否在前台顯示該圖片
    console.log(id, show)
    $.ajax({
      url: "/api/banner/" + id,
      method: "PATCH",
      dataType: "text",
      data: {
        show: show,
        _token: '{{ csrf_token() }}',
      },
      success: function(result) {
        alert('修改成功')
        location.reload()
      },
      error: function(result) {
        alert('修改失敗，請通知管理員！')
        location.reload()
      }
    })
  }

  function deleteBanner(id) { // 刪除
    let ans = confirm(`確認刪除？圖片{{ $banner->text }}`)
    if (ans) {
      $.ajax({
        url: "/api/banner/" + id,
        method: "DELETE",
        dataType: "text",
        data: {
          _token: '{{ csrf_token() }}',
        },
        success: function(result) {
          alert('刪除成功')
          location.reload()
        },
        error: function(result) {
          // console.log(result.responseText)
          alert('刪除失敗，請通知管理員！')
          location.reload()
        }
      })
    }
  }

  function move(id, order, direction) { // ajax 更改顯示順序 上下移動
    if (order == 'min' && direction == 'up') {
      console.log('1st & up')
      alert("This is the first one, can't move up further!")
    } else if (order == 'max' && direction == 'down') {
      console.log('last & down')
      alert("This is the last one, can't move down further!")
    } else {
      let skip
      if (direction == 'up') skip = order - 2
      else if (direction == 'down') skip = order

      let data = {
        id: id,
        order: order,
        skip: skip,
        _token: '{{ csrf_token() }}'
      }

      console.log(data)
      $.ajax({
        url: "/api/banner/" + id + "/move",
        method: "PATCH",
        dataType: "text",
        data: data,
        success: function(result) {
          alert('修改成功')
          location.reload()
        },
        error: function(result) {
          // console.log(result.responseText)
          alert('修改失敗，請通知管理員！')
          location.reload()
        }
      })
    }
  }
</script>

@endsection
