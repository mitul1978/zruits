<?php
use App\Models\Cart;
use App\Models\Wishlist;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;

function addToCart($product){

    $already_cart = Cart::where('user_id', auth()->user()->id)->where('order_id',null)->where('product_id', $product->id)->first();
    //  return $already_cart;

    if($already_cart) {
        // dd($already_cart);
        $already_cart->quantity = $already_cart->quantity + 1;
        $already_cart->amount = $product->price+ $already_cart->amount;
        // return $already_cart->quantity;
        // if ($already_cart->product->stock < $already_cart->quantity || $already_cart->product->stock <= 0) return back()->with('error','Stock not sufficient!.');
        $already_cart->save();
        Wishlist::where(['user_id'=>Auth::id(),'cart_id'=>null,'product_id'=>$product->id])->update(['cart_id'=>$already_cart->id]);

    }else{

        $cart = new Cart;
        $cart->user_id = auth()->user()->id;
        $cart->product_id = $product->id;
        // $cart->price = ($product->price-($product->price*$product->discount)/100);
        $cart->price = $product->price;

        $cart->quantity = 1;
        $cart->amount=$cart->price*$cart->quantity;
        // if ($cart->product->stock < $cart->quantity || $cart->product->stock <= 0) return back()->with('error','Stock not sufficient!.');
        $cart->save();

        Wishlist::where(['user_id'=>Auth::id(),'cart_id'=>null,'product_id'=>$product->id])->update(['cart_id'=>$cart->id]);
    }

 }


 function addToCartForGuestInSession($product){

    $carts = Session::get('carts');
    /*
     * If product already exist into the cart then update QTY of product
     * Othewise add new product into the cart
     */

    if(isset($carts[ $product->id])):
        $carts[$product->id]['quantity'] += 1;
        $carts[$product->id]['amount'] = $product->price * $carts[$product->id]['quantity'];

    else:
        $carts[$product->id]['quantity'] =1; // Dynamically add initial qty
        $carts[$product->id]['amount'] = $product->price*1;
        $carts[$product->id]['price'] = $product->price;
        $carts[$product->id]['product'] = $product->toArray(); 

    endif;

    Session::put('carts', $carts);
}


