<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Banner;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use App\Rules\MatchOldPassword;

//use Hash;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\URL;

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


    public function shop(Request $request)
    {
             

        $products=Product::query();
        
        if(!empty($_GET['category'])){
            $slug=explode(',',$_GET['category']);
            // dd($slug);
            $cat_ids=Category::select('id')->whereIn('slug',$slug)->pluck('id')->toArray();
             //dd($cat_ids);
          $products=$products->whereIn('cat_id',$cat_ids);//->paginate(10);
             //dd($products) ;
        }




        
        if(!empty($_GET['brand'])){
            $slugs=explode(',',$_GET['brand']);
            $brand_ids=Brand::select('id')->whereIn('slug',$slugs)->pluck('id')->toArray();
           // return $brand_ids;
            $products->whereIn('brand_id',$brand_ids);
        }

        if (!empty($sort)) {
            $sort=$_GET['sortBy'];



            if($sort=='priceAsc'){
                $product=$products->where(['status'=>'active'])->orderBy('offer_price','ASC')->paginate(12); 
             }
             elseif($sort=='priceDesc'){
                $product=$products->where(['status'=>'active'])->orderBy('offer_price','DESC')->paginate(12); 
            }
            elseif($sort=='discAsc'){
                $product=$products->where(['status'=>'active'])->orderBy('price','ASC')->paginate(12); 
            }
            elseif($sort=='discDesc'){
                $product=Product::where(['status'=>'active'])->orderBy('price','DESC')->paginate(12); 
            }
            elseif($sort=='titleAsc'){
                $product=$products->where(['status'=>'active'])->orderBy('title','ASC')->paginate(12); 
            }
            elseif($sort=='titleDesc'){
                $product=$products->where(['status'=>'active'])->orderBy('title','DESC')->paginate(12); 
            }
            else{
                $product=$products->where(['status'=>'active'])->paginate(12);
            }






        }

        if(!empty($_GET['price'])){
            $price=explode('-',$_GET['price']);
            // return $price;
            // if(isset($price[0]) && is_numeric($price[0])) $price[0]=floor(Helper::base_amount($price[0]));
            // if(isset($price[1]) && is_numeric($price[1])) $price[1]=ceil(Helper::base_amount($price[1]));
            
            $products->whereBetween('price',$price);
        }

        else{
          $products=$products->where('status','active')->paginate(10);
        }



        
        $brands=Brand::where('status','active')->orderBy('title','ASC')->with('products')->get();

         $products=Product::where('status','active')->paginate(10);

        $cats=Category::where(['status'=>'active','is_parent'=>1])->with('products')->orderBy('title','ASC')->get();
        
        return view('frontend.pages.product.shop',compact('products','cats','brands'));

    }


    public function shopFilter(Request $request)
    {
        //dd($request->all());
        $data= $request->all();
        //return $data;
        //category filter
        $catURL='';
            if(!empty($data['category'])){
                foreach($data['category'] as $category){
                    if(empty($catURL)){
                        $catURL .='&category='.$category;
                    }
                    else{
                        $catURL .=','.$category;
                    }
                }
            }
            //sortfilter
            $sortByURL="";
            if(!empty($data['sortBy']))
            {
                $sortByURL.='&sortBy='.$data['sortBy'];
            }


            
            $priceRangeURL="";
            if(!empty($data['price_range'])){
                $priceRangeURL .='&price='.$data['price_range'];
            }
            if(request()->is('Xmarts.loc/product-grids')){
                return redirect()->route('product-grids',$catURL.$priceRangeURL.$sortByURL);
            }



            $brandURL="";
            if(!empty($data['brand'])){
               // dd($data);
                foreach($data['brand'] as $brand){
                    if(empty($brandURL)){
                        $brandURL .='&brand='.$brand;
                    }
                    else{
                        $brandURL .=','.$brand;
                    }
                }
            }
            //return $brandURL;








            return \redirect()->route('shop',$catURL.$sortByURL.$brandURL);
    }


    public function autoSearch(Request $request){
        //dd($request->all());
        $query=$request->get('term','');

        $products=Product::where('title','LIKE','%'.$query.'%')->get();

        $data=array();
        foreach($products as $product){
            $data[]=array('value'=>$product->title,'id'=>$product->id);
        }
        if(count($data)){
                 return $data;
        }else{
            return['value'=>"NO RESULT FOUND",'id'=>''];
        }
       // dd($query);



    }





    
    public function search(Request $request)
    {
        $query=$request->input('query');
         
        $brands=Brand::where('status','active')->orderBy('title','ASC')->with('products')->get();

         $products=Product::where('status','active')->paginate(10);

         $cats=Category::where(['status'=>'active','is_parent'=>1])->with('products')->orderBy('title','ASC')->get();

        //$products=Product::orwhere('title','like','%'.$query.'%')
        //->orwhere('slug','like','%'.$query.'%')
        //->orwhere('description','like','%'.$query.'%')
        //->orwhere('summary','like','%'.$query.'%')
        //->orwhere('price','like','%'.$query.'%')
        //->orderBy('id','DESC')
        //->paginate('9');




        return view('frontend.pages.product.shop',compact('products','cats','brands'));
        //->with('products',$products)->with('query',$query);//
        




    }








     
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
        Session::put('url.intended',URL::previous());
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
        return view('frontend.pages.user.dashboard',compact('user'));
    }

    public function userOrder(){
        $user=Auth::user();
        return view('frontend.pages.user.order',compact('user'));
    }

    public function userAddress(){
        $users=Auth::user();
        //$users=User::orderBy('id','ASC')->paginate(10);
        return view('frontend.pages.user.address',compact('users'));
    }


    public function userAccount(){
        $user=Auth::user();
        return view('frontend.pages.user.account',compact('user'));
    }

    public function billingAddress(Request $request, $id)
    { 

        
        $users=User::where('id',$id)->update(['country'=>$request->country,
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

       //shippingAddress return view('frontend.user.address')->with('users',$users,'id',$id);





    }








    public function shippingAddress(Request $request, $id)
    { 

        
        $users=User::where('id',$id)->update(['scountry'=>$request->scountry,
        'scity'=>$request->scity,
        'spostcode'=>$request->spostcode,
        'saddress'=>$request->saddress,
        'sstate'=>$request->sstate]);

        if($users)
        {
            return back()->with('success','address successfully updated');
        }else{

            return back()->with('error','something is wrong');


        }

       // return view('frontend.user.address')->with('users',$users,'id',$id);





    }

                public function updateAccount(Request $request, $id)
                {

                    $user=User::findOrFail($id);
                    $data=$request->all();
                    $status=$user->fill($data)->save();
                    if($status){
                        request()->session()->flash('success','Successfully updated your profile');
                    }
                    else{
                        request()->session()->flash('error','Please try again!');
                    }
                    return redirect()->back();
                  




                   
                   

                }


                public function changePassword(){
                
                
                
                    return view('frontend.pages.user.layouts.userPasswordChange');
                }




                public function changPasswordStore(Request $request)
                {
                    $request->validate([
                        'current_password' => ['required', new MatchOldPassword],
                        'new_password' => ['required'],
                        'new_confirm_password' => ['same:new_password'],
                    ]);
               
                    User::find(auth()->user()->id)->update(['password'=> Hash::make($request->new_password)]);
               
                    return redirect()->route('user.account')->with('success','Password successfully changed');
                }



}
