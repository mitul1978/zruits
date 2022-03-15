<?php

namespace App\Http\Livewire;

use Livewire\Component;
// use App\Models\Cart;
use App\Models\Product;
use Session;

class CartList extends Component
{   
    protected $listeners = ['listCartProducts' => 'listCartProducts','cartDelete','removeToCart','cartUpdated' => '$refresh'];
    public $cartItems = [];

    public $show_order_note = 0;
    public $order_note;
 

    // public function clearAllCart()
    // {
    //       Cart::clear();  
    //       session()->flash('success', 'All Item Cart Clear Successfully !');
    // }

    public function listCartProducts(){
        $this->cartItems = get_cart();
    }

    public function mount()
    {  
        $this->show_order_note = Session::get('order_note') ? 1 :0;
        $this->order_note =  Session::get('order_note');
        $this->listCartProducts();
        //$this->emit('updateCartCount');       
    }

    public function alertConfirmDelete($product_id)
    {
        $this->dispatchBrowserEvent('swal:confirm',[
                'product_id'=>$product_id,
                'type' => 'warning',  
                'message' => 'Are you sure?', 
                'text' => 'Are you want to remove this item?'
        ]);
    }


    public function removeToCart($product_id,$colorId,$sizeId,$pageValue)
    {
        $product = Product::find($product_id);
        removeToCart_live($product,$colorId,$sizeId,$pageValue);
        $freight_charge =  Session::get('freight_charge');
        if($freight_charge)
        {
            update_fright_charge($freight_charge['pincode']);
        }

        $this->emit('updateCartCount');
    }

    public function cartDelete($product_id)
    {
        if (is_user_logged_in())
        {
            $cart = Cart::where('user_id',auth()->user()->id)->where('product_id',$product_id)->whereNull('order_id')->first();
            $cart->delete();           
        }
        else
        {
            $carts = Session::get('carts');
            unset( $carts[$product_id] );
            Session::put('carts',$carts );
        }
        
        $this->emit('updateCartCount');
    }

    public function render()
    {   
        $taxable_value =  get_cart_taxable_amount();
        return view('livewire.cart-list',compact('taxable_value'));
    }

    
    public function addToCart($product_id,$colorId,$sizeId,$pageValue){
        $product = Product::find($product_id);
        addToCart_live($product,$colorId,$sizeId,$pageValue);
        $freight_charge =  Session::get('freight_charge');

        if($freight_charge){
            update_fright_charge($freight_charge['pincode']);
        }
    }

    public function show_order_note(){

        $this->show_order_note=1;
    }


    public function save_order_note(){

        Session::put('order_note', $this->order_note );
       
    }

    // public function removeCart($id)
    // {
    //     Cart::remove($id);
    //     session()->flash('success', 'Item has removed !');
    // }
}
