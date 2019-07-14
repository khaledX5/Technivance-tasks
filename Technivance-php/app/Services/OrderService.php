<?php
namespace App\Services;
use App\Order;
use App\Cart;
use App\Customer;
use DB;
trait OrderService {
    function confirmOrder($request , $current_store_credit){
           $data['address'] =$request->address;
           $data['phone'] =$request->phone;
           $data['customer_id'] =886;
           $data['total'] =$current_store_credit;
           //dd($data);
           DB::beginTransaction();
            Order::create($data);
            Cart::where('customer_id', $data['customer_id'])->delete();
            Customer::where('id', $data['customer_id'])->decrement('store_credit', $current_store_credit);
           DB::commit();


           $message = new \stdClass();
           $message->success =  'order done with success';
   
        return  response()->json($message);
    }
}