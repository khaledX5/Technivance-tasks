<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\CartService;
use Validator;
class CartsController extends Controller
{
    use CartService;

    function view(){//done
        $customer_id = 886;
       return $this->getAllCarts($customer_id);
    }
    
    function create(Request $request){//done
        $validator = Validator::make($request->all(), [
            'items' => 'required|array',
        ]);
        if ($validator->fails()) {
            return "error"; 
        }
        return $this->addToCart($request);
    }

    function delete($id, Request $request){
        //done
        $customer_id = 886;
        return $this->deleteFromCart($id, $customer_id);
    }

    function update($id , Request $request){
        $customer_id = 886;
        return $this->updateCart($id, $customer_id, $request->quantity);
    }

}
