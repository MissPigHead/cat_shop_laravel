@extends('layouts.frontend')
@section('title','育貓新知')
@section('content')
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
    <section id="news">
      <div class="container my-4">
        <div class="row my-2">
          <div class="col">
            <h4>育貓新知</h4>
          </div>
        </div>
        <div class="row justify-content-center">
          <!-- 清單 -->
          <ul class="col-12 col-md-10 list-group list-group-flush px-3">
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
@endsection