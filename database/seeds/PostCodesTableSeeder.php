<?php

use Illuminate\Database\Seeder;

class PostcodesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $url = app_path() . '/SQL/postcodes.sql';
        $sql_file = file_get_contents($url);
        DB::unprepared($sql_file);
    }
}
