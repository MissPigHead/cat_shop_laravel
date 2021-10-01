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
        $banners = factory(Banner::class, 4)->make();
        foreach ($banners as $b) {
            $i = rand(3,10);
            $b->order = $i;
            $b->save();
        }
        Banner::create([
            'image_path'=>'/image/Banner01.jpg',
            'show'=>1,
            'order'=>1,
        ]);
        Banner::create([
            'image_path'=>'/image/Banner02.jpg',
            'show'=>1,
            'order'=>1,
        ]);
    }
}
