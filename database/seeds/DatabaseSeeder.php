<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);
        $this->call(BannerSeeder::class);
        $this->call(CategorySeeder::class);
        $this->call(NewsSeeder::class);
        $this->call(ProductSeeder::class);
        $this->call(RecipientSeeder::class);
        $this->call(OrderDetailSeeder::class);
        $this->call(OrderDetailProductSeeder::class);
        $this->call(OrderSeeder::class);
        $this->call(UnitSeeder::class);
    }
}
