<?php
namespace App\Http\Controllers\Frontend;
use App\Http\Controllers\Controller;

use App\Models\Coupon;
use Illuminate\Http\Request;
use App\Models\Cart;
use Session;
Use Alert;
class CouponController extends Controller
{


    public function couponStore(Request $request)
    {
        $couponType = $request->coupon_type;
        if($couponType == 0)
        {   
            $todaysDate = date('Y-m-d');
            $coupon=Coupon::where('code',$request->code)->where('is_giftcard',0)->where('start_date','<=',$todaysDate)->where('end_date','>=',$todaysDate)->first();
            if(!$coupon)
            {                  
                //Alert::error('The coupon code you entered is not valid or Expired');
                if ($request->ajax()) 
                {
                    return 0;
                }
                else
                {
                    return back();                    
                }                
            }

            if($coupon)
            {
                if(@Session::get('coupon')['code']==$request->code)
                {
                    session()->pull('coupon');
                    Alert::success('Coupon successfully removed');
                }
                else
                {
                    $total_price=get_cart_taxable_amount();
                    $coupon_data=[
                        'id'=>$coupon->id,
                        'code'=>$coupon->code,
                        'value'=>round($coupon->discount($total_price),2),
                    ];
                    session()->put('coupon',$coupon_data);
                    Alert::success('Coupon successfully applied');
                }

                if ($request->ajax()) 
                {
                    return 1;
                }
                else
                {
                    return redirect()->back();
                }                
            }
        }
        else
        {
            $coupon=Coupon::where('code',$request->code)->where('is_giftcard',1)->first();
            if(!$coupon)
            {                  
                //Alert::error('The Gift card number you entered is not valid.');
                if ($request->ajax()) 
                {
                    return 0;
                }
                else
                {
                    return back();                    
                }   
            }

            if($coupon)
            {
                if(@Session::get('giftcard')['code']==$request->code)
                {
                    session()->pull('giftcard');
                    Alert::success('Gift card successfully removed');
                }
                else
                {
                    $total_price=get_cart_taxable_amount();
                    $coupon_data=[
                        'id'=>$coupon->id,
                        'code'=>$coupon->code,
                        'value'=>round($coupon->discount($total_price),2),
                    ];
                    session()->put('giftcard',$coupon_data);
                    Alert::success('Gift card successfully applied');
                }

                if ($request->ajax()) 
                {
                    return 1;
                }
                else
                {
                    return redirect()->back();            
                }                  
            }
        }
    }
}
