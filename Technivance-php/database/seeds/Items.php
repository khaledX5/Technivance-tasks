<?php
use App\Item;
use Illuminate\Database\Seeder;

class Items extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        Item::insert([
            'id' => 885,
            'name' => 'orange',
            'description' => 'orange with orange color from Benha .',
            'price' => 2,
        ]);
        Item::insert([
            'id' => 884,
            'name' => 'apple',
            'description' => 'apple with red color from Alex .',
            'price' => 5,
        ]);
        Item::insert([
            'id' => 883,
            'name' => 'kiwi',
            'description' => 'kiwi with dark green color from Moroco .',
            'price' => 10,
        ]);
        Item::insert([
            'id' => 882,
            'name' => 'Mango',
            'description' => 'Mango with yellow color from Ismalia  .',
            'price' => 5,
        ]);
    }
}
