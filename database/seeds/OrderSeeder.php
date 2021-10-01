<?php

use Illuminate\Database\Seeder;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Recipient;
use Illuminate\Support\Str;
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
            $r_id=rand(1,20);
            $o->user_id = Recipient::find($r_id)->user_id;
            $o->recipient_id = $r_id;
            $o->ECPay_MerchantTradeNo = substr(Str::uuid(),4,24);
            $o->amount_raw = $o->amount_total = OrderDetail::where('order_id', $i + 1)->sum('amount');
            $o->save();
        }
    }
}
