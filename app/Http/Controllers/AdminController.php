<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;


class AdminController extends Controller
{

    public function admin()
    {

      //  $orders=Order::orderBy('id','DESC')->get();
       // return view('backend.orders.index');//->with('orders',$orders);
       return view('backend.index');

    }
    //
}
