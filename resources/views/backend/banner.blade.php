@extends('layouts.backend')
@section('title', 'Banner廣告')
@section('content')
<div class="col-9 content">
  <!--新增取區 -->
  <div class="row justify-content-center">
    <button type="button" class="btn btn-info" data-toggle="modal" data-target="#addBanner">新增Banner廣告</button>
  </div>
  <div class="modal fade" id="addBanner" tabindex="-1" aria-labelledby="addBannerLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="addBannerLabel">新增Banner廣告</h5>
        </div>
        <div class="modal-body">
          <form>
            <div class="form-group">
              <label for="newBanner" class="col-form-label">請上傳圖片</label>
              <input type="file" class="form-control-file" id="newBanner">
            </div>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-info">上傳</button>
          <button type="button" class="btn btn-secondary" data-dismiss="modal">取消</button>
        </div>
      </div>
    </div>
  </div>
  <!-- 顯示區 -->
  <table class="mt-4 table  table-bordered table-hover">
    <thead class="thead-dark">
      <tr>
        <!-- <tr class="table-active font-weight-bolder"> -->
        <th scope="col" class="col-8">圖片</th>
        <th scope="col" class="col-2">提示文字</th>
        <th scope="col" class="col-1">狀態</th>
        <th scope="col" class="col-1">操作</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($banners as $banner)
        <tr>
          <td><img src="/{{ $banner->image_path }}" height="180"></td>
          <td>{{ $banner->text }}</td>

          <td>{{ $banner->show ? '顯示中' : '已隱藏' }}</td>
          <td>
            <button type="button" class="btn btn-outline-secondary btn-w-35-h-30 my-1"
              title="{{ $banner->show ? '隱藏該目錄' : '顯示該目錄' }}"
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
            <button type="button" class="btn btn-outline-secondary btn-w-35-h-30 my-1" title='編輯目錄名稱'
              data-toggle="modal" data-target="#updateCategoryTitle" onclick="getCategoryTitle({{ $banner->id }})">
              <i class="fas fa-edit"></i>
            </button><br>
            <button type="button" class="btn btn-outline-secondary btn-w-35-h-30 my-1" title='刪除此主目錄及底下子目錄'
              onclick="deleteCategory({{ $banner->id }},'p')">
              <i class="fas fa-trash-alt"></i>
            </button>
          </td>
        </tr>

      @endforeach
    </tbody>
  </table>
</div>
<script>
</script>

@endsection
