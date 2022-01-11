@extends('layouts.app')
@section('content')

        <main class="main">
        	<div class="page-header text-center" style="background-image: url('assets/images/page-header-bg.jpg')">
        		<div class="container">
        			<h1 class="page-title">My Account<span>Shop</span></h1>
        		</div><!-- End .container -->
        	</div><!-- End .page-header -->
            <nav aria-label="breadcrumb" class="breadcrumb-nav mb-3">
                <div class="container">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">My Account</li>
                    </ol>
                </div><!-- End .container -->
            </nav><!-- End .breadcrumb-nav -->
			
   
			@foreach ($errors->all() as $error)
			   <p class="text-danger" style="text-align:center;">{{ $error }}</p>
			@endforeach 
            <div class="page-content">
            	<div class="dashboard">
	                <div class="container">
	                	<div class="row">
	                		<aside class="col-md-3 col-lg-2">
	                			<ul class="nav nav-dashboard flex-column mb-3 mb-md-0" role="tablist">
								    <li class="nav-item">
								        <a class="nav-link active" id="tab-dashboard-link" data-toggle="tab" href="#tab-dashboard" role="tab" aria-controls="tab-dashboard" aria-selected="true">Dashboard</a>
								    </li>
								    <li class="nav-item">
								        <a class="nav-link" id="tab-orders-link" data-toggle="tab" href="#tab-orders" role="tab" aria-controls="tab-orders" aria-selected="false">Orders</a>
								    </li>
									<li class="nav-item">
								        <a class="nav-link" id="tab-wishlist-link" data-toggle="tab" href="#tab-wishlist" role="tab" aria-controls="tab-wishlist" aria-selected="false">Wishlist</a>
								    </li>
								    {{-- <li class="nav-item">
								        <a class="nav-link" id="tab-downloads-link" data-toggle="tab" href="#tab-downloads" role="tab" aria-controls="tab-downloads" aria-selected="false">Downloads</a>
								    </li> --}}
								    <li class="nav-item">
								        <a class="nav-link" id="tab-address-link" data-toggle="tab" href="#tab-address" role="tab" aria-controls="tab-address" aria-selected="false">Adresses</a>
								    </li>
								    <li class="nav-item">
								        <a class="nav-link" id="tab-account-link" data-toggle="tab" href="#tab-account" role="tab" aria-controls="tab-account" aria-selected="false">Account Details</a>
								    </li>
									<li class="nav-item">
								        <a class="nav-link" id="tab-password-link" data-toggle="tab" href="#tab-password" role="tab" aria-controls="tab-account" aria-selected="false">Change Password</a>
								    </li>
								    <li class="nav-item">
								        <a class="nav-link" href="{{ route('user.logout') }}">Sign Out</a>
								    </li>
								</ul>
	                		</aside><!-- End .col-lg-3 -->

	                		<div class="col-md-9 col-lg-10">
	                			<div class="tab-content">
								    <div class="tab-pane fade show active" id="tab-dashboard" role="tabpanel" aria-labelledby="tab-dashboard-link">
								    	<p>Hello <span class="font-weight-normal text-dark">User</span> (not <span class="font-weight-normal text-dark">User</span>? <a href="{{ route('user.logout') }}">Log out</a>) 
								    	<br>
								    	From your account dashboard you can view your <a href="#tab-orders" class="tab-trigger-link link-underline">recent orders</a>, manage your <a href="#tab-address" class="tab-trigger-link">shipping and billing addresses</a>, and <a href="#tab-account" class="tab-trigger-link">edit your password and account details</a>.</p>
								    </div><!-- .End .tab-pane -->

								    <div class="tab-pane fade" id="tab-orders" role="tabpanel" aria-labelledby="tab-orders-link">
										<div class="row">
											@php
												$orders=App\Models\Order::where('user_id',auth()->user()->id)->latest()->paginate(10);
											@endphp
											<!-- Order -->
											@if(count($orders)>0)
												<div class="col-xl-12 col-lg-12">
													<table class="table table-bordered" id="order-dataTable" width="100%" cellspacing="0">
														<thead>
														<tr>
															<th>S.N.</th>
															<th>Order No.</th>
															<th>Name</th>
															<th>Quantity</th>
															<th>Taxable Amount</th>
															<th>Tax </th>
															<th>Sub Total</th>
															<th>Coupon Discount</th>
															<th>Freight Charge</th>
															<th>Total Amount</th>
															<th>Payment Method</th>
															<th>Payment Staus</th>
															<th>Status</th>
															<th>Action</th>
														</tr>
														</thead>												
														<tbody>												 
															@foreach($orders as $order)
															<tr>
																<td>{{$order->id}}</td>
																<td>{{$order->order_number}}</td>
																<td>{{@$order->address->first_name}} {{@$order->address->last_name}}</td>
																<td>{{$order->quantity}}</td>
																<td>&#x20B9; {{$order->taxable_amount}}</td>
																<td>&#x20B9; {{$order->tax}}</td>
																<td>&#x20B9; {{$order->sub_total}}</td>
																<td>&#x20B9; {{$order->coupon_value}}</td>
																<td>&#x20B9; {{$order->freight_charge}}</td>
																<td>&#x20B9; {{number_format($order->total_amount,2)}}</td>									  
																<td>{{$order->payment_method}}</td>									  
																<td>
																	@if($order->payment_status=='paid')									  
																		<span class="badge badge-success">{{$order->payment_status}}</span>
																	@elseif ($order->payment_status=='process')
																		<span class="badge badge-warning">{{$order->payment_status}}</span>
																	@elseif ($order->payment_status=='failed')
																		<span class="badge badge-danger">{{$order->payment_status}}</span>
																	@else
																		<span class="badge">{{$order->payment_status}}</span>									  
																	@endif
																</td>
																<td>
																	<span class="badge {{$order->order_status->class}}">{{$order->order_status->name}}</span>															
																</td>
																<td>
																	<a href="{{route('invoice',$order->id)}}" class="btn btn-warning btn-sm float-left mr-1" style="height:30px; width:30px;border-radius:50%" data-toggle="tooltip" title="view" data-placement="bottom"><i class="fas fa-eye"></i></a>
																	{{-- <form method="POST" action="{{route('user.order.delete',[$order->id])}}">
																		@csrf 
																		@method('delete')
																			<button class="btn btn-danger btn-sm dltBtn" data-id={{$order->id}} style="height:30px; width:30px;border-radius:50%" data-toggle="tooltip" data-placement="bottom" title="Delete"><i class="fas fa-trash-alt"></i></button>
																	</form> --}}
																</td>
															</tr>  
															@endforeach													
														</tbody>
													</table>
											        {{$orders->links()}}
											   </div>
											@else
												<p>No order has been made yet.</p>
												<a href="/" class="btn btn-outline-primary-2"><span>GO SHOP</span><i class="icon-long-arrow-right"></i></a>
										   @endif   
										  </div>								    	
								    </div> <!-- .End .tab-pane -->

									<div class="tab-pane fade show " id="tab-wishlist" role="tabpanel" aria-labelledby="tab-wishlist-link">
								        @if(count(Helper::getAllProductFromWishlist()))
											<table class="table shopping-summery">
												<thead>
													<tr class="main-hading">
														<th>PRODUCT</th>
														<th>NAME</th>
														<th class="text-center">TOTAL</th>
														<th class="text-center">ADD TO CART</th>
														<th class="text-center">REMOVE</th>
													</tr>
												</thead>
												<tbody>
														@foreach(Helper::getAllProductFromWishlist() as $key=>$wishlist)
														@if(@$wishlist->product)
															<tr>						
																<td class="image" data-title="No"><img  class="product_img" src="{{@$wishlist->product->a4sheet_view}}"  alt="{{@$wishlist->product->a4sheet_view}}"></td>
																<td class="product-des" data-title="Description">
																	<p class="product-name"><a href="{{route('product-detail',$wishlist->product->slug)}}">{{$wishlist->product->name}}</a></p>
																	<p class="product-des">{!!($wishlist['summary']) !!}</p>
																</td>
																<td class="total-amount" data-title="Total"><span>Rs. {{$wishlist['amount']}}</span></td>
																<td><a href="{{route('add-to-cart',$wishlist->product->slug)}}" class='btn btn-success btn-xs'>Add To Cart</a></td>
																<td class="action" data-title="Remove"><a href="{{route('wishlist-delete',$wishlist->id)}}"><i class="fas fa-trash"></i></a></td>
															</tr>
														@endif
														@endforeach
												</tbody>
											</table>
										@else
											<div style="min-height:400px">
												<p>You have no items in your wishlist. Start adding!</p>
												<a href="/" class="btn btn-outline-primary-2"><span>Add Now</span><i class="icon-long-arrow-right"></i></a>
												{{-- <br>
												<br>
												<h3 style="text-align: center">Empty Wishlist!</h3>
												<p style="text-align: center">You have no items in your wishlist. Start adding!</p>												
												<div class="text-center">
													<a href="{{route('products')}}" style="background: #2874f0;
													color: #fff;" class="btn btn-lg pull-center">Add Now</a>
												</div> --}}
											</div>
										@endif
									</div><!-- .End .tab-pane -->

								    {{-- <div class="tab-pane fade" id="tab-downloads" role="tabpanel" aria-labelledby="tab-downloads-link">
								    	<p>No downloads available yet.</p>
								    	<a href="category.html" class="btn btn-outline-primary-2"><span>GO SHOP</span><i class="icon-long-arrow-right"></i></a>
								    </div><!-- .End .tab-pane --> --}}

								    <div class="tab-pane fade" id="tab-address" role="tabpanel" aria-labelledby="tab-address-link">
								    	<p>The following addresses will be used on the checkout page by default.</p>

								    	<div class="row">
								    		<div class="col-lg-6">
								    			<div class="card card-dashboard">
								    				<div class="card-body">
								    					<h3 class="card-title">Billing Address</h3><!-- End .card-title -->

														<p>User Name<br>
														User Company<br>
														John str<br>
														New York, NY 10001<br>
														1-234-987-6543<br>
														yourmail@mail.com<br>
														<a href="#">Edit <i class="icon-edit"></i></a></p>
								    				</div><!-- End .card-body -->
								    			</div><!-- End .card-dashboard -->
								    		</div><!-- End .col-lg-6 -->

								    		<div class="col-lg-6">
								    			<div class="card card-dashboard">
								    				<div class="card-body">
								    					<h3 class="card-title">Shipping Address</h3><!-- End .card-title -->

														<p>You have not set up this type of address yet.<br>
														<a href="#">Edit <i class="icon-edit"></i></a></p>
								    				</div><!-- End .card-body -->
								    			</div><!-- End .card-dashboard -->
								    		</div><!-- End .col-lg-6 -->
								    	</div><!-- End .row -->
								    </div><!-- .End .tab-pane -->

								    <div class="tab-pane fade" id="tab-account" role="tabpanel" aria-labelledby="tab-account-link">
								    	<form method="POST" action="{{route('user-profile-update',auth()->user()->id)}}"> 
			                				<div class="row">
			                					<div class="col-sm-6">
			                						<label>Full Name *</label>
			                						<input type="text" class="form-control" value="{{auth()->user()->name}}" required>
			                					</div><!-- End .col-sm-6 -->

			                					{{-- <div class="col-sm-6">
			                						<label>Last Name *</label>
			                						<input type="text" class="form-control" required>
			                					</div><!-- End .col-sm-6 --> --}}
			                				</div><!-- End .row -->

		            						{{-- <label>Display Name *</label>
		            						<input type="text" class="form-control" value="{{auth()->user()->name}}" required>
		            						<small class="form-text">This will be how your name will be displayed in the account section and in reviews</small> --}}

		                					<label>Email address *</label>
		        							<input type="email" class="form-control" name="email" value="{{auth()->user()->email}}" required>

											<label>Email address *</label>
		        							<input type="number" min="0"  class="form-control" name="mobile" value="{{auth()->user()->mobile}}" placeholder="Enter your 10 digit mobile"  required>

		                					<button type="submit" class="btn btn-outline-primary-2">
			                					<span>SAVE CHANGES</span>
			            						<i class="icon-long-arrow-right"></i>
			                				</button>
			                			</form>
								    </div>
									<div class="tab-pane fade" id="tab-password" role="tabpanel" aria-labelledby="tab-account-link">
								    	<form  method="POST" action="{{ route('change.password') }}">
											@csrf 
		            						<label>Current password (leave blank to leave unchanged)</label>
		            						<input type="password" class="form-control" name="current_password" required>

		            						<label>New password (leave blank to leave unchanged)</label>
		            						<input type="password" class="form-control" name="new_password" required>

		            						<label>Confirm new password</label>
		            						<input type="password" class="form-control mb-2" name="new_confirm_password" required>

		                					<button type="submit" class="btn btn-outline-primary-2">
			                					<span>SAVE CHANGES</span>
			            						<i class="icon-long-arrow-right"></i>
			                				</button>
			                			</form>
								    </div><!-- .End .tab-pane -->
								</div>
	                		</div><!-- End .col-lg-9 -->
	                	</div><!-- End .row -->
	                </div><!-- End .container -->
                </div><!-- End .dashboard -->
            </div><!-- End .page-content -->
        </main><!-- End .main -->

@endsection