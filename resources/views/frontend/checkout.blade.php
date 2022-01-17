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
            			<div class="checkout-discount">
            				<form action="{{route('coupon-store')}}" method="POST">
								@csrf
								<div class="row">
									<input type="text" class="form-control" required id="checkout-discount-input" name="code" placeholder="Have a coupon? enter your code" value="{{@Session::get('coupon')['code']}}">
									<button class="btn ">{{@Session::get('coupon')['code'] ? 'Remove' :'Apply'}}</button>
								</div>
            				</form>
            			</div><!-- End .checkout-discount -->
						@php 
							$addresses = @Auth()->user() ? Auth()->user()->addresses :[];
							$user = @auth()->user();
							$freight_details = Session::get('freight_charge');
							$coupon_value = @Session::get('coupon') ? Session::get('coupon')['value'] :0;
						@endphp
            			<form action="{{url('place-order')}}" class="place_order" method="POST">
							@csrf
		                	<div class="row">
		                		<div class="col-lg-9">
		                			<h2 class="checkout-title">Billing Details</h2><!-- End .checkout-title -->
		                				<div class="row">
		                					<div class="col-sm-6">
		                						<label>Name *</label>
		                						<input type="text" class="form-control" name="first_name" value="{{@$user->name}}" required>
		                					</div><!-- End .col-sm-6 -->

		                					{{-- <div class="col-sm-6">
		                						<label>Last Name *</label>
		                						<input type="text" class="form-control" name="first_name" required>
		                					</div><!-- End .col-sm-6 --> --}}
		                				</div><!-- End .row -->

	            						<label>Company Name (Optional)</label>
	            						<input type="text" class="form-control" name="company">

	            						<label>Country *</label>
	            						<input type="text" class="form-control" name="country" value="India" required>

	            						<label>Address *</label>
	            						<input type="text" class="form-control" name="address" placeholder="Address Line 1" value="{{@$address->address}}"  required>
	            						<input type="text" class="form-control" name="address1" placeholder="Address Line 2" value="{{@$address->address}}">

	            						<div class="row">
		                					<div class="col-sm-6">
		                						<label>Town / City *</label>
		                						<input type="text" class="form-control" name="city_id" required>
		                					</div><!-- End .col-sm-6 -->

		                					<div class="col-sm-6">
		                						<label>State *</label>
		                						<input type="text" class="form-control" name="state_id" required>
		                					</div><!-- End .col-sm-6 -->
		                				</div><!-- End .row -->

		                				<div class="row">
		                					<div class="col-sm-6">
		                						<label>Postcode / ZIP *</label>
		                						<input type="text" class="form-control" name="pincode" required>
		                					</div><!-- End .col-sm-6 -->

		                					<div class="col-sm-6">
		                						<label>Phone *</label>
		                						<input type="tel" class="form-control" name="mobile" value="{{@$user->mobile}}" required>
		                					</div><!-- End .col-sm-6 -->
		                				</div><!-- End .row -->

	                					<label>Email address *</label>
	        							<input type="email" class="form-control" name="email" value="{{@$user->email}}" required>

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
												$taxable_amount =  get_cart_taxable_amount();												
												$tax =  get_tax_total($taxable_amount);										  
												$freight_charge =  @$freight_details['freight_charge'] ? $freight_details['freight_charge'] :0;
												$grand_total =  $tax + $taxable_amount+$freight_charge - $coupon_value;		
												$isGiftCard = 0;							
											@endphp
		                					<tbody>
												@foreach (get_cart() as $cart)
													@php
													   $total  =  $cart['product']['price'] *$cart['quantity'];
													   if($cart['product']['is_giftcard'] == 1)
													   {
														  $isGiftCard = 1;
													   }
													@endphp
													<tr>
														<td><a href="#">{{$cart['product']['name']}}</a></td>
														<td> {!! $rupee !!} {{$total }}</td>
													</tr>
												@endforeach
		                						<tr class="summary-subtotal">
		                							<td>Subtotal:</td>
		                							<td>{!! $rupee !!} {{ $taxable_amount}}</td>
		                						</tr><!-- End .summary-subtotal -->
												<tr class="summary-subtotal">
		                							<td>Coupon Code:</td>
		                							<td>{!! $rupee !!} {{ @Session::get('coupon')['value'] ? Session::get('coupon')['value'] : '0.00' }}</td>
		                						</tr><!-- End .summary-subtotal -->												
		                						<tr>
		                							<td>Shipping:</td>
		                							<td> {!! $rupee !!}  {{number_format($freight_charge,2)}}</td>
		                						</tr>
		                						<tr class="summary-total">
		                							<td>Total:</td>
		                							<td>{!! $rupee !!}  {{ $grand_total }}</td>
		                						</tr><!-- End .summary-total -->
		                					</tbody>
		                				</table><!-- End .table table-summary -->

		                				<div class="accordion-summary" id="accordion-payment">
										    <div class="card">
										        <div class="card-header" id="heading-1">
										            <h2 class="card-title">
										                <a role="button" data-toggle="collapse" href="#collapse-1" aria-expanded="true" aria-controls="collapse-1">
										                    Direct bank transfer
										                </a>
										            </h2>
										        </div><!-- End .card-header -->
										        <div id="collapse-1" class="collapse show" aria-labelledby="heading-1" data-parent="#accordion-payment">
										            <div class="card-body">
										                Make your payment directly into our bank account. Please use your Order ID as the payment reference. Your order will not be shipped until the funds have cleared in our account.
										            </div><!-- End .card-body -->
										        </div><!-- End .collapse -->
										    </div><!-- End .card -->

										    <div class="card">
										        <div class="card-header" id="heading-2">
										            <h2 class="card-title">
										                <a class="collapsed" role="button" data-toggle="collapse" href="#collapse-2" aria-expanded="false" aria-controls="collapse-2">
										                    Check payments
										                </a>
										            </h2>
										        </div><!-- End .card-header -->
										        <div id="collapse-2" class="collapse" aria-labelledby="heading-2" data-parent="#accordion-payment">
										            <div class="card-body">
										                Ipsum dolor sit amet, consectetuer adipiscing elit. Donec odio. Quisque volutpat mattis eros. Nullam malesuada erat ut turpis. 
										            </div><!-- End .card-body -->
										        </div><!-- End .collapse -->
										    </div><!-- End .card -->

										    <div class="card">
										        <div class="card-header" id="heading-3">
										            <h2 class="card-title">
														@if($isGiftCard != 1 )
										                  <a class="collapsed" role="button" data-toggle="collapse" href="#collapse-3" aria-expanded="false" aria-controls="collapse-3">
															Cash on delivery 
										                  </a>
														@else 
														  <a class="collapsed" role="button" href="#collapse-3"  data-toggle="collapse" aria-expanded="false" aria-controls="collapse-3">  
															Cash on delivery ( Not Available if Gift card is in cart)
										                  </a>
														@endif															
										            </h2>
										        </div><!-- End .card-header -->
										        <div id="collapse-3" class="collapse" aria-labelledby="heading-3" data-parent="#accordion-payment">
										            <div class="card-body">Quisque volutpat mattis eros. Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Donec odio. Quisque volutpat mattis eros. 
										            </div><!-- End .card-body -->
										        </div><!-- End .collapse -->
										    </div><!-- End .card -->

										    <div class="card">
										        <div class="card-header" id="heading-4">
										            <h2 class="card-title">
										                <a class="collapsed" role="button" data-toggle="collapse" href="#collapse-4" aria-expanded="false" aria-controls="collapse-4">
										                    PayPal <small class="float-right paypal-link">What is PayPal?</small>
										                </a>
										            </h2>
										        </div><!-- End .card-header -->
										        <div id="collapse-4" class="collapse" aria-labelledby="heading-4" data-parent="#accordion-payment">
										            <div class="card-body">
										                Nullam malesuada erat ut turpis. Suspendisse urna nibh, viverra non, semper suscipit, posuere a, pede. Donec nec justo eget felis facilisis fermentum.
										            </div><!-- End .card-body -->
										        </div><!-- End .collapse -->
										    </div><!-- End .card -->

										    <div class="card">
										        <div class="card-header" id="heading-5">
										            <h2 class="card-title">
										                <a class="collapsed" role="button" data-toggle="collapse" href="#collapse-5" aria-expanded="false" aria-controls="collapse-5">
										                    Credit Card (Stripe)
										                    <img src="assets/images/payments-summary.png" alt="payments cards">
										                </a>
										            </h2>
										        </div><!-- End .card-header -->
										        <div id="collapse-5" class="collapse" aria-labelledby="heading-5" data-parent="#accordion-payment">
										            <div class="card-body"> Donec nec justo eget felis facilisis fermentum.Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Donec odio. Quisque volutpat mattis eros. Lorem ipsum dolor sit ame.
										            </div><!-- End .card-body -->
										        </div><!-- End .collapse -->
										    </div><!-- End .card -->
										</div><!-- End .accordion -->

		                				<button type="submit" class="btn btn-outline-primary-2 btn-order btn-block">
		                					<span class="btn-text">Place Order</span>
		                					<span class="btn-hover-text">Proceed to Checkout</span>
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
			$( document ).ready(function() 
			{		  
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
		  
			  @auth				
			  @else
			    openLoginModal();
			  @endauth
		  
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