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
        <div class="col-12 col-md-9 col-lg-7 col-xl-6 text-center">
          <div class="row mt-4 mb-sm-2">
            <div class="col">
              <h4>歷史訂單</h4>
            </div>
          </div>

          <!-- 訂單清單 -->
          <table class="table table-bordered">
            <thead class="thead-light">
              <tr>
                <th scope="col" class="col-3">訂單編號</th>
                <th scope="col" class="col-2">訂單日期</th>
                <th scope="col" class="col-5">品項</th>
                <th scope="col" class="col-2">金額</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>
                  <a href="orderDetail.html">
                    202101010001
                  </a>
                </td>
                <td>2021-01-01</td>
                <td class="text-left">
                  <ul class="list-group list-group-flush">
                    <li class="list-group-item py-1 px-2 bg-transparent">小茜豆腐砂小茜豆腐砂1</li>
                    <li class="list-group-item py-1 px-2 bg-transparent">小茜豆腐砂小茜豆腐砂2 in</li>
                    <li class="list-group-item py-1 px-2 bg-transparent">小茜豆腐砂小茜豆腐砂3</li>
                    <li class="list-group-item py-1 px-2 bg-transparent">小茜豆腐砂小茜豆腐砂4 ac</li>
                    <li class="list-group-item py-1 px-2 bg-transparent">小茜豆腐砂小茜豆腐砂5</li>
                    <li class="list-group-item py-1 px-2 bg-transparent">...</li>
                  </ul>
                </td>
                <td>NT$ <span>2500</span></td>
              </tr>
              <tr>
                <td>
                  <a href="orderDetail.html">
                    20210101001
                  </a>
                </td>
                <td>2021-01-01</td>
                <td class="text-left">
                  <ul class="list-group list-group-flush">
                    <li class="list-group-item py-1 px-2 bg-transparent">小茜豆腐砂小茜豆腐砂1</li>
                    <li class="list-group-item py-1 px-2 bg-transparent">小茜豆腐砂小茜豆腐砂2 in</li>
                    <li class="list-group-item py-1 px-2 bg-transparent">小茜豆腐砂小茜豆腐砂3</li>
                    <li class="list-group-item py-1 px-2 bg-transparent">小茜豆腐砂小茜豆腐砂4 ac</li>
                    <li class="list-group-item py-1 px-2 bg-transparent">小茜豆腐砂小茜豆腐砂5</li>
                    <li class="list-group-item py-1 px-2 bg-transparent">...</li>
                  </ul>
                </td>
                <td>NT$ <span>125000</span></td>
              </tr>
              <tr>
                <td>
                  <a href="productDetail.html">20210505005</a>
                </td>
                <td>2021-05-05</td>
                <td class="text-left">
                  <ul class="list-group list-group-flush">
                    <li class="list-group-item py-1 px-2 bg-transparent">超越巔峰無穀貓糧鮭魚鹿肉4LB 1</li>
                    <li class="list-group-item py-1 px-2 bg-transparent">超越巔峰無穀貓糧鮭魚鹿肉4LB 2 in</li>
                    <li class="list-group-item py-1 px-2 bg-transparent">超越巔峰無穀貓糧鮭魚鹿肉4LB 3</li>
                  </ul>
                </td>
                <td>NT$ <span>2500</span></td>
              </tr>
            </tbody>
          </table>

          <!-- 返回 -->
          <a href="products.html">
            <button type="button" class="btn btn-info m-2"><i class="fas fa-chevron-right"></i> 繼續購物</button>
          </a>
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