<?php

use App\Http\Controllers\BannerController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\Frontend\IndexController;
use App\Http\Controllers\ProductController;
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

//admindashboard

Route::group(['prefix'=>'admin','middleware'=>'auth','admin'],function(){

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





});

//Auth::routes();

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::group(['prefix'=>'seller','middleware'=>'auth','seller'],function(){

    Route::get('/',[\App\Http\Controllers\AdminController::class,'admin'])->name('seller');
});

//user dashboard
Route::group(['prefix'=>'user'],function(){
    Route::get('/dashboard',[\App\Http\Controllers\Frontend\IndexController::class,'userDashboard'])->name('user.dashboard');

});