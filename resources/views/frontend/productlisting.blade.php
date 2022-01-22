@if(isset($products) && $products->isNotEmpty())
                                        @foreach($products as $product)
                                            <div class="col-6 col-md-4 col-lg-4">
                                                <div class="product product-7 text-center">
                                                    <figure class="product-media">
                                                        <span class="product-label label-new">New</span>
                                                        <a href="product.html">
                                                            <img src="assets/images/products/product-4.jpg" alt="Product image" class="product-image">
                                                        </a>

                                                        <div class="product-action-vertical">
                                                            @if(is_user_logged_in())
                                                                <a href="javascript:void(0);" class="btn-product-icon btn-wishlist btn-expandable add_to_wishlist" data-id="{{$product->id}}" id="wishlist{{$product->id}}"><span class="add_to_wishlist_msg{{$product->id}}">add to wishlist</span></a>
                                                            @else
                                                                <a href="#signin-modal" data-toggle="modal" class="btn-product-icon btn-wishlist btn-expandable" data-id="{{$product->id}}" id="wishlist{{$product->id}}"></a>
                                                            @endif
                                                        </div><!-- End .product-action-vertical -->

                                                    </figure><!-- End .product-media -->

                                                    <div class="product-body">
                                                        <div class="product-cat">
                                                            <a href="#">Women</a>
                                                        </div><!-- End .product-cat -->
                                                        <h3 class="product-title"><a href="product.html">{{$product->name}}</a></h3><!-- End .product-title -->
                                                        <div class="product-price">
                                                            ₹ {{$product->price}}  <small>(MRP incl Taxes)</small>
                                                        </div><!-- End .product-price -->
                                                        <div class="atc-container">
                                                            
                                                        <div class="mb-2">
                                                            <a href="javascript:void(0);" class="btn-cart add_to_cart" data-id="{{$product->id}}"><span class="product{{$product->id}}">Add to cart</span></a>
                                                        </div>
                                                    </div>

                                                    </div><!-- End .product-body -->
                                                </div><!-- End .product -->
                                            </div><!-- End .col-sm-6 col-lg-4 -->
                                        @endforeach  
@endif      