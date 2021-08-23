<?php

use Illuminate\Database\Seeder;
use App\Models\OrderDetail;
use App\Models\Product;

class OrderDetailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        OrderDetail::truncate();
        for ($i = 0; $i < 10; $i++) {
            $itemNum = rand(1, 10);
            for ($j = 0; $j < $itemNum; $j++) {
                $orderDetail = OrderDetail::make();
                $p_id = rand(1, 50);
                $q = rand(1, 5);
                $price = Product::find($p_id)->price;
                $orderDetail->order_id = $i + 1;
                $orderDetail->product_id = $p_id;
                $orderDetail->quantity = $q;
                $orderDetail->price = $price;
                $orderDetail->amount = $q * $price;
                $orderDetail->save();
            }
        }
    }
}
