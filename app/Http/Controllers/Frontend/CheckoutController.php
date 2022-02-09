<?php


namespace App\Http\Controllers\Frontend;
use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Alert;
use App\Models\State;
use Session;


class CheckoutController extends Controller
{

    public function checkout(Request $request)
    { 
        $states = State::where('status',1)->get();
        if(count(get_cart()))
        {
            $pincode = @Session::get('freight_charge') ? Session::get('freight_charge')['pincode'] :null;

                //             $data = get_cart();
                //             $countOffer1 = 0;
                //             $productIdsOffer1 = [];
                //             $finalAmtOffer1 = 0;           
                //             $countOffer2 = 0;
                //             $productIdsOffer2 = [];
                //             $finalAmtOffer2= 0;

                //             foreach($data as $v)
                //             {
                //                if($v['product']['is_offer'] == 1 && $v['product']['is_offer'] == 1)
                //                {
                //                   $countOffer1 = $countOffer1 + $v['quantity'];
                //                   $productIdsOffer1[] = $v['product']['id'];
                //                }
                //                else if($v['product']['is_offer'] == 1 && $v['product']['is_offer'] == 2)
                //                {
                //                   $countOffer2 = $countOffer2 + $v['quantity'];
                //                   $productIdsOffer2[] = $v['product']['id'];
                //                }
                //             }

                // dd($countOffer1,$countOffer2,$data,$productIdsOffer1,$productIdsOffer2);
                //             if($countOffer1 >= 3)
                //             {
                                
                //             }

                //             if($countOffer2 >= 2)
                //             {

                //             }

                //             dd($data);
            
                // if($pincode){
                // calculate_fright_charge($pincode);

                // $states = State::where('status',1)->where('status',1)->orderBy('name')->pluck('name','id');
                // return view('frontend.pages.checkout',compact('states'));

            return view('frontend.checkout',compact('states'));
            
            // }else{
            //     Alert::info("Your checkout has no items.");
            //     return redirect('/cart');
        }

        return view('frontend.checkout',compact('states'));
    }
}
