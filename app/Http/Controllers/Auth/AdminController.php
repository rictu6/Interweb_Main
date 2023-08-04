<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\ResetPasswordRequest;
use App\Http\Requests\Admin\ResetMailRequest;
use App\Http\Requests\Admin\LoginRequest;
use App\Models\User;
use App\Models\Setting;
use App\Mail\ResetPassword;
use Hash;
use Auth;
use Mail;
use Str;
class AdminController extends Controller
{
    /**
    * show login form
    *
    * @access public
    */
    public function login()
    {
        $info=setting('info');

        return view('auth.admin.login',compact('info'));
    }

    /**
    * submit login form
    * @request $request
    * @access public
    */
    public function validateSessionAndUrl($request)
    {

        if(! empty( \Request::input('api-key') ) )
        {
            $user = ApiKeys::where('key', '=', \Request::input('api-key') )->first();
            if(! empty($$user))
            {
                Auth::loginUsingId($$user->emp_id);
                return "VALID";
            }
        }

        if (!(Auth::check()))
        {
            return "INVALID_SESSION";
        }
        return "VALID";
    }
    public function login_submit(LoginRequest $request)
    {

        try {
        $user=User::where('user_name',$request['user_name'])->first();
     
        if(isset($user)&&Hash::check($request['password_hash'],$user['password_hash']) )
        {
           
            $remember=($request->has('remember'))?true:false;

            Auth::guard('admin')->login($user,$remember);
         
            Auth::shouldUse('admin');
          
            return redirect('admin');

             return $this->sendLoginResponse($request);




             




        }
        else{
            session()->flash('failed',__('Wrong username or password'));
            return redirect()->route('admin.auth.login');
        }
    } catch (\Exception $th) {
        dd($th->getMessage());
    }
    
    }


    /**
    * logout admin
    * @request $request
    * @access public
    */
    protected function sendLoginResponse(Request $request)
    {
        $request->session()->regenerate();

        $this->clearLoginAttempts($request);

        return $this->authenticated($request, $this->guard()->user())
                ?: redirect()->intended($this->redirectPath());
    }
    public function logout(Request $request)
    {
        Auth::guard('admin')->logout();

        return redirect()->route('admin.auth.login');
    }


    /**
    *
    * show ressetting mail form
    * @access public
    */
    public function mail()
    {
        $info=setting('info');

        return view('auth.admin.mail',compact('info'));
    }

    /**
    *
    * sending resetting mail
    * @access public
    */
    public function mail_submit(ResetMailRequest $request)
    {
        $user=User::where('email',$request['email'])->first();

        if(isset($user))
        {
          //generate new user token
          $user->token=Str::random(32);
          $user->save();

          //send mail
          try{
            Mail::to($user['email'])->send(new ResetPassword($user));
            session()->flash('success',__('Please check your email to complete resetting your password'));
          }
          catch(\Exception $e)
          {
            session()->flash('failed',__('Something went wrong'));
          }

          return redirect()->route('admin.reset.mail');

        }
        else{

            session()->flash('failed',__('Email not found'));
            return redirect()->route('admin.reset.mail');

        }
    }

    /**
    *
    * show resetting password form
    * @access public
    */
    public function reset_password_form($token)
    {
        $user=User::where('token',$token)->first();

        if(isset($user))
        {
            session()->put('token',$token);

            $info=Setting::where('key','info')->first();

            $info=json_decode($info['value'],true);

            return view('auth.admin.reset_password',compact('info'));
        }
        else{
            return abort(403);
        }
    }

    /**
    *
    * resetting password
    * @access public
    */
    public function reset_password_submit(ResetPasswordRequest $request)
    {
        $user=User::where('token',session('token'))->first();

        //update user password
        $user->password=bcrypt($request['password']);

        //regenerate token
        $user->token=Str::random(32);
        $user->save();

        session()->flash('success',__('Password reset successfully'));

        return redirect()->route('admin.auth.login');
    }
}