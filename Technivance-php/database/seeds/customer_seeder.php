<?php

use Illuminate\Database\Seeder;
use App\Customer;

class customer_seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         Customer::insert([
            'id' => 886,
            'first_name' => "khaled",
            'last_name' => "karam",
            'store_credit' => 100,
            'email' => 'khaled@tech.com',
            'password' => bcrypt('12345'),
        ]);  
    }
}
