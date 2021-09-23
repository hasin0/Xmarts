<?php

use App\Http\Controllers\BannerController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\BrandController;
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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes(['register'=>false]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//admindashboard

Route::group(['prefix'=>'admin','middleware'=>'auth'],function(){

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
