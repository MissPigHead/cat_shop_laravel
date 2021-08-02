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
        <div class="col-12 col-md-8 col-lg-6 col-xl-5">
          <div class="row mt-4 mb-sm-2">
            <div class="col">
              <h4>會員資訊</h4>
            </div>
          </div>
          <form>
            <div class="form-group row align-items-center">
              <label for="account" class="col-3 col-sm-2 col-form-label">帳號</label>
              <div class="col-9 col-sm-7">
                <input type="text" class="form-control" id="account" placeholder="QiQiCat">
              </div>
              <div class="d-none d-sm-inline-block col-sm-3">
                <button type="button" class="btn btn-info w-100">刪除帳號</button>
              </div>
            </div>
            <div class="form-group row">
              <label for="email" class="col-3 col-sm-2 col-form-label pr-0">E-mail</label>
              <div class="col-9 col-sm-10">
                <input type="email" class="form-control" id="email" placeholder="qiqicat20170608@testqiqi.com">
              </div>
            </div>
            <div class="form-group row">
              <label for="email" class="col-3 col-sm-2 col-form-label">生日</label>
              <div class="col-9 col-sm-10">
                <input type="date" class="form-control" id="birthday" value="2017-06-08">
              </div>
            </div>
            <div class="form-group row">
              <label for="password" class="col-3 col-sm-2 col-form-label">密碼</label>
              <div class="col-9 col-sm-10">
                <input type="password" class="form-control" id="password" placeholder="************">
              </div>
            </div>
            <div class="form-group row">
              <label for="password2" class="col-3 col-sm-2 col-form-label pr-0">確認密碼</label>
              <div class="col-9 col-sm-10">
                <input type="password" class="form-control" id="password2" placeholder="************">
              </div>
            </div>
            <div class="row mt-5 mb-2">
              <div class="col">
                <h4>預設收件資訊</h4>
              </div>
            </div>
            <div class="form-group row mb-2">
              <label for="receipient" class="col-3 col-sm-2 col-form-label pr-0">收件者</label>
              <div class="col-9 col-sm-10">
                <input type="text" class="form-control" id="receipient" placeholder="吱吱貓">
              </div>
            </div>
            <div class="form-group row mb-2 justify-content-end">
              <label for="addressLine1" class="col-3 col-sm-2 col-form-label mt-1">地址</label>
              <div class="col-9 col-sm-4 mt-1">
                <select id="city" class="form-control">
                  <option value="" disabled selected>選取城市</option>
                  <option value="1">1</option>
                  <option value="2">2</option>
                  <option value="3">3</option>
                </select>
              </div>
              <div class="col-9 col-sm-4 mt-1">
                <select id="region" class="form-control">
                  <option value="" disabled selected>鄉鎮區域</option>
                  <option value="1">1</option>
                  <option value="2">2</option>
                  <option value="3">3</option>
                </select>
              </div>
              <div class="d-none d-sm-inline-block col-sm-2 mt-1">
                <input type="text" class="form-control" id="ZIP" placeholder="231">
              </div>
              <div class="col-9 col-sm-10 mt-1">
                <input type="text" class="form-control" id="addressDetail" placeholder="安祥路388巷588號1樓">
              </div>
            </div>
            <div class="form-group row mb-2">
              <label for="receipientTel" class="col-3 col-sm-2 col-form-label">電話</label>
              <div class="col-9 col-sm-10">
                <input type="text" class="form-control" id="receipientTel" placeholder="0927775101">
              </div>
            </div>
            <div class="row my-2 justify-content-center">
              <button type="button" class="btn btn-info mx-2">確認</button>
              <button type="button" class="btn btn-secondary mx-2" data-dismiss="modal">取消</button>
            </div>
          </form>
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