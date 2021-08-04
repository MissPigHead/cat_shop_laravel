<?php

use Illuminate\Database\Seeder;
use App\Models\News; // 之後應該要整理到 App\Models\News;

class NewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // News::truncate(); // 清空所有表格資料
        // News::unguard(); 
        // 若在Model中有 $guarded 的資料 用 Model::unguard() 暫時解除該屬性 處理批量賦值
        factory(News::class, 30)->create();
        // News::reguard(); 
        // 記得要加上 Model::reguard() 恢復原本$guaded 的屬性 
    }
}
