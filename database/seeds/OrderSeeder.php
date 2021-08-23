<?php

use Illuminate\Database\Seeder;
use App\Models\Order;
use App\Models\OrderDetail;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Order::truncate();
        for ($i = 0; $i < 10; $i++) {
            $o = Order::make();
            $o->amount_raw = $o->amount_total = OrderDetail::where('order_id', $i + 1)->sum('amount');
            $o->recipient_id = rand(1, 20);
            $o->save();
        }
    }
}
