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
        <a class="navbar-brand" href="index.html">
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
    <section id="banner">
      <div class="container my-3">
        <div class="row justify-content-center">
          <div class="owl-carousel owl-theme">
            <div class="item"><img src="../image/banner/Banner01.jpg" alt="cat pic"></div>
            <div class="item"><img src="../image/banner/Banner02.jpg" alt="cat pic"></div>
          </div>
          <!-- <div class="owl-carousel owl-theme">
          </div> -->
        </div>
      </div>
    </section>
    <script> // owl carousel   for banner
      $('.owl-carousel').owlCarousel({
        loop:true,
        dots:true,
        autoplay:true,
        center: true,
        items:1,
        animateOut: 'fadeOut',
      });
    </script>
    <section id="products">
      <div class="container my-4">
        <div class="row my-2">
          <div class="col">
            <h4>最新商品</h4>
          </div>
        </div>
        <div class="row">
          <div class="col-6 col-md-4 col-lg-3 text-center">
            <img src="https://fakeimg.pl/500x500/acedfa" class="w-100">
            <h6 class="mt-2 text-gray">豆腐砂</h6>
            <p class="mb-2">小茜豆腐砂</p>
            <p class="font-weight-bolder text-danger">NT$ 250</p>
          </div>
          <div class="col-6 col-md-4 col-lg-3 text-center">
            <img src="https://fakeimg.pl/500x500/cedfaa" class="w-100">
            <h6 class="mt-2 text-gray">豆腐砂</h6>
            <p class="mb-2">小茜豆腐砂</p>
            <p class="font-weight-bolder text-danger">NT$ 250</p>
          </div>
          <div class="col-6 col-md-4 col-lg-3 text-center">
            <img src="https://fakeimg.pl/500x500/bafafe" class="w-100">
            <h6 class="mt-2 text-gray">豆腐砂</h6>
            <p class="mb-2">小茜豆腐砂</p>
            <p class="font-weight-bolder text-danger">NT$ 250</p>
          </div>
          <div class="col-6 col-md-4 col-lg-3 text-center">
            <img src="https://fakeimg.pl/500x500/edfaed" class="w-100">
            <h6 class="mt-2 text-gray">豆腐砂</h6>
            <p class="mb-2">小茜豆腐砂</p>
            <p class="font-weight-bolder text-danger">NT$ 250</p>
          </div>
          <div class="col-6 col-md-4 col-lg-3 text-center">
            <img src="https://fakeimg.pl/500x500/acedfa" class="w-100">
            <h6 class="mt-2 text-gray">豆腐砂</h6>
            <p class="mb-2">小茜豆腐砂</p>
            <p class="font-weight-bolder text-danger">NT$ 250</p>
          </div>
          <div class="col-6 col-md-4 col-lg-3 text-center">
            <img src="https://fakeimg.pl/500x500/cedfaa" class="w-100">
            <h6 class="mt-2 text-gray">豆腐砂</h6>
            <p class="mb-2">小茜豆腐砂</p>
            <p class="font-weight-bolder text-danger">NT$ 250</p>
          </div>
          <div class="col-6 col-md-4 col-lg-3 text-center d-none d-lg-block">
            <img src="https://fakeimg.pl/500x500/bafafe" class="w-100">
            <h6 class="mt-2 text-gray">豆腐砂</h6>
            <p class="mb-2">小茜豆腐砂</p>
            <p class="font-weight-bolder text-danger">NT$ 250</p>
          </div>
          <div class="col-6 col-md-4 col-lg-3 text-center d-none d-lg-block">
            <img src="https://fakeimg.pl/500x500/edfaed" class="w-100">
            <h6 class="mt-2 text-gray">豆腐砂</h6>
            <p class="mb-2">小茜豆腐砂</p>
            <p class="font-weight-bolder text-danger">NT$ 250</p>
          </div>
        </div>
      </div>
    </section>
    <section id="news">
      <div class="container my-4">
        <div class="row my-2">
          <div class="col">
            <h4>育貓新知</h4>
          </div>
        </div>
        <div class="row justify-content-center">
          <ul class="col-12 col-md-10 list-group list-group-flush px-3">
            <li class="list-group-item bg-transparent">「柚子帽」氣味貓最恨　柑橘油恐引發過敏甚至中毒</li>
            <li class="list-group-item bg-transparent">愛牠就別給牠戴綠帽！美女獸醫：貓狗戴「柚帽」恐引起中毒</li>
            <li class="list-group-item bg-transparent">寵物知識+／怎樣能和傲驕貓咪當朋友？獸醫教你得寵5個撇步</li>
            <li class="list-group-item bg-transparent">貓貓冷知識｜貓咪喜歡把飼料叼出碗外？背後藏兩大原因</li>
            <li class="list-group-item bg-transparent">愛牠就別給牠戴綠帽！美女獸醫：貓狗戴「柚帽」恐引起中毒</li>
          </ul>
        </div>
      </div>
    </section>
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