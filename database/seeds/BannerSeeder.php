<?php

use Illuminate\Database\Seeder;
use App\Models\Banner;
class BannerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      Banner::truncate(); 
      $banners=factory(Banner::class, 6)->make();
      $i=2;
      foreach($banners as $b){
        $b->order=$i;
        $b->save();
        $i++;
      }
    }
}
