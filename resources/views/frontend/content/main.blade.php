@extends('frontend.frame')
@section('title','喵喵商城首頁')
@section('content')
  <main>
    <section id="banner">
      <div class="container my-3">
        <div class="row justify-content-center">
          <div class="owl-carousel owl-theme">
            <div class="item"><img src="image/Banner01.jpg" alt="cat pic"></div>
            <div class="item"><img src="image/Banner02.jpg" alt="cat pic"></div>
          </div>
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
@stop