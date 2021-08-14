@extends('layouts.backend')
@section('title', '育貓新知區')
@section('content')
<pre>
@php
    if(!empty($r)){
        var_dump($r);
    }
    @endphp
    </pre>
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
                <input type="text" class="form-control" name="title">
              </div>
            </div>
            <div class="form-group row">
              <label for="article" class="col-2 col-form-label">內容</label>
              <div class="col-9">
                <textarea class="form-control" name="article" rows="5"></textarea>
              </div>
            </div>
            <div class="form-group row">
              <label for="image" class="col-2 col-form-label">圖片</label>
              <div class="col-9">
                <input type="file" name="image" id="imageNew">
                <p class="small text-dark">*可留空，最多1張</p>
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
        <form id="updateForm" method="POST">
          @csrf
          {{-- @method('PATCH') --}}
          <input type="hidden" name="_method" value="PATCH">
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
              <div class="col-9">
                <button type="button" class="btn btn-secondary" id="chooseImage" onclick="addInput()">修改圖片</button>
              </div>
            </div>
            <img src="" class="w-100 my-2" id="previewUpdate">
          </div>
          <div class="modal-footer">
            <button type="submin" class="btn btn-info">上傳</button>
            {{-- <input type="submit" class="btn btn-info" value="確認"> --}}
            <button type="reset" class="btn btn-light">重填</button>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">取消</button>
          </div>
        </form>
        <script>
          function addInput(e) {
            $("#chooseImage").after(`<input type="file" name="image" id="imageUpdate">`)
            $("#chooseImage").addClass('d-none')
          }
        </script>
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
    function getNews(id) { // 將要進行編輯的news 塞入Modal 中
      $.ajax({
        url: "/api/news/" + id,
        method: "GET",
        dataType: "json", // 注意抓回資料型態
        success: function(result) {
          $('#updateForm').attr('action', '/api/news/' + result.id + "/edit")
          $('#updateTitle').val(result.title)
          $('#updateArticle').val(result.article)
          $('#previewUpdate').attr('data-id', result.id) // Modal的這裡藏id
          $('#previewUpdate').attr('src', result.image_path)
        }
      })
    }

    $('[data-toggle=modal]').click(function(e) { // 開Modal 時顯示上傳圖片的提醒字
      $('#previewNew').attr('src', '') // 清乾淨之前preview 的資料
      $('#previewUpdate').attr('src', '')
      $("#imageUpdate").remove()
      $('#imageNew + p').removeClass('d-none')
      $("#chooseImage").removeClass('d-none')
    })

    $('[type=reset]').click(function(e) { // 按reset 的時候清乾淨preview 圖片
      $('#imageNew + p').removeClass('d-none') // 顯示上傳圖片的提醒字
      $("#chooseImage").removeClass('d-none')
      $("#imageUpdate").remove()
      $('#previewNew').attr('src', '') // 清乾淨之前preview 的資料
      $('#previewUpdate').attr('src', '')
    })

    $('#imageNew').on('change', function(e) { // 預覽上傳的圖片
      $('#imageNew + p').addClass('d-none')
      const file = this.files[0];
      const fr = new FileReader();
      fr.onload = function(e) {
        $('#previewNew').attr('src', e.target.result);
      };
      fr.readAsDataURL(file);
      // 使用 readAsDataURL 將圖片轉成 Base64 少這句就讀不出來了
    });

    function postNews() {
      data = {
        title: $('#title').val(),
        article: $('#article').val(),
        _token: '{{ csrf_token() }}'
        // Laravel強制要求要防範CSRF( Cross-site request forgery)攻擊 往資料庫送資料時要記得加！
      }
      $.ajax({
        url: "/api/news",
        method: "POST",
        dataType: "text", // "json"：ajax呼叫成功，但返回資料非json，所以進入error，且狀態碼200
        data: data,
        success: function(result) {
          console.log("非同步呼叫返回成功,result:" + result);
          alert('新增成功')
          location.reload()
        },
        error: function(result, XMLHttpResponse, textStatus, errorThrown) {
          console.log(result)
          console.log("1 非同步呼叫返回失敗,XMLHttpResponse.readyState:" + XMLHttpResponse.readyState);
          console.log("2 非同步呼叫返回失敗,XMLHttpResponse.status:" + XMLHttpResponse.status);
          console.log("3 非同步呼叫返回失敗,textStatus:" + textStatus);
          console.log("4 非同步呼叫返回失敗,errorThrown:" + errorThrown);
          alert('新增失敗，請截圖提供給管理員，謝謝！\r\nXMLHttpResponse.readyState:' + XMLHttpResponse
            .readyState + '\r\nXMLHttpResponse.status:' + XMLHttpResponse.status +
            '\r\ntextStatus:' + textStatus + '\r\nerrorThrown:' + errorThrown)
          location.reload()
        }
      })
    }

    function show(id) {
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

    function hide(id) {
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

    function deleteNews(id) {
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
