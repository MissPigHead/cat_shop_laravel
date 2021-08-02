<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" type="image/x-icon" href="../image/favicon.ico" />
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.3/css/all.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="../plugin/owlcarousel/assets/owl.carousel.min.css">
  <link rel="stylesheet" href="../plugin/owlcarousel/assets/owl.theme.default.min.css">
  <link href="../css/css-front.css" rel="stylesheet" />
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="../plugin/owlcarousel/owl.carousel.js"></script>
  <title>Frontend</title>
</head>

<body>
  <header>
    <div class="container">
      <nav class="navbar navbar-expand-lg navbar-light">
        <a class="navbar-brand" href="#">
          <img src="../image/00cat-256.png" alt="logo" height="30" class="d-inline-block align-top" loading="lazy">
          <span class="h4 text-pink text-Pacifico">Ling's Shop</span>
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
      
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item active">
              <a class="nav-link" href="index.html">首頁</a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">商品目錄</a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="products.html">所有商品</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="productDetail.html">食品</a>
                <a class="dropdown-item" href="productDetail.html">貓砂</a>
                <a class="dropdown-item" href="productDetail.html">日用品</a>
                <a class="dropdown-item" href="productDetail.html">玩具</a>
              </div>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="rules.html">購物說明</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="news.html">育貓新知</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="http://220.128.133.15/s1090423/adopt/">領養貓咪</a>
            </li>
            <li>
              <a href="login.html">
                <button class="btn text-info my-2 my-sm-0" type="submit">
                  <i class="fas fa-user-circle fa-2x"></i>
                </button>
              </a>
            </li>
          </ul>
        </div>
      </nav>
  
    </div>
  </header>
  <!-- main -->
  <main>
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-12 col-md-9 col-lg-7 col-xl-6">
          <div class="row mt-4 mb-sm-2">
            <div class="col">
              <h4>訂單20210101001</h4>
            </div>
          </div>
          <!-- 商品清單 -->
          <table class="table table-bordered" id="orderTable">
            <thead class="thead-light">
              <tr>
              <!-- <tr class="table-active font-weight-bolder"> -->
                <th scope="col" class="col-5">品名</th>
                <th scope="col" class="col-2">單價</th>
                <th scope="col" class="col-2">數量</th>
                <th scope="col" class="col-3">金額</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>小茜豆腐砂1</td>
                <td>12500</td>
                <td>2</td>
                <td>25000</td>
              </tr>
              <tr>
                <td>小茜豆腐砂2</td>
                <td>12500</td>
                <td>2</td>
                <td>25000</td>
              </tr>
              <tr>
                <td>小茜豆腐砂3</td>
                <td>12500</td>
                <td>2</td>
                <td>25000</td>
              </tr>  
              <tr>
                <td>小茜豆腐砂小茜豆腐砂小茜豆腐砂4</td>
                <td>12500</td>
                <td>2</td>
                <td>25000</td>
              </tr>
              <tr>
                <td>小茜豆腐砂小茜豆腐砂5</td>
                <td>12500</td>
                <td>2</td>
                <td>25000</td>
              </tr>  
            </tbody>
          </table>
  
          <!-- 總金額 -->
          <div class="row">
            <div class="col-12 text-right">
              <p class="h5">總金額：<span class="text-pink">125000</span></p>
            </div>
          </div>
          <!-- 收件資訊 -->
          <div class="row mt-4 mb-1 mb-sm-2">
            <div class="col-12 d-flex justify-content-between align-items-center">
              <h4>收件者資訊</h4>
            </div>
          </div>
          <div class="form-group row mb-2">
            <label for="receipient" class="col-3 col-sm-2 col-form-label pr-0">收件者</label>
            <div class="col-9 col-sm-10">
              <input type="text" class="form-control" id="receipient" value="吱吱貓" disabled>
            </div>
          </div>
          <div class="form-group row mb-2 justify-content-end">
            <label for="addressLine1" class="col-3 col-sm-2 col-form-label mt-1">地址</label>
            <div class="col-9 col-sm-4 mt-1">
              <select id="city" class="form-control" disabled>
                <option value="台北市" selected>台北市</option>
              </select>
            </div>
            <div class="col-9 col-sm-4 mt-1">
              <select id="region" class="form-control" disabled>
                <option value="森林區" selected>森林區</option>
              </select>
            </div>
            <div class="d-none d-sm-inline-block col-sm-2 mt-1">
              <input type="text" class="form-control" id="ZIP" value="231" disabled>
            </div>
            <div class="col-9 col-sm-10 mt-1">
              <input type="text" class="form-control" id="addressDetail" value="安祥路388巷588號1樓" disabled>
            </div>
          </div>
          <div class="form-group row mb-2">
            <label for="receipientTel" class="col-3 col-sm-2 col-form-label">電話</label>
            <div class="col-9 col-sm-10">
              <input type="text" class="form-control" id="receipientTel" value="0927775101" disabled>
            </div>
          </div>
          <div class="form-group row mb-2">
            <label for="remark" class="col-3 col-sm-2 col-form-label">備註</label>
            <div class="col-9 col-sm-10">
              <textarea class="form-control" id="remark" disabled>貓砂請送至管理室，請警衛代收，謝謝。</textarea>
            </div>
          </div>
          <!-- 結帳 -->
          <div class="row my-2 justify-content-center">
            <a href="orderList.html">
              <button type="button" class="btn btn-secondary m-2"><i class="fas fa-undo-alt"></i> 返回歷史訂單</button>
            </a>
          </div>
        </div>
      </div>
    </div>

  </main>
  <!-- footer -->
  <footer>
    <div class="container">
      <div class="row justify-content-center p-3">
        <p>Copyright © Lingling Chang a.k.a. MissPigHead 2021</p>
      </div>
    </div>
  </footer>
  <!-- script -->
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>