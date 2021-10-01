<?php

use Illuminate\Database\Seeder;
use App\Models\News;

class NewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        News::truncate();
        News::create([
            'title' => '愛牠就別給牠戴綠帽！美女獸醫：貓狗戴「柚帽」恐引起中毒',
            'article' => '中秋佳節將至，民眾剝食柚子，常會將帶有清香的柚子皮製成柚子帽戴在頭上，甚至會戴在寵物頭上，覺得非常可愛。對此，擁有美國、澳洲、台灣三國獸醫師執照的獸醫師Dr. Lan提醒，柚子皮成份對貓咪狗狗有毒，呼籲民眾避免讓寵物戴柚子帽，以免對寵物造成負面影響。</br>獸醫師Dr.Lan今日在臉書專頁「我不醫人- Dr. Lan」 發文提醒，中秋節即將來臨，民眾食用柚子時應注意，「柚子皮對狗狗貓貓是有毒的喔，引起中毒的成份包括 Essential Oils（精油）和Psoralen（補骨脂素），上吐下瀉是最常出現的症狀，也可能出現精神不好的狀況，接觸的皮膚可能會產生光敏感性皮膚炎」。</br>Dr.Lan指出，「雖然中毒都有所謂的中毒劑量，需要食入一定量或與皮膚接觸一定的時間才會出現症狀，但請大家不要刻意嘗試喔。」</br>Dr.Lan也提醒，貓咪尤其不喜歡柑橘類的刺激性氣味，容易造成貓咪的負面情緒。',
            'image_path' => '/image/news001.jpg',
            'show' => 1,
        ]);
        factory(News::class, 10)->create();
    }
}
