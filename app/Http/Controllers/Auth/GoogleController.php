<?php
  
namespace App\Http\Controllers\Auth;
  
use App\Http\Controllers\Controller;
use Socialite;
use Auth;
use Exception;
use App\User;
use Session;
use Illuminate\Support\Facades\Mail;
class GoogleController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }
      
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function handleGoogleCallback()
    {
        try {
    
            $user = Socialite::driver('google')->user();
     
            $finduser = User::where('google_id', $user->id)->first();
     
            if($finduser)
            {
               
                Auth::login($finduser);
                Session::put('user',$finduser['email']);
                return redirect()->intended(); //redirect('/home');
     
            }
            else
            {
                $newUser = User::create([
                    'name' => $user->name,
                    'email' => $user->email,
                    'google_id'=> $user->id,
                    'password' => encrypt('123456dummy')
                ]);
    
                Auth::guard('web')->login($newUser);
                Session::put('user',$newUser['email']);
                 $user = $newUser;
                 $email = $newUser->email;
                Mail::send('mail.new-account-cus', ['user' => $user], function ($message) use ($email) {
                    $message->to($email);
                    $message->subject('Welcome To Zehna');
                });
                return redirect()->intended(); // redirect('/home');
            }
    
        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }
}