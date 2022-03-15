


<main class="main">
  <div class="page-header text-center" style="background-image: url('assets/images/page-header-bg.jpg')">
    <div class="container">
      <h1 class="page-title">Shopping Cart<span>Shop</span></h1>
    </div><!-- End .container -->
  </div><!-- End .page-header -->
  <nav aria-label="breadcrumb" class="breadcrumb-nav">
    <div class="container">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page">Shopping Cart</li>
      </ol>
    </div><!-- End .container -->
  </nav><!-- End .breadcrumb-nav -->
  @if(count(get_cart()))
    @php 
      $addresses = @Auth()->user() ? Auth()->user()->addresses :[];
      $user = @auth()->user();
      $freight_details = Session::get('freight_charge');
      $coupon_value = @Session::get('coupon') ? Session::get('coupon')['value'] :0;
    @endphp
    <div class="page-content">
      <div class="cart">
        <div class="container">
          <div class="row">
            <div class="col-lg-9">
              <table class="table table-cart table-mobile">
                <thead>
                  <tr style="text-align: center;">
                    <th>Product Image</th>
                    <th>Product Name</th>
                    <th>Color</th>
                    <th>Size</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Total</th>
                    <th></th>
                  </tr>
                </thead>
                @php
                  $taxable_amount =  get_cart_taxable_amount();												
                  $tax = 0;//  get_tax_total($taxable_amount);										  
                  $freight_charge = 0; //  @$freight_details['freight_charge'] ? $freight_details['freight_charge'] :0;
                  $grand_total =  $tax + $taxable_amount + $freight_charge - $coupon_value;		
                  $isGiftCard = 0;							
                @endphp
                <tbody>
                  
                  <form class="cart_update_form" action="{{route('cart.update')}}" method="POST">
                    @csrf
                    @php
                        $sub_total = 0;   
                    @endphp
                    @foreach(get_cart() as $cart)
                        @php
                          $total      =  $cart['product']['discounted_amt'] * $cart['quantity'];
                          $sub_total  += $total;
                          $color = @App\Models\Color::find(@$cart['color_id'])->name ;
                          $size = @App\Models\Size::find(@$cart['size_id'])->name;
                        @endphp

                        @if($total>0)
                          <tr class="single-row delete_cart_item{{$cart['product']['id']}}" style="text-align: center;">
                            <td class="product-col">
                              <div class="product">
                                <figure class="product-media">
                                  @if($cart['product']['is_giftcard'] == 0)
                                    <a href="{{route('product',[$cart['product']['slug']])}}">
                                      <img src="{{asset(@$cart['image'])}}" alt="Product image">
                                    </a>
                                  @endif
                                </figure>
                              </div> 
                            </td>
                            <td>    
                              <div class="product">
                                <h3 class="product-title">
                                  <a href="{{route('product',[$cart['product']['slug']])}}">{{$cart['product']['name']}}</a>
                                </h3><!-- End .product-title -->
                                <input type="hidden" id="product_price{{$cart['product']['id'].@$cart['color_id'].@$cart['size_id']}}" data-price="{{$cart['product']['price'].@$cart['color_id'].@$cart['size_id']}}">
                              </div><!-- End .product -->
                            </td>
                            <td>    
                                {{ $color }}   
                                <input type="hidden" id="product_{{@$cart['color_id']}}" data-value="{{@$cart['color_id']}}">
                            </td>
                            <td >    
                                {{ $size }}        
                                <input type="hidden" id="product_{{@$cart['size_id']}}" data-value="{{@$cart['size_id']}}">                     
                            </td>
                            <td class="price-col">&#8377; {{round($cart['product']['discounted_amt'])}}</td>
                            <td class="quantity-col">
                              <div class="e-pro-qty-block"> 
                                @if($cart['product']['is_giftcard'] == 0)
                                  @if($cart['quantity']>1)
                                    <span wire:click="removeToCart({{$cart['product']['id']}},{{@$cart['color_id']}},{{@$cart['size_id']}},{{@$cart['page_value']}})" class="input-number-increment" >-</span>
                                  @else                                    
                                    <span wire:click="alertConfirmDelete({{$cart['product']['id']}})" class="input-number-increment"><i class="fas fa-trash-alt"></i> X </span>
                                  @endif   
                                @endif   
                                <input style="width:50px;" name="quant[{{$cart['product']['id']}}]" class="input-number" data-product_id="{{$cart['product']['id'].@$cart['color_id'].@$cart['size_id']}}" id="cart_item_count{{$cart['product']['id'].@$cart['color_id'].@$cart['size_id']}}" type="number" value="{{$cart['quantity']}}" min="{{@$cart['product']['min_qty']}}" max="{{@$cart['product']['max_qty']}}" >
                                @if($cart['product']['is_giftcard'] == 0)
                                    <span wire:click="addToCart({{$cart['product']['id']}},{{@$cart['color_id']}},{{@$cart['size_id']}},{{@$cart['page_value']}})" class="input-number-increment" >+</span> 
                                @endif
                              </div>
                            </td>
                            <td class="total-col">&#8377; <span class="product_total{{$cart['product']['id'].@$cart['color_id'].@$cart['size_id']}}">{{round($total) }}</span></td>
                            <td class="remove-col">
                              <div class="e-pro-remove-block trash_btn" id="">
                                  <button type="button" class="btn-remove dltBtn" wire:click="alertConfirmDelete({{$cart['product']['id'].@$cart['color_id'].@$cart['size_id']}})" style="height:30px; border-radius:50%" title="Delete"><i class="fas fa-trash-alt"></i>X</button>
                              </div>
                            </td>
                          </tr>
                        @endif
                    @endforeach
                  
                </tbody>
              </table><!-- End .table table-wishlist -->

              {{-- <div class="cart-bottom">
                <div class="cart-discount">
                  <form action="#">
                    <div class="input-group">
                      <input type="text" class="form-control" required placeholder="coupon code">
                      <div class="input-group-append">
                        <button class="btn btn-outline-primary-2" type="submit"><i class="icon-long-arrow-right"></i></button>
                      </div><!-- .End .input-group-append -->
                    </div><!-- End .input-group -->
                  </form>
                </div><!-- End .cart-discount -->

                <a href="#" class="btn btn-outline-dark-2"><span>UPDATE CART</span><i class="icon-refresh"></i></a>
              </div><!-- End .cart-bottom --> --}}
            </div><!-- End .col-lg-9 -->
            <aside class="col-lg-3">
              <div class="summary summary-cart">
                <h3 class="summary-title">Cart Total</h3><!-- End .summary-title -->

                <table class="table table-summary">
                  <tbody>
                    <tr class="summary-subtotal">
                      <td>Subtotal:</td>
                      <td>&#8377; {{ round($taxable_amount)}}</td>
                    </tr><!-- End .summary-subtotal -->
                   
                    {{-- <tr class="summary-shipping">
                      <td>Shipping:</td>
                      <td>&nbsp;</td>
                    </tr>
                    

                    <tr class="summary-shipping-row">
                      <td>
                        <div class="custom-control custom-radio">
                          <input type="radio" id="free-shipping" name="shipping" class="custom-control-input">
                          <label class="custom-control-label" for="free-shipping">Free Shipping</label>
                        </div><!-- End .custom-control -->
                      </td>
                      <td>$0.00</td>
                    </tr><!-- End .summary-shipping-row -->

                    <tr class="summary-shipping-row">
                      <td>
                        <div class="custom-control custom-radio">
                          <input type="radio" id="standart-shipping" name="shipping" class="custom-control-input">
                          <label class="custom-control-label" for="standart-shipping">Standart:</label>
                        </div><!-- End .custom-control -->
                      </td>
                      <td>$10.00</td>
                    </tr><!-- End .summary-shipping-row -->

                    <tr class="summary-shipping-row">
                      <td>
                        <div class="custom-control custom-radio">
                          <input type="radio" id="express-shipping" name="shipping" class="custom-control-input">
                          <label class="custom-control-label" for="express-shipping">Express:</label>
                        </div><!-- End .custom-control -->
                      </td>
                      <td>$20.00</td>
                    </tr><!-- End .summary-shipping-row --> --}}

                    {{-- <tr class="summary-shipping-estimate">
                      <td>Estimate for Your Country<br> <a href="dashboard.html">Change address</a></td>
                      <td>&nbsp;</td>
                    </tr><!-- End .summary-shipping-estimate --> --}}
                   

                    <tr class="summary-total">
                      <td>Total:</td>
                      <td>&#8377; {{ round($grand_total) }}</td>
                    </tr><!-- End .summary-total -->
                  </tbody>
                </table><!-- End .table table-summary -->

                <a href="{{route('checkout')}}" class="btn btn-outline-primary-2 btn-order btn-block">Proceed For Payment</a>
              </div><!-- End .summary -->

              <a href="{{route('products')}}" class="btn btn-outline-dark-2 btn-block mb-3"><span>Continue Shopping</span><i class="icon-refresh"></i></a>
            </aside><!-- End .col-lg-3 -->
          </div><!-- End .row -->
        </div><!-- End .container -->
      </div><!-- End .cart -->
    </div><!-- End .page-content -->
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
  @endif  
</main><!-- End .main -->
<script src="//code.jquery.com/jquery-1.10.2.js"></script>
<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>





