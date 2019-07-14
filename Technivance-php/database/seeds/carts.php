<?php
use App\Cart;

use Illuminate\Database\Seeder;

class carts extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Cart::insert([
            'item_id' => 885,
            'customer_id' => 886,
            'quantity' => 2,
        ]);
        Cart::insert([
            'item_id' => 884,
            'customer_id' => 886,
            'quantity' => 3,
        ]);
    }
}
