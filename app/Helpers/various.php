<?php

use App\Models\Pincode;
use PhpParser\Node\Stmt\Return_;

function is_user_logged_in(){  //Check is user is loggedin or not
    return @auth()->user()->role=='user';
 }


function calculate_fright_charge($pincode){


  $pincode =  Pincode::where('pincode',$pincode)->select('freight_charge','pincode','minimum_bundle_qty')->first()->toArray();
   
  $cart_product_qty =  get_cart_product_qty();
  
  for($i=1; $i<=$cart_product_qty; $i++){

   $check = $pincode['minimum_bundle_qty']*$i;
   if($cart_product_qty <=$check){
       $pincode['freight_charge']=$pincode['freight_charge']*$i;
       break;
   }
  }

  Session::put('freight_charge', $pincode );
  
 return response()->json($pincode , 200);

}



function update_fright_charge($pincode){


    $pincode =  Pincode::where('pincode',$pincode)->select('freight_charge','pincode','minimum_bundle_qty')->first()->toArray();
     
    $cart_product_qty =  get_cart_product_qty();
    
    for($i=1; $i<=$cart_product_qty; $i++){
  
     $check = $pincode['minimum_bundle_qty']*$i;
     if($cart_product_qty <=$check){
         $pincode['freight_charge']=$pincode['freight_charge']*$i;
         break;
     }
    }
  
    Session::put('freight_charge', $pincode );
      
  }


