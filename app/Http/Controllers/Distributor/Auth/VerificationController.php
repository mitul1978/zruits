<?php

namespace App\Http\Controllers\Distributor\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\VerifiesEmails;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\URL;

class VerificationController extends Controller
{
    use VerifiesEmails;

    protected $redirectTo = '/distributor/home';

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('signed')->only('verify');
        $this->middleware('throttle:6,1')->only('verify', 'resend');
    }
    public function show(){
        return view('distributor.auth.verify');
    }

    public function resend(){
        $user=Auth::user();
        $id=$user->id;
        $url = URL::signedRoute('distributor.verify',['id' => $id], now()->addMinutes(30));
        $data['link'] = $url;
        $data['to_email'] = $user->email;
        $data['from_email'] = 'admin@orpat.com';
        $data['subject']='Orpat Verify Email';
        $data['title']='Orpat Admin';
        $data['view']='distributor.email.resendverificationmail';
        $mailstatus=$this->sendemail($data);
        if($mailstatus==1){
            return redirect()->back()->with('resent','A fresh verification link has been sent to your email address');
        }
        else{
            return redirect()->back()->with('resent','Some thing wrong! . Please resend the email.');
        }

    }
}
