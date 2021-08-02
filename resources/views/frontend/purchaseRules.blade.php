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
  <link
  rel="stylesheet"
  href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"
/>
  <link href="../css/css-front.css" rel="stylesheet" />
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="../plugin/owlcarousel/owl.carousel.js"></script>
  <title>Frontend</title>
</head>

<body>
  <header>
    <div class="container">
      <nav class="navbar navbar-expand-lg navbar-light bg-yellow01 px-2">
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
                <h4>購物說明</h4>
              </div>
            </div>

            <div class="accordion text-secondary" id="rules">
              <div class="card">
                <div class="card-header" id="title001">
                  <h2 class="mb-0">
                    <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#content001" aria-expanded="true" aria-controls="collapseOne">
                      付款方式
                    </button>
                  </h2>
                </div>
            
                <div id="content001" class="collapse" aria-labelledby="title001" data-parent="#rules">
                  <div class="card-body">
                    <ol>
                      <li>ATM自動櫃檯機轉帳</li>
                      <li>信用卡</li>
                    </ol>
                  </div>
                </div>
              </div>
              <div class="card">
                <div class="card-header" id="title002">
                  <h2 class="mb-0">
                    <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#content002" aria-expanded="true" aria-controls="collapseOne">
                      出貨時間與交貨方式
                    </button>
                  </h2>
                </div>
                <div id="content002" class="collapse" aria-labelledby="title002" data-parent="#rules">
                  <div class="card-body">
                    <ol>
                      <li>現貨商品完成付款的5個工作天內寄出，約寄出3天後可到貨</li>
                      <li>交貨方式 : 郵局包裹或黑貓宅急便</li>
                      <li>送貨範圍 : 黑貓宅急便限台灣本島地區，外島請選擇郵局</li>
                    </ol>
                  </div>
                </div>
              </div>
              <div class="card">
                <div class="card-header" id="title003">
                  <h2 class="mb-0">
                    <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#content003" aria-expanded="true" aria-controls="collapseOne">
                      運費說明及免運門檻
                    </button>
                  </h2>
                </div>
            
                <div id="content003" class="collapse" aria-labelledby="title001" data-parent="#rules">
                  <div class="card-body">
                    <ol>
                      <li>不分郵局或黑貓，運費一律150元</li>
                      <li>滿2000元即可免運</li>
                      <li class="text-danger">慶祝開幕，目前滿1000元即可免運</li>
                    </ol>
                  </div>
                </div>
              </div>
              <div class="card">
                <div class="card-header" id="title004">
                  <h2 class="mb-0">
                    <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#content004" aria-expanded="true" aria-controls="collapseOne" disabled>
                      退貨方式說明
                    </button>
                  </h2>
                </div>
            
                <div id="content004" class="collapse" aria-labelledby="title001" data-parent="#rules">
                  <div class="card-body">
                  </div>
                </div>
              </div>
            </div>
    

          </div>
        </div>
      </div>
  </main>
  <!-- footer -->
  <footer>
    <div class="container">
      <div class="row justify-content-center py-3">
        <p>Copyright © Lingling Chang a.k.a. MissPigHead 2021</p>
      </div>
    </div>
  </footer>
  <!-- script -->
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>