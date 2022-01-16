@extends('frontend.layouts.app')
@section('content')
@include('frontend.layouts.svg-icons')


<section class="pd-top-cart checkout-page">

  <div class="container">
  	<div class="col-md-12 no-padding">
  		<div class="col-md-7 pd-right-50 border-right-grey">
  			<div class="flex-center flex-wrap-mob">
  				<h3 class="title-cart ">Contact Information</h3>
          @php 

          $addresses = @Auth()->user() ? Auth()->user()->addresses :[];
          $user = @auth()->user();
          $freight_details = Session::get('freight_charge');
          $coupon_value = @Session::get('coupon') ? Session::get('coupon')['value'] :0;
           @endphp
          @if(!is_user_logged_in())
  				<p>Already have an account? 	<a class="link-orange" data-toggle="modal" href="javascript:void(0)" onclick="openLoginModal();">Log in</a></p>
          @endif
        </div>
        <form action="{{url('place-order')}}" class="place_order" method="POST">
          @csrf



        @if(count($addresses))

        <div>

          <div class="col-md-12 row-grp no-padding custom-checkbox">                    
            <!-- v-add1 radio-->
            <h5>Select a delivery address
            </h5>
            <p>Is the address you'd like to use displayed below? If so, click the corresponding address card. Or you can enter a new delivery address. </p>
            
            @foreach ($addresses  as $address)
              <div class="col-md-6 user-address-div{{$address->id}}">
            <input class="address_id" {{$address->is_primary ? 'checked' :''}} data-pincode="{{$address->pincode}}" type="radio" name="address_id" id="address_id{{$address->id}}" value="{{$address->id}}">
            <label for="address_id{{$address->id}}">                    
                <div class="block-areas block-add">
                  <div class="checkmark"><i class="fa fa-check-circle" aria-hidden="true"></i></div>                      
                  <p class="v-address">
                    <b>{{$address->first_name}} {{$address->last_name}} @if($address->is_primary) <span class="badge badge-success">Primary</span>  @endif</b><br>
                    {{$address->mobile}} <br>
                    {{$address->email}} <br>
                    {{$address->address}} <br> {{@$address->get_city->name}}  {{@$address->get_state->name}} 
                    <br>
                    {{@$address->pincode}} <br>
                  </p>
               </div>

               <div class="v-edit-add-block">                    
                   <button type="button" class="address_action_btn" action="edit" data-address_id="{{$address->id}}"><i class="fa fa-edit" aria-hidden="true"></i></button>
                   <button type="button"  class="address_action_btn" action="delete" data-address_id="{{$address->id}}"><i class="fa fa-trash" aria-hidden="true"></i></button>                  
               </div>
            </label>
          </div>
            @endforeach
            
            <input  {{old('address_id')=='new' ? 'checked' : ''}} type="radio" class="address_id" name="address_id" id="new" value="new">
            <label class="col-md-12" for="new">
              <div class="block-areas block-add">
                  <div class="checkmark"><i class="fa fa-check-circle" aria-hidden="true"></i></div>

                  Add new Shipping Address                    
               </div>

             
            </label>  

        </div>

        </div>
        @endif

          

  
  			<div class="new_address_block @if(count($addresses) && old('address_id') !='new') hide @endif">
          <div class="col-md-12 row-grp no-padding">
            <div class="col-md-6 pd-lt-0 m-pd-right-0">
          <input type="tel" class="form-control" name="mobile" value="{{old('mobile') ? old('mobile') :@$user->name}}" placeholder="Mobile number">

            </div>
            <div class="col-md-6 pd-lt-0 m-pd-right-0">
          <input type="email" class="form-control " name="email" value="{{old('email') ? old('email') :@$user->email}}" placeholder="Enter your email (Optional)">

            </div>
        </div>
          @error('phone')
        <span class="text-danger">{{$message}}</span>
        <br>

        @enderror
        <span class="contact-msg-info">  <i class="fa fa-info"></i> Please share the correct information so that we can reach you.</span>
        @error('phone')
        <span class="text-danger">{{$message}}</span>
        <br>

        @enderror
        <br>
  				<h3 class="title-cart"> Add a new delivery address</h3>

  				<div>
  					<div class="form-ship-add">
  						<div class="col-md-12 row-grp no-padding">
			                <div class="col-md-6 pd-lt-0 m-pd-right-0">
			                  <input type="text" class="form-control"  name="first_name" id="first_name" placeholder="First name" value="{{old('first_name') ? old('first_name') :'' }}">
                        @error('first_name')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                      </div>
			                <div class="col-md-6 pd-lt-0 pd-rt-0">
			                  <input type="text" class="form-control" name="last_name" id="last_name" Placeholder="Last name" value="{{old('last_name')}}">
                        @error('last_name')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                      </div>
			              </div>

                    <div class="col-md-12 pd-lt-0 row-grp pd-rt-0">
                        <textarea type="text" class="form-control" name="address" id="address" placeholder="Enter your address" value="">{{old('address')}}</textarea>
                        @error('address')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                      </div>
                

                    <div class="col-md-12 row-grp no-padding">
                       <div class="col-md-4 pd-lt-0 m-pd-right-0">
			                  {{-- <input type="text" class="form-control" name="state" id="state" Placeholder="State name" value="{{old('state')}}"> --}}

                       <select class="form-control select-search state_id" name="state_id" id="state" >
                        @foreach ($states as  $state_id =>  $state)
                        @if(old('state_id'))
                        <option  {{old('state_id')==$state_id ? 'selected' : ''}} value="{{$state_id}}">{{ $state}}</option>
                        @else
                        <option  {{25 ==$state_id ? 'selected' : ''}} value="{{$state_id}}">{{ $state}}</option>

                        @endif
                       @endforeach
                       @error('state_id')
                       <span class="text-danger">{{$message}}</span>
                       @enderror
                      </select>
                  </div>
                     <div class="col-md-4 pd-lt-0 m-pd-right-0">

			                  {{-- <input type="text" class="form-control" name="city" id="city" Placeholder="City name" value="{{old('city')}}"> --}}

                      <select class="form-control select-search city" name="city_id" id="city_id" >
                      
                      </select>
                  @error('city_id')
                  <span class="text-danger">{{$message}}</span>
                  @enderror
                  </div>
                       <div class="col-md-4 pd-lt-0 pd-rt-0">
                        <input type="text" class="form-control pincode" name="pincode" id="pinCode" placeholder="PIN Code" value="{{old('pincode') ? old('pincode') : @$freight_details['pincode'] }}">
                        @error('pincode')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                      </div>
                    </div>
                    <input {{old('dnd') ? 'checked' :'' }} type="checkbox" id="dnd" name="dnd" value="1"><label for="dnd" style="margin-left:5px; ">Keep me up to date on news and exclusive offers</label>

