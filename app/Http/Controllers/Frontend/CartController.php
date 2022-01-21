<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Coupon;


use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Symfony\Component\Console\Input\Input;

class CartController extends Controller
{

    public function cart()
    {
        return view('frontend.pages.cart.index');
    }







   public function cartStore(Request $request)
   {
       $product_qty=$request->input('product_qty');
       $product_id=$request->input('product_id');

       $product=Product::getProductByCart($product_id);

       $price=$product[0]['offer_price'];
       //dd($price);

       $cart_array=[];

       foreach(Cart::instance('shopping')->content() as $item)
       {
        $cart_array[]=$item->id;

       }
       $result=Cart::instance('shopping')->add($product_id,$product[0]['title'],$product_qty,$price)->associate('App\Models\Product');

       if($result){
           $response['status']=true;
            $response['product_id']=$product_id;
            $response['total']=Cart::subtotal();
            $response['cart_count']=Cart::instance('shopping')->count();
            $response['message']="Item added to Cart";

       }

       if($request->ajax()){

        $header= view('frontend.layouts.header')->render();

        $response['header']=$header;

       }
       return json_encode($response);

      // return $product; 

   } 



   public function cartDelete(Request $request){
      // dd($request->all());


       $id=$request->input('cart_id');

      Cart::instance('shopping')->remove($id);
       $response['status']=true;

       $response['message']=" Cart successfully removed";
       $response['total']=Cart::subtotal();
       $response['cart_count']=Cart::instance('shopping')->count();

    
       if($request->ajax()){

        $header= view('frontend.layouts.header')->render();

        $response['header']=$header;

       }
       return json_encode($response);



   }

   public function cartUpdate(Request $request){
     //  dd($request->all());
     $this->validate($request,[
         'product_qty'=>'required|numeric',
     ]);

     $rowId=$request->input('rowId');

     $request_quantity=$request->input('product_qty');

     $productQuantity=$request->input('productQuantity');

     if($request_quantity > $productQuantity){

        $message="We currently do not have a enough items in stock";
        $response['status']=false;

     }
     elseif($request_quantity < 1){
         $message="You cant add  less than 1 quantity";
         $response['status']=false;

     }
     else{
         Cart::instance('shopping')->update($rowId,$request_quantity);
         $message="Quantity updated successfully";
         $response['status']=true;
         $response['total']=Cart::subtotal();
         $response['cart_count']=Cart::instance('shopping')->count();
 

     }
     if($request->ajax()){

        $header= view('frontend.layouts.header')->render();

        $cart_list= view('frontend.layouts.cart_list')->render();


        $response['header']=$header;
        $response['cart_list']=$cart_list;

        $response['message']=$message;


       }
       return $response;



   }
    //coupon

    public function couponAdd(Request $request){
      //  return $request->all();
       $coupon=Coupon::where('code',$request->input('code'))->first();
     //return $coupon; 
        // dd($coupon);
       if(!$coupon){
            return back()->with('error','Invalid coupon code, Please try again');
            
        }
     if($coupon){
           $total_price=(float)str_replace(',', '',Cart::instance('shopping')->subtotal());
            // return $total_price;
           session()->put('coupon',[
              'id'=>$coupon->id,
                'code'=>$coupon->code,
               'value'=>$coupon->discount($total_price)
            ]);
           request()->session()->flash('success','Coupon successfully applied');
            return redirect()->back();
        }
    }
}
