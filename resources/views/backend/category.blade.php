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
        <th scope="col" class="col-3">主目錄</th>
        <th scope="col" class="col-3">
          <button type="button" class="btn btn-outline-light py-1" onclick="collapseChild('all')" id="collapseAll" data-open=1>
            收合所有子目錄
          </button>
        </th>
        <th scope="col" class="col-1">前台顯示狀態</th>
        <th scope="col" class="col-5">操作</th>
      </tr>
    </thead>

    <script>
      function collapseChild(data) {
        if (data == 'all') {
          let open = $('#collapseAll').attr("data-open")
          if (open) {
            document.getElementById("collapseAll").dataset.open = ''
            // jq 的.data() 只能讀取 無法修改 需要改用js
            $('#collapseAll').text('展開所有子目錄')
            $('tr.child').addClass('d-none')
          } else {
            document.getElementById("collapseAll").dataset.open = 1
            $('#collapseAll').text('收合所有子目錄')
            $('tr.child').removeClass('d-none')
          }
        } else {
          $(`tr.${data}`).toggleClass('d-none')
        }
      }
    </script>

    <tbody>
      @foreach ($parentCategories as $parentCategory)
        <tr class="{{ $parentCategory->show ? 'bg-white' : 'bg-light' }} parent" id="p{{ $parentCategory->id }}">
          <td class="font-weight-bold">{{ $parentCategory->title }} </td>
          <td>
            <button type="button" class="btn btn-outline-light py-1 text-gray"
              onclick="collapseChild('p{{ $parentCategory->id }}')">
              展開或收合此項子目錄
            </button>
          </td>
          <td>{{ $parentCategory->show ? '顯示中' : '已隱藏' }}
          </td>
          <td>
            <button type="button" class="btn btn-outline-secondary"
              title="{{ $parentCategory->show ? '隱藏該目錄' : '顯示該目錄' }}"
              onclick="show({{ $parentCategory->id }},{{ $parentCategory->show ? 0 : 1 }})">
              <i class="{{ $parentCategory->show ? 'fas fa-toggle-on' : 'fas fa-toggle-off' }}"></i>
            </button>
            <button type="button" class="btn btn-outline-secondary" title='向上移動顯示順序'
              onclick="move({{ $parentCategory->id }},'{{ $loop->first ? 'min' : $loop->iteration }}','up')">
              <i class="fas fa-caret-up"></i>
            </button>
            <button type="button" class="btn btn-outline-secondary" title='向下移動顯示順序'
              onclick="move({{ $parentCategory->id }},'{{ $loop->last ? 'max' : $loop->iteration }}','down')">
              <i class="fas fa-caret-down"></i>
            </button>
            <button type="button" class="btn btn-outline-secondary" title='編輯目錄名稱' data-toggle="modal"
              data-target="#updateCategoryTitle" onclick="getCategoryTitle({{ $parentCategory->id }})">
              <i class="fas fa-edit"></i>
            </button>
            <button type="button" class="btn btn-outline-secondary" title='刪除此主目錄及底下子目錄'
              onclick="deleteCategory({{ $parentCategory->id }},'p')">
              <i class="fas fa-trash-alt"></i>
            </button>
          </td>
        </tr>

        <script>
          console.log(`{{ $parentCategory->title }}`)
        </script>

      @endforeach

      <script>
        $('.parent').each(function() {
          id = $(this).attr('id').substr(1)
          getChildCategory(id)
        })

        function getChildCategory(id) {
          $.ajax({
            url: "/api/category/" + id + "/child",
            method: "GET",
            dataType: "json", // 注意抓回資料型態
            success: function(result) {
              let order = result.length
              $.each(result, function() {
                data = $(this)[0]
                code = `
                  <tr class='${data.show?'bg-white':'bg-light'} child p${data.parent}'>
                    <td></td>
                    <td>${ data.title } </td>
                    <td>${data.show ? '顯示中' : '已隱藏'}
                    </td>
                    <td>
                      <button type='button' class='btn btn-outline-secondary'
                        title='${ data.show ? '隱藏該目錄' : '顯示該目錄' }'
                        onclick='show(${ data.id },${ data.show ? 0 : 1 })'>
                        <i class='${ data.show ? 'fas fa-toggle-on' : 'fas fa-toggle-off' }'></i>
                      </button>
                      <button type='button' class='btn btn-outline-secondary' title='向上移動顯示順序' onclick='move(${ data.id },"${ order==1?'min':order }","up")'>
                        <i class='fas fa-caret-up'></i>
                      </button>
                      <button type='button' class='btn btn-outline-secondary' title='向下移動顯示順序' onclick='move(${ data.id },"${ order==result.length?'max':order }","down")'>
                        <i class='fas fa-caret-down'></i>
                      </button>
                      <button type='button' class='btn btn-outline-secondary' title='編輯目錄名稱'>
                        <i class='fas fa-edit'></i>
                      </button>
                      <button type='button' class='btn btn-outline-secondary' title='刪除此子目錄' onclick='deleteCategory(${ data.id })'>
                        <i class='fas fa-trash-alt'></i>
                      </button>
                    </td>
                  </tr>
                `
                $(`#p${id}`).after(code)
                order--
              })
            }
          })
        }

        function deleteCategory(id, type) {
          if (type == 'p') {
            type = '該項主目錄，及其底下子目錄'
          } else {
            type = '該項子目錄'
          }
          let deleteCategory = confirm(`確認刪除？${type}`)
          if (deleteCategory) {
            $.ajax({
              url: "/api/category/" + id,
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
                alert('刪除失敗，請通知管理員！')
                location.reload()
              }
            })
          }
        }

        function show(id, show) {
          console.log(id, show)
          $.ajax({
            url: "/api/category/" + id,
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
            error: function(result, XMLHttpResponse, textStatus, errorThrown) {
              alert('修改失敗，請通知管理員！')
              location.reload()
            }
          })
        }

        function getCategoryTitle(id) {
          $.ajax({
            url: "/api/category/" + id,
            method: "GET",
            dataType: "json", // 注意抓回資料型態
            success: function(result) {
              $('#updateTitle').val(result.title)
              $('#updateCategoryTitle input[type=hidden]').val(result.id)
            }
          })
        }

        function updateCategoryTitle() {
          let id = $('#updateCategoryTitle input[type=hidden]').val()
          let data = {
            title: $('#updateTitle').val(),
            _token: '{{ csrf_token() }}'
            // Laravel強制要求要防範CSRF( Cross-site request forgery)攻擊 往資料庫送資料時要記得加！
          }
          $.ajax({
            url: "/api/category/" + id,
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

        function move(id, order, direction) {
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
              url: "/api/category/" + id + "/move",
              method: "PATCH",
              dataType: "text",
              data: data,
              success: function(result) {
                console.log(result)
                alert('修改成功')
                location.reload()
              },
              error: function(result) {
                console.log(result)
                alert('修改失敗，請通知管理員！')
                location.reload()
              }
            })
          }
        }
      </script>
    </tbody>
  </table>
  <!-- 修改用Modal -->
  <div class="modal fade" id="updateCategoryTitle" tabindex="-1" aria-labelledby="updateCategoryLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-sm">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="updateCategoryLabel">請輸入新的目錄名稱</h5>
        </div>
        <div class="modal-body">
          <input type="text" class="form-control" id="updateTitle">
        </div>
        <div class="modal-footer">
          <input type="hidden" value="">
          <button type="button" class="btn btn-info" onclick="updateCategoryTitle()">確認</button>
          <button type="button" class="btn btn-secondary" data-dismiss="modal">取消</button>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
