<?php

use App\Models\Category;
use Illuminate\Database\Seeder;

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
        for ($i = 0; $i < 20; $i++) {
            $category = factory(Category::class)->make();
            if ($i < 4 || $i == 15) {
                $category->parent = 0;
                $category->title = "Parent" . $i;
                $category->order = $i;
            } else {
                $category->title = "Child" . $i;
                $category->order = Category::where('parent', $category->parent)->count() + 1;
            }
            $category->save();
        }
    }
}
