@extends('layouts.app')
@section('content')

<main class="main">
    <div class="intro-slider-container">
        <div class="owl-carousel owl-simple owl-light owl-nav-inside" data-toggle="owl" data-owl-options='{"nav": false}'>
            <div class="intro-slide" style="background-image: url(https://www.globaldesi.in/media/homepage_content/2/1/211221-d-global-desi-eoss-women-clothing_1.jpg);">
                <div class="container intro-content">
                </div><!-- End .container intro-content -->
            </div><!-- End .intro-slide -->

            <div class="intro-slide" style="background-image: url(https://www.globaldesi.in/media/homepage_content/2/1/211221-d-global-desi-eoss-women-clothing_1.jpg);">
                <div class="container intro-content">
                </div><!-- End .container intro-content -->
            </div><!-- End .intro-slide -->

            <div class="intro-slide" style="background-image: url(https://www.globaldesi.in/media/homepage_content/d/-/d-gd-ww.jpg);">
                <div class="container intro-content">
                        
                </div><!-- End .container intro-content -->
            </div><!-- End .intro-slide -->
        </div><!-- End .owl-carousel owl-simple -->

        <span class="slider-loader text-white"></span><!-- End .slider-loader -->
    </div><!-- End .intro-slider-container -->

    <div class="mb-3 mb-lg-5"></div><!-- End .mb-3 mb-lg-5 -->


    <div class="container">
        <div class="row">
            <div class="col-sm-6 mb-1 mb-sm-0"">
                <img src="https://frugalonline.in/wp-content/uploads/2021/11/royaloffer-horizontal-600x200.jpg" alt="">
            </div>
            <div class="col-sm-6">
                <img src="https://frugalonline.in/wp-content/uploads/2021/11/royaloffer-horizontal-2-600x200.jpg" alt="">
            </div>
        </div>
    </div>

    <div class="mb-3 mb-lg-5"></div><!-- End .mb-3 mb-lg-5 -->

    <div class="container">
        <div class="heading mb-2">
            <h2 class="title">Categories</h2><!-- End .title -->
        </div><!-- End .heading -->
    </div><!-- End .container -->
    <div class="container">
        <div class="row">
            <div class="col-6 col-md-3">
                <a href="#"><img src="https://www.globaldesi.in/media/homepage_content/2/0/20211006-gd-d-elegant-tops-women-online_1.jpg" alt=""></a>
            </div>
            <div class="col-6 col-md-3">
                <a href="#"><img src="https://www.globaldesi.in/media/homepage_content/2/0/20211006-gd-d-chic-trendy-_dresses-women-online.jpg" alt=""></a>
            </div>
            <div class="col-6 col-md-3">
                <a href="#"><img src="https://www.globaldesi.in/media/homepage_content/2/0/20211005-gd-d-trendy-kurtas-women-online.jpg" alt=""></a>
            </div>
            <div class="col-6 col-md-3">
                <a href="#"><img src="https://www.globaldesi.in/media/homepage_content/2/0/20211006-gd-d-stylish-sets-kurtas-women-online.jpg" alt=""></a>
            </div>
        </div>
    </div>

    <div class="mb-3 mb-lg-5"></div><!-- End .mb-3 mb-lg-5 -->

    <div class="container">
        <div class="heading mb-2">
            <h2 class="title">New Arrivals</h2><!-- End .title -->
        </div><!-- End .heading -->
    </div><!-- End .container -->
    <div class="container">
        <div class="tab-content tab-content-carousel">
            <div class="tab-pane p-0 fade show active" id="products-featured-tab" role="tabpanel" aria-labelledby="products-featured-link">
                <div class="owl-carousel owl-simple carousel-equal-height carousel-with-shadow" data-toggle="owl" 
                    data-owl-options='{
                        "nav": false, 
                        "dots": true,
                        "margin": 20,
                        "loop": false,
                        "responsive": {
                            "0": {
                                "items":2
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
                                "items":5
                            },
                            "1600": {
                                "items":6,
                                "nav": true
                            }
                        }
                    }'>


                    @if(isset($products) && $products->isNotEmpty())
                       @foreach ($products as $product)
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
                                        ₹60 <small>(MRP incl Taxes)</small>
                                    </div><!-- End .product-price -->
                                    <div class="atc-container">                                        
                                        <div class="mb-0">                                    
                                            <a href="javascript:void(0);" class="btn-cart add_to_cart" data-id="{{$product->id}}"><span class="product{{$product->id}}">Add to cart</span></a>
                                        </div>
                                    </div>
                                </div><!-- End .product-body -->
                            </div><!-- End .product -->
                       @endforeach
                    @endif
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
                                    ₹60 <small>(MRP incl Taxes)</small>
                                </div><!-- End .product-price -->
                                <div class="atc-container">                                    
                                    <div class="mb-0">
                                        <a href="#" class="btn-cart"><span>Add to cart</span></a>
                                    </div>
                                </div>
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
                                    ₹84 <small>(MRP incl Taxes)</small>
                                </div><!-- End .product-price -->
                                <div class="atc-container">                                    
                                    <div class="mb-0">
                                        <a href="#" class="btn-cart"><span>Add to cart</span></a>
                                    </div>
                                </div>
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
                                    ₹76 <small>(MRP incl Taxes)</small>
                                </div><!-- End .product-price -->
                                <div class="atc-container">
                                    
                                <div class="mb-0">
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
                                    ₹84 <small>(MRP incl Taxes)</small>
                                </div><!-- End .product-price -->
                                <div class="atc-container">
                                    
                                <div class="mb-0">
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
                                    ₹76 <small>(MRP incl Taxes)</small>
                                </div><!-- End .product-price -->
                                <div class="atc-container">
                                    
                                <div class="mb-0">
                                    <a href="#" class="btn-cart"><span>Add to cart</span></a>
                                </div></div>
                            </div><!-- End .product-body -->
                        </div><!-- End .product -->

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
                                    ₹60 <small>(MRP incl Taxes)</small>
                                </div><!-- End .product-price -->
                                <div class="atc-container">
                                    
                                <div class="mb-0">
                                    <a href="#" class="btn-cart"><span>Add to cart</span></a>
                                </div></div>

                            </div><!-- End .product-body -->
                        </div><!-- End .product -->

                </div><!-- End .owl-carousel -->
            </div><!-- .End .tab-pane -->
        </div><!-- End .tab-content -->
    </div><!-- End .container-fluid -->


    <div class="mb-3 mb-lg-5"></div><!-- End .mb-3 mb-lg-5 -->

    <div class="container">
        <div class="heading mb-2">
            <h2 class="title">Best Sellers</h2><!-- End .title -->
        </div><!-- End .heading -->
    </div><!-- End .container -->
    <div class="container">
        <div class="tab-content tab-content-carousel">
            <div class="tab-pane p-0 fade show active" id="products-featured-tab" role="tabpanel" aria-labelledby="products-featured-link">
                <div class="owl-carousel owl-simple carousel-equal-height carousel-with-shadow" data-toggle="owl" 
                    data-owl-options='{
                        "nav": false, 
                        "dots": true,
                        "margin": 20,
                        "loop": false,
                        "responsive": {
                            "0": {
                                "items":2
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
                                "items":5
                            },
                            "1600": {
                                "items":6,
                                "nav": true
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
                                    ₹60 <small>(MRP incl Taxes)</small>
                                </div><!-- End .product-price -->
                                <div class="atc-container">
                                    
                                <div class="mb-0">
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
                                    ₹84 <small>(MRP incl Taxes)</small>
                                </div><!-- End .product-price -->
                                <div class="atc-container">
                                    
                                <div class="mb-0">
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
                                    ₹76.00 <small>(MRP incl Taxes)</small>
                                </div><!-- End .product-price -->
                                <div class="atc-container">
                                    
                                <div class="mb-0">
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
                                    ₹84 <small>(MRP incl Taxes)</small>
                                </div><!-- End .product-price -->
                                <div class="atc-container">
                                    
                                <div class="mb-0">
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
                                    ₹76 <small>(MRP incl Taxes)</small>
                                </div><!-- End .product-price -->
                                <div class="atc-container">
                                    
                                <div class="mb-0">
                                    <a href="#" class="btn-cart"><span>Add to cart</span></a>
                                </div></div>
                            </div><!-- End .product-body -->
                        </div><!-- End .product -->

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
                                    ₹60 <small>(MRP incl Taxes)</small>
                                </div><!-- End .product-price -->
                                <div class="atc-container">
                                    
                                <div class="mb-0">
                                    <a href="#" class="btn-cart"><span>Add to cart</span></a>
                                </div></div>

                            </div><!-- End .product-body -->
                        </div><!-- End .product -->
                    
                </div><!-- End .owl-carousel -->
            </div><!-- .End .tab-pane -->
        </div><!-- End .tab-content -->
    </div><!-- End .container-fluid -->

    <div class="mb-5"></div><!-- End .mb-5 -->
    

    <div class="icon-boxes-container pb-0">
        <div class="container">
            <div class="row">
                <div class="col-sm-10 offset-sm-1">
                    <div class="row">
                        <div class="col-3">
                            <div class="icon-box text-center">
                                <span class="icon-box-icon text-dark mb-0">
                                    <i class="icon-truck"></i>
                                </span>
                                <div class="icon-box-content">
                                    <h3 class="icon-box-title">Free Shipping</h3><!-- End .icon-box-title -->
                                </div><!-- End .icon-box-content -->
                            </div><!-- End .icon-box -->
                        </div><!-- End .col-sm-6 col-lg-3 -->
                        <div class="col-3">
                            <div class="icon-box text-center">
                                <span class="icon-box-icon text-dark mb-0">
                                    <i class="icon-random"></i>
                                </span>
                                <div class="icon-box-content">
                                    <h3 class="icon-box-title">Easy Exchange</h3><!-- End .icon-box-title -->
                                </div><!-- End .icon-box-content -->
                            </div><!-- End .icon-box -->
                        </div><!-- End .col-sm-6 col-lg-3 -->
                        <div class="col-3">
                            <div class="icon-box text-center">
                                <span class="icon-box-icon text-dark mb-0">
                                    <i class="icon-check-circle-o"></i>
                                </span>
                                <div class="icon-box-content">
                                    <h3 class="icon-box-title">Assured Quality</h3><!-- End .icon-box-title -->
                                </div><!-- End .icon-box-content -->
                            </div><!-- End .icon-box -->
                        </div><!-- End .col-sm-6 col-lg-3 -->
                        <div class="col-3">
                            <div class="icon-box text-center">
                                <span class="icon-box-icon text-dark mb-0">
                                    <i class="icon-heart"></i>
                                </span>
                                <div class="icon-box-content">
                                    <h3 class="icon-box-title">Hand Picked</h3><!-- End .icon-box-title -->
                                </div><!-- End .icon-box-content -->
                            </div><!-- End .icon-box -->
                        </div><!-- End .col-sm-6 col-lg-3 -->

                    </div><!-- End .row -->
                </div>
            </div>
        </div><!-- End .container -->
    </div>


</main><!-- End .main -->

@endsection