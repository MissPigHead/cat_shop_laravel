@extends('layouts.backend')
@section('title','育貓新知區')
@section('content')
      <div class="col-9 content">
        <!-- 新增區 -->
        <div class="row justify-content-center">
          <button type="button" class="btn btn-info" data-toggle="modal" data-target="#addMember">新增促銷資訊</button>
        </div>
        <div class="modal fade" id="addMember" tabindex="-1" aria-labelledby="addMemberLabel" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="addMemberLabel">新增促銷資訊</h5>
              </div>
              <div class="modal-body">
                <form>
                  <div class="form-group row">
                    <label for="title" class="col-2 col-form-label">標題</label>
                    <div class="col-9">
                      <input type="text" class="form-control" id="title">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="article" class="col-2 col-form-label">內容</label>
                    <div class="col-9">
                      <textarea class="form-control" id="article" rows="5"></textarea>
                    </div>
                  </div>
                </form>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-info" id="submitNews">確認</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">取消</button>
              </div>
            </div>
          </div>
        </div>


        <script>
          $('#submitNews').click(function(){
            data={
              title: $('#title').val(),
              article: $('#article').val(),
              _token: '{{csrf_token()}}' 
              // Laravel強制要求要防範CSRF( Cross-site request forgery)攻擊 往資料庫送資料時要記得加！
            }
            $.ajax({
              url: "/api/news",
              method: "POST",
              dataType: "json",
              data: data,
              success: function(res){console.log("PASS",res)},
              error: function(err){console.log(err)},
            })
          })
        </script>


        <!-- 顯示區 -->
        <table class="mt-4 table  table-bordered table-hover">
          <thead class="thead-dark">
            <tr>
              <th scope="col" class="col-1">更新日期</th>
              <th scope="col" class="col-3">標題</th>
              <th scope="col" class="col-5">內容</th>
              <th scope="col" class="col-1">狀態</th>
              <th scope="col" class="col-2">操作</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>2021/07/22</td>
              <td class="text-wrap text-left">我是名稱很長的名字</td>
              <td class="text-wrap text-left">某種鬱悶什麼時候專門祝福司機我說加大，斑竹保存，失去規劃，小學思路怎麼高度我說頻率才會這是你知道站點，因而理想接到相冊提示自從細節製造走了其實關西來的職務給我，面對很多無派回應就有一批標準股權稱為流程反映確保地面機構，風雲提升臉色推坑大魔王，負責人，投訴。</td>
              <td>顯示中</td>
              <td>
                <button type="button" class="btn btn-outline-secondary">
                  <i class="far fa-eye-slash"></i>
                </button>
                <button type="button" class="btn btn-outline-secondary">
                  <i class="fas fa-edit"></i>
                </button>
                <button type="button" class="btn btn-outline-secondary">
                  <i class="fas fa-trash-alt"></i>
                </button>
              </td>
            </tr>
            <tr>
              <td>2021/07/22</td>
              <td class="text-wrap text-left">我是名稱很長很長很長很長很長很長很長很長的名字</td>
              <td class="text-wrap text-left">某種鬱悶什麼時候專門祝福司機我說加大，斑竹保存，失去規劃，小學思路怎麼高度我說頻率才會這是你知道站點，因而理想接到相冊提示自從細節製造走了其實關西來的職務給我，面對很多無派回應就有一批標準股權稱為流程反映確保地面機構，風雲提升臉色推坑大魔王，負責人，投訴。</td>
              <td>顯示中</td>
              <td>
                <button type="button" class="btn btn-outline-secondary">
                  <i class="far fa-eye-slash"></i>
                </button>
                <button type="button" class="btn btn-outline-secondary">
                  <i class="fas fa-edit"></i>
                </button>
                <button type="button" class="btn btn-outline-secondary">
                  <i class="fas fa-trash-alt"></i>
                </button>
              </td>
            </tr>
            <tr>
              <td>2021/07/22</td>
              <td class="text-wrap text-left">我是名稱很長很長很長很長很長的名字</td>
              <td class="text-wrap text-left">某種鬱悶什麼時候專門祝福司機我說加大，斑竹保存，失去規劃，小學思路怎麼高度我說頻率才會這是你知道站點，因而理想接到相冊提示自從細節製造走了其實關西來的職務給我，面對很多無派回應就有一批標準股權稱為流程反映確保地面機構，風雲提升臉色推坑大魔王，負責人，投訴。</td>
              <td>已隱藏</td>
              <td>
                <button type="button" class="btn btn-outline-secondary">
                  <i class="far fa-eye"></i>
                </button>
                <button type="button" class="btn btn-outline-secondary">
                  <i class="fas fa-edit"></i>
                </button>
                <button type="button" class="btn btn-outline-secondary">
                  <i class="fas fa-trash-alt"></i>
                </button>
              </td>
            </tr>
            <tr>
              <td>2021/07/22</td>
              <td class="text-wrap text-left">我是名稱很長很長的名字</td>
              <td class="text-wrap text-left">某種鬱悶什麼時候專門祝福司機我說加大，斑竹保存，失去規劃，小學思路怎麼高度我說頻率才會這是你知道站點，因而理想接到相冊提示自從細節製造走了其實關西來的職務給我，面對很多無派回應就有一批標準股權稱為流程反映確保地面機構，風雲提升臉色推坑大魔王，負責人，投訴。</td>
              <td>顯示中</td>
              <td>
                <button type="button" class="btn btn-outline-secondary">
                  <i class="far fa-eye-slash"></i>
                </button>
                <button type="button" class="btn btn-outline-secondary">
                  <i class="fas fa-edit"></i>
                </button>
                <button type="button" class="btn btn-outline-secondary">
                  <i class="fas fa-trash-alt"></i>
                </button>
              </td>
            </tr>
          </tbody>
        </table>
      </div>    
@endsection