@extends('layouts.app')
@section('content')
@include('frontend_newold.layouts.svg-icons')
@livewire('cart')
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
            <div class="single-row delete_cart_item{{$cart['product']['id']}}">
              <div class="e-product-intro">
                <div class="e-product-img">
                  <a href="{{route('product',[$cart['product']['slug']])}}">
                    <img src="{{$cart['product']['a4sheet_view']}}">
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
                <span class="input-number-decrement cart_product_qunity_change" data-product_id="{{$cart['product']['id']}}" action_type="decrement">–</span>
                  <input name="quant[{{$cart['product']['id']}}]" class="input-number" data-product_id="{{$cart['product']['id']}}" id="cart_item_count{{$cart['product']['id']}}" type="number" value="{{$cart['quantity']}}" min="{{@$cart['product']['min_qty']}}" max="{{@$cart['product']['max_qty']}}" >
                <span class="input-number-increment cart_product_qunity_change"  data-product_id="{{$cart['product']['id']}}" action_type="increment">+</span>
              </div>

              <div class="e-pro-price-total-block">
                  <h2 class="e-pro-price"><span class="visible-xs-cart">Total : </span> &#8377; <span class="product_total{{$cart['product']['id']}}">{{$total }}</span> </h2>
              </div>

              <div class="e-pro-remove-block trash_btn" id="">
                <button type="button" class="btn btn-success btn-sm update_cart_btn" data-id={{$cart['product']['id']}} style="height:30px;border-radius:50%" data-toggle="tooltip" data-placement="bottom" title="Update"><i class="fas fa-check"></i></button>

                  <button type="button" class="btn btn-danger btn-sm dltBtn" data-id={{$cart['product']['id']}} style="height:30px; border-radius:50%" data-toggle="tooltip" data-placement="bottom" title="Delete"><i class="fas fa-trash-alt"></i></button>
              </div>

            </div>

          
            @endforeach
          
          </form>
            
          </div>
          
        </div>

        <div class="subtotal-block">
          <div class="subtotal-left order_note_button_div {{\Session::get('order_note') ? 'hide' :''}}">
            <a href="javascript:void(0);" class="grey-text line-bottom add_order_note" >Add a note to your order</a>
          </div>
          <div class="subtotal-left {{\Session::get('order_note') ? '' :'order_note_input_div'}}  form-group">
            <textarea style="color: black !important" class="form-control" name="order_note" id="order_note" cols="55" rows="5" placeholder="Enter your order not">{{\Session::get('order_note')}}</textarea>
          </div>
          <div class="subtotal-right">
            <P><strong>Subtotal: &#8377; <span class="cart-subtotal">{{ get_cart_taxable_amount() }}</span></strong></P>
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
                  {{-- <div class="col-md-3 m-mg-bott">
					{}
                    <label for="">Country</label>
                   <select class="form-control select-search" name="country" id="country" >
                    <option disabled selected value="">--Select Country--</option>
                                        <option value="1">Afghanistan</option>
                                        <option value="2">Albania</option>
                  </select>
                  </div> --}}

                  {{-- <div class="col-md-3 m-mg-bott">
                   <label for="">State</label>
                   <select class="form-control select-search" name="state" id="state" >
                    <option disabled selected value="">--Select Country--</option>
                                        <option value="1">MAHA</option>
                                        <option value="2">MAHA</option>
                  </select>
                  </div> --}} 
                  @php 
                  $freight_charge = Session::get('freight_charge');

               
                  @endphp
                  

                  <div class="col-md-3 m-mg-bott">
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
@endsection

@section('scripts')
<script src="{{asset('backend/js/sweetalert.min.js')}}"></script>

