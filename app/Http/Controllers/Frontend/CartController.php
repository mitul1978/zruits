<?php

namespace App\Http\Controllers\Frontend;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Cart;
use App\Models\Category;
use Session;
use Alert;
use View;
class CartController extends Controller
{
    protected $product=null;
    protected $categoriesHeader;

    public function __construct(Product $product){
        $this->product=$product;

        $this->categoriesHeader = Category::where('status',1)->where('show_on_header',1)->get();
        View::share('categoriesHeader', $this->categoriesHeader);
    }

    public function cart(){
        
    }

    public function goToCart(){
        return view('frontend_newold.pages.cart2');
    }

    public function viewCart()
    {return view('frontend_newold.pages.cart2');
        //return view('user.pages.cart');
    }

    public function collabration()
    {
        return view('frontend.collabration');
    }

    public function addToCart($slug){

        if (empty( $slug)) {
            request()->session()->flash('error','Invalid Products');
            return back();
        }
        $product = Product::where('slug',  $slug)->first();

        // return $product;
        if (empty($product)) {
            request()->session()->flash('error','Invalid Products');
            return back();
        }

        addToCart($product);

        request()->session()->flash('success','Product successfully added to cart');
        return back(); 
    }



    public function ajax_addToCart(Request $request){

        $product = Product::where('id',  $request->product_id)->first();
        $colorId = $request->colorId;
        $sizeId = $request->sizeId;
        $pageValue = isset($request->pageValue)?$request->pageValue:0;

        if (empty($product)) 
        {
            return response(['error'=>'Something is going wrong'], 200);
        }

        if($product->is_giftcard == 0)
        {
            if (is_user_logged_in())
            {
                addToCart($product,$colorId,$sizeId,$pageValue);
            }
            else
            {
                addToCartForGuestInSession($product,$colorId,$sizeId,$pageValue);
            }
        }    
        else
        {
            if (is_user_logged_in())
            {
                addGiftToCart($product,$request->toName,$request->toEmail,$request->message,$request->fromName);
            }
            else
            {
                addGiftToCartForGuestInSession($product,$request->toName,$request->toEmail,$request->message,$request->fromName);
            }
        }

        return response(['add_to_cart'=>'Added',
        'cart_count' =>get_cart_count(),
        'msg'=>strtoupper($product->product_texture.' '. $product->name.' successfully added to cart')], 200);

    }
    


    public function singleAddToCart(Request $request){
        $request->validate([
            'slug'      =>  'required',
            'quant'      =>  'required',
        ]);

        // dd($request->quant[1]);


        $product = Product::where('slug', $request->slug)->first();
        if($product->stock < $request->quant[1]){
            return back()->with('error','Out of stock, You can add other products.');
        }
        if ( ($request->quant[1] < 1) || empty($product) ) {
            request()->session()->flash('error','Invalid Products');
            return back();
        }

        $already_cart = Cart::where('user_id', auth()->user()->id)->where('order_id',null)->where('product_id', $product->id)->first();

        // return $already_cart;

        if($already_cart) {
            $already_cart->quantity = $already_cart->quantity + $request->quant[1];
            // $already_cart->price = ($product->price * $request->quant[1]) + $already_cart->price ;
            $already_cart->amount = ($product->price * $request->quant[1])+ $already_cart->amount;

            if ($already_cart->product->stock < $already_cart->quantity || $already_cart->product->stock <= 0) return back()->with('error','Stock not sufficient!.');

            $already_cart->save();

        }else{

            $cart = new Cart;
            $cart->user_id = auth()->user()->id;
            $cart->product_id = $product->id;
            $cart->price = ($product->price-($product->price*$product->discount)/100);
            $cart->quantity = $request->quant[1];
            $cart->amount=($product->price * $request->quant[1]);
            if ($cart->product->stock < $cart->quantity || $cart->product->stock <= 0) return back()->with('error','Stock not sufficient!.');
            // return $cart;
            $cart->save();
        }
        request()->session()->flash('success','Product successfully added to cart.');
        return back();
    }

    public function cartDelete(Request $request,$product_id){

        if (is_user_logged_in()){
    
            $cart = Cart::where('user_id',auth()->user()->id)->where('product_id',$product_id)->whereNull('order_id')->first();
            

            if ($cart) {
                $cart->delete();
             
                // Alert::success($cart->product->name. ' has been removed from the Cart');
            }else{
                Alert::error('Something is went wrong');
            }
        }else{
            $carts = Session::get('carts');
            // Alert::success($carts[$product_id]['product']['name'].' has been removed from the Cart');

            unset( $carts[$product_id] );
            Session::put('carts', count($carts) ? $carts :null);
        }


        return response([
        'cart_count' =>get_cart_count(),
        'cart_subtotal'=>get_cart_taxable_amount(),
        'msg'=>'Product successfully removed from cart'], 200);

    }

