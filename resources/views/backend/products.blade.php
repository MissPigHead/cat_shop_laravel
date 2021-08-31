@extends('layouts.backend')
@section('title', '商品區')
@section('content')
  <div class="col-9 content">
    <!-- 選取區 -->
    <div class="form-group row pt-1">
      <label for="category" class="col-2 col-form-label">商品目錄</label>
      <div class="col-4">
        <select id="category" class="form-control">
          <option value="all" class="cate-all" selected>所有商品</option>
          @foreach ($categories as $k => $value)
            @foreach ($categories[$k] as $key => $category)
              @if ($k == 0)
                <option value="{{ $category->id }}" class="cate-p p{{ $category->id }}" disabled>{{ $category->title }}</option>
              @else
                <script>
                  $('#category option.p{{ $k }}').last().after(`
                        <option value="{{ $category->id }}" class="cate-c p{{ $k }}" {{ $category->id == $now ? 'selected' : '' }}>{{ $category->title }} ({{ $category->product_count }})</option>
                    `)
                </script>
              @endif
            @endforeach
          @endforeach
        </select>
      </div>
      <button type="button" class="btn btn-info" onclick="toPage()">選取</button>
    </div>
    <!-- 顯示區 -->
    <table class="mt-4 table table-hover" id="products">
      <thead class="thead-dark">
        <tr>
          <th scope="col" class="col-2 text-left">商品編號</th>
          <th scope="col" class="col-3">品名</th>
          <th scope="col" class="col-1 text-right">庫存</th>
          <th scope="col" class="col-1 text-right">價格</th>
          <th scope="col" class="col-2">建立/更新日期</th>
          <th scope="col" class="col-1">狀態</th>
          <th scope="col" class="col-2">操作</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($products as $product)
          <tr data-href='{{ $product->id }}' onclick="showProduct({{ $product->id }})" data-toggle="modal" data-target="#updateProduct" >
            <td class="text-left">{{ $product->id }}</td>
            <td>{{ $product->name }}</td>
            <td class="text-right {{ $product->in_stock == 0 ? 'text-danger font-weight-bolder' : '' }}">
              {{ $product->in_stock }}</td>
            <td class="text-right">{{ $product->price }}</td>
            <td>{{ substr($product->created_at,0,10) }}
                <hr class="my-0">
                {{ substr($product->updated_at,0,10) }}
            </td>
            <td>{{ $product->show * $product->in_stock ? '銷售中' : '已下架' }}</td>
            <td>
              <button type="button" class="btn btn-outline-secondary" title="{{ $product->show ? '暫停銷售=下架' : '上架銷售' }}"
                onclick="{{ $product->show ? '銷售中' : '已下架' }}">
                <i class="fas fa-toggle-{{ $product->show ? 'on' : 'off' }}"></i>
              </button>
              <button type="button" class="btn btn-outline-secondary" title="刪除商品"
                onclick="destroy({{ $product->id }})">
                <i class="fas fa-trash-alt"></i>
              </button>
            </td>
          </tr>
        @endforeach
      </tbody>
    </table>
    <div class="row justify-content-center">{{ $products->onEachSide(2)->links() }}</div>
  </div>
      <!-- 修改用Modal -->
      <div class="modal fade" id="updateProduct" tabindex="-1" aria-labelledby="updateProductLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content">
            <form id="updateForm" method="POST" enctype="multipart/form-data" action="">
              @csrf
              <div class="modal-header">
                <h5 class="modal-title" id="updateProductLabel">編輯/檢視商品</h5>
              </div>
              <div class="modal-body">
                <div class="form-group row">
                  <label for="name" class="col-2 col-form-label">品名</label>
                  <div class="col-9">
                    <input type="text" name="name" class="form-control" id="name">
                  </div>
                </div>

                <div class="form-group row">
                    <label for="category_id" class="col-2 col-form-label">品名</label>
                    <div class="col-9">
                        <select name="category_id" id="category_id" class="form-control">
                            @foreach ($categories as $k => $value)
                              @foreach ($categories[$k] as $key => $category)
                                @if ($k != 0)
                                  <option value="{{ $category->id }}">{{ $category->parent_name }}-{{ $category->title }}</option>
                                @else
                                @endif
                              @endforeach
                            @endforeach
                          </select>
                    </div>
                </div>
                <div class="form-group row">
                  <label for="price" class="col-2 col-form-label">價格</label>
                  <div class="col-4">
                    <input type="number" name="price" class="form-control" id="price">
                  </div>
                  <label for="in_stock" class="col-2 col-form-label text-right">數量</label>
                  <div class="col-3">
                    <input type="number" name="in_stock" class="form-control" id="in_stock">
                  </div>
                </div>
                <div class="form-group row">
                    <label for="specification" class="col-2 col-form-label">品名</label>
                    <div class="col-9">
                      <input type="text" name="specification" class="form-control" id="specification">
                    </div>
                  </div>
                <div class="form-group row">
                  <label for="description" class="col-2 col-form-label">內容</label>
                  <div class="col-9">
                    <textarea name="description" class="form-control" id="description" rows="5"></textarea>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="article" class="col-2 col-form-label">圖片</label>
                  <div class="col-9 row">
                    <button type="button" class="btn btn-info ml-3" id="chooseImage" onclick="">修改圖片</button>
                    <input type="file" class="my-2 col-12" name="image_path" id="imageUpdate">
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
                <button type="button" class="btn btn-info">確認</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">取消</button>
              </div>
            </form>
          </div>
        </div>
      </div>
  <script>
    function toPage() {
      location.href = '{{ route('admin.product.index', '') }}' + '/' + $('#category').val()
    }

    function showProduct($p_id){

    }
  </script>

@endsection
