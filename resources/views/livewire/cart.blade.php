
<section class="pd-top-cart">
  <div class="cart-container">
    <div class="cart-top container">
    <h2 style="">My Cart</h2>

      @if(count(get_cart()))

        <div>

          <div class="tableHead">
            <div class="single-row">
               <div class="e-product-intro">
                    <h2>Product</h2>
               </div>
                <div class="e-pro-price-block">
                    <h2>Price</h2>
                </div>
                <div class="e-pro-qty-block">
                    <h2>Quantity</h2>
                </div>
                <div class="e-pro-price-total-block">
                   <h2>Total</h2>
                </div>
                <div class="e-pro-remove-block">
                   <h2>Remove</h2>
                </div>
            </div>
          </div>
          <div class="tableBody">
           <!-- row start -->

            <form class="cart_update_form" action="{{route('cart.update')}}" method="POST">
                @csrf
                @php
                  $sub_total = 0;
                @endphp
                @foreach(get_cart() as $cart)
                    @php
                      $total      =  $cart['product']['price'] *$cart['quantity'];
                      $sub_total  += $total;
                    @endphp

                    @if($total>0)
          
                      <div class="single-row delete_cart_item{{$cart['product']['id']}}">

                          <div class="e-product-intro">
                            <div class="e-product-img">
                            <a href="{{route('product',[$cart['product']['slug']])}}">
                              <img src="{{@$cart['product']['a4sheet_view']}}">
                            </a>

                            </div>
                            <div class="e-pro-info">
                              <h2 class="e-pro-name">{{$cart['product']['name']}}</h2>
                              <h6 class="e-pro-color">{{$cart['product']['design']}}</h6>
                            </div>
                          </div>

                        <div class="e-pro-price-block">
                            <h2 class="e-pro-price"><span class="visible-xs-cart">Price :   </span> &#8377; {{$cart['product']['price']}}</h2>
                            <input type="hidden" id="product_price{{$cart['product']['id']}}" data-price="{{$cart['product']['price']}}">
                        </div>

                        <div class="e-pro-qty-block">

                          

                          @if($cart['quantity']>1)
                          <span wire:click="removeToCart({{$cart['product']['id'] }})" class="input-number-increment">-</span>

                          @else
                                    
                          <span wire:click="alertConfirmDelete({{$cart['product']['id']}})" class="input-number-increment"><i class="fas fa-trash-alt"></i> </span>
                          @endif



                          <input name="quant[{{$cart['product']['id']}}]" class="input-number" data-product_id="{{$cart['product']['id']}}" id="cart_item_count{{$cart['product']['id']}}" type="number" value="{{$cart['quantity']}}" min="{{@$cart['product']['min_qty']}}" max="{{@$cart['product']['max_qty']}}" >
                          <span wire:click="addToCart({{$cart['product']['id'] }})" class="input-number-increment" >+</span>

                        
                        
                        </div>

                        <div class="e-pro-price-total-block">
                            <h2 class="e-pro-price"><span class="visible-xs-cart">Total : </span> &#8377; <span class="product_total{{$cart['product']['id']}}">{{$total }}</span> </h2>
                        </div>

                        <div class="e-pro-remove-block trash_btn" id="">

                          {{-- <form  method="POST" action="{{route('cart-delete',$cart['product']['id'])}}"> --}}
                                {{-- <button type="button" class="btn btn-danger btn-sm dltBtn" data-id={{$cart['product']['id']}} style="height:30px; border-radius:50%" data-toggle="tooltip" data-placement="bottom" title="Delete"><i class="fas fa-trash-alt"></i></button> --}}
                                <button type="button" class="btn btn-danger btn-sm " wire:click="alertConfirmDelete({{$cart['product']['id']}})" style="height:30px; border-radius:50%" data-toggle="tooltip" data-placement="bottom" title="Delete"><i class="fas fa-trash-alt"></i></button>
                              {{-- </form> --}}
                        </div>

                      </div>

                      @endif
                @endforeach
              
            </form>
            
          </div>
          
        </div>


        <div class="subtotal-block">
          @if($show_order_note)
            <div class="subtotal-left form-group">
              <textarea style="color: black !important" class="form-control" wire:change="save_order_note"  wire:model="order_note"   cols="50" rows="4" placeholder="Enter your order not">{{Session::get('order_note')}}</textarea>            
            </div>
          @else
          <div class="subtotal-left">
            <a href="javascript:void(0);" wire:click="show_order_note" wire:keydown.enter="doSomething" class="grey-text line-bottom" >Add a note to your order</a>
          </div>
          @endif
       
          <div class="subtotal-right">
            <P><strong>Subtotal: &#8377; <span class="cart-subtotal">{{ $sub_total }}</span></strong></P>
            <p class="grey-text">Shipping taxes and discounts will be calculated at checkout page</p>

            <div>
              <a href="{{route('products')}}" class="btn btn-green">Continue Shopping</a>
              <a href="{{route('checkout')}}" class="btn btn-green">Checkout</a>
            </div>
          </div>
      </div>
      <p> <strong>  Get Shipping estimates</strong></p>
        <div class="shipping-form-block">

        
                <div class="row">

                  <div class="col-md-12 row-grp">
     
                  @php 
                  $freight_charge = Session::get('freight_charge');

               
                  @endphp
                  

                  <div class="col-md-3 m-mg-bott" >
                    <label for="">Postal/zip code</label>
                    <input type="number" min="0"  class="form-control" name="pincode" id="zip-code" value="{{old('pincode')? old('pincode') : @$freight_charge['pincode'] }}">

                    <p class="zip_alert"></p>
                  </div>

                 <div class="col-md-3">
                    <label for="" ></label>
                    <input type="button" class="btn btn-green btn-ship-submit"  id="submit-btn" value="Calculate Shipping">
                  </div>
                  <div class="col-md-3 m-mg-bott" style="
                  padding: 20px;">

                    <span style="font-size: x-large;
                    font-weight: bold;" class="freight_charge_result"> {!! @$freight_charge['freight_charge']?'&#x20B9; '. $freight_charge['freight_charge'] : '' !!}</span>

                </div>
                  
                </div>
                 </div>
        </div>

        @else

        <div style="min-height:400px">
          <br>
          <br>
          <h3 style="text-align: center">Your cart is empty!</h3>
          <p style="text-align: center">Add items to it now.</p>
          
        <div class="text-center">
          <a href="{{route('products')}}" style="background: #2874f0;
          color: #fff;" class="btn btn-lg pull-center">Shop Now</a>
        </div>
        </div>
        @endif

    </div>
  </div>
</section>






