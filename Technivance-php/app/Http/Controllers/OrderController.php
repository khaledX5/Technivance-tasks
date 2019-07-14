<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;
use App\Services\OrderService;
use App\Services\CustomerService;
use App\Services\CartService;
class OrderController extends Controller{
    use OrderService;
    use CustomerService;
    use CartService;
    function confirm(Request $request){
        $error_messsage = new \stdClass();

        $current_store_credit = $this->getTotalPurchase();
        if($current_store_credit[0]['total'] == null)  {
             $error_messsage->error =  'you do not have any items in your cart';
             return response()->json($error_messsage);
        }
        if($this->isCustomerHasEnoughCredit($current_store_credit[0]['total']))
            return  $this->confirmOrder($request , $current_store_credit[0]['total']);
        $error_messsage->error =  'you do not have enough credit to confirm order';
    
        return response()->json($error_messsage);
    }
}
