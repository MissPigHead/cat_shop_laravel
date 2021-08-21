<?php

use Illuminate\Database\Seeder;
use App\Models\Recipient;

class RecipientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Recipient::truncate();
        factory(Recipient::class, 10)->create();
    }
}
