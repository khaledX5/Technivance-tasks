<?php
namespace App\Services;
use App\Customer;

trait CustomerService {
    function isCustomerHasEnoughCredit($store_credit){
        $user = Customer::where('id', 886)->get();
        if($user[0]['store_credit'] >= $store_credit)  return true;
        return false;
    }
}