<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Banner;
use App\Models\Category;
use App\Models\Product;
use App\Models\User;
//use Hash;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class IndexController extends Controller
{
    public function home()
    {
        $banners=Banner::where(['status'=>'active','conditions'=>'banner'])->orderBy('id','DESC')->limit('4')->get();
        $categories=Category::where(['status'=>'active','is_parent'=>1])->limit(3)->orderBy('id','DESC')->get();


        return view('frontend.index',compact(['banners','categories']));
    }

            //product catergory
    public function productCartegory(Request $request,$slug)
    {

        $categories=Category::with('products')->where('slug',$slug)->first();
      // dd($categories);
    //  return $request->all();
         $sort='';

         if($request->sort !=null){
             $sort=$request->sort;
         }

         if($categories==null)
         {
             return view('errors.404');
         }
         else{
             if($sort=='priceAsc'){
                $product=Product::where(['status'=>'active','cat_id'=>$categories->id])->orderBy('offer_price','ASC')->paginate(12); 
             }
             elseif($sort=='priceDesc'){
                $product=Product::where(['status'=>'active','cat_id'=>$categories->id])->orderBy('offer_price','DESC')->paginate(12); 
            }
            elseif($sort=='discAsc'){
                $product=Product::where(['status'=>'active','cat_id'=>$categories->id])->orderBy('price','ASC')->paginate(12); 
            }
            elseif($sort=='discDesc'){
                $product=Product::where(['status'=>'active','cat_id'=>$categories->id])->orderBy('price','DESC')->paginate(12); 
            }
            elseif($sort=='titleAsc'){
                $product=Product::where(['status'=>'active','cat_id'=>$categories->id])->orderBy('title','ASC')->paginate(12); 
            }
            elseif($sort=='titleDesc'){
                $product=Product::where(['status'=>'active','cat_id'=>$categories->id])->orderBy('title','DESC')->paginate(12); 
            }
            else{
                $product=Product::where(['status'=>'active','cat_id'=>$categories->id])->paginate(12);
            }
         }






      $route='product-category';
      return view('frontend.pages.product.product-category',compact(['categories','route','product']));

     // if($request->ajax())
     
       //   $view=view('frontend.layouts.single_product',compact('product'))->render();
         // return response()->json(['html'=>$view]);

      //}
        //dd($slug);
    }


    //productDetail
     
    public function productDetail($slug)
    {
        $product=Product::with('rel_prods')->where('slug',$slug)->first();
   
        if($product)
        {
            //dd($product);
            return view('frontend.pages.product.product-detail',compact(['product',$product]));
        }
        else{
            return view ('errors.404');
        }
        return $slug;
    }

    //user auth
    public function login()
    {
        return view('frontend.auth.login');
    }

    public function loginSubmit(Request $request)
    {
        //return $request->all();
        $this->validate($request,[
            'email'=>'email|required|exists:users,email',
            'password'=>'required|min:4',
        ]);

        $data=$request->all();
        if(Auth::attempt(['email'=>$data['email'],'password'=>$data['password'],'status'=>'active'])){
            
            Session::put('user',$data['email']);
            

            if(Session::get('url.intended')){
                return Redirect::to(Session::get('url.intended'));
            }else{
                request()->session()->flash('success','Successfully login');

                return redirect()->route('home')->with('sucess','successuflly login');
            }

        }
        else{
            return back()->with('error','invalid email & password');
        }

    }


    public function register()
    {
        return view('frontend.auth.register');
    }


    public function registerSubmit(Request $request){
        // return $request->all();
        $this->validate($request,[
            'username'=>'string|required|max:30',
            'email'=>'string|required|unique:users,email',
            'password'=>'required|min:4|confirmed',
        ]);
        $data=$request->all();
        // dd($data);
        $check=$this->create($data);
        dd($check);
        Session::put('user',$data['email']);
        if($check){
            request()->session()->flash('success','Successfully registered');
            return redirect()->route('home');
        }
        else{
            request()->session()->flash('error','Please try again!');
            return back();
        }
    }

    public function create(array $data){
        return User::create([
            'username'=>$data['username'],
            'email'=>$data['email'],
            'password'=>Hash::make($data['password']),
            //'status'=>'active'
            ]);
    }


    public function logout(){
        Session::forget('user');
        Auth::logout();
        request()->session()->flash('success','Logout successfully');
        return back();
    }



    public function userDashboard(){

        $user=Auth::user();
       // dd($user);
        return view('frontend.user.dashboard',compact('user'));
    }

    public function userOrder(){
        $user=Auth::user();
        return view('frontend.user.order',compact('user'));
    }

    public function userAddress(){
        $users=Auth::user();
        //$users=User::orderBy('id','ASC')->paginate(10);
        return view('frontend.user.address',compact('users'));
    }


    public function userAccount(){
        $user=Auth::user();
        return view('frontend.user.account',compact('user'));
    }

    public function billingAddress(Request $request, $id)
    { $users=User::where('id',$id)->update(['country'=>$request->country,
        'city'=>$request->city,
        'postcode'=>$request->postcode,
        'address'=>$request->address,
        'state'=>$request->state]);

        if($users)
        {
            return back()->with('success','address successfully updated');
        }else{

            return back()->with('error','something is wrong');


        }

        return view('frontend.user.address')->with('users',$users,'id',$id);





    }
}
