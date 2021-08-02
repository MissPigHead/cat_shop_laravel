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
    <section id="news">
      <div class="container my-4">
        <div class="row justify-content-center">
          <div class="col-12 col-md-10 mt-4">
            <h4>育貓新知</h4>
          </div>
          <!-- 目前內容 -->
          <div class="col-12 col-md-10 col-lg-8 my-4">
            <h5 class="text-dark">愛牠就別給牠戴綠帽！美女獸醫：貓狗戴「柚帽」恐引起中毒</h5>
            <img src="../image/news/001.jpg" class="w-100">
            <p class="text-secondary text-justify newsText">
              中秋佳節將至，民眾剝食柚子，常會將帶有清香的柚子皮製成柚子帽戴在頭上，甚至會戴在寵物頭上，覺得非常可愛。對此，擁有美國、澳洲、台灣三國獸醫師執照的獸醫師Dr. Lan提醒，柚子皮成份對貓咪狗狗有毒，呼籲民眾避免讓寵物戴柚子帽，以免對寵物造成負面影響。
            </p>
            <p class="text-secondary text-justify newsText">
              獸醫師Dr.Lan今日在臉書專頁「我不醫人- Dr. Lan」 發文提醒，中秋節即將來臨，民眾食用柚子時應注意，「柚子皮對狗狗貓貓是有毒的喔，引起中毒的成份包括 Essential Oils（精油）和Psoralen（補骨脂素），上吐下瀉是最常出現的症狀，也可能出現精神不好的狀況，接觸的皮膚可能會產生光敏感性皮膚炎」。
            </p>
            <p class="text-secondary text-justify newsText">
              Dr.Lan指出，「雖然中毒都有所謂的中毒劑量，需要食入一定量或與皮膚接觸一定的時間才會出現症狀，但請大家不要刻意嘗試喔。」
            </p>
            <p class="text-secondary text-justify newsText">
              Dr.Lan也提醒，貓咪尤其不喜歡柑橘類的刺激性氣味，容易造成貓咪的負面情緒。
            </p>
          </div>
          <!-- 清單 -->
          <ul class="col-12 col-md-10 list-group list-group-flush">
            <li class="list-group-item bg-transparent">
            <a href="newsDetail.html">「柚子帽」氣味貓最恨　柑橘油恐引發過敏甚至中毒</a>
            </li>
            <li class="list-group-item bg-transparent">
              <a href="newsDetail.html">愛牠就別給牠戴綠帽！美女獸醫：貓狗戴「柚帽」恐引起中毒</a>
            </li>
            <li class="list-group-item bg-transparent">
              <a href="newsDetail.html">寵物知識+／怎樣能和傲驕貓咪當朋友？獸醫教你得寵5個撇步</a>
            </li>
            <li class="list-group-item bg-transparent">
              <a href="newsDetail.html">貓貓冷知識｜貓咪喜歡把飼料叼出碗外？背後藏兩大原因</a>
            </li>
            <li class="list-group-item bg-transparent">
              <a href="newsDetail.html">愛牠就別給牠戴綠帽！美女獸醫貓狗戴「柚帽」恐引起中毒</a>
            </li>
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