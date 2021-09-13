<?php

use Illuminate\Database\Seeder;

class PostCodesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $url = base_path() . '/app/Custom/SQL/postcodes.sql';
        $sql_file = file_get_contents($url);
        DB::unprepared($sql_file);
    }
}