<script type="text/javascript">
	// e-commerce js

  // We're sorry! Only 5 unit(s) allowed in each order

  $( document ).ready(function() {



      $('.order_note_input_div').hide();
      $('.add_order_note').click(function(){

        $('.order_note_input_div').show();
        $('.order_note_button_div').hide();
      })

      $('#order_note').on('change',function(){

        var order_note = $(this).val();

        
        $.ajax({
            url:"/save-order-note",
            data:{_token:"{{csrf_token()}}",order_note},
            type:"POST",
            success:function(response){
        
            }
            
            });
      });

      $('.input-number').on('input',function(){
        var product_id = $(this).data('product_id');
        var product_qty = parseInt($(this).val());

        var product_price = $('#product_price'+product_id).data('price');

        $('.product_total'+product_id).text(product_price*product_qty);
      
      })

      $('.input-number').on('change',function(){
        // var product_id = $(this).data('product_id');
        // var product_qty = parseInt($(this).val());
        // var min = $('#cart_item_count'+product_id).attr('min');
        // var product_price = $('#product_price'+product_id).data('price');

        
        // if(min <=product_qty){

        // }else{
        //   $('#cart_item_count'+product_id).val(min);
        //   $('.product_total'+product_id).text(product_price*min);

        //   swal({
        //           // title: "Are you sure?",
        //           text: "We're sorry! Minimum limit "+min+" unit(s) allowed in this product",
        //           icon: "warning",
        //           buttons: false,  
        //           // dangerMode: false,
        //       });
        // }
      })  


      $('.update_cart_btn').click(function(){
          $('.cart_update_form').submit();
      })


      $('.cart_product_qunity_change').click(function(e){
        var product_id = $(this).data('product_id');
        var action = $(this).attr('action_type');


        // var min = $('#cart_item_count'+product_id).attr('min');
        // var max = $('#cart_item_count'+product_id).attr('max');

        //Cart product price calculate 
       

        
        if(action =='decrement'){
          var product_qty = $('#cart_item_count'+product_id).val();
          var product_price = $('#product_price'+product_id).data('price');
          --product_qty

          if(product_qty >=0){
            $('.product_total'+product_id).text(product_price*product_qty);
            $('#cart_item_count'+product_id).val(product_qty);
          }
        
          else
          swal({
                  // title: "Are you sure?",
                  text: "We're sorry! Invalid quntity",
                  icon: "warning",
                  buttons: false,  
                  // dangerMode: false,
              });
        }else{
          var product_qty = $('#cart_item_count'+product_id).val();
          var product_price = $('#product_price'+product_id).data('price');
          ++product_qty
          $('.product_total'+product_id).text(product_price*product_qty);

          $('#cart_item_count'+product_id).val(product_qty);
        }
      })
    
      $('.dltBtn').click(function(e){
          // var form=$(this).closest('form');
            var dataID=$(this).data('id');
            e.preventDefault();
            swal({
                  title: "Are you sure?",
                  text: "Are you want to remove this item?",
                  icon: "warning",
                  buttons: true,  
                  dangerMode: true,
              })
              .then((willDelete) => {
                  if (willDelete) {
                      $.ajax({
                          url:"{{url('cart-delete')}}/"+dataID,
                          data:{_token:"{{csrf_token()}}"},
                          type:"POST",
                          success:function(response){
                      
                            if(response.cart_count){


                              swal({
                                // title: "Are you sure?",
                                text: response.msg,
                                icon: "success",
                                buttons: false,  
                                // dangerMode: false,
                              });

                        
                                $('.delete_cart_item'+dataID).hide();  
                                $('.cart-count').text(response.cart_count);
                                $('.cart-subtotal').text(response.cart_subtotal);
                            }else{

                              location.reload(true);
                            }
                               

                             }
                          });
                  } else {
                      // swal("Your product is not remo!");
                  }
              });
        })


    $('.btn-ship-submit').on('click',function(){
      $('.zip_alert').html('');
      $('.freight_charge_result').html('');

        var pincode = $('#zip-code').val();
        var msg = '';
        if(true){
            $.ajax({
            url:"/calculate-fright-charge",
            data:{_token:"{{csrf_token()}}",pincode},
            type:"POST",
            success:function(response){
        
              if(response.freight_charge != undefined){
                $('.freight_charge_result').html(' &#x20B9; '+response.freight_charge);

              }

              if(response.pincode[0] != undefined)
                  $('.zip_alert').html('<span class="text-danger">'+response.pincode[0]+'</span>');
              }
            
            });
        }else{
        }
    })
});

</script>
@endsection