<br>
                  <input type="checkbox" name="is_primary" {{old('is_primary') ? 'checked' :'' }} value="1"><span style="margin-left:5px; ">Save this information for next time</span>


            <div class="flex-center no-padding">
              <div class="return-block">
                  <a href="{{route('cart')}}" class="link-orange"><i class="fa fa-angle-left" style="margin-right: 2px;"></i> Return to cart</a>
              </div>
              <div class="continue-block text-right">
                 <a href="{{route('products')}}" class="btn btn-green">Continue Shopping</a>
              </div>
            </div>
          </div>

          </div>

  			</div>
  		</div>
  		<div class="col-md-5 pd-left-50 ">
  			<div>
         

          @php

          $taxable_amount =  get_cart_taxable_amount();
          $tax =  get_tax_total($taxable_amount);
        
          $freight_charge =  @$freight_details['freight_charge'] ? $freight_details['freight_charge'] :0;
          $grand_total =  $tax + $taxable_amount+$freight_charge - $coupon_value;

        @endphp
          @foreach (get_cart() as $cart)
          @php
            $total      =  $cart['product']['price'] *$cart['quantity'];
          @endphp
            <div class="flex-center">
             <div class="e-product-intro">
                <div class="e-product-img">
                  <img src="{{$cart['product']['a4sheet_view']}}">

                  <span class="num-item">{{$cart['quantity']}}</span>
                </div>
                <div class="e-pro-info">
                  <h2 class="e-pro-name">{{$cart['product']['name']}} </h2>
                  <h6 class="e-pro-color">{{$cart['product']['design']}}</h6>
                </div>
              </div>

              <div class="e-pro-price-block">
                  <h2 class="e-pro-price"> {!! $rupee !!} {{$total }}</h2>
              </div>
            </div>

            @endforeach
          
        </div>


        <div class="total-block">
          <div class="flex-center">
            <span>Taxable Amount</span>
            <span> {!! $rupee !!} {{ $taxable_amount}}</span>
         </div>

         <div class="flex-center">
          <span>Tax(18%)</span>
          <span> {!! $rupee !!} {{ $tax}}</span>
       </div>

         <div class="flex-center">

         @if(@Session::get('coupon')['code'])
         <span>Coupon Discount</span>
         <span>  {!! $rupee !!} {{ Session::get('coupon')['value']}}</span>
         @endif
         </div>
         <div class="flex-center">
            <span>Shipping Charges</span>
            <span class="freight_charge_result"> {!! $rupee !!}  {{$freight_charge}}</span>
         </div>
         
        </div>

        <div>
          <div class="flex-center">
            <span>Total</span>
            <span class="grand_total">{!! $rupee !!}  {{ $grand_total }}</span>
          </div>
          
        </div>
        <div>
          <h3 class="title-cart">Payment Options</h3>
         

         <div class="flex-center">
          <span><input checked type="radio" value="razorpay" name="payment_method"></span>
          <span> Razorpay</span>
         </div>
          {{-- <div class="flex-center">
            <span><input  type="radio" value="cod" name="payment_method"></span>
            <span> Cash on Delivery</span>
         </div> --}}

        </div>
