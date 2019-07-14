<?php
namespace App\Services;
use App\Item;

trait ItemService {
    function getAllItems($request){
        $limit = $request->limit ? $request->limit : 10 ; 
        return Item::paginate($limit);
    }
}