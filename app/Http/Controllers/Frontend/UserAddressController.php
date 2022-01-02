<?php
namespace App\Http\Controllers\Frontend;
use App\Models\City;
use App\Models\State;
use App\Models\UserAddress;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Alert;
class UserAddressController extends Controller
{

    public function removeUserAddress($address_id){
       $address =  UserAddress::where('user_id',auth()->user()->id)->find($address_id);

       if($address){
           $address->delete();
           return 1;
       }else{
           return 0;
       }
    }


    public function editUserAddress($address_id){
        $address =  UserAddress::where('user_id',auth()->user()->id)->find($address_id);
 
        $states = State::where('status',1)->orderBy('name')->pluck('name','id');
        $cities = City::where('status',1)->where('state_id',$address->state_id)->orderBy('name')->pluck('name','id');
        return view('frontend/pages/edit_address',compact('states','address','cities'));
     }
 

     public function updateUserAddress(Request $request,$address_id){


        $requestData = $request->except('_token');

        $address =  UserAddress::where('user_id',auth()->user()->id)->find($address_id);
        
        $address->update( $requestData);
        Alert::success("Address updated successfully");

        return redirect()->back();

     }
}
