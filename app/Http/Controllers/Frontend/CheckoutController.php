<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Mail\OrderMail;
use App\Models\Order;
use App\Models\Shipping;
use App\Models\User;
use Illuminate\Contracts\Session\Session as SessionSession;
//use session;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Mail;
use Gloudemans\Shoppingcart\Facades\Cart;



class CheckoutController extends Controller
{

    public function checkout1()
    {
        $user=Auth::user();
        //return $user;
        
        return view('frontend.pages.checkout.checkout1',compact('user'));
    }

    public function checkout1Store(Request $request)
    {
       //dd($request->all());


       $this->validate($request,[
        'email'=>'email|required|exists:users,email',
        'first_name'=>'string|required',
        'last_name'=>'string|required',
       
        'phone'=>'numeric|required',
        'country'=>'string|nullable',
        'city'=>'string|required',
        'state'=>'string|nullable',
        'address'=>'string|required',
        'postcode'=>'numeric|nullable',
        'sfirst_name'=>'string|nullable',
        'slast_name'=>'string|nullable',
        //'semail'=>'string|required|exists:users,email',
        'sphone'=>'string|nullable',
        'scountry'=>'string|nullable',
        'scity'=>'string|nullable',
        'sstate'=>'string|nullable',
        'saddress'=>'string|nullable',
        'spostcode'=>'numeric|nullable',

        'sub_total'=>'required',
        'total_amount'=>'required',

        



    ]);
















     Session::put('checkout',[
         'first_name'=>$request->first_name,
         'last_name'=>$request->last_name,
         'email'=>$request->email,
         'phone'=>$request->phone,
         'country'=>$request->country,
         'city'=>$request->city,
         'state'=>$request->state,
         'address'=>$request->address,
         'postcode'=>$request->postcode,
         'sfirst_name'=>$request->sfirst_name,
         'slast_name'=>$request->slast_name,
         'semail'=>$request->semail,
         'sphone'=>$request->sphone,
         'scountry'=>$request->scountry,
         'scity'=>$request->scity,
         'sstate'=>$request->sstate,
         'saddress'=>$request->saddress,
         'spostcode'=>$request->spostcode,

         'sub_total'=>$request->sub_total,
         'total_amount'=>$request->total_amount,



     ]);

     $shippings=Shipping::where('status','active')->orderBy('shipping_address','ASC')->get();
     return view('frontend.pages.checkout.checkout2',compact('shippings'));
    }


    public function checkout2Store(Request $request)
    {
     // return $request->all();

     $this->validate($request,[
        
        'delivery_charge'=>'required|numeric',


     ]);
     
       Session::push('checkout',[
           'delivery_charge'=>$request->delivery_charge,

       ]);
        return view('frontend.pages.checkout.checkout3');
    }






    public function checkout3Store(Request $request)
    {
    // return $request->all();
    $this->validate($request,[
        
        'payment_method'=>'string|required',
        'payment_status'=>'string|in:paid,unpaid',


     ]);



       Session::push('checkout',[
           'payment_method'=>$request->payment_method,
           'payment_status'=>'paid',


       ]);

     //  return Session::get('checkout');
        return view('frontend.pages.checkout.checkout4');
    }




    public function checkoutStore()
    {
        $order=new Order();
        
        $order['user_id']=auth()->user()->id;
        $order['order_number']=Str::upper('Xmr-'.Str::random(8));
        
        $order['sub_total']=Session::get('checkout')['sub_total'];

        $order['delivery_charge']=Session::get('checkout')[0]['delivery_charge'];
      



        
        if(Session::has('coupon')){
            $order['coupon']=Session::get('coupon')['value'];


        }else{
            $order['coupon']=0;

        }

        $order['total_amount']= (float)str_replace(',', '',Session::get('checkout')['sub_total'] ) +  Session::get('checkout')[0]['delivery_charge']-$order['coupon'];

        //$order['sub_total']=Session::get('checkout')['sub_total'] +  $order['delivery_charge']=Session::get('checkout')[0]['delivery_charge']-$order['coupon'];
        $order['payment_method']=Session::get('checkout')[1]['payment_method'];

        $order['payment_status']=Session::get('checkout')[1]['payment_status'];
        $order['condition']='pending';
        $order['delivery_charge']=Session::get('checkout')[0]['delivery_charge'];
       // return $order;

        $order['first_name']=Session::get('checkout')['first_name'];
        $order['last_name']=Session::get('checkout')['last_name'];
        $order['email']=Session::get('checkout')['email'];
        $order['phone']=Session::get('checkout')['phone'];
        $order['country']=Session::get('checkout')['country'];
        $order['city']=Session::get('checkout')['city'];
        $order['state']=Session::get('checkout')['state'];




        $order['sfirst_name']=Session::get('checkout')['sfirst_name'];
        $order['slast_name']=Session::get('checkout')['slast_name'];
        $order['semail']=Session::get('checkout')['semail'];
        $order['sphone']=Session::get('checkout')['sphone'];
        $order['scountry']=Session::get('checkout')['scountry'];
        $order['scity']=Session::get('checkout')['scity'];
        $order['sstate']=Session::get('checkout')['sstate'];
       // $order['post_code']=Session::get('checkout')['post_code'];
          
       mail::to($order['email'])->bcc($order['semail'])->cc('hasino2258@gmail.com')->send(new OrderMail($order));
       dd('mail is sent');
       $status=$order->save();

       if($status){
           
           Cart::instance('shopping')->destroy();
           Session::forget('coupon');
           Session::forget('checkout');

           return redirect()->route('complete',$order['order_number'])->with('success','Your product successfully placed in order');
       }else{
           return redirect()->route('checkout1')->with('error','pls try again');
       }




        //
        # code...
    }

    public function complete($order)
    {
        $order=$order;
      // $order=Order::orderBy('id','DESC')->paginate(10);

//return $order;
        return view('frontend.pages.checkout.complete')->with('order',$order);
    }
    //
}
