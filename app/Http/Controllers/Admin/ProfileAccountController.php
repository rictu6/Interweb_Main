<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\UpdateProfileAccountRequest;
use App\Models\User;



class ProfileAccountController extends Controller
{
    /**
     * Show the form for editing profile
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
      
        $this->middleware('can:edit_profileaccount',     ['only' => ['edit', 'update']]);
     
    }
   
    public function edit()
    {


       $users = User::all();
    
    //    dd($positions);
        return view('admin.profileaccount.edit', compact('users'));

    }

    /**
     * Update profile
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        try
        {
       //update user
       $user=User::findOrFail(auth()->guard('admin')->user()->emp_id);
    
       $user->email=$request->email;
    
       $user->user_name=$request->user_name;
    
       if(!empty($request['password_hash']))
       {
           $user->user_pass=$request->password_hash;
           $user->password_hash=bcrypt($request->password_hash);
       }
    
        $user->save();

        session()->flash('success',__('Profile Account updated successfully'));

        return redirect()->route('admin.profileaccount.edit');

    } catch (\Exception $th) {

        dd($th->getMessage());

    }
    }
}
