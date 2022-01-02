@extends('user.layouts.master')

@section('title','Wishlist Page')
@section('main-content')
	<!-- Breadcrumbs -->

	<!-- End Breadcrumbs -->

	<!-- Shopping Cart -->
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
	<div class="shopping-cart section">
		<div class="container">
			<div class="row">
                <div class="col-12">
                    <h3>Wishlist <i class="fa fa-heart"></i></h3>
                </div>
				<div class="col-12">
					@if(count(Helper::getAllProductFromWishlist()))

					<!-- Shopping Summery -->
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
					<!--/ End Shopping Summery -->
					
					
					@else
					<div style="min-height:400px">
						<br>
						<br>
						<h3 style="text-align: center">Empty Wishlist!</h3>
						<p style="text-align: center">You have no items in your wishlist. Start adding!</p>
						
					  <div class="text-center">
						<a href="{{route('products')}}" style="background: #2874f0;
						color: #fff;" class="btn btn-lg pull-center">Add Now</a>
					  </div>
					  </div>
		@endif
				</div>
				
			</div>
		</div>

		
	</div>
	<!--/ End Shopping Cart -->


	<!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span class="ti-close" aria-hidden="true"></span></button>
                    </div>
                    <div class="modal-body">
                        <div class="row no-gutters">
                            <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
                                <!-- Product Slider -->
									<div class="product-gallery">
										<div class="quickview-slider-active">
											<div class="single-slider">
												<img src="images/modal1.jpg" alt="#">
											</div>
											<div class="single-slider">
												<img src="images/modal2.jpg" alt="#">
											</div>
											<div class="single-slider">
												<img src="images/modal3.jpg" alt="#">
											</div>
											<div class="single-slider">
												<img src="images/modal4.jpg" alt="#">
											</div>
										</div>
									</div>
								<!-- End Product slider -->
                            </div>
                            <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
                                <div class="quickview-content">
                                    <h2>Flared Shift Dress</h2>
                                    <div class="quickview-ratting-review">
                                        <div class="quickview-ratting-wrap">
                                            <div class="quickview-ratting">
                                                <i class="yellow fa fa-star"></i>
                                                <i class="yellow fa fa-star"></i>
                                                <i class="yellow fa fa-star"></i>
                                                <i class="yellow fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                            </div>
                                            <a href="#"> (1 customer review)</a>
                                        </div>
                                        <div class="quickview-stock">
                                            <span><i class="fa fa-check-circle-o"></i> in stock</span>
                                        </div>
                                    </div>
                                    <h3>$29.00</h3>
                                    <div class="quickview-peragraph">
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Mollitia iste laborum ad impedit pariatur esse optio tempora sint ullam autem deleniti nam in quos qui nemo ipsum numquam.</p>
                                    </div>
									<div class="size">
										<div class="row">
											<div class="col-lg-6 col-12">
												<h5 class="title">Size</h5>
												<select>
													<option selected="selected">s</option>
													<option>m</option>
													<option>l</option>
													<option>xl</option>
												</select>
											</div>
											<div class="col-lg-6 col-12">
												<h5 class="title">Color</h5>
												<select>
													<option selected="selected">orange</option>
													<option>purple</option>
													<option>black</option>
													<option>pink</option>
												</select>
											</div>
										</div>
									</div>
                                    <div class="quantity">
										<!-- Input Order -->
										<div class="input-group">
											<div class="button minus">
												<button type="button" class="btn btn-primary btn-number" disabled="disabled" data-type="minus" data-field="quant[1]">
													<i class="ti-minus"></i>
												</button>
											</div>
											<input type="text" name="quant[1]" class="input-number"  data-min="1" data-max="1000" value="1">
											<div class="button plus">
												<button type="button" class="btn btn-primary btn-number" data-type="plus" data-field="quant[1]">
													<i class="ti-plus"></i>
												</button>
											</div>
										</div>
										<!--/ End Input Order -->
									</div>
									<div class="add-to-cart">
										<a href="#" class="btn">Add to cart</a>
										<a href="#" class="btn min"><i class="ti-heart"></i></a>
										<a href="#" class="btn min"><i class="fa fa-compress"></i></a>
									</div>
                                    <div class="default-social">
										<h4 class="share-now">Share:</h4>
                                        <ul>
                                            <li><a class="facebook" href="#"><i class="fa fa-facebook"></i></a></li>
                                            <li><a class="twitter" href="#"><i class="fa fa-twitter"></i></a></li>
                                            <li><a class="youtube" href="#"><i class="fa fa-pinterest-p"></i></a></li>
                                            <li><a class="dribbble" href="#"><i class="fa fa-google-plus"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal end -->

@endsection
@push('scripts')
<script src="{{asset('backend/js/sweetalert.min.js')}}"></script>
@endpush
