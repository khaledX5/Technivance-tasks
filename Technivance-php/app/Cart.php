<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $table = 'carts';
    public function item()
    {
        return $this->belongsTo('App\Item', 'item_id');
    }
    public function customer()
    {
        return $this->belongsTo('App\Customer', 'customer_id');
    }
    
}
