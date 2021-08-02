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
          <!-- <form class="form-inline my-2 my-lg-0">
            <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-info my-2 my-sm-0" type="submit"><i class="fas fa-search"></i></button>
          </form> -->
        </div>
      </nav>
  
    </div>
  </header>
  <!-- main -->
  <main>
    <div class="container">
      <div class="row my-4">
        <div class="col-12 col-sm-3">
          <ul class="list-group">
            <li class="list-group-item list-group-item-danger">所有商品</li>
            <li class="list-group-item list-group-item-warning">專業食糧</li>
            <li class="list-group-item list-group-item-warning">零食</li>
            <li class="list-group-item list-group-item-warning">貓砂</li>
            <li class="list-group-item list-group-item-light">礦砂</li>
            <li class="list-group-item list-group-item-light">豆腐砂</li>
            <li class="list-group-item list-group-item-light">松木砂</li>
            <li class="list-group-item list-group-item-warning">玩具</li>
            <li class="list-group-item list-group-item-warning">生活用品</li>
          </ul>
        </div>
        <div class="col-12 col-sm-9 px-sm-0">
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="#">所有商品</a></li>
              <li class="breadcrumb-item"><a href="#">貓砂</a></li>
              <li class="breadcrumb-item active" aria-current="page">豆腐砂</li>
            </ol>
          </nav>
          <div class="row justify-content-end">
            <div class="col-6 col-md-5">
              <img src="https://fakeimg.pl/500x500/cedfaa" class="w-100">
            </div>
            <div class="col-6 col-md-7 pl-0 pl-sm-2 d-flex flex-column justify-content-center">
              <p class="my-0 my-1">品名：<span>小茜豆腐砂</span></p>
              <p class="my-0 my-1">規格：<span>6L</span></p>
              <p class="my-0 my-1">單位：<span>包</span></p>
              <!-- <p class="my-0 my-1">保存期限：<span>出廠24個月</span></p> -->
              <p class="my-0 my-1">庫存量：<span>38</span></p>
              <p class="my-0 my-1">
                價格：<span class="font-weight-bolder text-danger">NT$ 250</span>
                <p class="my-0 my-1">
                  訂購：
                  <input type="number" name="" id="" value="1" size="3" min="1" max="38">
                  <!-- <span>包</span> -->
                  <a href="cart.html">
                    <button class="btn text-pink my-2 my-sm-0" type="submit">
                      <i class="fas fa-cart-plus fa-2x"></i>
                    </button>
                  </a>
                </p>
              </p>
            </div>
            <div class="col-12 col-md-7 pt-2 pl-md-2">
              <p class="text-justify">結合太陽具體姑娘帝國文化影音常見不僅我還，答應快捷深入可見生成幽默消費者曝光徹底總數國務院，經銷商行情，可惜很少為何您是國家，技能公主加拿大不滿獲取商業運作在那裡環保承擔，微笑來的接到顧問，連續站在像素，本站天堂浪費移動億元特色一種，行為走到新臺幣清楚寶。</p>
            </div>
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