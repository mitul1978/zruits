@extends('layouts.app')
@section('title','Cart Page')
@section('content')
	<style>
		.product_img {
				border: 1px solid #ddd;
				border-radius: 4px;
				width: 100px;
		}
		.product_img:hover {
		box-shadow: 0 0 2px 1px rgba(0, 140, 186, 0.5);
		}
	</style>

	<main class="main">
				<div class="page-header text-center" style="background-image: url('assets/images/page-header-bg.jpg')">
					<div class="container">
						<h1 class="page-title">Shopping Cart<span>Shop</span></h1>
					</div><!-- End .container -->
				</div><!-- End .page-header -->
				<nav aria-label="breadcrumb" class="breadcrumb-nav">
					<div class="container">
						<ol class="breadcrumb">
							<li class="breadcrumb-item"><a href="">Home</a></li>
							<li class="breadcrumb-item active" aria-current="page">My Cart</li>
						</ol>
					</div><!-- End .container -->
				</nav><!-- End .breadcrumb-nav -->

				<div class="page-content">
					<div class="cart">
						<div class="container">
							<div class="row">
								@if(count(Helper::getAllProductFromCart()) > 0)
									<div class="col-lg-9">										
											<table class="table table-cart table-mobile">
												<thead>
													<tr>
														<th>Product</th>
														<th>Price</th>
														<th>Quantity</th>
														<th>Total</th>
														<th></th>
													</tr>
												</thead>

												<tbody id="cart_item_list">
													<form action="{{route('cart.update')}}" method="POST">
														@csrf
															@foreach(Helper::getAllProductFromCart() as $key=>$cart)


																	<tr>
																		<td class="product-col">
																			<div class="product">
																				<figure class="product-media">
																					<a href="#">
																						<img src="assets/images/products/table/product-1.jpg" alt="Product image">
																					</a>
																				</figure>

																				<h3 class="product-title">
																					<a href="#">{{$cart->product->name}}</a>
																				</h3><!-- End .product-title -->
																			</div><!-- End .product -->
																		</td>
																		<td class="price-col">{{$cart->price}}</td>
																		<td class="quantity-col">
																			<div class="cart-product-quantity">
																				<input type="number" class="form-control" value="{{$cart->quantity}}" min="1" max="10" step="1" data-decimals="0" required>
																			</div><!-- End .cart-product-quantity -->
																		</td>
																		<td class="total-col">{{$cart->amount}}</td>
																		<td class="remove-col">														
																			<form method="POST" action="{{route('cart-delete',$cart->product_id)}}">
																				@csrf
																				<button class="btn-remove" data-id={{$cart->product_id}} data-toggle="tooltip" data-placement="bottom" title="Delete"><i class="icon-close"></i></button>															
																			</form>
																		</td>
																	</tr>
																														
															@endforeach
															<track>
																<td></td>
																<td></td>
																<td></td>
																<td></td>
																<td class="float-right">
																	<button class="btn float-right" type="submit">Update</button>
																</td>
															</track>
															
													</form>
												</tbody>
											</table><!-- End .table table-wishlist -->
										
											<div class="cart-bottom">
												<div class="cart-discount">
													<form action="#">
														<div class="input-group">
															<form action="{{route('coupon-store')}}" method="POST">
																@csrf
																<input type="text" name="code" class="form-control" placeholder="coupon code" value="{{@Session::get('coupon')['code']}}">
																<div class="input-group-append">
																<button class="btn btn-outline-primary-2">
																	@if(@Session::get('coupon')['code'])
																		Remove
																	@else
																		<i class="icon-long-arrow-right"></i>
																	@endif
																</button>
																</div>
															</form>
														</div><!-- End .input-group -->
													</form>
												</div><!-- End .cart-discount -->
												{{-- <a href="#" class="btn btn-outline-dark-2"><span>UPDATE CART</span><i class="icon-refresh"></i></a> --}}
											</div><!-- End .cart-bottom -->
										
									</div><!-- End .col-lg-9 -->

									<aside class="col-lg-3">
										<div class="summary summary-cart">
											<h3 class="summary-title">Cart Total</h3><!-- End .summary-title -->

											<table class="table table-summary">
												<tbody>
													<tr class="summary-subtotal">
														<td>Subtotal:</td>
														<td class="order_subtotal" data-price="{{Helper::totalCartPrice()}}">&#8377; {{number_format(Helper::totalCartPrice(),2)}}</td>
													</tr><!-- End .summary-subtotal -->
													<tr class="summary-shipping">
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
														<td>&#8377; 0.00</td>
													</tr><!-- End .summary-shipping-row -->

													<tr class="summary-shipping-row">
														<td>
															<div class="custom-control custom-radio">
																<input type="radio" id="standart-shipping" name="shipping" class="custom-control-input">
																<label class="custom-control-label" for="standart-shipping">Standart:</label>
															</div><!-- End .custom-control -->
														</td>
														<td>&#8377; 10.00</td>
													</tr><!-- End .summary-shipping-row -->

													<tr class="summary-shipping-row">
														<td>
															<div class="custom-control custom-radio">
																<input type="radio" id="express-shipping" name="shipping" class="custom-control-input">
																<label class="custom-control-label" for="express-shipping">Express:</label>
															</div><!-- End .custom-control -->
														</td>
														<td>&#8377; 20.00</td>
													</tr><!-- End .summary-shipping-row -->

													<tr class="summary-coupon">
														<td>Coupon Discount </td>
														@if(session()->has('coupon'))
														<td class="coupon_price" data-price="{{@Session::get('coupon')['value']}}">&#8377; {{number_format(Helper::totalCartPrice(),2)}}</td>
														
														@else
														<td>&#8377; 0.00</td>
														@endif
													</tr><!-- End .summary-shipping-estimate -->									
													@php
														$total_amount=Helper::totalCartPrice();
														if(session()->has('coupon'))
														{
															$total_amount=$total_amount-Session::get('coupon')['value'];
														}
													@endphp
													<tr class="summary-total">
														<td>Total:</td>
														<td id="order_total_price">&#8377; {{number_format($total_amount,2)}}</td>
													</tr><!-- End .summary-total -->
												</tbody>
											</table><!-- End .table table-summary -->

											<a href="{{route('checkout')}}" class="btn btn-outline-primary-2 btn-order btn-block">PROCEED TO CHECKOUT</a>
										</div><!-- End .summary -->

										<a href="" class="btn btn-outline-dark-2 btn-block mb-3"><span>CONTINUE SHOPPING</span><i class="icon-refresh"></i></a>
									</aside><!-- End .col-lg-3 -->
								@else
									<tr>
										<td class="text-center">
											Nothing in your cart.  <a href="" style="color:blue;"> Continue shopping</a>
										</td>
									</tr>
								@endif	

							</div><!-- End .row -->
						</div><!-- End .container -->
					</div><!-- End .cart -->
				</div><!-- End .page-content -->
	</main><!-- End .main -->

				<!-- Shopping Cart -->
				
				<!--/ End Shopping Cart -->

				<!-- Start Shop Services Area  -->

				<!-- End Shop Newsletter -->

				<!-- Start Shop Newsletter  -->

				<!-- End Shop Newsletter -->



				<!-- Modal -->
				
					<!-- Modal end -->

