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
              <h4>購物車</h4>
            </div>
          </div>
          <!-- 一組商品 -->
          <div class="row mb-2 mb-md-3 bg-white align-items-center justify-content-sm-between">
            <div class="col-4 col-sm-3">
              <img src="https://fakeimg.pl/500x500/acdefa" class="w-100 my-0 my-sm-2 mylg-3">
            </div>
            <div class="col-8 col-sm-9 row align-items-center justify-content-end px-0 px-sm-3 text-secondary">
              <div class="col-9 col-md-10 col-lg-12 py-lg-2 order-lg-1 h6">
                <span>小茜豆腐砂</span>
              </div>
              <div class="col-3 col-md-2 order-lg-5 text-sm-right">
                <button type="button" class="btn btn-outline-secondary">
                  <i class="fas fa-trash-alt"></i>
                </button>
              </div>
              <div class="col-8 col-sm-5 order-lg-2 col-lg-4">
                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text px-1 px-sm-2" id="addQty">+</span>
                  </div>
                  <div class="custom-file">
                    <input type="number" name="" id="" value="2" min="1" max="38" class="form-control px-1 px-sm-2 text-center">
                  </div>
                  <div class="input-group-append">
                    <span class="input-group-text px-1 px-sm-2" id="decQty">-</span>
                  </div>
                </div>
              </div>
              <div class="col-4 col-sm-2 order-lg-3 text-right">
                *<span>12500</span>
              </div>
              <div class="col-12 col-sm-5 col-lg-4 order-lg-4 text-right">
                小計：<span class="h6 text-pink">25000</span>
              </div>
            </div>
          </div>
          <!-- 一組商品 -->
          <div class="row mb-2 mb-md-3 bg-white align-items-center justify-content-sm-between">
            <div class="col-4 col-sm-3">
              <img src="https://fakeimg.pl/500x500/acdefa" class="w-100 my-0 my-sm-2 mylg-3">
            </div>
            <div class="col-8 col-sm-9 row align-items-center justify-content-end px-0 px-sm-3 text-secondary">
              <div class="col-9 col-md-10 col-lg-12 py-lg-2 order-lg-1 h6">
                <span>小茜豆腐砂</span>
              </div>
              <div class="col-3 col-md-2 order-lg-5 text-sm-right">
                <button type="button" class="btn btn-outline-secondary">
                  <i class="fas fa-trash-alt"></i>
                </button>
              </div>
              <div class="col-8 col-sm-5 order-lg-2 col-lg-4">
                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text px-1 px-sm-2" id="addQty2">+</span>
                  </div>
                  <div class="custom-file">
                    <input type="number" name="" id="" value="2" min="1" max="38" class="form-control px-1 px-sm-2 text-center">
                  </div>
                  <div class="input-group-append">
                    <span class="input-group-text px-1 px-sm-2" id="decQty2">-</span>
                  </div>
                </div>
              </div>
              <div class="col-4 col-sm-2 order-lg-3 text-right">
                *<span>12500</span>
              </div>
              <div class="col-12 col-sm-5 col-lg-4 order-lg-4 text-right">
                小計：<span class="h6 text-pink">25000</span>
              </div>
            </div>
          </div>
          <!-- 一組商品 -->
          <div class="row mb-2 mb-md-3 bg-white align-items-center justify-content-sm-between">
            <div class="col-4 col-sm-3">
              <img src="https://fakeimg.pl/500x500/acdefa" class="w-100 my-0 my-sm-2 mylg-3">
            </div>
            <div class="col-8 col-sm-9 row align-items-center justify-content-end px-0 px-sm-3 text-secondary">
              <div class="col-9 col-md-10 col-lg-12 py-lg-2 order-lg-1 h6">
                <span>小茜豆腐砂</span>
              </div>
              <div class="col-3 col-md-2 order-lg-5 text-sm-right">
                <button type="button" class="btn btn-outline-secondary">
                  <i class="fas fa-trash-alt"></i>
                </button>
              </div>
              <div class="col-8 col-sm-5 order-lg-2 col-lg-4">
                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text px-1 px-sm-2" id="addQty3">+</span>
                  </div>
                  <div class="custom-file">
                    <input type="number" name="" id="" value="2" min="1" max="38" class="form-control px-1 px-sm-2 text-center">
                  </div>
                  <div class="input-group-append">
                    <span class="input-group-text px-1 px-sm-2" id="decQty3">-</span>
                  </div>
                </div>
              </div>
              <div class="col-4 col-sm-2 order-lg-3 text-right">
                *<span>12500</span>
              </div>
              <div class="col-12 col-sm-5 col-lg-4 order-lg-4 text-right">
                小計：<span class="h6 text-pink">25000</span>
              </div>
            </div>
          </div>
          <!-- 一組商品 -->
          <div class="row mb-2 mb-md-3 bg-white align-items-center justify-content-sm-between">
            <div class="col-4 col-sm-3">
              <img src="https://fakeimg.pl/500x500/acdefa" class="w-100 my-0 my-sm-2 mylg-3">
            </div>
            <div class="col-8 col-sm-9 row align-items-center justify-content-end px-0 px-sm-3 text-secondary">
              <div class="col-9 col-md-10 col-lg-12 py-lg-2 order-lg-1 h6">
                <span>小茜豆腐砂</span>
              </div>
              <div class="col-3 col-md-2 order-lg-5 text-sm-right">
                <button type="button" class="btn btn-outline-secondary">
                  <i class="fas fa-trash-alt"></i>
                </button>
              </div>
              <div class="col-8 col-sm-5 order-lg-2 col-lg-4">
                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text px-1 px-sm-2" id="addQty4">+</span>
                  </div>
                  <div class="custom-file">
                    <input type="number" name="" id="" value="2" min="1" max="38" class="form-control px-1 px-sm-2 text-center">
                  </div>
                  <div class="input-group-append">
                    <span class="input-group-text px-1 px-sm-2" id="decQty4">-</span>
                  </div>
                </div>
              </div>
              <div class="col-4 col-sm-2 order-lg-3 text-right">
                *<span>12500</span>
              </div>
              <div class="col-12 col-sm-5 col-lg-4 order-lg-4 text-right">
                小計：<span class="h6 text-pink">25000</span>
              </div>
            </div>
          </div>
          <!-- 一組商品 -->
          <div class="row mb-2 mb-md-3 bg-white align-items-center justify-content-sm-between">
            <div class="col-4 col-sm-3">
              <img src="https://fakeimg.pl/500x500/acdefa" class="w-100 my-0 my-sm-2 mylg-3">
            </div>
            <div class="col-8 col-sm-9 row align-items-center justify-content-end px-0 px-sm-3 text-secondary">
              <div class="col-9 col-md-10 col-lg-12 py-lg-2 order-lg-1 h6">
                <span>小茜豆腐砂</span>
              </div>
              <div class="col-3 col-md-2 order-lg-5 text-sm-right">
                <button type="button" class="btn btn-outline-secondary">
                  <i class="fas fa-trash-alt"></i>
                </button>
              </div>
              <div class="col-8 col-sm-5 order-lg-2 col-lg-4">
                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text px-1 px-sm-2" id="addQty5">+</span>
                  </div>
                  <div class="custom-file">
                    <input type="number" name="" id="" value="2" min="1" max="38" class="form-control px-1 px-sm-2 text-center">
                  </div>
                  <div class="input-group-append">
                    <span class="input-group-text px-1 px-sm-2" id="decQty5">-</span>
                  </div>
                </div>
              </div>
              <div class="col-4 col-sm-2 order-lg-3 text-right">
                *<span>12500</span>
              </div>
              <div class="col-12 col-sm-5 col-lg-4 order-lg-4 text-right">
                小計：<span class="h6 text-pink">25000</span>
              </div>
            </div>
          </div>
          <!-- 總金額 -->
          <div class="row">
            <div class="col-12 text-right">
              <p class="h5">總金額：<span class="text-pink">125000</span></p>
            </div>
          </div>
          <!-- 結帳 -->
          <div class="row my-2 justify-content-center">
            <button type="button" class="btn btn-secondary m-2"><i class="fas fa-undo-alt"></i> 繼續購物</button>
            <button type="button" class="btn btn-secondary m-2"><i class="fas fa-trash-alt"></i> 清空購物車</button>
            <a href="order.html">
              <button type="button" class="btn btn-info m-2"><i class="fas fa-chevron-right"></i> 前往結帳</button>
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