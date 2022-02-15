<?php

namespace App\Http\Controllers;
use App\Models\Settings;


use Illuminate\Http\Request;
//use Illuminate\Database\Eloquent\Model\Settings;


class SettingController extends Controller
{
    //
    public function settings(){
        $data=Settings::first();
        return view('backend.setting')->with('data',$data);
    }



    public function settingsUpdate(Request $request){
        // return $request->all();
        $this->validate($request,[
            'short_des'=>'required|string',
            'description'=>'required|string',
            'photo'=>'required',
            'logo'=>'required',
            'address'=>'required|string',
            'email'=>'required|email',
            'phone'=>'required|string',
        ]);
        $data=$request->all();
        // return $data;
        $settings=Settings::first();
        // return $settings;
        $status=$settings->fill($data)->save();
        if($status){
            request()->session()->flash('success','Setting successfully updated');
        }
        else{
            request()->session()->flash('error','Please try again');
        }
        return redirect()->route('admin');
    }
}
