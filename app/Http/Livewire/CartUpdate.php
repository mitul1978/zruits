<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Product;
use Session;

class CartUpdate extends Component
{   
    public $cartItems = [];
    public $quantity = 1;

  

    public function updateCart($product_id,$colorId,$sizeId,$pageValue)
    {  
        $product = Product::find($product_id);
        addToCart_live($product,$colorId,$sizeId,$pageValue);
        $freight_charge =  Session::get('freight_charge');

        if($freight_charge)
        {
            update_fright_charge($freight_charge['pincode']);
        }

        $this->emit('cartUpdated');
    }

    public function mount($item)
    {
        $this->cartItems = $item;
        $this->quantity = $item['quantity'];
    }

    public function render()
    {
        return view('livewire.cart-update');
    }
}