@endsection
@push('styles')
	<style>
		li.shipping{
			display: inline-flex;
			width: 100%;
			font-size: 14px;
		}
		li.shipping .input-group-icon {
			width: 100%;
			margin-left: 10px;
		}
		.input-group-icon .icon {
			position: absolute;
			left: 20px;
			top: 0;
			line-height: 40px;
			z-index: 3;
		}
		.form-select {
			height: 30px;
			width: 100%;
		}
		.form-select .nice-select {
			border: none;
			border-radius: 0px;
			height: 40px;
			background: #f6f6f6 !important;
			padding-left: 45px;
			padding-right: 40px;
			width: 100%;
		}
		.list li{
			margin-bottom:0 !important;
		}
		.list li:hover{
			background:#F7941D !important;
			color:white !important;
		}
		.form-select .nice-select::after {
			top: 14px;
		}
	</style>
@endpush
@push('scripts')
	<script src="{{asset('frontend/js/nice-select/js/jquery.nice-select.min.js')}}"></script>
	<script src="{{ asset('frontend/js/select2/js/select2.min.js') }}"></script>
	<script>
		$(document).ready(function() { $("select.select2").select2(); });
  		$('select.nice-select').niceSelect();
	</script>
<script src="{{asset('backend/js/sweetalert.min.js')}}"></script>

	<script>
		$(document).ready(function(){
			$('.shipping select[name=shipping]').change(function(){
				let cost = parseFloat( $(this).find('option:selected').data('price') ) || 0;
				let subtotal = parseFloat( $('.order_subtotal').data('price') );
				let coupon = parseFloat( $('.coupon_price').data('price') ) || 0;
				// alert(coupon);
				$('#order_total_price span').text('$'+(subtotal + cost-coupon).toFixed(2));
			});

			$('.dltBtn').click(function(e){
            var form=$(this).closest('form');
              var dataID=$(this).data('id');
              // alert(dataID);
              e.preventDefault();
              swal({
                    title: "Are you sure?",
                    text: "Do you wnat to remove this product!",
                    icon: "warning",
                    buttons: true,  
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                       form.submit();
                    } else {
                        // swal("Your product is not remo!");
                    }
                });
          })

		});

	</script>

@endpush
