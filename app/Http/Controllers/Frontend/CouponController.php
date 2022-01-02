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


    public function couponStore(Request $request){
        
        $coupon=Coupon::where('code',$request->code)->first();
        if(!$coupon){
            Alert::error('The coupon code you entered is not valid.');
            return back();
        }
        if($coupon){

            if(@Session::get('coupon')['code']==$request->code){
                session()->pull('coupon');
            Alert::success('Coupon successfully removed');


            }else{

                $total_price=get_cart_taxable_amount();
                $coupon_data=[
                    'id'=>$coupon->id,
                    'code'=>$coupon->code,
                    'value'=>round($coupon->discount($total_price),2),
                ];
                session()->put('coupon',$coupon_data);
                Alert::success('Coupon successfully applied');

            }

            return redirect()->back();
        }
    }
}
