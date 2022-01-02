<?php

namespace App\Http\Controllers;

use App\Models\Pincode;
use Illuminate\Http\Request;

class PincodeController extends Controller
{
    public function index(Request $request){

        $pincodes =  Pincode::orderBy('state_id')->paginate(15);

        return view('backend.pincode.index')->with('pincodes',$pincodes);

    }

}
