<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Banner;
use App\Models\Category;
use App\Models\Product;

class IndexController extends Controller
{
    public function home()
    {
        $banners=Banner::where(['status'=>'active','conditions'=>'banner'])->orderBy('id','DESC')->limit('4')->get();
        $categories=Category::where(['status'=>'active','is_parent'=>1])->limit(3)->orderBy('id','DESC')->get();


        return view('frontend.index',compact(['banners','categories']));
    }

            //product catergory
    public function productCartegory($slug)
    {

        $categories=Category::with('products')->where('slug',$slug)->first();
      // dd($categories);
        return view('frontend.pages.product.product-category',compact(['categories']));
        //dd($slug);
    }


    //productDetail
     
    public function productDetail($slug)
    {
        $product=Product::with('rel_prods')->where('slug',$slug)->first();
       // dd($product);
        if($product)
        {
            //dd($product);
            return view('frontend.pages.product.product-detail',compact(['product',$product]));
        }
        else{
            return 'no product found';
        }
        return $slug;
    }

}