</form>

        <div>
          <div class="coupon">
            <h3 class="title-cart">Coupon </h3>
            <form action="{{route('coupon-store')}}" method="POST">
                @csrf
                <div class="row">
                  <div class="col-md-9">
                      <input class="form-control" name="code" placeholder="Enter Your Coupon" value="{{@Session::get('coupon')['code']}}">
                  </div>
                  <div class="col-md-3">
                    <button class="btn">{{@Session::get('coupon')['code'] ? 'Remove' :'Apply'}}</button>
                  </div>
                </div>
              </form>
            </div>
        </div>
        <div>
     

         <div class="text-right">
           <br>

           @if(!is_user_logged_in())
           <button type="button" class="btn btn-green" data-toggle="modal" href="javascript:void(0)" onclick="openLoginModal();"> Place Order</button>


           @else
           <button type="button" class="btn btn-green place_order_btn">Place Order</button>

           @endif

         </div>
        </div>
        

  		</div>
      
  	</div>
  </div>
</section>


<div class="modal fade white-text-modal" id="edit-user-address" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-md">
     <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel"> Edit Address<Address></Address> </h4>
      </div>
      <div class="modal-body" id="edit-user-address-response" >
      
      </div>
   </div>
  </div>
</div>  


@endsection


@section('scripts')
<script src="{{asset('backend/js/sweetalert.min.js')}}"></script>

