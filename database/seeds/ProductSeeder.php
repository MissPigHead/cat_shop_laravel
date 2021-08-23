<?php

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Product::truncate();
        for ($i = 0; $i < 50; $i++) {
            $product = factory(Product::class)->make();
            $product->order = Product::where('category_id', $product->category_id)->count() + 1;
            $product->save();
        }
    }
}
