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

       if($address)
       {
           $address->delete();
        //    if($request->ajax())
        //    {

        //    }
        Alert::success("Address updated successfully");

        return redirect()->back();
           //return 1;
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

     public function createUserAddress(Request $request)
     {
        $requestData = $request->except('_token');

        $flag = $request->flag;

        if($flag == 0)
         {         
            if($request->is_primary)
            {
               UserAddress::where('user_id',auth()->user()->id)->update(['is_primary' => 0]);
            }

            $address = new UserAddress();         
            $address->mobile = @$request->mobile;
            $address->email = @$request->email;
            $address->first_name = @$request->first_name;
            $address->address = @$request->address;
            $address->address2 = @$request->address1;
            $address->state_id = @$request->state_id;
            $address->city_id = @$request->city_id;
            $address->pincode = @$request->pincode;
            //$address->dnd = @(int)$data['dnd'];
            $address->is_primary = (int) @$request->is_primary;
            $address->pincode = @$request->pincode;
            $address->user_id = @auth()->user()->id;
            $address->save();
            Alert::success("New Address Added successfully");
         }
         else
         {
            $address = UserAddress::where('id',$flag)->first();
            if($address)
            {
               $address->mobile = @$request->mobile;
               $address->email = @$request->email;
               $address->first_name = @$request->first_name;
               $address->address = @$request->address;
               $address->address2 = @$request->address1;
               $address->state_id = @$request->state_id;
               $address->city_id = @$request->city_id;
               $address->pincode = @$request->pincode;
               $address->is_primary = (int) @$request->is_primary;
               $address->pincode = @$request->pincode;
               $address->user_id = @auth()->user()->id;
               $address->update();
            }

            Alert::success("Address Updated successfully");
         }       

        return redirect()->back();
     }
}
