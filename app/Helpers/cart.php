<?php
use App\Models\Cart;
use App\Models\Wishlist;
use App\Models\Product;
use App\Models\Offer;
use Illuminate\Support\Facades\Auth;

function addToCart($product,$colorId,$sizeId,$pageValue)
{

    $already_cart = Cart::where('user_id', auth()->user()->id)->where('order_id',null)->where('product_id', $product->id)->where('color_id', $colorId)->where('size_id', $sizeId)->where('page_value', $pageValue)->first();
    //  return $already_cart;
    if($already_cart) 
    {
        // dd($already_cart);
        $already_cart->quantity = $already_cart->quantity + 1;
        $already_cart->amount = $product->discounted_amt  + $already_cart->amount;
        // return $already_cart->quantity;
        // if ($already_cart->product->stock < $already_cart->quantity || $already_cart->product->stock <= 0) return back()->with('error','Stock not sufficient!.');
        $already_cart->save();
        Wishlist::where(['user_id'=>Auth::id(),'cart_id'=>null,'product_id'=>$product->id])->update(['cart_id'=>$already_cart->id]);
    }
    else
    {
        $cart = new Cart;
        $cart->user_id = auth()->user()->id;
        $cart->code = $product->id.$colorId.$sizeId;
        $cart->product_id = $product->id;
        // $cart->price = ($product->price-($product->price*$product->discount)/100);
        $cart->price = $product->discounted_amt ;
        $cart->image = @$product->images()->first()->image;
        $cart->quantity = 1;
        $cart->amount = $cart->price * $cart->quantity;
        $cart->color_id = $colorId;
        $cart->size_id = $sizeId;
        $cart->page_value = $pageValue;
        // if ($cart->product->stock < $cart->quantity || $cart->product->stock <= 0) return back()->with('error','Stock not sufficient!.');
        $cart->save();

        Wishlist::where(['user_id'=>Auth::id(),'cart_id'=>null,'product_id'=>$product->id])->update(['cart_id'=>$cart->id]);
    }

 }

 function addGiftToCart($product,$toName,$toEmail,$message,$fromName){

    $already_cart = Cart::where('user_id', auth()->user()->id)->where('email',$toEmail)->where('order_id',null)->where('product_id', $product->id)->first();
    //  return $already_cart;

    if($already_cart) 
    {
        // dd($already_cart);
        $already_cart->quantity = $already_cart->quantity + 1;
        $already_cart->amount = $product->discounted_amt  + $already_cart->amount;
        // return $already_cart->quantity;
        // if ($already_cart->product->stock < $already_cart->quantity || $already_cart->product->stock <= 0) return back()->with('error','Stock not sufficient!.');
        $already_cart->save();
        Wishlist::where(['user_id'=>Auth::id(),'cart_id'=>null,'product_id'=>$product->id])->update(['cart_id'=>$already_cart->id]);

    }
    else
    {
        $cart = new Cart;
        $cart->user_id = auth()->user()->id;
        $cart->product_id = $product->id;
        // $cart->price = ($product->price-($product->price*$product->discount)/100);
        $cart->price = $product->discounted_amt ;
        $cart->email = $toEmail;
        $cart->name = $toName;
        $cart->message = $message;
        $cart->from_name = $fromName;
        $cart->quantity = 1;
        $cart->amount=$cart->price*$cart->quantity;
        // if ($cart->product->stock < $cart->quantity || $cart->product->stock <= 0) return back()->with('error','Stock not sufficient!.');
        $cart->save();

        Wishlist::where(['user_id'=>Auth::id(),'cart_id'=>null,'product_id'=>$product->id])->update(['cart_id'=>$cart->id]);
    }
 }


 function addToCartForGuestInSession($product,$colorId,$sizeId,$pageValue){

    $carts = Session::get('carts');
    /*
     * If product already exist into the cart then update QTY of product
     * Othewise add new product into the cart
     */
    if(isset($carts[$product->id.$colorId.$sizeId]) && @$carts[$product->id.$colorId.$sizeId]['color_id'] == $colorId && @$carts[$product->id.$colorId.$sizeId]['size_id'] == $sizeId && @$carts[$product->id.$colorId.$sizeId]['page_value'] == $pageValue):
        $carts[$product->id.$colorId.$sizeId]['quantity'] += 1;
        $carts[$product->id.$colorId.$sizeId]['amount'] = $product->discounted_amt  * $carts[$product->id.$colorId.$sizeId]['quantity'];

    else:
        $carts[$product->id.$colorId.$sizeId]['quantity'] = 1; // Dynamically add initial qty
        $carts[$product->id.$colorId.$sizeId]['amount'] = $product->discounted_amt*1;
        $carts[$product->id.$colorId.$sizeId]['price'] = $product->discounted_amt ;
        $carts[$product->id.$colorId.$sizeId]['image'] = @$product->images()->first()->image;
        $carts[$product->id.$colorId.$sizeId]['product'] = $product->toArray(); 
        $carts[$product->id.$colorId.$sizeId]['color_id'] = $colorId; 
        $carts[$product->id.$colorId.$sizeId]['size_id'] = $sizeId; 
        $carts[$product->id.$colorId.$sizeId]['page_value'] = $pageValue; 

    endif;

    Session::put('carts', $carts);
}


