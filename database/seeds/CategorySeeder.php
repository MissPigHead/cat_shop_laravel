<?php

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::truncate(); // 清空所有表格資料
        for ($i=0; $i <30 ; $i++) { 
            $category=factory(Category::class)->make();
            if($i<4 || $i==15 || $i==25){
                $category->parent = 0;
            }
            $category->order = Category::where('parent',$category->parent)->count()+1;
            $category->save();
        }
    }
}
