<?php

use App\Http\Controllers\BannerController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\CouponController;
use App\Http\Controllers\Frontend\CartController;
use App\Http\Controllers\Frontend\CheckoutController;
use App\Http\Controllers\Frontend\IndexController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ShippingController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// frontendsection

Route::get('/',[\App\Http\Controllers\Frontend\IndexController::class,'home'])->name('home');

//product Catergory
Route::get('product-category/{slug}/',[\App\Http\Controllers\Frontend\IndexController::class,'productCartegory'])->name('product.category');
//product catergory


//product details
Route::get('product-detail/{slug}/',[IndexController::class,'productDetail'])->name('product.detail');

//product Reviews
Route::post('product-review/{slug}',[\App\Http\Controllers\ProductReviewController::class,'store'])->name('review.store');



//cartsection
Route::get('cart',[App\Http\Controllers\Frontend\CartController::class,'cart'])->name('cart');

Route::post('cart/store',[App\Http\Controllers\Frontend\CartController::class,'cartStore'])->name('cart.store');

Route::post('cart/delete',[App\Http\Controllers\Frontend\CartController::class,'cartDelete'])->name('cart.delete');
Route::post('cart/update',[App\Http\Controllers\Frontend\CartController::class,'cartUpdate'])->name('cart.update');

//coupon section

Route::post('coupon/add',[App\Http\Controllers\Frontend\CartController::class,'couponAdd'])->name('coupon.add');

//wishlist
Route::get('wishlist',[App\Http\Controllers\Frontend\WishlistController::class,'wishlist'])->name('wishlist');
Route::post('wishlist/store',[App\Http\Controllers\Frontend\WishlistController::class,'wishlistStore'])->name('wishlist.store');
Route::post('wishlist/move-to-cart',[App\Http\Controllers\Frontend\WishlistController::class,'moveToCart'])->name('wishlist.move.cart');
Route::post('wishlist/delete',[App\Http\Controllers\Frontend\WishlistController::class,'wishlistDelete'])->name('wishlist.delete');


//checkout

Route::get('checkout1',[\App\Http\Controllers\Frontend\CheckoutController::class,'checkout1'])->name('checkout1')->middleware('user');
Route::post('checkout-first',[\App\Http\Controllers\Frontend\CheckoutController::class,'checkout1Store'])->name('checkout1.store');
Route::post('checkout-two',[\App\Http\Controllers\Frontend\CheckoutController::class,'checkout2Store'])->name('checkout2.store');
Route::post('checkout-three',[\App\Http\Controllers\Frontend\CheckoutController::class,'checkout3Store'])->name('checkout3.store');

Route::get('checkout-store',[\App\Http\Controllers\Frontend\CheckoutController::class,'checkoutStore'])->name('checkout.store');

Route::get('complete/{order}',[\App\Http\Controllers\Frontend\CheckoutController::class,'complete'])->name('complete');

//shop section

Route::get('shop',[\App\Http\Controllers\Frontend\IndexController::class,'shop'])->name('shop');

Route::post('shop-filter',[\App\Http\Controllers\Frontend\IndexController::class,'shopFilter'])->name('shop.filter');

//search &autosearch

Route::get('autosearch',[\App\Http\Controllers\Frontend\IndexController::class,'autoSearch'])->name('autosearch');

Route::get('search',[\App\Http\Controllers\Frontend\IndexController::class,'search'])->name('search');





//endfrontendsection

//user auth
Route::get('user/login',[\App\Http\Controllers\Frontend\IndexController::class,'login'])->name('login.form');
Route::post('user/login',[\App\Http\Controllers\Frontend\IndexController::class,'loginSubmit'])->name('login.submit');

Route::get('user/register',[\App\Http\Controllers\Frontend\IndexController::class,'register'])->name('register.form');
Route::post('user/register',[\App\Http\Controllers\Frontend\IndexController::class,'registerSubmit'])->name('register.submit');

Route::get('user/logout',[\App\Http\Controllers\Frontend\IndexController::class,'logout'])->name('user.logout');




//end user auth




Auth::routes(['register'=>false]);

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//adminlogin
Route::group(['prefix'=>'admin'],function(){
    Route::get('/login',[\App\Http\Controllers\Auth\Admin\LoginController::class,'showLoginForm'])->name('admin.login.form');

    Route::post('/login',[\App\Http\Controllers\Auth\Admin\LoginController::class,'login'])->name('admin.login');

});





//admindashboard

Route::group(['prefix'=>'admin','middleware'=>['admin']],function(){

    Route::get('/',[\App\Http\Controllers\AdminController::class,'admin'])->name('admin');
    //banners
    Route::resource('banner',BannerController::class,['index']);
   // Route::post('banner_condition',[\App\Http\Controllers\BannerController::class,'bannercondition'])->name('banner.condition');

   //category section
   Route::resource('category',CategoryController::class,['index']);
   Route::post('category/{id}/child',[CategoryController::class,'getChildByParentID']);

   //brand section
   Route::resource('brand',BrandController::class,['index']);


   //products section
   Route::resource('product',ProductController::class,['index']);

   //users section

   Route::resource('users',UserController::class,['index']);
   //Route::post('user_status',UserController::class,['userStatus']);



      //coupons section

      Route::resource('coupon',CouponController::class,['index']);


//shipping section

Route::resource('shipping',ShippingController::class,['index']);


Route::resource('order',OrderController::class,['index']);










});

//Auth::routes();

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::group(['prefix'=>'seller','middleware'=>'auth','seller'],function(){

    Route::get('/',[\App\Http\Controllers\AdminController::class,'admin'])->name('seller');
});

//user dashboard
Route::group(['prefix'=>'user'],function(){
    Route::get('/dashboard',[\App\Http\Controllers\Frontend\IndexController::class,'userDashboard'])->name('user.dashboard');
    Route::get('/order',[\App\Http\Controllers\Frontend\IndexController::class,'userOrder'])->name('user.order');
    Route::get('/address',[\App\Http\Controllers\Frontend\IndexController::class,'userAddress'])->name('user.address');
    Route::get('/account-detail',[\App\Http\Controllers\Frontend\IndexController::class,'userAccount'])->name('user.account');

    Route::post('/billing/address/{id}',[\App\Http\Controllers\Frontend\IndexController::class,'billingAddress'])->name('billing.address');

    Route::post('/shipping/address/{id}',[\App\Http\Controllers\Frontend\IndexController::class,'shippingAddress'])->name('shipping.address');
    Route::post('/update/account/{id}',[\App\Http\Controllers\Frontend\IndexController::class,'updateAccount'])->name('update.account');


    Route::get('/change-password',[\App\Http\Controllers\Frontend\IndexController::class,'changePassword'])->name('user.passwordform');


    Route::post('/change-password',[\App\Http\Controllers\Frontend\IndexController::class,'changPasswordStore'])->name('change.password');


  //  Route::get('change-password', 'HomeController@changePassword')->name('user.change.password.form');
 // Route::post('change-password', 'HomeController@changPasswordStore')->name('change.password');





});
//file-manager bckend
Route::group(['prefix' => 'filemanager', 'middleware' => ['web', 'auth:admin']], function () {
    \UniSharp\LaravelFilemanager\Lfm::routes();
});//->name('file-manager');
