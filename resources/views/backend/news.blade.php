@extends('layouts.backend')
@section('title', '育貓新知區')
@section('content')

@if ($errors->any())
@include('swal')
@endif

<div class="col-9 content">
  <!-- 新增區 -->
  <div class="row justify-content-center">
    <button type="button" class="btn btn-info" data-toggle="modal" data-target="#storeNews">新增文章</button>
  </div>

  <!-- 新增用Modal -->
  <div class="modal fade" id="storeNews" tabindex="-1" aria-labelledby="storeNewsLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">

        <form method="POST" action="{{ route('news.store') }}" enctype="multipart/form-data">
          @csrf
          <div class="modal-header">
            <h5 class="modal-title" id="storeNewsLabel">新增文章</h5>
          </div>
          <div class="modal-body">
            <div class="form-group row">
              <label for="title" class="col-2 col-form-label">標題</label>
              <div class="col-9">
                <input type="text" class="form-control" name="title" value="{{ old('title') ?: '' }}">
              </div>
            </div>
            <div class="form-group row">
              <label for="article" class="col-2 col-form-label">內容</label>
              <div class="col-9">
                <textarea class="form-control" name="article" rows="5">{{ old('article') ?: '' }}</textarea>
              </div>
            </div>
            <div class="form-group row">
              <label for="image" class="col-2 col-form-label">圖片</label>
              <div class="col-9">
                <input type="file" name="image" id="imageNew">
                <p class="small text-dark my-2">*可留空或選擇1張2MB以下jpg, jpeg, bmp, png 圖檔</p>
              </div>
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
  <!-- 修改用Modal -->
  <div class="modal fade" id="updateNews" tabindex="-1" aria-labelledby="updateNewsLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <form id="updateForm" method="POST" enctype="multipart/form-data" action="/api/news/edit">
          @csrf
          <div class="modal-header">
            <h5 class="modal-title" id="updateNewsLabel">編輯文章</h5>
          </div>
          <div class="modal-body">
            <div class="form-group row">
              <label for="title" class="col-2 col-form-label">標題</label>
              <div class="col-9">
                <input type="text" name="title" class="form-control" id="updateTitle">
              </div>
            </div>
            <div class="form-group row">
              <label for="article" class="col-2 col-form-label">內容</label>
              <div class="col-9">
                <textarea name="article" class="form-control" id="updateArticle" rows="5"></textarea>
              </div>
            </div>
            <div class="form-group row">
              <label for="article" class="col-2 col-form-label">圖片</label>
              <div class="col-9 row">
                <button type="button" class="btn btn-info ml-3" id="chooseImage" onclick="addInput()">修改圖片</button>
                <input type="file" class="my-2 col-12" name="image" id="imageUpdate">


                <div class="btn-group-toggle ml-3" data-toggle="buttons">
                  <label class="btn btn-light text-secondary">
                    <input type="radio" name="original_image" id="originalImage" checked><span> 使用原存檔圖片</span>
                  </label>
                </div>

              </div>
            </div>
            <img src="" class="w-100 my-2" id="previewUpdate">
            <p id="noImageRecord"></p>
          </div>
          <div class="modal-footer">
            <input type="hidden" name="id" value>
            <button type="submin" class="btn btn-info">確認</button>
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
        <th scope="col" class="col-1">更新日期</th>
        <th scope="col" class="col-2">標題</th>
        <th scope="col" class="col-5">內容</th>
        <th scope="col" class="col-2">圖片</th>
        <th scope="col" class="col-1">狀態</th>
        <th scope="col" class="col-1">操作</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($news as $news)
        <tr>
          <td>{{ substr($news->updated_at, 0, 10) }}</td>
          <td class="text-wrap text-left">{{ $news->title }}</td>
          <td class="text-wrap text-left">{{ mb_substr($news->article, 0, 50) }}...</td>
          <td>
            <img src="{{ $news->image_path }}" class="w-100">
          </td>

          @if ($news->show == 1)
            <td>已發佈</td>
            <td>
              <button type="button" class="btn btn-outline-secondary w-100" title="停止顯示此文章"
                onclick="hide({{ $news->id }})">
              @else
            <td>隱藏中</td>
            <td>
              <button type="button" class="btn btn-outline-secondary w-100" title="公開發佈此文章"
                onclick="show({{ $news->id }})">
          @endif

          <i class="far {{ $news->show == 1 ? 'fa-eye' : 'fa-eye-slash' }}"></i>
          </button><br>
          <button type="button" class="btn btn-outline-secondary w-100 my-1" title="修改編輯" data-toggle="modal"
            data-target="#updateNews" onclick="getNews({{ $news->id }})">
            <i class="fas fa-edit"></i>
          </button><br>
          <button type="button" class="btn btn-outline-secondary w-100" title="刪除資料"
            onclick="deleteNews({{ $news->id }})">
            <i class="fas fa-trash-alt"></i>
          </button>
          </td>
        </tr>
      @endforeach
    </tbody>
  </table>
  <script>
    $('#imageUpdate').hide()

    $('[type=reset]').click(function(e) { // 新增用Modal: reset 時移除預覽圖片
      $('#imageNew + p').show() // 顯示上傳圖片的提醒字
      $('#previewNew').attr('src', '') // 清乾淨之前preview 的資料
    })

    $('#imageNew').on('change', function(e) { // 新增用Modal: 預覽圖片
      if ($('#imageNew').val()) { // 有圖才預覽
        const file = this.files[0];
        const fr = new FileReader();
        fr.onload = function(e) {
          $('#imageNew + p').hide()
          $('#previewNew').attr('src', e.target.result);
        };
        fr.readAsDataURL(file);
      } else { // 沒圖就出現提示
        $('#previewNew').attr('src', '');
        $('#imageNew + p').show()
      }
    });

    function addInput() { // 修改用Modal: 按下修改圖片
      $("#chooseImage").hide() // 修改圖片
      $('#imageUpdate').show() // 顯示 input file
      $('#originalImage').parent().parent().show() // 使用原圖
      $('#deleteImage').show() // 刪除圖片
    }

    function deleteImg(id) { // 修改用Modal: 按下刪除圖片
      $("#deleteImage").hide() // 刪除圖片
      $('#originalImage').parent().parent().show() // 使用原圖
      $("#originalImage").prop('checked', false)
      $('#chooseImage').show() // 新增圖片
      $('#previewUpdate').attr('src', '') // 預覽 --> 移除
      $('#imageUpdate').hide() // input file
      $('#imageUpdate').val('') // input file
    }

    function originalImg(src) { // 修改用Modal: 使用原圖片
      if (src) {
        $("#deleteImage").show() // 刪除圖片 --> 顯示
      }
      $('#originalImage').parent().parent().hide() // 使用原圖 --> 移除
      $("#originalImage").prop('checked', true)
      $("#chooseImage").show() // 新增圖片 --> 顯示
      $('#imageUpdate').val('') // 移除 input file
      $('#imageUpdate').hide() // 移除 input file
      $("#noImageRecord").show()
      $('#previewUpdate').attr('src', src) // 預覽 --> 原圖
    }

    $("#imageUpdate").on('change', function(e) { // 修改用Modal: 預覽圖
      if ($("#imageUpdate").val()) {
        const file = this.files[0];
        const fr = new FileReader();
        fr.onload = function(e) {
          $('#previewUpdate').attr('src', e.target.result);
        };
        fr.readAsDataURL(file);
        $("#noImageRecord").hide() // 移除沒有圖片的提示
        $("#originalImage").prop('checked', false)
      } else {
        $('#previewUpdate').attr('src', '');
        $("#noImageRecord").show()
        $("#originalImage").prop('checked', true) // 未上傳圖片時，預設使用原圖，只有按下delete才刪除
      }
    })

    function getNews(id) { // 修改用Modal: 將要進行編輯的news 資訊塞入Modal
      // 將Modal 內的元件回到預設狀態
      $("#chooseImage").show()
      $('#imageUpdate').hide()
      $('#originalImage').parent().parent().hide()
      $("#deleteImage").remove()
      $('#previewUpdate').attr('src', '')

      $.ajax({ // ajax 取回要編輯的物件資訊
        url: "/api/news/" + id,
        method: "GET",
        dataType: "json", // 注意抓回資料型態
        success: function(result) {
          $('#updateTitle').val(result.title) // 預寫title
          $('#updateArticle').val(result.article) // 預寫article
          $('#updateForm input[type=hidden]').val(result.id) // 修改Modal這裡藏id

          if (result.image_path) { // 有image_path資料: 預覽 + 修改 + 刪除圖片
            $("#noImageRecord").text('')
            $('#previewUpdate').attr('src', result.image_path)
            $("#chooseImage").text('修改圖片')
            $('#originalImage~span').text('使用原存檔圖片')
            $('#imageUpdate').after(`
            <button type="button" class="btn btn-secondary ml-3" id="deleteImage">刪除圖片</button>`)
            $('#deleteImage').attr('onclick', `deleteImg(${result.id})`) // 刪除圖片的按鈕
          } else { // 沒image_path資料: 增加提示 + 新增圖片 - 刪除圖片
            result.image_path = ""
            $("#noImageRecord").text('本文未上傳圖片')
            $("#chooseImage").text('新增圖片')
            $('#originalImage~span').text('不使用配圖')
            $('#originalImage').val('')
            $('#deleteImage').hide()
          }

          $('#originalImage').attr('onclick', `originalImg('${result.image_path}')`) // 使用原圖的按鈕
        }
      })
    }

    function show(id) { // update: show=1 更新是否顯示
      $.ajax({
        url: "/api/news/" + id,
        method: "PATCH",
        dataType: "text",
        data: {
          show: 1,
          _token: '{{ csrf_token() }}',
        },
        success: function(result) {
          alert('修改成功')
          location.reload()
        },
        error: function(result, XMLHttpResponse, textStatus, errorThrown) {
          alert('修改失敗，請通知管理員！')
          location.reload()
        }
      })
    }

    function hide(id) { // update: show=0 更新是否顯示
      $.ajax({
        url: "/api/news/" + id,
        method: "PATCH",
        dataType: "text",
        data: {
          show: 0,
          _token: '{{ csrf_token() }}',
        },
        success: function(result) {
          alert('修改成功')
          location.reload()
        },
        error: function(result, XMLHttpResponse, textStatus, errorThrown) {
          alert('修改失敗，請通知管理員！')
          location.reload()
        }
      })
    }

    function deleteNews(id) { // 刪除文章
      let deleteNews = confirm("確認刪除？")
      if (deleteNews) {
        $.ajax({
          url: "/api/news/" + id,
          method: "DELETE",
          dataType: "text",
          data: {
            _token: '{{ csrf_token() }}',
          },
          success: function(result) {
            alert('刪除成功')
            location.reload()
          },
          error: function(result, XMLHttpResponse, textStatus, errorThrown) {
            alert('刪除失敗，請通知管理員！')
            location.reload()
          }
        })
      }
    }
  </script>
</div>
@endsection
