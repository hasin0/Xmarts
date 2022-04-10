<?php

namespace App\Http\Controllers\Sellers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;


class SellerController extends Controller
{

    public function dashboard(){

        $orders=Order::orderBy('id','DESC')->get();

        return view('seller.index',compact('orders'));
    }
    //
}
