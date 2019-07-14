<?php

namespace App\Http\Controllers;
use App\Item;
use Illuminate\Http\Request;
use App\Services\ItemService;

class ItmesController extends Controller
{
    use ItemService;
    function index(Request $request ){
       return  $this->getAllItems($request);
    }
}