function add_to_cart_session_cart_item(){

    if(Session::get('carts') && count(Session::get('carts'))){

        $carts = Session::get('carts');
        foreach(Session::get('carts') as $product_id =>$attribute){
            $product = Product::find( $product_id);

            $already_cart = Cart::where('user_id', auth()->user()->id)->where('order_id',null)->where('product_id', $product->id)->first();
            //  return $already_cart;

            if($already_cart) {
                // dd($already_cart);
                $already_cart->quantity += $attribute['quantity'];
                $already_cart->amount +=  $product->price*$attribute['quantity'];
                // return $already_cart->quantity;
                // if ($already_cart->product->stock < $already_cart->quantity || $already_cart->product->stock <= 0) return back()->with('error','Stock not sufficient!.');
                $already_cart->save();

            }else{

                $cart = new Cart;
                $cart->user_id = auth()->user()->id;
                $cart->product_id = $product->id;
                // $cart->price = ($product->price-($product->price*$product->discount)/100);
                $cart->price = $product->price;

                $cart->quantity =$attribute['quantity'];
                $cart->amount=$cart->price*$cart->quantity;
                // if ($cart->product->stock < $cart->quantity || $cart->product->stock <= 0) return back()->with('error','Stock not sufficient!.');
                $cart->save();

                Wishlist::where(['user_id'=>Auth::id(),'cart_id'=>null,'product_id'=>$product->id])->update(['cart_id'=>$cart->id]);
            }

            unset($carts[$product_id ]);

            Session::put('carts', count($carts) ? $carts :null);

        }
    }


 }

 function get_cart(){

    if(is_user_logged_in()){
     
        return Cart::with('product')->where('user_id',auth()->user()->id)->where('order_id',null)->get()->toArray();
    }
    else{
        return Session::get('carts') ? Session::get('carts') :[];
    }
 }


  function get_cart_count(){
    if(is_user_logged_in()){
        $carts = Cart::where('user_id',auth()->user()->id)->where('order_id',null)->get();
        return  $carts->count();
    }
    else{
        $carts = Session::get('carts');
        return $carts ? count($carts ) :0;
        //return Session::get('carts') ? Session::get('carts') :[];
    }
  }

  function get_cart_taxable_amount(){
    if(is_user_logged_in()){
        $amount = Cart::where('user_id',auth()->user()->id)->where('order_id',null)->sum('amount');
        return  $amount;
    }
    else{
        $carts = Session::get('carts');

        return $carts ? array_sum(array_column($carts,'amount')) :0;
        //return Session::get('carts') ? Session::get('carts') :[];
    }
  }

  function get_tax_total($taxable_amount){

    $gst = env('GST_PERCENTAGE') ? env('GST_PERCENTAGE') :18;
 
    return ($gst * $taxable_amount) / 100;
 }
 



  function get_cart_product_qty(){
    $cart_product_qty = array_sum(array_column(get_cart(), 'quantity'));
    return  $cart_product_qty;
  }


  function addToCart_live($product){


    if (is_user_logged_in()){
    
    $already_cart = Cart::where('user_id', auth()->user()->id)->where('order_id',null)->where('product_id', $product->id)->first();

    if($already_cart) {
        $already_cart->quantity = $already_cart->quantity + 1;
        $already_cart->amount = $product->price+ $already_cart->amount;
        $already_cart->save();
        Wishlist::where(['user_id'=>Auth::id(),'cart_id'=>null,'product_id'=>$product->id])->update(['cart_id'=>$already_cart->id]);
    }else{
        $cart = new Cart;
        $cart->user_id = auth()->user()->id;
        $cart->product_id = $product->id;
        $cart->price = $product->price;
        $cart->quantity = 1;
        $cart->amount=$cart->price*$cart->quantity;
        $cart->save();
        Wishlist::where(['user_id'=>Auth::id(),'cart_id'=>null,'product_id'=>$product->id])->update(['cart_id'=>$cart->id]);
    }

    }else{
        
        $carts = Session::get('carts');
        /*
         * If product already exist into the cart then update QTY of product
         * Othewise add new product into the cart
         */
    
        if(isset($carts[ $product->id])):
            $carts[$product->id]['quantity'] += 1;
            $carts[$product->id]['amount'] = $product->price * $carts[$product->id]['quantity'];
    
        else:
            $carts[$product->id]['quantity'] =1; // Dynamically add initial qty
            $carts[$product->id]['amount'] = $product->price*1;
            $carts[$product->id]['price'] = $product->price;
            $carts[$product->id]['product'] = $product->toArray(); 
    
        endif;
    
        Session::put('carts', $carts);
    }


 }



 function removeToCart_live($product){


    if (is_user_logged_in()){
    
    $already_cart = Cart::where('user_id', auth()->user()->id)->where('order_id',null)->where('product_id', $product->id)->first();

    if($already_cart) {
        if($already_cart->quantity==1){
            $already_cart->delete();
        }else{
            $already_cart->quantity = $already_cart->quantity - 1;
            $already_cart->amount = $product->price+ $already_cart->amount;
            $already_cart->save();
            Wishlist::where(['user_id'=>Auth::id(),'cart_id'=>null,'product_id'=>$product->id])->update(['cart_id'=>$already_cart->id]);
        }
    
    }

    }else{
        
        $carts = Session::get('carts');
        /*
         * If product already exist into the cart then update QTY of product
         * Othewise add new product into the cart
         */
    
        if(isset($carts[ $product->id])):
            if($carts[$product->id]['quantity']==1){

                unset($carts[$product->id]);
            }else{
                $carts[$product->id]['quantity'] -= 1;
                $carts[$product->id]['amount'] = $product->price * $carts[$product->id]['quantity'];    
            
            }
         
        endif;
    
        Session::put('carts', $carts);
    }


 }


 function is_product_in_cart($product_id){
    if (is_user_logged_in()){
        $already_cart = Cart::where('user_id', auth()->user()->id)->where('order_id',null)->where('product_id', $product_id)->first();
    
        return isset($already_cart) ? true :false;

    }else{
        $carts = Session::get('carts');
        return isset($carts[ $product_id]) ? true :false;
    }

    
 }
?>
