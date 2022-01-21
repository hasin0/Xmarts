<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;

class WishlistController extends Controller
{
    public function wishlist()
    {
        return view('frontend.pages.wishlist');
    }

    public function wishlistStore(Request $request)
    {
       // dd($request->all());
       $product_id=$request->input('product_id');
       $product_qty=$request->input('product_qty');
       $product=Product::getProductByCart($product_id);
       $price=$product[0]['offer_price'];
       $wishlist_array=[];

       foreach(Cart::instance('wishlist')->content() as $item)
        {
            $wishlist_array[]=$item->id;
        }
        
        if(in_array($product_id,$wishlist_array)){
            $response['present']=true;
            $response['message']="Item has been saved in wishlist";


        }else{
            $result=Cart::instance('wishlist')->add($product_id,$product[0]['title'],$product_qty,$price)->associate('App\Models\Product');
            if($result){
                $response['status']=true;
                $response['message']="Item has been saved in wishlist";
                $response['wishlist_count']=Cart::instance('wishlist')->count();
            }
        }

        return json_encode($response);

     //  dd($product);


    }


    public function moveToCart(Request $request)
    {
      //  dd($request->all());

      $item=Cart::instance('wishlist')->get($request->input('rowId'));
      //dd($item);
      Cart::instance('wishlist')->remove($request->input('rowId'));

      $result=Cart::instance('shopping')->add($item->id,$item->name, 1, $item->price)->associate('App\Models\Product');
      
      if($result)
      {
        $response['status']=true;
        $response['message']="Item has been moved Cart";
        $response['cart_count']=Cart::instance('shopping')->count();

      }
     
      if($request->ajax()){

        $wishlist=view('frontend.layouts._wishlist')->render();
        $header=view('frontend.layouts.header')->render();

        $response['wishlist_list']=$wishlist;
        $response['header']=$header;

      }

      return $response;



    }

    public function wishlistDelete(Request $request)
    {

     // dd($request->all());

     $id=$request->input('rowId');
     Cart::instance('wishlist')->remove($id);


     
     $response['status']=true;
     $response['message']="Item has been Removed wishlist";
     $response['cart_count']=Cart::instance('shopping')->count();


     
     if($request->ajax()){

      $wishlist=view('frontend.layouts._wishlist')->render();
      $header=view('frontend.layouts.header')->render();

      $response['wishlist_list']=$wishlist;
      $response['header']=$header;

      

    }
    return $response;


    }
    //
}
