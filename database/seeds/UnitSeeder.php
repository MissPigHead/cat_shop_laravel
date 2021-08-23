<?php

use App\Models\Unit;
use Illuminate\Database\Seeder;


class UnitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $n=['罐','打','袋','箱','箱'];
        $d=['','12入','4入','24入','60入'];
        for ($i=0; $i < 5; $i++) {
            $u=Unit::make();
            $u->name=$n[$i];
            $u->description=$d[$i];
            $u->save();
        }
    }
}