<script>
  $( document ).ready(function() {

    $('.address_action_btn').on('click',function(e){
      $('.new_address_block').addClass('hide')
      var address_id =  $(this).data('address_id');
      var action =  $(this).attr('action');

      if(action=='edit'){

        $("#edit-user-address").modal("toggle");

          $.ajax({
            url:"{{url('edit-user-address')}}/"+address_id,
            data:{_token:"{{csrf_token()}}"},
            type:"POST",
            success:function(response){
        
              $('#edit-user-address-response').html(response)
                  

                }
            });

      }else{
        e.preventDefault();
            swal({
                  title: "Are you sure?",
                  text: "Are you want to remove this address?",
                  icon: "warning",
                  buttons: true,  
                  dangerMode: true,
              })
              .then((willDelete) => {
                  if (willDelete) {
                      $.ajax({
                          url:"{{url('remove-user-address')}}/"+address_id,
                          data:{_token:"{{csrf_token()}}"},
                          type:"POST",
                          success:function(response){
                      
                            if(response==1){
                              swal({
                                // title: "Are you sure?",
                                text: 'Address has been removed',
                                icon: "success",
                                buttons: false,  
                                // dangerMode: false,
                              });

                              $('.user-address-div'+address_id).hide();  
                            }else{

                              swal({
                                // title: "Are you sure?",
                                text: 'Something went wrong..',
                                icon: "error",
                                buttons: false,  
                                // dangerMode: false,
                              });
                            //  location.reload(true);
                            }
                               

                             }
                          });
                  } else {
                      // swal("Your product is not remo!");
                  }
              });
      }

    });

    $('.address_id').on('change',function(){
      var address_id = $(this).val();
      if(address_id=='new'){
        $('.new_address_block').removeClass('hide')
      }else{
        var pincode = $(this).data('pincode');
        $('.new_address_block').addClass('hide')
        calculate_freight_charge(pincode)
      }
   

    })


    @auth
      
    @else
    openLoginModal();
    @endauth

    $('.place_order_btn').click(function(){
      $('.place_order').submit();
    })

    $('body').on('change','.state_id',function(){
        var state_id = $(this).val();
        if(state_id){
            $.ajax({
            url:"{{url('get_cities_by_state_id')}}",
            data:{_token:"{{csrf_token()}}",state_id},
            type:"POST",
            success:function(response){
                    var html_option=""
                    var data=response;
                    $.each(data,function(id,title){
                        var selected_id ='{{old('city_id')}}';
                        if(selected_id==id)
                        html_option +="<option selected value='"+id+"'>"+title+"</option>"
                        else
                        html_option +="<option  value='"+id+"'>"+title+"</option>"

                    });
                    $('.city').html(html_option);
                }
            });
        }else{
            $('.city').html('');
        }
    });
    $('.state_id').change();



    $('.pincode').on('input',function(){
        var pincode = $(this).val();
        if(pincode.length==6){
      $('.freight_charge_result').html('');

            $.ajax({
            url:"/calculate-fright-charge",
            data:{_token:"{{csrf_token()}}",pincode},
            type:"POST",
            success:function(response){
        
              if(response.freight_charge != undefined){
                $('.freight_charge_result').html(' &#x20B9; '+response.freight_charge);

                var grand_total = parseInt('{{ $taxable_amount}}') +parseInt('{{ $tax}}') + response.freight_charge - '{{$coupon_value}}';
                $('.grand_total').html(' &#x20B9; '+grand_total)
              }

              if(response.pincode[0] != undefined){
        
                swal({
                  // title: "Are you sure?",
                  text: response.pincode[0],
                  icon: "error",
                  buttons: false,  
                  // dangerMode: false,
                });
                // $('.pincode').val('');
              }
       
              }
            
            });
        }else{
        }
    })


  })


  function calculate_freight_charge(pincode){

    

    $.ajax({
            url:"/calculate-fright-charge",
            data:{_token:"{{csrf_token()}}",pincode},
            type:"POST",
            success:function(response){
        
              if(response.freight_charge != undefined){
                $('.freight_charge_result').html(' &#x20B9; '+response.freight_charge);

                var grand_total = parseInt('{{ $taxable_amount}}')  +parseInt('{{ $tax}}') + response.freight_charge - '{{$coupon_value}}';
                $('.grand_total').html(' &#x20B9; '+grand_total)
              }

              if(response.pincode[0] != undefined){

                $('.freight_charge_result').html('');

          var grand_total = parseInt('{{ $taxable_amount}}')  +parseInt('{{ $tax}}') - '{{$coupon_value}}';
          $('.grand_total').html(' &#x20B9; '+grand_total)
        
                swal({
                  title: "Pincode error in selected address",
                  text: response.pincode[0],
                  icon: "error",
                  buttons: false,  
                  // dangerMode: false,
                });
                // $('.pincode').val('');
              }
       
              }
            
            });
  }

</script>
@endsection
