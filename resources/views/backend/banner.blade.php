<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" type="image/x-icon" href="../image/favicon.ico" />
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.3/css/all.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css">
  <link href="../css/css.css" rel="stylesheet" />
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <title>Backend</title>
</head>
<body>
  <header class="container p-0">
    <div class="row m-0 h-100 align-items-center">
      <div class="col-3 row justify-content-center align-items-center">
        <img src="../image/00cat-256.png" alt="logo" class="logo">
        <h2 class="font-weight-bolder text-pink">貓貓商城</h2>
      </div>
    </div>
  </header>
  <main class="container p-0">
    <div class="row m-0">
      <div class="col-3 sideBar">
        <a href="index.html"><div>Dashboard</div></a>
        <a href="category.html"><div>商品目錄管理</div></a>
        <a href="products.html"><div>商品管理</div></a>
        <a href="members.html"><div>會員管理</div></a>
        <a href="orders.html"><div>訂單管理</div></a>
        <a href="news.html"><div>最新消息管理</div></a>
        <a href="banner.html"><div>輪播圖卡設置</div></a>
      </div>
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
              <th scope="col" class="col-1">狀態</th>
              <th scope="col" class="col-1">操作</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td><img src="http://fakeimg.pl/1200x480/20c997/?text=BANNER-1" height="200"></td>
              <td>顯示中</td>
              <td>
                <button type="button" class="btn btn-outline-secondary">
                  <i class="far fa-eye-slash"></i>
                </button>
                <button type="button" class="btn btn-outline-secondary">
                  <i class="fas fa-trash-alt"></i>
                </button>
              </td>
            </tr>
            <tr>
              <td><img src="http://fakeimg.pl/1200x480/20c997/?text=BANNER-2" height="200"></td>
              <td>顯示中</td>
              <td>
                <button type="button" class="btn btn-outline-secondary">
                  <i class="far fa-eye-slash"></i>
                </button>
                <button type="button" class="btn btn-outline-secondary">
                  <i class="fas fa-trash-alt"></i>
                </button>
              </td>
            </tr>
            <tr>
              <td><img src="http://fakeimg.pl/1200x480/6c757d/?text=BANNER-3" height="200"></td>
              <td>已隱藏</td>
              <td>
                <button type="button" class="btn btn-outline-secondary">
                  <i class="far fa-eye"></i>
                </button>
                <button type="button" class="btn btn-outline-secondary">
                  <i class="fas fa-trash-alt"></i>
                </button>
              </td>
            </tr>
            <tr>
              <td><img src="http://fakeimg.pl/1200x480/20c997/?text=BANNER-4" height="200"></td>
              <td>顯示中</td>
              <td>
                <button type="button" class="btn btn-outline-secondary">
                  <i class="far fa-eye-slash"></i>
                </button>
                <button type="button" class="btn btn-outline-secondary">
                  <i class="fas fa-trash-alt"></i>
                </button>
              </td>
            </tr>
          </tbody>
        </table>

        
      </div>
    </div>
  </main>
  <footer class="container">
    <div class="row justify-content-center">
      <p>Copyright © Lingling Chang a.k.a. MissPigHead 2021</p>
    </div>
  </footer>
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>