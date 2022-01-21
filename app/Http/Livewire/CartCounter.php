<?php

namespace App\Http\Livewire;

use Livewire\Component;

class CartCounter extends Component
{


    public $count = 0;

    protected $listeners = ['updateCartCount' => 'updateCartCount',];


    public function updateCartCount()
    {
        $this->count = get_cart_count();
    }

    public function mount()
    {
        $this->updateCartCount();
    }


    public function render()
    {
        return view('livewire.cart-counter');
    }
}
