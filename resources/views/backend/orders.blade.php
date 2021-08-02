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


        <!-- 選取區 -->
        <form>
          <div class="pt-1 form-group row">
            <label for="mainCategory" class="col-2 col-form-label">搜尋訂單</label>
            <div class="col-4">
              <input type="text" class="form-control" id="mainCategory" placeholder="請輸入訂單編號">
            </div>
            <button type="button" class="btn btn-info">搜尋</button>
          </div>
        </form>

        <!-- 顯示區 -->
        <table class="mt-4 table  table-bordered table-hover">
          <thead class="thead-dark">
            <tr>
            <!-- <tr class="table-active font-weight-bolder"> -->
              <th scope="col" class="col-2">訂單編號</th>
              <th scope="col" class="col-2">訂購日期</th>
              <th scope="col" class="col-2">會員帳號</th>
              <th scope="col" class="col-2">狀態</th>
              <th scope="col" class="col-4">操作</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>33345678</td>
              <td>2021/07/22</td>
              <td>testtest12</td>
              <td>待出貨</td>
              <td>
                <button type="button" class="btn btn-outline-secondary" title="檢視訂單內容">
                  <i class="fas fa-eye"></i>
                </button>
                <button type="button" class="btn btn-outline-secondary" title="設定為已出貨">
                  <i class="fas fa-check-circle"></i>
                </button>
                <button type="button" class="btn btn-outline-secondary" title="取消訂單">
                  <i class="fas fa-store-slash"></i>
                </button>
                <button type="button" class="btn btn-outline-secondary" title="設定為退貨退款">
                  <i class="fas fa-undo-alt"></i>
                </button>
                <button type="button" class="btn btn-outline-secondary" title="刪除訂單資料">
                  <i class="fas fa-trash-alt"></i>
                </button>
              </td>
            </tr>
            <tr>
              <td>12345678</td>
              <td>2021/07/22</td>
              <td>testtestte</td>
              <td>已出貨</td>
              <td>
                <button type="button" class="btn btn-outline-secondary" title="檢視訂單內容">
                  <i class="fas fa-eye"></i>
                </button>
                <button type="button" disabled class="btn btn-outline-secondary" title="設定為已出貨">
                  <i class="fas fa-check-circle"></i>
                </button>
                <button type="button" class="btn btn-outline-secondary" title="取消訂單">
                  <i class="fas fa-store-slash"></i>
                </button>
                <button type="button" class="btn btn-outline-secondary" title="設定為退貨退款">
                  <i class="fas fa-undo-alt"></i>
                </button>
                <button type="button" class="btn btn-outline-secondary" title="刪除訂單資料">
                  <i class="fas fa-trash-alt"></i>
                </button>
              </td>
            </tr>
            <tr>
              <td>33345678</td>
              <td>2021/07/22</td>
              <td>testte</td>
              <td>已取消</td>
              <td>
                <button type="button" class="btn btn-outline-secondary" title="檢視訂單內容">
                  <i class="fas fa-eye"></i>
                </button>
                <button type="button" disabled class="btn btn-outline-secondary" title="設定為已出貨">
                  <i class="fas fa-check-circle"></i>
                </button>
                <button type="button" disabled class="btn btn-outline-secondary" title="取消訂單">
                  <i class="fas fa-store-slash"></i>
                </button>
                <button type="button" disabled class="btn btn-outline-secondary" title="設定為退貨退款">
                  <i class="fas fa-undo-alt"></i>
                </button>
                <button type="button" class="btn btn-outline-secondary" title="刪除訂單資料">
                  <i class="fas fa-trash-alt"></i>
                </button>
              </td>
            </tr>
            <tr>
              <td>33345678</td>
              <td>2021/07/22</td>
              <td>test</td>
              <td>已退貨</td>
              <td>
                <button type="button" class="btn btn-outline-secondary" title="檢視訂單內容">
                  <i class="fas fa-eye"></i>
                </button>
                <button type="button" disabled class="btn btn-outline-secondary" title="設定為已出貨">
                  <i class="fas fa-check-circle"></i>
                </button>
                <button type="button" disabled class="btn btn-outline-secondary" title="取消訂單">
                  <i class="fas fa-store-slash"></i>
                </button>
                <button type="button" disabled class="btn btn-outline-secondary" title="設定為退貨退款">
                  <i class="fas fa-undo-alt"></i>
                </button>
                <button type="button" class="btn btn-outline-secondary" title="刪除訂單資料">
                  <i class="fas fa-trash-alt"></i>
                </button>
              </td>
            </tr>
            <tr>
              <td>33345678</td>
              <td>2021/07/22</td>
              <td>test22</td>
              <td>待出貨</td>
              <td>
                <button type="button" class="btn btn-outline-secondary" title="檢視訂單內容">
                  <i class="fas fa-eye"></i>
                </button>
                <button type="button" class="btn btn-outline-secondary" title="設定為已出貨">
                  <i class="fas fa-check-circle"></i>
                </button>
                <button type="button" class="btn btn-outline-secondary" title="取消訂單">
                  <i class="fas fa-store-slash"></i>
                </button>
                <button type="button" class="btn btn-outline-secondary" title="設定為退貨退款">
                  <i class="fas fa-undo-alt"></i>
                </button>
                <button type="button" class="btn btn-outline-secondary" title="刪除訂單資料">
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
</body>
</html>