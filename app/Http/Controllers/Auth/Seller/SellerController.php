<?php

namespace App\Http\Controllers\Auth\Seller;

use App\Http\Controllers\Controller;
use App\Models\Order;
use function view;

class SellerController extends Controller
{
    public function dashboard(){
        $orders = Order::orderBy('id','DESC')->get();
        return view('backend.seller.master',compact('orders'));
    }
}
