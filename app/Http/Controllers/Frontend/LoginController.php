<?php

namespace App\Http\Controllers\Frontend;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Session;
use App\User;
use Auth,Illuminate\Support\Facades\Redirect,RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Mail;
use Str;
class LoginController extends Controller
{
    // Login
    public function login()
    {       
        if(preg_match('(login|register)',url()->previous())==1)
        {
        }
        else
        {
          session(['custome_intended' => url()->previous()]);
        }

        $frontend = 1;

        if(Auth::check())
        {
            $redirectTo = preg_match('(login|register)', session()->get('custome_intended')) == 1  ? '/user' : session()->get('custome_intended');
            return Redirect::intended( $redirectTo);
        }

        return view('frontend.login');
        // return view('frontend.auth.login',compact('frontend'));
    }


    public function loginSubmit(Request $request)
    {
        Session::forget('user');
        Auth::logout();
        $data= $request->all();

        $redirectTo = preg_match('(login|register)', session()->get('custome_intended')) == 1  ? '/user' : session()->get('custome_intended');
       
        if(Auth::attempt(['email' => $data['email'], 'password' => $data['password'],'status'=>'active','role'=>'user']))
        {  
            Session::put('user',$data['email']);

            Alert::success('Hello '. Auth::user()->name, 'You have been logged in successfully');
            add_to_cart_session_cart_item();
            if($request->popup==1)
                return redirect()->back();
            else if($redirectTo)            
                return redirect( $redirectTo);
            else
                return  redirect()->back();
        }
        else
        {
            Alert::alert('Invalid email or password please try again!');
            return redirect()->back();
        }
    }

    public function logout()
    {
        $user_name = Auth::user()->name;
        Session::forget('user');
        Auth::logout();
        Alert::success('Hello '.$user_name , 'You have been logged out successfully!');
        if(preg_match('(login|register)',url()->previous())==1)
        {
            return redirect('/');
        }
        else
        {
          session(['custome_intended' => url()->previous()]);
          return redirect('/');

        }
    }

    public function register()
    {
        $frontend = 1;
        return view('frontend.auth.register',compact('frontend'));
    }

    public function registerSubmit(Request $request)
    {
        Session::forget('user');
        Auth::logout();
        $request->validate([
            //'name' => 'required|string|max:255',
           // 'mobile' => 'required|numeric|digits:10|unique:users',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
           // 'password_confirmation' => 'required',
        ]);

         $user =  User::create([
                'name' => $request->name,
                'email' => $request->email,
               // 'mobile' => $request->mobile,
                'password' => bcrypt($request->password),
            ]);

            $redirectTo = preg_match('(login|register)', session()->get('custome_intended')) == 1  ? '/user' : session()->get('custome_intended');

            if(Auth::attempt(['email' => $user->email, 'password' => $request->password,'status'=>'active','role'=>'user']))
            {
                Session::put('user', $user->email);
                add_to_cart_session_cart_item();
                $email =$user->email;
                Alert::success('Hello '. Auth::user()->name, 'You have been registered and logged in successfully');
                Mail::send('mail.new-account-cus', ['user' => $user], function ($message) use ($email) {
                    $message->to($email);
                    $message->subject('Welcome To Zehna');
                });
                if($request->popup==1)
                return redirect()->back();
                else
                return Redirect::intended( $redirectTo);

            }
    }    
}
