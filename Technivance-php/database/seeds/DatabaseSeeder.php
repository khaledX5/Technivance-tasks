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
        $this->call(Items::class);
        $this->call(carts::class);
        $this->call(customer_seeder::class);
    }
}
