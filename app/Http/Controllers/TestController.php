<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Pincode;
use App\Models\State;
use Illuminate\Http\Request;

class TestController extends Controller
{
    //

    public function set_state(){
       $pincodes =  Pincode::select('id','districtname','state_id')->groupBy('districtname')->orderBy('districtname')->get();

       foreach($pincodes as $pincode){

          $city =   City::create([
                'name'=>$pincode->districtname,
                'state_id'=>$pincode->state_id
            ]);

            Pincode::where('districtname',$pincode->districtname)->update(['city_id'=>$city->id]);

       }
    }

}