    public function cartUpdate(Request $request){
        if(@count($request->quant)){
            foreach ($request->quant as $product_id=>$quant) {
     
                if (is_user_logged_in()){
                    $cart = Cart::whereNull('order_id')
                                ->where('user_id',auth()->user()->id)
                                ->where('product_id', $product_id)->first();

                    if($quant > 0 && $cart) {
                        // return $quant;

                        // if($cart->product->stock < $quant){
                        //     request()->session()->flash('error','Out of stock');
                        //     return back();
                        // }
                        // $cart->quantity = ($cart->product->stock > $quant) ? $quant  : $cart->product->stock;
                        $cart->quantity =  $quant ;
                        // return $cart;

                        // if ($cart->product->stock <=0) continue;
                        $after_price=($cart->product->price-($cart->product->price*$cart->product->discount)/100);
                        $cart->amount = $after_price * $quant;
                        // return $cart->price;
                        $cart->save();
                    }else if($quant==0){
                        $cart->delete();
                        // $error[] = 'Cart Invalid!';
                    }
                }else{

                    $carts = Session::get('carts');


                    /*
                     * If product already exist into the cart then update QTY of product
                     * Othewise add new product into the cart
                     */
                    
                    $product =  Product::find($product_id);
                
                    if(isset($carts[ $product_id]) && $quant > 0):
                     
                        $carts[$product->id]['quantity'] =$quant; // Dynamically add initial qty
                        $carts[$product->id]['amount'] = $product->price*$quant;
                        $carts[$product->id]['price'] = $product->price;
                        $carts[$product->id]['product'] = $product->toArray(); 
                    else:
                        if(isset($carts[ $product_id]))
                        unset($carts[$product_id]);

                    endif;
          
                    
                        
                    Session::put('carts', $carts);

                    $freight_charge =  Session::get('freight_charge');

                    if($freight_charge){
                        update_fright_charge($freight_charge['pincode']);
                    }
                    
                }
            }
            Alert::success('Your cart has been updated');

            return back();
        }else{

            Alert::success('Something is going wrong');
            return back();
        }
    }

    // public function addToCart(Request $request){
    //     // return $request->all();
    //     if(Auth::check()){
    //         $qty=$request->quantity;
    //         $this->product=$this->product->find($request->pro_id);
    //         if($this->product->stock < $qty){
    //             return response(['status'=>false,'msg'=>'Out of stock','data'=>null]);
    //         }
    //         if(!$this->product){
    //             return response(['status'=>false,'msg'=>'Product not found','data'=>null]);
    //         }
    //         // $session_id=session('cart')['session_id'];
    //         // if(empty($session_id)){
    //         //     $session_id=Str::random(30);
    //         //     // dd($session_id);
    //         //     session()->put('session_id',$session_id);
    //         // }
    //         $current_item=array(
    //             'user_id'=>auth()->user()->id,
    //             'id'=>$this->product->id,
    //             // 'session_id'=>$session_id,
    //             'title'=>$this->product->title,
    //             'summary'=>$this->product->summary,
    //             'link'=>route('product-detail',$this->product->slug),
    //             'price'=>$this->product->price,
    //             'photo'=>$this->product->photo,
    //         );

    //         $price=$this->product->price;
    //         if($this->product->discount){
    //             $price=($price-($price*$this->product->discount)/100);
    //         }
    //         $current_item['price']=$price;

    //         $cart=session('cart') ? session('cart') : null;

    //         if($cart){
    //             // if anyone alreay order products
    //             $index=null;
    //             foreach($cart as $key=>$value){
    //                 if($value['id']==$this->product->id){
    //                     $index=$key;
    //                 break;
    //                 }
    //             }
    //             if($index!==null){
    //                 $cart[$index]['quantity']=$qty;
    //                 $cart[$index]['amount']=ceil($qty*$price);
    //                 if($cart[$index]['quantity']<=0){
    //                     unset($cart[$index]);
    //                 }
    //             }
    //             else{
    //                 $current_item['quantity']=$qty;
    //                 $current_item['amount']=ceil($qty*$price);
    //                 $cart[]=$current_item;
    //             }
    //         }
    //         else{
    //             $current_item['quantity']=$qty;
    //             $current_item['amount']=ceil($qty*$price);
    //             $cart[]=$current_item;
    //         }

    //         session()->put('cart',$cart);
    //         return response(['status'=>true,'msg'=>'Cart successfully updated','data'=>$cart]);
    //     }
    //     else{
    //         return response(['status'=>false,'msg'=>'You need to login first','data'=>null]);
    //     }
    // }

    // public function removeCart(Request $request){
    //     $index=$request->index;
    //     // return $index;
    //     $cart=session('cart');
    //     unset($cart[$index]);
    //     session()->put('cart',$cart);
    //     return redirect()->back()->with('success','Successfully remove item');
    // }

    public function checkout(Request $request){
        // $cart=session('cart');
        // $cart_index=\Str::random(10);
        // $sub_total=0;
        // foreach($cart as $cart_item){
        //     $sub_total+=$cart_item['amount'];
        //     $data=array(
        //         'cart_id'=>$cart_index,
        //         'user_id'=>$request->user()->id,
        //         'product_id'=>$cart_item['id'],
        //         'quantity'=>$cart_item['quantity'],
        //         'amount'=>$cart_item['amount'],
        //         'status'=>'new',
        //         'price'=>$cart_item['price'],
        //     );

        //     $cart=new Cart();
        //     $cart->fill($data);
        //     $cart->save();
        // }
        return view('frontend.pages.checkout');
    }
}
