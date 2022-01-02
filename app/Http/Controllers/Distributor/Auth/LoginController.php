<?php

namespace App\Http\Controllers\Distributor\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use App\Models\Distributor\Distributor;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class LoginController extends Controller
{

    use AuthenticatesUsers;
    public function __construct()
    {
        $this->middleware('distributor_guest')->except('logout');
    }
    protected function guard()
    {
        return Auth::guard('distributor');
    }
    protected $redirectTo = '/distributor/home';

    public function showLoginForm(){

        return view ('distributor.auth.login');
    }


    public function login(Request $request)
    {

        $this->validate($request, [
            'email' => 'required|email',
            'password'=>'required',
        ]);

        $user = Distributor::where('email',$request->email)->first();
        if(!$user){
            // session()->flash('error','This Email is not registered with Royaletouche');
        Alert::alert('This Email is not registered with Royaletouche');

            return redirect('distributor/login');
        }else{


            $this->guard()->login($user);

        Alert::success('Hello '. $user->name, 'You have been logged in successfully');

           //return Redirect::intended();
           return redirect($this->redirectTo);
        }
    }

    public function logout(Request $request)
    {
        $user = Auth::guard('distributor')->user();
        $this->guard('distributor')->logout();
        $request->session()->flush();
        Alert::success('Hello '. $user->name, 'You have been logged out successfully');

        return redirect('/distributor/login');
    }

}
