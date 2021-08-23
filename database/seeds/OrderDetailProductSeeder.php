<?php

use Illuminate\Database\Seeder;
use App\Models\OrderDetailProduct;
use App\Models\OrderDetail;


class OrderDetailProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        OrderDetailProduct::truncate();
        $num = OrderDetail::count();
        for ($i = 0; $i < $num; $i++) {
            $p_id = OrderDetail::find($i + 1)->product_id;
            $o = OrderDetailProduct::make();
            $o->order_detail_id = $i + 1;
            $o->product_id = $p_id;
            $o->save();
        }
    }
}
