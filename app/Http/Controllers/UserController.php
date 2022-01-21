<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;


use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users=User::orderBy('id','ASC')->paginate(10);
        return view('backend.users.index')->with('users',$users);
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.users.create');

        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
                //dd($request->all());

        $this->validate($request,
        [
            'username'=>'string|nullable|max:30',
           'full_name'=>'string|required|max:30',

           'email'=>'string|required|unique:users',
           'password'=>'string|required',
           'role'=>'required|in:admin,vendor,customer',
           'status'=>'required|in:active,inactive',
           'photo'=>'nullable|string',
           'phone'=>'nullable|string',

           'address'=>'nullable|string',
        ]);
        //dd($request->all());
        $data=$request->all();
        $data['password']=Hash::make($request->password);
        // dd($data);
        $status=User::create($data);
         //dd($status);
        if($status){
            request()->session()->flash('success','Successfully added user');
        }
        else{
            request()->session()->flash('error','Error occurred while adding user');
        }
        return redirect()->route('users.index');

        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user=User::findOrFail($id);
        return view('backend.users.edit')->with('user',$user);
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user=User::findOrFail($id);
        //dd($request->all());

        $this->validate($request,
        [
            'username'=>'string|nullable|max:30',
           'full_name'=>'string|required|max:30',

           'email'=>'string|required|exists:users,email',
           
           'role'=>'required|in:admin,vendor,customer',
           'status'=>'required|in:active,inactive',
           'photo'=>'nullable|string',
           'phone'=>'nullable|string',

           'address'=>'nullable|string',
        ]);
        //dd($request->all());
        $data=$request->all();
        $data['password']=Hash::make($request->password);
        // dd($data);
          $status=$user->fill($data)->save();
         //dd($status);
        if($status){
            request()->session()->flash('success','Successfully Update user');
        }
        else{
            request()->session()->flash('error','Error occurred while updating user');
        }
        return redirect()->route('users.index');
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete=User::findorFail($id);
        $status=$delete->delete();
        if($status){
            request()->session()->flash('success','User Successfully deleted');
        }
        else{
            request()->session()->flash('error','There is an error while deleting users');
        }
        return redirect()->route('users.index');
        //
    }
}
