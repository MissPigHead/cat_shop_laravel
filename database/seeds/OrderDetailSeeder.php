<?php

use Illuminate\Database\Seeder;
use App\Models\OrderDetail;

class OrderDetailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    // {
    //     OrderDetail::truncate();
    //     for ($i = 0; $i < 10; $i++) {
    //         $orderDetail = OrderDetail::make();
    //         $p_id = rand(1, 50);
    //         $q = rand(1, 3);
    //         $price = Product::find($p_id)->price;
    //         $orderDetail->order_id = $i+1;
    //         $orderDetail->product_id = $p_id;
    //         $orderDetail->quantity = $q;
    //         $orderDetail->price = $price;
    //         $orderDetail->amount = $q * $price;
    //             $orderDetail->save();
    //     }
    // }
    {
        OrderDetail::truncate();
        for ($i = 0; $i < 10; $i++) {
            $num = rand(1, 10);
            for ($j = 0; $j < $num; $j++) {
                $orderDetail = factory(OrderDetail::class)->make();
                $orderDetail->order_id = $i+1;
                $orderDetail->save();
            }
        }
    }
}