function addGiftToCartForGuestInSession($product,$toName,$toEmail,$message,$fromName){

    $carts = Session::get('carts');
    /*
     * If product already exist into the cart then update QTY of product
     * Othewise add new product into the cart
     */

    if(isset($carts[ $product->id]) && isset($carts[$product->id]['email']) && $carts[$product->id]['email'] == $toEmail):
        $carts[$product->id]['quantity'] += 1;
        $carts[$product->id]['amount'] = $product->discounted_amt  * $carts[$product->id]['quantity'];
    else:
        $carts[$product->id]['quantity'] =1; // Dynamically add initial qty
        $carts[$product->id]['amount'] = $product->discounted_amt *1;
        $carts[$product->id]['price'] = $product->discounted_amt ;
        $carts[$product->id]['email'] = $toEmail;
        $carts[$product->id]['name'] = $toName;
        $carts[$product->id]['message'] = $message;
        $carts[$product->id]['from_name'] = $fromName;
        $carts[$product->id]['product'] = $product->toArray(); 
    endif;

    Session::put('carts', $carts);
}


function add_to_cart_session_cart_item()
{
    if(Session::get('carts') && count(Session::get('carts')))
    {
        $carts = Session::get('carts');
        //dd($carts); 
        foreach(Session::get('carts') as $product_id =>$attribute)
        {
                $product = Product::find($attribute['product']['id']);

                if($product->is_giftcard == 0)
                {
                    $already_cart = Cart::where('user_id', auth()->user()->id)->where('order_id',null)->where('product_id', $product->id)->where('color_id', $attribute['color_id'])->where('size_id', $attribute['size_id'])->first();
                }
                else
                {
                    $already_cart = Cart::where('user_id', auth()->user()->id)->where('order_id',null)->where('product_id', $product->id)->where('email', $attribute['email'])->first();
                }

                if($already_cart) 
                {
                    // dd($already_cart);
                    if($product->is_giftcard == 0)
                    {
                        $already_cart->quantity += $attribute['quantity'];
                        $already_cart->amount +=  $product->discounted_amt * $attribute['quantity'];
                        // return $already_cart->quantity;
                        // if ($already_cart->product->stock < $already_cart->quantity || $already_cart->product->stock <= 0) return back()->with('error','Stock not sufficient!.');
                        $already_cart->save();
                    }
                }
                else
                {  
                    if($product->is_giftcard == 0)
                    {
                        $cart = new Cart;
                        $cart->user_id = auth()->user()->id;
                        $cart->code = $product->id.$attribute['color_id'].$attribute['size_id'];
                        $cart->product_id = $product->id;
                        // $cart->price = ($product->price-($product->price*$product->discount)/100);
                        $cart->price = $product->discounted_amt ;
                        $cart->image = @$product->images()->first()->image;
                        $cart->quantity = $attribute['quantity'];
                        $cart->color_id =$attribute['color_id'];
                        $cart->size_id = $attribute['size_id'];
                        $cart->amount = $cart->price * $cart->quantity;
                        // if ($cart->product->stock < $cart->quantity || $cart->product->stock <= 0) return back()->with('error','Stock not sufficient!.');
                        $cart->save();
                        Wishlist::where(['user_id'=>Auth::id(),'cart_id'=>null,'product_id'=>$product->id])->update(['cart_id'=>$cart->id]);
                    }
                    else
                    {
                        $cart = new Cart;
                        $cart->user_id = auth()->user()->id;
                        $cart->code = $product->id;
                        $cart->product_id = $product->id;
                        // $cart->price = ($product->price-($product->price*$product->discount)/100);
                        $cart->price = $product->discounted_amt ;
                        $cart->image = null;
                        $cart->quantity = $attribute['quantity'];
                        $cart->color_id =0;
                        $cart->size_id = 0;
                        $cart->amount = $cart->price * $cart->quantity;
                        $cart->email = $attribute['email'];
                        $cart->name = $attribute['name'];
                        $cart->message = $attribute['message'];
                        $cart->from_name = $attribute['from_name'];
                        $cart->save();
                        Wishlist::where(['user_id'=>Auth::id(),'cart_id'=>null,'product_id'=>$product->id])->update(['cart_id'=>$cart->id]);
                    }
                
                }

            if($product->is_giftcard == 0)
            {
              unset($carts[ $attribute['product']['id'] . $attribute['color_id'] . $attribute['size_id'] ]);
            }
            else
            {
                unset($carts[ $attribute['product']['id']]);
            }  
            Session::put('carts', count($carts) ? $carts :null);
        }
    }
 }

 function get_cart()
 {
    if(is_user_logged_in())
    {     
        return Cart::with('product')->where('user_id',auth()->user()->id)->where('order_id',null)->get()->toArray();
    }
    else
    {
        return Session::get('carts') ? Session::get('carts') :[];
    }
 }


  function get_cart_count()
  {
    if(is_user_logged_in())
    {
        $carts = Cart::where('user_id',auth()->user()->id)->where('order_id',null)->get();
        return  $carts->count();
    }
    else
    {
        $carts = Session::get('carts');
        return $carts ? count($carts) :0;
        //return Session::get('carts') ? Session::get('carts') :[];
    }
  }

  function get_cart_total_amount()
  {
    $amount = 0;
    if(is_user_logged_in())
    {
        $carts = Cart::where('user_id',auth()->user()->id)->where('order_id',null)->get();
        foreach ($carts as $cart)
        {
           $amount = $amount + ($cart->quantity * Product::find($cart->product_id)->price);
        }
        return  $amount;
    }
    else
    {
        $carts = Session::get('carts');
        
        if(isset($carts))
        {
            foreach ($carts as $cart)
            {
            $amount = $amount + ($cart['quantity'] * $cart['product']['price']);
            }
        }
        return $carts ? $amount:0;
        //return Session::get('carts') ? Session::get('carts') :[];
    }
  }

  function get_cart_taxable_amount()
  {
    if(is_user_logged_in())
    {
        $amount = Cart::where('user_id',auth()->user()->id)->where('order_id',null)->sum('amount');
        return  $amount;
    }
    else
    {
        $carts = Session::get('carts');
        return $carts ? array_sum(array_column($carts,'amount')) :0;
        //return Session::get('carts') ? Session::get('carts') :[];
    }
  }

  function get_offer_type()
  {
    if(is_user_logged_in())
    {
        $carts = Cart::where('user_id',auth()->user()->id)->where('order_id',null)->get();
        $totalAmt = $carts->sum('amount');
    }
    else
    {
        $carts = Session::get('carts');
        $totalAmt = array_sum(array_column(@$carts,'amount'));
    }
        $countOffer1 = 0;
        $productIdsOffer1 = [];
        $finalAmtOffer1 = 0;  
        $remainingAmtOffer1 = 0;   
        $offer1Qty = 3;  
        $countOffer2 = 0;
        $productIdsOffer2 = [];
        $finalAmtOffer2= 0;
        $discountAmtOffer2 = 0;
        $remainingAmtOffer2 = 0;
        $offer2Qty = 2;

        foreach($carts as $v)
        { 
           if($v['product']['is_offer'] == 1 && $v['page_value'] == 1 && ($v['product']['offer'] == 1 || $v['product']['offer'] == 3) )
           {
              $countOffer1 = $countOffer1 + $v['quantity'];
           }
           else if($v['product']['is_offer'] == 1  && $v['page_value'] == 2 && ($v['product']['offer'] == 2 || $v['product']['offer'] == 3))
           {
              $countOffer2 = $countOffer2 + $v['quantity'];
           }
        }

        if($countOffer1 >= 3)
        {   
           return 1;
        }

        if($countOffer2 >= 2)
        {    
           return 2;
        }

        return 0;    
  }
  function get_offer_value($offer)
  {
     $offerValue = Offer::where('offer_type',$offer)->where('status',1)->first()->offer_value;
     return $offerValue;
  }

  function get_offer_discount_amount1()
  {
        if(is_user_logged_in())
        {
            $carts = Cart::where('user_id',auth()->user()->id)->where('order_id',null)->get();
            $totalAmt = $carts->sum('amount');
           // $totalAmt  $amount;
        }
        else
        {
            $carts = Session::get('carts');
            $totalAmt = array_sum(array_column(@$carts,'amount'));
        }
            $countOffer1 = 0;
            $productIdsOffer1 = [];
            $finalAmtOffer1 = 0;  
            $remainingAmtOffer1 = 0;   
            $offer1Qty = 3;  
            // $countOffer2 = 0;
            // $productIdsOffer2 = [];
            // $finalAmtOffer2= 0;
            // $discountAmtOffer2 = 0;
            // $remainingAmtOffer2 = 0;
            // $offer2Qty = 2;

            foreach($carts as $v)
            {
               if($v['product']['is_offer'] == 1 && $v['page_value'] == 1 && ($v['product']['offer'] == 1 || $v['product']['offer'] == 3))
               {
                  $countOffer1 = $countOffer1 + $v['quantity'];
               }
            }

            if($countOffer1 >= 3)
            {   
                $offer = Offer::where('offer_type',1)->where('status',1)->first();
                $offerCycle1 =  (int) ( $countOffer1 / $offer1Qty);
                if( $totalAmt > $offer->offer_value)
                {
                    $cartOrderByAmt = collect($carts)->sortBy('price')->toArray();
                    foreach($cartOrderByAmt as $v)
                    {  
                        if($v['product']['is_offer'] == 1 && $v['page_value'] == 1 && ($v['product']['offer'] == 1 || $v['product']['offer'] == 3))
                        { 
                            if($offer1Qty > 0 && $offer1Qty >= $v['quantity'])
                            { 
                                $offer1Qty = $offer1Qty -  $v['quantity'];
                            }
                            else if($offer1Qty > 0 && $offer1Qty < $v['quantity'])
                            {
                                $difference = $v['quantity'] - $offer1Qty;
                                $remainingAmtOffer1 = $remainingAmtOffer1 + $difference * $v['product']['price'];
                            }
                            else
                            {
                                $remainingAmtOffer1 = $remainingAmtOffer1 + $v['amount'];
                            }
                        }    
                        else
                        {
                            $remainingAmtOffer1 = $remainingAmtOffer1 + $v['amount'];
                        }
                    }

                    $finalAmtOffer1 = $offer->offer_value + $remainingAmtOffer1;
                    return $offerCycle1 * ( $totalAmt - $finalAmtOffer1);
                }    
            }

        return 0;        
  }

  function get_offer_discount_amount2()
  {
        if(is_user_logged_in())
        {
            $carts = Cart::where('user_id',auth()->user()->id)->where('order_id',null)->get();
            $totalAmt = $carts->sum('amount');
           // $totalAmt  $amount;
        }
        else
        {
            $carts = Session::get('carts');
            $totalAmt = array_sum(array_column(@$carts,'amount'));
        }
            // $countOffer1 = 0;
            // $productIdsOffer1 = [];
            // $finalAmtOffer1 = 0;  
            // $remainingAmtOffer1 = 0;   
            // $offer1Qty = 3;  
            $countOffer2 = 0;
            $productIdsOffer2 = [];
            $finalAmtOffer2= 0;
            $discountAmtOffer2 = 0;
            $remainingAmtOffer2 = 0;
            $offer2Qty = 2;

            foreach($carts as $v)
            {
               if($v['product']['is_offer'] == 1 && $v['page_value'] == 2 && ( $v['product']['offer'] == 2 || $v['product']['offer'] == 3))
               {
                  $countOffer2 = $countOffer2 + $v['quantity'];
               }
            }

            if($countOffer2 >= 2)
            {   
                $offer = Offer::where('offer_type',2)->where('status',1)->first();
                $offerCycle2 = (int) ($countOffer2 / $offer2Qty);
                $interval = $offerCycle2;
                $cartOrderByAmt = collect($carts)->sortBy('price')->toArray();

                foreach($cartOrderByAmt as $v)
                { 
                    if($v['product']['is_offer'] == 1 && $v['page_value'] == 2 && ($v['product']['offer'] == 2 || $v['product']['offer'] == 3))
                    {  
                        if($interval > 0 )
                        { 
                            // $reminder = (int) fmod($v['quantity'], $offer2Qty);

                            // if($reminder == 0)
                            // {
                            //    $cycle =  (int) ($v['quantity'] / $offer2Qty);
                            // }
                            // else
                            // {
                            //    $cycle = (int) ($v['quantity'] / $offer2Qty);
                            // }

                            if($interval <= $v['quantity'])
                            {
                                $cycle = $interval;
                            }
                            else if($interval > $v['quantity'])
                            {
                                $cycle = $v['quantity'];
                            }
                            else
                            {
                                $reminder = (int) fmod($v['quantity'], $offer2Qty);

                                if($reminder == 0)
                                {
                                   $cycle =  (int) ($v['quantity'] / $offer2Qty);
                                }
                                else
                                {
                                   $cycle = (int) ($v['quantity'] / $offer2Qty);
                                }
                            }

                            // $discountAmtOffer2 = $discountAmtOffer2 + ( (20/$cycle) *  $v['price'] )/100;
                            $discountAmtOffer2 = $discountAmtOffer2 + ( $cycle * ( $offer->offer_value *  $v['product']['price'] )/100);
                            $interval = $interval - $cycle;

                            // if($offer2Qty > 0 && $offer2Qty >= $v['quantity'])
                            // {                                 
                            //     $discountAmtOffer2 = $discountAmtOffer2 + ((20/$v['quantity']) * ( $v['quantity'] * $v['price'] ))/100; 
                            //     $offer2Qty = $offer2Qty - $v['quantity'];
                            // }
                            // else if($offer2Qty > 0 && $offer2Qty < $v['quantity'])
                            // {
                            //     $difference = $v['quantity'] - $offer2Qty;
                            //     $discountAmt = 0;
                            //     if($offer2Qty != 0)
                            //     {
                            //         $discountAmtOffer2 =  $discountAmtOffer2 + 20 * ($offer2Qty * $v['price'])/100;
                            //     }
                            
                            //     $remainingAmtOffer2 = $remainingAmtOffer2 + $difference * $v['price'];
                            // }
                        }    
                    }    
                    else
                    {
                        $remainingAmtOffer2 = $remainingAmtOffer2 + $v['amount'];
                    }
                }    

                // dd($totalAmt,$remainingAmtOffer2,$discountAmtOffer2);   $finalAmtOffer2 = $totalAmt - $remainingAmtOffer2;
                return $discountAmtOffer2 ;
            }

        return 0;        
  }

  function get_tax_total($taxable_amount)
  {
    $gst = env('GST_PERCENTAGE') ? env('GST_PERCENTAGE') :18; 
    return ($gst * $taxable_amount) / 100;
  }

  function get_cart_product_qty()
  {
    $cart_product_qty = array_sum(array_column(get_cart(), 'quantity'));
    return  $cart_product_qty;
  }


  function addToCart_live($product,$colorId,$sizeId,$pageValue)
  {
    if (is_user_logged_in())
    {
    
        $already_cart = Cart::where('user_id', auth()->user()->id)->where('order_id',null)->where('product_id', $product->id)->where('color_id', $colorId)->where('size_id', $sizeId)->where('page_value', $pageValue)->first();

        if($already_cart) 
        {
            $already_cart->quantity = $already_cart->quantity + 1;
            $already_cart->amount = $product->discounted_amt + $already_cart->amount;
            $already_cart->save();
            Wishlist::where(['user_id'=>Auth::id(),'cart_id'=>null,'product_id'=>$product->id])->update(['cart_id'=>$already_cart->id]);
        }
        else
        {
            $cart = new Cart;
            $cart->user_id = auth()->user()->id;
            $cart->code = $product->id.$colorId.$sizeId;
            $cart->product_id = $product->id;
            $cart->price = $product->discounted_amt;
            $cart->color_id = $colorId;
            $cart->size_id = $sizeId;
            $cart->page_value = $pageValue;
            $cart->quantity = 1;
            $cart->amount=$cart->discounted_amt * $cart->quantity;
            $cart->image = @$product->images()->first()->image; 
            $cart->save();
            Wishlist::where(['user_id'=>Auth::id(),'cart_id'=>null,'product_id'=>$product->id])->update(['cart_id'=>$cart->id]);
        }
    }
    else
    {
        
        $carts = Session::get('carts');
        /*
         * If product already exist into the cart then update QTY of product
         * Othewise add new product into the cart
         */

        if(isset($carts[$product->id.$colorId.$sizeId]) && @$carts[$product->id.$colorId.$sizeId]['color_id'] == $colorId && @$carts[$product->id.$colorId.$sizeId]['size_id'] == $sizeId && @$carts[$product->id.$colorId.$sizeId]['page_value'] == $pageValue):
            $carts[$product->id.$colorId.$sizeId]['quantity'] += 1;
            $carts[$product->id.$colorId.$sizeId]['amount'] = $product->discounted_amt  * $carts[$product->id.$colorId.$sizeId]['quantity'];
    
        else:
            // $carts[$product->id]['quantity'] =1; // Dynamically add initial qty
            // $carts[$product->id]['amount'] = $product->discounted_amt *1;
            // $carts[$product->id]['price'] = $product->discounted_amt ;
            // $carts[$product->id]['product'] = $product->toArray(); 
            // $carts[$product->id]['image'] = $product->images()->first()->image; 
            $carts[$product->id.$colorId.$sizeId]['quantity'] = 1; 
            $carts[$product->id.$colorId.$sizeId]['amount'] = $product->discounted_amt*1;
            $carts[$product->id.$colorId.$sizeId]['price'] = $product->discounted_amt ;
            $carts[$product->id.$colorId.$sizeId]['image'] = @$product->images()->first()->image;
            $carts[$product->id.$colorId.$sizeId]['product'] = $product->toArray(); 
            $carts[$product->id.$colorId.$sizeId]['color_id'] = $colorId; 
            $carts[$product->id.$colorId.$sizeId]['size_id'] = $sizeId; 
            $carts[$product->id.$colorId.$sizeId]['page_value'] = $pageValue; 
    
        endif;
    
        Session::put('carts', $carts);
    }

 }



 function removeToCart_live($product,$colorId,$sizeId,$pageValue)
 {
    if (is_user_logged_in())
    {    
        $already_cart = Cart::where('user_id', auth()->user()->id)->where('order_id',null)->where('product_id', $product->id)->where('color_id', $colorId)->where('size_id', $sizeId)->where('page_value', $pageValue)->first();

        if($already_cart) 
        { 
            if($already_cart->quantity==1)
            {
                $already_cart->delete();
            }
            else
            {
                $already_cart->quantity = $already_cart->quantity - 1;
                $already_cart->amount =  $already_cart->amount - $product->discounted_amt;
                $already_cart->save();
                Wishlist::where(['user_id'=>Auth::id(),'cart_id'=>null,'product_id'=>$product->id])->update(['cart_id'=>$already_cart->id]);
            }        
        }
    }
    else
    {        
        $carts = Session::get('carts');
        /*
         * If product already exist into the cart then update QTY of product
         * Othewise add new product into the cart
         */
    
        if(isset($carts[$product->id.$colorId.$sizeId])):
            if($carts[$product->id.$colorId.$sizeId]['quantity']==1)
            {
                unset($carts[$product->id.$colorId.$sizeId]);
            }
            else
            {
                $carts[$product->id.$colorId.$sizeId]['quantity'] -= 1;
                $carts[$product->id.$colorId.$sizeId]['amount'] = $product->discounted_amt  * $carts[$product->id.$colorId.$sizeId]['quantity'];   
            }
         
        endif;
    
        Session::put('carts', $carts);
    }


 }


 function is_product_in_cart($product_id)
 {
    if (is_user_logged_in())
    {
        $already_cart = Cart::where('user_id', auth()->user()->id)->where('order_id',null)->where('product_id', $product_id)->first();    
        return isset($already_cart) ? true :false;
    }
    else
    {
        $carts = Session::get('carts');
        return isset($carts[$product_id]) ? true :false;
    }    
 }
?>
