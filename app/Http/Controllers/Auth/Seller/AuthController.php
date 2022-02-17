<?php

namespace App\Http\Controllers\Auth\Seller;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth as Auth ;


class AuthController extends Controller
{
    //
    public function showLoginForm()
    {
        return view('seller.auth.login');
    }




    public function login(Request $request)
    {

        if(Auth::guard('seller')->attempt(['email'=>$request->email,'password'=>$request->password])){

          //  dd($request->all());
      //    return redirect()->route('admin')->with('success','you are logged in as admin');


         return redirect()->intended('seller')->with('success','you are logged in as seller');

             //return redirect()->intented(route('admin'))->with('success','you are logged in as admin');


           //route('admin')
         }
        else{

           // return 'sometin is wrong';
            return back()->withInput($request->only('email'));
        }
    }
}
