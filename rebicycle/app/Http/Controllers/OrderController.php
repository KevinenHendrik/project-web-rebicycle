<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Bike;
use App\Favorite;
use App\Order;
use Validator;
use Auth;
use Redirect;

class OrderController extends Controller
{
    public function openMyOrders(){
        $order = new Order;
        $allMyOrders = $order->getAllMyOrders(Auth::id());

        return view('pages/myOrders',[
            'allMyOrders' => $allMyOrders,
            ]);
    }
}