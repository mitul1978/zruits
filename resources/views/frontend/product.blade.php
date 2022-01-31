@extends('layouts.app')
@section('content')

<main class="main">
            <nav aria-label="breadcrumb" class="breadcrumb-nav border-0 mb-0">
                <div class="container d-flex align-items-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{route('products')}}">Products</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Product</li>
                    </ol>
                </div><!-- End .container -->
            </nav><!-- End .breadcrumb-nav -->

            <div class="page-content">
                <div class="container">
                    <div class="product-details-top">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="product-gallery product-gallery-vertical">
                                    <div class="row">
                                        <figure class="product-main-image">
                                            <img id="product-zoom" src="{{url('assets/images/products/single/1.jpg')}}" data-zoom-image="{{url('assets/images/products/single/1.jpg')}}" alt="product image">

                                            <a href="#" id="btn-product-gallery" class="btn-product-gallery">
                                                <i class="icon-arrows"></i>
                                            </a>
                                        </figure><!-- End .product-main-image -->

                                        <div id="product-zoom-gallery" class="product-image-gallery">
                                            <a class="product-gallery-item active" href="javascript:void(0)" data-image="{{url('assets/images/products/single/1.jpg')}}" data-zoom-image="{{url('assets/images/products/single/1.jpg')}}">
                                                <img src="{{url('assets/images/products/single/1-small.jpg')}}" alt="product side">
                                            </a>

                                            <a class="product-gallery-item" href="javascript:void(0)" data-image="{{url('assets/images/products/single/2.jpg')}}" data-zoom-image="{{url('assets/images/products/single/2.jpg')}}">
                                                <img src="{{url('assets/images/products/single/2-small.jpg')}}" alt="product cross">
                                            </a>

                                            <a class="product-gallery-item" href="javascript:void(0)" data-image="{{url('assets/images/products/single/3.jpg')}}" data-zoom-image="{{url('assets/images/products/single/3-big.jpg')}}">
                                                <img src="{{url('assets/images/products/single/3-small.jpg')}}" alt="product with model">
                                            </a>

                                            <a class="product-gallery-item" href="javascript:void(0)" data-image="{{url('assets/images/products/single/4.jpg')}}" data-zoom-image="{{url('assets/images/products/single/4-big.jpg')}}">
                                                <img src="{{url('assets/images/products/single/4-small.jpg')}}" alt="product back">
                                            </a>
                                        </div><!-- End .product-image-gallery -->
                                    </div><!-- End .row -->
                                </div><!-- End .product-gallery -->
                            </div><!-- End .col-md-6 -->

                            <div class="col-md-6">
                                <div class="product-details">
                                    <h1 class="product-title">{{$product->name}}</h1><!-- End .product-title -->

                                    <div class="product-price">
                                        ₹ {{$product->price}}  <small>(MRP incl Taxes)</small>
                                    </div><!-- End .product-price -->

                                    <div class="product-content">
                                        {!! $product->title !!}
                                    </div><!-- End .product-content -->

                                    <div class="table-cell radio-cell">
                                        <div class="label text-underline fw-400 mr-4">Color</div>
                                        <div id="" class="d-flex">
                                            <div class="radio has-color">
                                                <label>
                                                    <input type="radio" name="color" value="Red" class="p-cradio">
                                                    <div class="custom-color"><span style="background-color:#0c0c0c" ></span></div>
                                               </label>
                                            </div>
                                            <div class="radio has-color"> 
                                                <label>
                                                    <input type="radio" name="color" value="Black" class="p-cradio">
                                                    <div class="custom-color"><span style="background-color:#c44141"></span></div>
                                               </label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="table-cell radio-cell">
                                        <div class="label text-underline fw-400 mr-4">Size</div>
                                        <div id="" class="d-flex">
                                            <div class="radio has-image">
                                                <label>
                                                    <input type="radio" name="size" value="s" class="p-cradio">
                                                    <div class="custom-size"><span>S</span></div>
                                               </label>
                                            </div>
                                            <div class="radio has-image">
                                                <label>
                                                    <input type="radio" name="size" value="m" class="p-cradio">
                                                    <div class="custom-size"><span>M</span></div>
                                               </label>
                                            </div>
                                            <div class="radio has-image">
                                                <label>
                                                    <input type="radio" name="size" value="l" class="p-cradio">
                                                    <div class="custom-size"><span>L</span></div>
                                               </label>
                                            </div>
                                            <div class="radio has-image">
                                                <label>
                                                    <input type="radio" name="size" value="xl" class="p-cradio">
                                                    <div class="custom-size"><span>XL</span></div>
                                               </label>
                                            </div>
                                            <div class="radio has-image">
                                                <label>
                                                    <input type="radio" name="size" value="xxl" class="p-cradio">
                                                    <div class="custom-size"><span>XXL</span></div>
                                               </label>
                                            </div>
                                        </div>
                                        <a href="#" class="size-guide"><i class="icon-th-list"></i>size guide</a>
                                    </div>

                                    <div class="details-filter-row details-row-size">
                                        <label for="qty">Qty:</label>
                                        <div class="product-details-quantity">
                                            <input type="number" id="qty" class="form-control" value="1" min="1" max="5" step="1" data-decimals="0" required>
                                        </div><!-- End .product-details-quantity -->
                                    </div><!-- End .details-filter-row -->

                                    <div class="product-details-action">
                                        <a href="javascript:void(0);" class="btn-product btn-cart add_to_cart" data-id="{{$product->id}}"><span class="product{{$product->id}}">Add to cart</span></a>

                                        <div class="details-action-wrapper">
                                            @if(is_user_logged_in())
                                                <a href="javascript:void(0);" class="btn-product btn-wishlist btn-expandable add_to_wishlist" title="Wishlist" data-id="{{$product->id}}" id="wishlist{{$product->id}}"><span class="add_to_wishlist_msg{{$product->id}}">Add to Wishlist</span></a>
                                            @else
                                                <a href="#signin-modal" data-toggle="modal" class="btn-product btn-wishlist btn-expandable" title="Wishlist" data-id="{{$product->id}}" id="wishlist{{$product->id}}">Add to Wishlist</a>
                                            @endif
                                            
                                        </div><!-- End .details-action-wrapper -->
                                    </div><!-- End .product-details-action -->

                                    <div class="product-details-footer">
                                        <div class="product-cat">
                                            <span>Category:</span>
                                            <a href="javascript:void(0);">Women</a>,
                                            <a href="javascript:void(0);">Dresses</a>,
                                            <a href="javascript:void(0);">Yellow</a>
                                        </div><!-- End .product-cat -->

                                        <div class="social-icons social-icons-sm">
                                            <span class="social-label">Share:</span>
                                            <a href="#" class="social-icon" title="Facebook" target="_blank"><i class="icon-facebook-f"></i></a>
                                            <a href="#" class="social-icon" title="Twitter" target="_blank"><i class="icon-twitter"></i></a>
                                            <a href="#" class="social-icon" title="Instagram" target="_blank"><i class="icon-instagram"></i></a>
                                            <a href="#" class="social-icon" title="Pinterest" target="_blank"><i class="icon-pinterest"></i></a>
                                        </div>
                                    </div><!-- End .product-details-footer -->
                                </div><!-- End .product-details -->
                            </div><!-- End .col-md-6 -->
                        </div><!-- End .row -->
                    </div><!-- End .product-details-top -->

                    <div class="product-details-tab">
                        <ul class="nav nav-pills justify-content-center" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="product-desc-link" data-toggle="tab" href="#product-desc-tab" role="tab" aria-controls="product-desc-tab" aria-selected="true">Description</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="product-info-link" data-toggle="tab" href="#product-info-tab" role="tab" aria-controls="product-info-tab" aria-selected="false">Additional information</a>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane fade show active" id="product-desc-tab" role="tabpanel" aria-labelledby="product-desc-link">
                                <div class="product-desc-content">
                                    <h3>Product Information</h3>
                                    {!! $product->description !!}
                                </div><!-- End .product-desc-content -->
                            </div><!-- .End .tab-pane -->
                            <div class="tab-pane fade" id="product-info-tab" role="tabpanel" aria-labelledby="product-info-link">
                                <div class="product-desc-content">
                                    <h3>Information</h3>
                                    {!! $product->description !!}
                                </div><!-- End .product-desc-content -->
                            </div><!-- .End .tab-pane -->
                        </div><!-- End .tab-content -->
                    </div><!-- End .product-details-tab -->

                    <h2 class="title text-center mb-4">You May Also Like</h2><!-- End .title text-center -->

                    <div class="owl-carousel owl-simple carousel-equal-height carousel-with-shadow" data-toggle="owl" 
                        data-owl-options='{
                            "nav": false, 
                            "dots": true,
                            "margin": 20,
                            "loop": false,
                            "responsive": {
                                "0": {
                                    "items":1
                                },
                                "480": {
                                    "items":2
                                },
                                "768": {
                                    "items":3
                                },
                                "992": {
                                    "items":4
                                },
                                "1200": {
                                    "items":4,
                                    "nav": true,
                                    "dots": false
                                }
                            }
                        }'>
                        <div class="product product-7 text-center">
                            <figure class="product-media">
                                <span class="product-label label-new">New</span>
                                <a href="product.html">
                                    <img src="assets/images/products/product-4.jpg" alt="Product image" class="product-image">
                                </a>

                                <div class="product-action-vertical">
                                    <a href="#" class="btn-product-icon btn-wishlist btn-expandable"><span>add to wishlist</span></a>
                                </div><!-- End .product-action-vertical -->

                            </figure><!-- End .product-media -->

                            <div class="product-body">
                                <div class="product-cat">
                                    <a href="#">Women</a>
                                </div><!-- End .product-cat -->
                                <h3 class="product-title"><a href="product.html">Brown paperbag waist pencil skirt</a></h3><!-- End .product-title -->
                                <div class="product-price">
                                    $60.00
                                </div><!-- End .product-price -->
                                <div class="atc-container">
                                    
                                <div class="mb-2">
                                    <a href="#" class="btn-cart"><span>Add to cart</span></a>
                                </div></div>

                            </div><!-- End .product-body -->
                        </div><!-- End .product -->

                        <div class="product product-7 text-center">
                            <figure class="product-media">
                                <a href="product.html">
                                    <img src="assets/images/products/product-5.jpg" alt="Product image" class="product-image">
                                </a>

                                <div class="product-action-vertical">
                                    <a href="#" class="btn-product-icon btn-wishlist btn-expandable"><span>add to wishlist</span></a>
                                </div><!-- End .product-action-vertical -->

                            </figure><!-- End .product-media -->

                            <div class="product-body">
                                <div class="product-cat">
                                    <a href="#">Dresses</a>
                                </div><!-- End .product-cat -->
                                <h3 class="product-title"><a href="product.html">Dark yellow lace cut out swing dress</a></h3><!-- End .product-title -->
                                <div class="product-price">
                                    $84.00
                                </div><!-- End .product-price -->
                                <div class="atc-container">
                                    
                                <div class="mb-2">
                                    <a href="#" class="btn-cart"><span>Add to cart</span></a>
                                </div></div>

                            </div><!-- End .product-body -->
                        </div><!-- End .product -->

                        <div class="product product-7 text-center">
                            <figure class="product-media">
                                <a href="product.html">
                                    <img src="assets/images/products/product-7.jpg" alt="Product image" class="product-image">
                                </a>

                                <div class="product-action-vertical">
                                    <a href="#" class="btn-product-icon btn-wishlist btn-expandable"><span>add to wishlist</span></a>
                                </div><!-- End .product-action-vertical -->

                            </figure><!-- End .product-media -->

                            <div class="product-body">
                                <div class="product-cat">
                                    <a href="#">Jeans</a>
                                </div><!-- End .product-cat -->
                                <h3 class="product-title"><a href="product.html">Blue utility pinafore denim dress</a></h3><!-- End .product-title -->
                                <div class="product-price">
                                    $76.00
                                </div><!-- End .product-price -->
                                <div class="atc-container">
                                    
                                <div class="mb-2">
                                    <a href="#" class="btn-cart"><span>Add to cart</span></a>
                                </div></div>
                            </div><!-- End .product-body -->
                        </div><!-- End .product -->

                        <div class="product product-7 text-center">
                            <figure class="product-media">
                                <span class="product-label label-new">New</span>
                                <a href="product.html">
                                    <img src="assets/images/products/product-8.jpg" alt="Product image" class="product-image">
                                </a>

                                <div class="product-action-vertical">
                                    <a href="#" class="btn-product-icon btn-wishlist btn-expandable"><span>add to wishlist</span></a>
                                </div><!-- End .product-action-vertical -->

                            </figure><!-- End .product-media -->

                            <div class="product-body">
                                <div class="product-cat">
                                    <a href="#">Shoes</a>
                                </div><!-- End .product-cat -->
                                <h3 class="product-title"><a href="product.html">Beige knitted elastic runner shoes</a></h3><!-- End .product-title -->
                                <div class="product-price">
                                    $84.00
                                </div><!-- End .product-price -->
                                <div class="atc-container">
                                    
                                <div class="mb-2">
                                    <a href="#" class="btn-cart"><span>Add to cart</span></a>
                                </div></div>

                            </div><!-- End .product-body -->
                        </div><!-- End .product -->

                        <div class="product product-7 text-center">
                            <figure class="product-media">
                                <a href="product.html">
                                    <img src="assets/images/products/product-7.jpg" alt="Product image" class="product-image">
                                </a>

                                <div class="product-action-vertical">
                                    <a href="#" class="btn-product-icon btn-wishlist btn-expandable"><span>add to wishlist</span></a>
                                </div><!-- End .product-action-vertical -->

                            </figure><!-- End .product-media -->

                            <div class="product-body">
                                <div class="product-cat">
                                    <span>Category:</span>
                                    <a href="#">Women</a>,
                                    <a href="#">Dresses</a>,
                                    <a href="#">Yellow</a>
                                </div><!-- End .product-cat -->
                                <h3 class="product-title"><a href="product.html">Blue utility pinafore denim dress</a></h3><!-- End .product-title -->
                                <div class="product-price">
                                    $76.00
                                </div><!-- End .product-price -->
                                <div class="atc-container">
                                    
                                <div class="mb-2">
                                    <a href="#" class="btn-cart"><span>Add to cart</span></a>
                                </div></div>
                            </div><!-- End .product-body -->
                        </div><!-- End .product -->

                    </div><!-- End .owl-carousel -->
                </div><!-- End .container -->
            </div><!-- End .page-content -->
        </main><!-- End .main -->

@endsection