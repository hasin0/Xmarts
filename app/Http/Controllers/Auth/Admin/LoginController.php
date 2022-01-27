<?php

namespace App\Http\Controllers\Auth\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;

class LoginController extends Controller
{


    //
    public function showLoginForm()
    {
        return view('backend.auth.login');
    }




    public function login(Request $request)
    {          

        if(Auth::guard('admin')->attempt(['email'=>$request->email,'password'=>$request->password])){
         
          //  dd($request->all());
      //    return redirect()->route('admin')->with('success','you are logged in as admin');

          
         return redirect()->intended('admin')->with('success','you are logged in as admin');

             //return redirect()->intented(route('admin'))->with('success','you are logged in as admin');


           //route('admin')
         }
        else{

           // return 'sometin is wrong';
            return back()->withInput($request->only('email'));
        }
    }
}
