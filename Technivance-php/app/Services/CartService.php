<?php

namespace App\Services;

use App\Cart;
use App\Item;
use App\Customer;
use DB;

trait CartService {
    function getAllCarts($customer_id){
      // if(Customer::where('id',886)->first() === null)
        //done
        $cartsWithItems = Cart::with('item')->where('customer_id',$customer_id)->get();
        $sumOfCart = $this->getTotalPurchase();
        
        $result = [];
        $result['items'] = $cartsWithItems;
        $result['totalPurchase'] = $sumOfCart[0]['total'];

        return $result;
    }
    function getTotalPurchase(){
        //done
        $sumOfCart = Item::join('carts', 'items.id', '=', 'carts.item_id')
        ->select(DB::raw('SUM(items.price * carts.quantity) as total'))->get();
        return $sumOfCart;
    }
    function addToCart($request){//done
        $carts =  [];
        foreach($request->items as $item){
            array_push($carts, 
            [
                'customer_id' => $request->user_id, 
                'item_id' => $item['item_id'],
                'quantity' => $item['quantity']
            ]);
        }
        $error = false ;
        $error_messsage = new \stdClass();
        foreach($carts as $cart){
            $existCart = Cart::where('customer_id', $cart['customer_id'])->where('item_id', $cart['item_id'])->get();
            $item = Item::where('id',$cart['item_id'])->first();
            if( count($existCart) > 0  ) {
                $error = true;
                $error_messsage->error =  'there is an item selected >>  existed in your cart';
            }
            if( $item == null ){
                 $error = true;
                 $error_messsage->error =  'this item not exist, try another hack';
            }
        }

        if($error) return response()->json($error_messsage);
        Cart::insert($carts);
      
        return $carts;
    }
    function deleteFromCart($cart_id ,$customerId ){
        //done
   
        $cart = Cart::where('id', $cart_id)->first();
        if( $cart === null) return "cart not Exit";

        Cart::where('id', $cart_id)->delete();
        return  $cart;
    }
    function updateCart($cart_id, $customer_id ,$quantity ){
        //done
        $card = Cart::where('id', $cart_id)->first();
        if( $card === null) return "cart not Exit";
        
        Cart::where('id', $cart_id)->update(['quantity'=> $quantity]);
        return $card;
    }
}