@extends('layouts.app')
@section('content')

        <main class="main">
        	<div class="page-header text-center" style="background-image: url('assets/images/page-header-bg.jpg')">
        		<div class="container">
        			<h1 class="page-title">Checkout<span>Shop</span></h1>
        		</div><!-- End .container -->
        	</div><!-- End .page-header -->
            <nav aria-label="breadcrumb" class="breadcrumb-nav">
                <div class="container">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{url('')}}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Checkout</li>
                    </ol>
                </div><!-- End .container -->
            </nav><!-- End .breadcrumb-nav -->

            <div class="page-content">
            	<div class="checkout">
	                <div class="container">            			
						@php 
							$addresses = @Auth()->user() ? Auth()->user()->addresses()->where('is_primary',1)->first() :[];
							$user = @auth()->user();
							$freight_details = Session::get('freight_charge');
							$coupon_value = @Session::get('coupon') ? Session::get('coupon')['value'] :0;
							$giftcard_value =  @Session::get('giftcard') ? Session::get('giftcard')['value'] :0;
						@endphp
            			<form id="checkoutForm" action="{{url('place-order')}}" class="place_order" method="POST">
							@csrf
							<input type="hidden" name="address_id" id="address_id" value={{@$addresses ?$addresses->id:'new'}}>
		                	<div class="row">
		                		<div class="col-lg-9">
		                			<h2 class="checkout-title">Billing Details</h2><!-- End .checkout-title -->
		                				<div class="row">
		                					<div class="col-sm-6">
		                						<label>Full Name *</label>
		                						<input type="text" class="form-control" name="first_name" value="{{@$user->name}}" required>
		                					</div><!-- End .col-sm-6 -->

										    {{-- <div class="col-sm-6">
												<label>Company Name (Optional)</label>
												<input type="text" class="form-control" name="company">		
											</div>	 --}}
		                				</div><!-- End .row -->

										<div class="row">
		                					<div class="col-sm-6">
		                						<label>Phone *</label>
		                						<input type="tel" class="form-control keyup-mobile" name="mobile" value="{{@$user->mobile}}" minlength="10" maxlength="10" required>
		                					</div><!-- End .col-sm-6 -->
											<div class="col-sm-6" >
												<label>Email address *</label>
												<input type="email" class="form-control keyup-email" name="email" value="{{@$user->email}}" required>
											</div>
		                				</div><!-- End .row -->

	            						<label>Address *</label>
	            						<input type="text" class="form-control" name="address" placeholder="Address Line 1" value="{{@$addresses->address}}"  required>
	            						<input type="text" class="form-control" name="address1" placeholder="Address Line 2" value="{{@$addresses->address2}}">

	            						<div class="row">
											<div class="col-sm-4">
		                						<label>State *</label>
		                						<select  class="form-control state_id" name="state_id" required>
													<option value="">Select State </option>
													@foreach($states as $state)
												    	<option value="{{$state->id}} {{isset($addresses->state_id) && @$addresses->state_id = $state->id ? 'selected':''}}">{{$state->name}}</option>
													@endforeach
												</select>
		                					</div><!-- End .col-sm-6 -->
		                					<div class="col-sm-4">
		                						<label>Town / City *</label>
		                						<select  class="form-control city" name="city_id" required>
													<option value="">Select City </option>
												</select>	
		                					</div><!-- End .col-sm-6 -->
											<div class="col-sm-4">
		                						<label>Postcode / ZIP *</label>
		                						<input type="text" class="form-control" name="pincode" value="{{@$addresses->pincode}}" required>
		                					</div><!-- End .col-sm-6 -->
		                					
		                				</div><!-- End .row -->

		                				

	                					

	        							{{-- <div class="custom-control custom-checkbox">
											<input type="checkbox" class="custom-control-input" id="checkout-create-acc">
											<label class="custom-control-label" for="checkout-create-acc">Create an account?</label>
										</div><!-- End .custom-checkbox --> --}}

										{{-- <div class="custom-control custom-checkbox">
											<input type="checkbox" class="custom-control-input" id="checkout-diff-address">
											<label class="custom-control-label" for="checkout-diff-address">Ship to a different address?</label>
										</div><!-- End .custom-checkbox --> --}}

	                					<label>Order notes (optional)</label>
	        							<textarea class="form-control" cols="30" rows="4" name="order_notes" placeholder="Notes about your order, e.g. special notes for delivery"></textarea>
		                		</div><!-- End .col-lg-9 -->
		                		<aside class="col-lg-3">
		                			<div class="summary">
		                				<h3 class="summary-title">Your Order</h3><!-- End .summary-title -->

		                				<table class="table table-summary">
		                					<thead>
		                						<tr>
		                							<th>Product</th>
		                							<th>Total</th>
		                						</tr>
		                					</thead>
											@php
											    $offer = 0;
										    	$totalAmt = get_cart_total_amount();			
												$taxable_amount = get_cart_taxable_amount();																					
												$tax = 0;// get_tax_total($taxable_amount);										  
												$freight_charge = 0;//  @$freight_details['freight_charge'] ? $freight_details['freight_charge'] :0;
												$offerDiscount1 = get_offer_discount_amount1();	
												$offerDiscount2 = get_offer_discount_amount2();	
												//$offer = get_offer_type();
												// if($offer != 0)
												// {
													$offerValue1 = get_offer_value(1);
													$offerValue2 = get_offer_value(2);
												//}
												$grand_total =  $tax + $taxable_amount + $freight_charge - $offerDiscount1 - $offerDiscount2 - $giftcard_value - $coupon_value;		
												$isGiftCard = 0;
												$discountRs = $totalAmt - $taxable_amount;
												$discountPer = 0;
												if($discountRs != 0)
												{
													$discountPer = (100 * ($discountRs)) / $totalAmt;
												}
												// dd(get_cart());
											@endphp
		                					<tbody>
												@foreach (get_cart() as $cart)
													@php
													   $total  =  $cart['product']['price'] * $cart['quantity'];
													   if($cart['product']['is_giftcard'] == 1)
													   {
														  $isGiftCard = 1;
													   }
													@endphp
													<tr>
														<td> {{$cart['quantity']}} - <a href="#">{{$cart['product']['name']}}</a></td>
														<td> {!! $rupee !!} {{round($total) }}</td>
													</tr>
												@endforeach
												
												<!-- <tr class="summary-subtotal"> 
												  <td><input type="text" class="form-control"  id="checkout-gift-discount-input" name="giftcard"  placeholder="Gift card number" value="{{@Session::get('giftcard')['code']}}"></td>        
												  <td><span id="error1" class="error" style="color:red">Invalid</span></td>                         
												</tr>
												<tr class="summary-subtotal">  
												   <td> <button class="btn" type="button" id="applyGiftcard">{{@Session::get('giftcard')['code'] ? 'Remove Gift Card' :'Apply Gift Card'}}</button> </td>  
												</tr>
												
													<tr class="summary-subtotal"> 
													<td> <input type="text" class="form-control"  id="checkout-discount-input" name="code" placeholder="Coupon Code" value="{{@Session::get('coupon')['code']}}"></td>                                 
													<td><span id="error2" class="error" style="color:red">Invalid</span></td> 
													</tr>
													<tr class="summary-subtotal">  
														<td> <button class="btn" type="button" id="applyCoupon">{{@Session::get('coupon')['code'] ? 'Remove Coupon' :'Apply Coupon'}}</button> </td>  
													</tr> 
												-->
												
		                						<tr class="summary-subtotal">
		                							<td>Subtotal:</td>
		                							<td>{!! $rupee !!} {{ round($totalAmt)}}</td>
		                						</tr><!-- End .summary-subtotal -->
												<tr class="summary-subtotal">
		                							<td>Discount <small>({{round($discountPer,2)}}%)</small>:</td>
		                							<td>{!! $rupee !!} {{ round($totalAmt - $taxable_amount) }}</td>
		                						</tr><!-- End .summary-subtotal -->
												<tr class="summary-subtotal">
		                							<td>Offer Discount:<br>
														@if($offerDiscount1 != 0)
														  <small>(Buy 3 flat at {{round($offerValue1)}})</small><br>
														@endif
														@if($offerDiscount2 != 0)
														  <small>(Buy 1 get 2nd at {{round($offerValue2)}}% off)</small>
														@endif
													</td>
		                							<td>{!! $rupee !!} {{ round($offerDiscount1 + $offerDiscount2) }}</td>
		                						</tr><!-- End .summary-subtotal -->
												<tr class="summary-subtotal">
		                							<td>Gift Card:</td>
		                							<td>{!! $rupee !!} {{ @Session::get('giftcard')['value'] ? round(Session::get('giftcard')['value']) : '0.00' }}</td>
		                						</tr><!-- End .summary-subtotal -->	
												<tr class="summary-subtotal">
		                							<td>Coupon Code:</td>
		                							<td>{!! $rupee !!} {{ @Session::get('coupon')['value'] ? round(Session::get('coupon')['value']) : '0.00' }}</td>
		                						</tr><!-- End .summary-subtotal -->												
		                						<tr>
		                							<td>Shipping:</td>
		                							<td> {!! $rupee !!}  {{number_format($freight_charge,2)}}</td>
		                						</tr>
		                						<tr class="summary-total">
		                							<td>Total:</td>
		                							<td>{!! $rupee !!}  {{ round($grand_total) }}</td>
		                						</tr><!-- End .summary-total -->
		                					</tbody>
		                				</table><!-- End .table table-summary -->

		                				<div class="accordion-summary" id="accordion-payment">

										    <div class="card">
										        <div class="card-header" id="heading-4">
										            <h2 class="card-title">
										                <a role="button" aria-expanded="false" aria-controls="collapse-4">
										                    Pay Online
										                </a>
										            </h2>
										        </div><!-- End .card-header -->
										       
										    </div><!-- End .card -->

										
										</div><!-- End .accordion -->
										<div class="disc-sec">
											<input type="text" class="form-control mb-0"  id="checkout-gift-discount-input" name="giftcard"  placeholder="Gift card number" value="{{@Session::get('giftcard')['code']}}">
											<span id="error1" class="error" style="color:red">Invalid Gift Card Code</span>                         
											<button class="btn bg-primary text-white w-100 mt-1" type="button" id="applyGiftcard">{{@Session::get('giftcard')['code'] ? 'Remove Gift Card' :'Apply Gift Card'}}</button> 
											<hr class="my-3">
											
											<input type="text" class="form-control mb-0"  id="checkout-discount-input" name="code" placeholder="Coupon Code" value="{{@Session::get('coupon')['code']}}">                                 
											<span id="error2" class="error" style="color:red">Invalid Coupon Code</span>
											<button class="btn bg-primary text-white w-100 mt-1 mb-1" type="button" id="applyCoupon">{{@Session::get('coupon')['code'] ? 'Remove Coupon' :'Apply Coupon'}}</button>  		
											
										</div>
		                				<button type="submit" class="btn btn-outline-primary-2 btn-order btn-block btn-lg">
		                					<span class="btn-text">Place Order</span>
		                					<span class="btn-hover-text">Place Order</span>
		                				</button>
		                			</div><!-- End .summary -->
		                		</aside><!-- End .col-lg-3 -->
		                	</div><!-- End .row -->
            			</form>
	                </div><!-- End .container -->
                </div><!-- End .checkout -->
            </div><!-- End .page-content -->
        </main><!-- End .main -->
		<script>

			$(document).ready(function() 
			{  
				$('#error1').hide();
				$('#error2').hide();

				// $(document).on('click', 'form button[type=submit]', function(e) {
				// $('#checkoutForm').on('before-submit',function(){
				// 	alert('test');
				// 	return false;
				// 	var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
				// 	var mobilePattern = /^\d{9}$/;
				// 	var inputVal = $('.keyup-email').val();

				// 	if(!emailReg.test(inputVal)) 
				// 	{
				// 		$('.keyup-email').after('<span class="error error-keyup-7">Invalid Email Format.</span>');
				// 		e.preventDefault();
				// 		return false;
				// 	}

				// 	var mobile = $('.keyup-mobile').val();
				// 	if(!mobilePattern.test(mobile))
				// 	{
				// 		$('.keyup-mobile').after('<span class="error error-keyup-8">Invalid Mobile Number.</span>');
				// 		e.preventDefault();
				// 		return false;
				// 	}
				// });

			    $('.address_action_btn').on('click',function(e){
			    	$('.new_address_block').addClass('hide');

			    	var address_id =  $(this).data('address_id');
				    var action =  $(this).attr('action');
		  
					if(action=='edit')
					{		  
					$("#edit-user-address").modal("toggle");
			
						$.ajax({
						url:"{{url('edit-user-address')}}/"+address_id,
						data:{_token:"{{csrf_token()}}"},
						type:"POST",
						success:function(response){
							$('#edit-user-address-response').html(response)
								
			
						}
						});		  
					}
					else
					{
					e.preventDefault();
						swal({
								title: "Are you sure?",
								text: "Are you want to remove this address?",
								icon: "warning",
								buttons: true,  
								dangerMode: true,
							})
							.then((willDelete) => {
								if (willDelete) 
								{
									$.ajax({
										url:"{{url('remove-user-address')}}/"+address_id,
										data:{_token:"{{csrf_token()}}"},
										type:"POST",
										success:function(response)
										{								
										if(response==1)
										{
											swal({
											// title: "Are you sure?",
											text: 'Address has been removed',
											icon: "success",
											buttons: false,  
											// dangerMode: false,
											});
			
											$('.user-address-div'+address_id).hide();  
										}
										else
										{		  
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
								} 
								else 
								{
									// swal("Your product is not remo!");
								}
						});
					}		  
			  });

			  $('#applyGiftcard').on('click',function(e){

				  var coupon_type = 1;
				  var code = $('#checkout-gift-discount-input').val();
				  if(code)
				  {
					   $.ajax({
							url:"{{url('coupon-store')}}",
							data:{_token:"{{csrf_token()}}",code,coupon_type},
							type:"POST",
							success:function(response)
							{
								if(response == 1)
								{
									location.reload();
								}
								else
								{
									$('#error1').show();
								}
							}
						});
				   }				   
			  });

			  $('#applyCoupon').on('click',function(e){
				  var coupon_type = 0;
				  var code = $('#checkout-discount-input').val();
                  
				  if(code)
				  {
					   $.ajax({
							url:"{{url('coupon-store')}}",
							data:{_token:"{{csrf_token()}}",code,coupon_type},
							type:"POST",
							success:function(response)
							{
								if(response == 1)
								{
									location.reload();
								}
								else
								{
									$('#error2').show();
								}
							}
						});
				   }
			  });
		  
			  $('.address_id').on('change',function()
			  {
				var address_id = $(this).val();
				if(address_id=='new')
				{
				  $('.new_address_block').removeClass('hide')
				}
				else
				{
				  var pincode = $(this).data('pincode');
				  $('.new_address_block').addClass('hide')
				  calculate_freight_charge(pincode)
				}
			  })		  
		  
			  //@auth				
			  //@else
			  //  openLoginModal();
			  //@endauth
		  
			  $('.place_order_btn').click(function()
			  {
				$('.place_order').submit();
			  })
		  
			  $('body').on('change','.state_id',function()
			  {
				  var state_id = $(this).val();				  
				  if(state_id)
				  {
					  $.ajax({
					  url:"{{url('get_cities_by_state_id')}}",
					  data:{_token:"{{csrf_token()}}",state_id},
					  type:"POST",
					  success:function(response)
					  {
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
				  }
				  else
				  {
					  $('.city').html('');
				  }
			  });

			  $('.state_id').change();
		  
			  $('.pincode').on('input',function()
			  {
				  var pincode = $(this).val();
				  if(pincode.length==6)
				  {
				     $('.freight_charge_result').html('');		  
					  $.ajax({
					  url:"/calculate-fright-charge",
					  data:{_token:"{{csrf_token()}}",pincode},
					  type:"POST",
					  success:function(response)
					  {				  
							if(response.freight_charge != undefined)
							{
								$('.freight_charge_result').html(' &#x20B9; '+response.freight_charge);		  
								var grand_total = parseInt('{{ $taxable_amount}}') +parseInt('{{ $tax}}') + response.freight_charge - '{{$coupon_value}}';
								$('.grand_total').html(' &#x20B9; '+grand_total)
							}
			
							if(response.pincode[0] != undefined)
							{				  
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
				  }
				  else
				  {
				  }
			  })
			})		  
		  
			function calculate_freight_charge(pincode)
			{
			  $.ajax({
					  url:"/calculate-fright-charge",
					  data:{_token:"{{csrf_token()}}",pincode},
					  type:"POST",
					  success:function(response)
					  {				  
							if(response.freight_charge != undefined)
							{
							$('.freight_charge_result').html(' &#x20B9; '+response.freight_charge);		  
							var grand_total = parseInt('{{ $taxable_amount}}')  +parseInt('{{ $tax}}') + response.freight_charge - '{{$coupon_value}}';
							$('.grand_total').html(' &#x20B9; '+grand_total)
							}
			
							if(response.pincode[0] != undefined)
							{		  
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