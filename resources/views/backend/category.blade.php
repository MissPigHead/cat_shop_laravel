@extends('layouts.backend')
@section('title', '商品目錄')
@section('content')
<div class="col-9 content">
  <!-- 新增區 -->
  <div class="mt-1 form-group row">
    <label for="mainCategory" class="col-2 col-form-label">新增主目錄</label>
    <div class="col-4">
      <input type="text" class="form-control" id="addParent">
    </div>
    <button type="button" class="btn btn-info" onclick="addCategory('p')">新增</button>
  </div>
  <div class="form-group row">
    <label for="subCategory" class="col-2 col-form-label">新增子目錄</label>
    <div class="col-4">
      <select id="addChild_Parent" class="form-control">
        <option value="" disabled selected>請先選擇主目錄...</option>
        @foreach ($parentCategories as $parentCategory)
          <option value={{ $parentCategory->id }}>{{ $parentCategory->title }}</option>
        @endforeach
      </select>
    </div>
    <div class="col-4">
      <input type="text" class="form-control" id="addChild">
    </div>
    <button type="button" class="btn btn-info" onclick="addCategory('c')">新增</button>
  </div>

  <script>
    // 辨識要新增主目錄或子目錄
    function addCategory(parent) { 
      if (parent == 'p') {
        if ($('#addParent').val() == "") {
          alert('請選擇輸入主目錄名稱')
        } else {
          data = {
            title: $('#addParent').val(),
            parent: 0,
            _token: '{{ csrf_token() }}'
          }
          console.log(data)
          postCategory(data)
        }
      } else {
        if ($('#addChild_Parent').val() == null) {
          alert('請選擇上層主目錄')
        } else if ($('#addChild').val() == "") {
          alert('請選擇輸入子目錄名稱')
        } else {
          data = {
            title: $('#addChild').val(),
            parent: $('#addChild_Parent').val(),
            _token: '{{ csrf_token() }}'
          }
          console.log(data)
          postCategory(data)
        }
      }
    }

    // 將資料傳給API
    function postCategory(data) {
      $.ajax({
        url: "/api/category",
        method: "POST",
        dataType: "text", // "json"：ajax呼叫成功，但返回資料非json，所以返回 error+狀態碼200
        data: data,
        success: function(result) {
          console.log("非同步呼叫返回成功");
          alert('新增成功')
          location.reload()
        },
        error: function(result, XMLHttpResponse, textStatus, errorThrown) {
          console.log(result)
          console.log("非同步呼叫返回失敗");
          alert('新增失敗，請通知管理員！')
          location.reload()
        }
      })
    }
  </script>


  <!-- 顯示區 -->
  <table class="mt-4 table table-hover">
    <thead class="thead-dark">
      <tr>
        <!-- <tr class="table-active font-weight-bolder"> -->
        <th scope="col" class="col-2">主目錄</th>
        <th scope="col" class="col-2">子目錄</th>
        <th scope="col" class="col-1">id</th>
        <th scope="col" class="col-1">parent</th>
        <th scope="col" class="col-1">order</th>
        <th scope="col" class="col-1">show</th>
        <th scope="col" class="col-1">狀態</th>
        <th scope="col" class="col-3">操作</th>
      </tr>
    </thead>
    <script>
      function switchChild(id) {
        console.log(id)
        getChildCategory(id)
      }
    </script>

    <tbody>

      @foreach ($parentCategories as $parentCategory)
        <tr class="{{ $parentCategory->show ? 'bg-white' : 'bg-light' }} parent" id="p{{ $parentCategory->id }}">
          <td>{{ $parentCategory->title }} </td>
          <td></td>
          <td>{{ $parentCategory->id }} </td>
          <td>{{ $parentCategory->parent }} </td>
          <td>{{ $parentCategory->order }} </td>
          <td>{{ $parentCategory->show }} </td>
          {{-- <td>
            <button type="button" class="btn btn-outline-secondary"
              onclick="switchChild( {{ $parentCategory->id }} )">
              展開子目錄
            </button>
          </td> --}}
          <td>{{ $parentCategory->show ? '顯示中' : '已隱藏' }}
          </td>
          <td>
            <button type="button" class="btn btn-outline-secondary"
              title="{{ $parentCategory->show ? '隱藏該目錄' : '顯示該目錄' }}">
              <i class="{{ $parentCategory->show ? 'fas fa-toggle-off' : 'fas fa-toggle-on' }}"></i>
            </button>
            <button type="button" class="btn btn-outline-secondary">
              <i class="fas fa-caret-up"></i>
            </button>
            <button type="button" class="btn btn-outline-secondary">
              <i class="fas fa-caret-down"></i>
            </button>
            <button type="button" class="btn btn-outline-secondary">
              <i class="fas fa-edit"></i>
            </button>
            <button type="button" class="btn btn-outline-secondary">
              <i class="fas fa-trash-alt"></i>
            </button>
          </td>
        </tr>
      @endforeach

      <script>
        function getChildCategory(id) {
          $.ajax({
            url: "/api/category/" + id + "/child",
            method: "GET",
            dataType: "json", // 注意抓回資料型態
            success: function(result) {
              $.each(result, function() {
                data = $(this)[0]
                code = `
                  <tr class='${data.show?'bg-white':'bg-light'} child' id='c${data.id}'>
                    <td></td>
                    <td>${ data.title } </td>
                    <td>${ data.id } </td>
                    <td>${ data.parent } </td>
                    <td>${ data.order } </td>
                    <td>${ data.show } </td>
                    <td>${data.show ? '顯示中' : '已隱藏'}
                    </td>
                    <td>
                      <button type='button' class='btn btn-outline-secondary'
                        title='${ data.show ? '隱藏該目錄' : '顯示該目錄' }'>
                        <i class='${ data.show ? 'fas fa-toggle-off' : 'fas fa-toggle-on' }'></i>
                      </button>
                      <button type='button' class='btn btn-outline-secondary'>
                        <i class='fas fa-caret-up'></i>
                      </button>
                      <button type='button' class='btn btn-outline-secondary'>
                        <i class='fas fa-caret-down'></i>
                      </button>
                      <button type='button' class='btn btn-outline-secondary'>
                        <i class='fas fa-edit'></i>
                      </button>
                      <button type='button' class='btn btn-outline-secondary'>
                        <i class='fas fa-trash-alt'></i>
                      </button>
                    </td>
                  </tr>
                `
                $(`#p${id}`).after(code)
              })
            }
          })
        }

        $('.parent').each(function() {
          id = $(this).attr('id').substr(1)
          getChildCategory(id)
        })
      </script>

    </tbody>
  </table>
</div>
@endsection
