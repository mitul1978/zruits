<?php

namespace App\Http\Controllers\Distributor\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Password;

class ForgotPasswordController extends Controller
{

    use SendsPasswordResetEmails;

    public function __construct()
    {
        $this->middleware('distributor_guest');
    }
    public function broker()
    {
        return Password::broker('distributor');
    }
    public function showLinkRequestForm(){
        return view('distributor.auth.passwords.email');
    }
    public function sendResetLinkEmail(Request $request){
        $this->validate($request, [
            'email' => 'required|exists:distributors'
        ]);
        $data =$request->all();
        $url = URL::route('distributor.password.reset',['token' => $data['_token']]);

        $token = DB::table('distributor_password_resets')
            ->where('email','=',$data['email'])
            ->first();
        if(!$token){
            DB::table('distributor_password_resets')->insert([
                'email' => $data['email'], 'token' => bcrypt($data['_token']),'created_at'=>date('Y-m-d H:i:s')
            ]);
        }
        else{
            DB::table('distributor_password_resets')
                ->where('email', $data['email'])->update([
                    'email' => $data['email'], 'token' => bcrypt($data['_token']),'created_at'=>date('Y-m-d H:i:s')
                ]);
        }
        $data['link'] = $url;
        $data['to_email'] = $request['email'];
        $data['from_email'] = 'admin@orpat.com';
        $data['subject']='Orpat Reset password.';
        $data['title']='Orpat';
        $data['view']='distributor.email.resetpassword';
        $mailstatus=$this->sendemail($data);
        if($mailstatus==1) {
            return redirect()->back()->with('status', 'Password Reset Link Send Successfully !');
        }
        else{
            return redirect()->back()->with('status','Some thing wrong! . Please try again!');
        }

    }
}
