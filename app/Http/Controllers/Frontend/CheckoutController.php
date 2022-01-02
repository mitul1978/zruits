<?php


namespace App\Http\Controllers\Frontend;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Alert;
use App\Models\State;
use Session;


class CheckoutController extends Controller
{

    public function checkout(Request $request)
    { 
        if(count(get_cart()))
        {
            $pincode = @Session::get('freight_charge') ? Session::get('freight_charge')['pincode'] :null;
            
            // if($pincode){
            // calculate_fright_charge($pincode);

           // $states = State::where('status',1)->where('status',1)->orderBy('name')->pluck('name','id');
            // return view('frontend.pages.checkout',compact('states'));

            return view('frontend.checkout');
            
            // }else{
            //     Alert::info("Your checkout has no items.");
            //     return redirect('/cart');
        }

        return view('frontend.checkout');
    }
}
