<div>
    <div>
        @if ($message = Session::get('success'))
            <div class="p-4 mb-3 bg-green-400 rounded">
                    <p class="text-green-800">{{ $message }}</p>
            </div>
        @endif
        <h3 class="text-3xl text-bold">                                    
           {{-- Total {{ Helper::getTotalQuantity()}} Cart  --}}
        </h3>
        <div class="flex-1">
            @foreach ($cartItems as $item)
                <div class="dropdown-cart-products">   
                                    <div class="product">
                                        <div class="product-cart-details">
                                            <h4 class="product-title">
                                                <a href="product.html">{{$item['product']['name'] }}</a>
                                            </h4>
                                            <span class="cart-product-info">
                                                @if($item['quantity']>1)
                                                  <span wire:click="removeToCart({{$item['product']['id']}})" class="input-number-increment">-</span>                      
                                                @else                                                          
                                                  <span wire:click="alertConfirmDelete({{$item['product']['id']}})" class="input-number-increment"><i class="fas fa-trash-alt"></i> </span>
                                                @endif
                                                  <input name="quant[{{$item['product']['id']}}]" class="input-number" data-product_id="{{$item['product']['id']}}" id="cart_item_count{{$item['product']['id']}}" type="number" value="{{$item['quantity']}}" min="{{@$item['product']['min_qty']}}" max="{{@$item['product']['max_qty']}}" >
                                                  <span wire:click="addToCart({{$item['product']['id'] }})" class="input-number-increment" >+</span>
                                                  x {{$item['price']}}
                                            </span>
                                        </div><!-- End .product-cart-details -->

                                        <figure class="product-image-container">
                                            <a href="product.html" class="product-image">
                                                <img src="assets/images/products/cart/product-1.jpg" alt="product">
                                            </a>
                                        </figure>
                                        <a href="#" class="btn-remove" title="Remove Product" wire:click.prevent="alertConfirmDelete('{{$item['product']['id']}}')"><i class="icon-close"></i></a>
                                    </div><!-- End .product -->  
                </div><!-- End .cart-product -->                      
            @endforeach
        <div>
             {{-- Total: ${{ Cart::getTotal() }} --}}
    </div>
            {{-- <div class="mt-5">
                <a href="#" class="px-6 py-2 text-red-800 bg-red-300" wire:click.prevent="clearAllCart">Remove All Cart</a>
            </div> --}}
    
          {{-- </div>
    </div> --}}
</div>
