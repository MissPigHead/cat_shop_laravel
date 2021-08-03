@extends('layouts.frontend')
@section('title','這裡是文章標題')
@section('content')
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
@endsection