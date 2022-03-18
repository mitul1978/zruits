@extends('layouts.app')
@section('content')

<main class="main">
    <div class="home-menu-section">
        <ul>
            @foreach($categories as $category)
                <li>
                    <a href="{{url('categories/' . $category->slug)}}">
                        <img src="{{url(@$category->photo)}}" alt="{{$category->slug}}">
                        <span class="first-slider-title">{{$category->title}}</span>
                    </a>
                </li>
            @endforeach 
        </ul>
    </div>
    <div class="">
        <div class="owl-carousel owl-simple carousel-equal-height carousel-with-shadow owl-light owl-nav-inside" data-toggle="owl" data-owl-options='{"nav": false}'>
            @foreach ($banners as $item)
                <a href="{{$item->link}}" class="w-100">
                    <img src="{{$item->photo}}">
                    <!-- <div class="intro-slide" style="background-image: url({{$item->photo}});">
                        <div class="container intro-content">
                        </div>
                    </div> -->
                </a> 
            @endforeach
        </div><!-- End .owl-carousel owl-simple -->

        <span class="slider-loader text-white"></span><!-- End .slider-loader -->
    </div><!-- End .intro-slider-container -->

    <div class="mb-3 mb-lg-5"></div><!-- End .mb-3 mb-lg-5 -->


    <div class="container">
        <div class="row">
            <div class="col-sm-6 mb-1 mb-sm-0"">
                <a href="{{url('offers/' . encrypt('offer2'))}}">
                   <img src="assets/images/home/offer-1.png" alt="">
                </a>
            </div>
            <div class="col-sm-6">
                <a href="{{url('offers/' . encrypt('offer1'))}}">
                   <img src="assets/images/home/offer-2.png" alt="">
                </a>
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
        <div class="" style="font-size: 14px; font-weight: 600; text-align: center;">
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
                            "items":4
                        },
                        "1600": {
                            "items":5,
                            "nav": true
                        }
                    }
                }'>
                @foreach($categories as $category)
                    <div class="cat-slide">
                        <a href="{{url('categories/' . $category->slug)}}"><img src="{{url(@$category->photo)}}" alt="{{$category->slug}}">{{$category->title}}</a>
                    </div>
                @endforeach 
            </div><!-- End .owl-carousel -->          
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

                    @if(isset($newArrivals) && $newArrivals->isNotEmpty())
                       @foreach ($newArrivals as $product)
                           <div class="product product-7 text-center">
                                <figure class="product-media">
                                    <?php 
                                        $url = $product->images()->first();
                                        if($url)
                                        {
                                            $url = $product->images()->first()->image;
                                        }
                                        else {
                                            $url = '/images/no-image.jpg';
                                        }
                                    ?>
                                    @if($product->tag != '')<span class="product-label label-new">{{$product->tag}}</span>@endif
                                    <a href="{{url('product/' .$product->slug)}}">
                                        <img src="{{asset($url)}}" alt="{!! @$product->meta_description !!}" class="product-image">
                                    </a>

                                    <div class="product-action-vertical">
                                        @if(is_user_logged_in())
                                          <a href="javascript:void(0);" class="btn-product-icon btn-wishlist btn-expandable add_to_wishlist" data-id="{{$product->id}}" id="wishlist{{$product->id}}"><span class="add_to_wishlist_msg{{$product->id}}">add to wishlist</span></a>
                                        @else
                                          <a href="#signin-modal" data-toggle="modal" class="btn-product-icon btn-wishlist btn-expandable" data-id="{{$product->id}}" id="wishlist{{$product->id}}"></a>
                                        @endif
                                    </div><!-- End .product-action-vertical -->
                                </figure><!-- End .product-media -->
                                <?php
                                    $availableColors = $product->sizesstock()->groupBy('color_id')->get();
                                    $availableSizes = $product->sizesstock()->groupBy('size_id')->get();
                                ?>
                                <div class="product-body">
                                    <div class="product-cat">
                                        <a href="{{route('categories',$product->category->slug)}}">{{$product->category->title}}</a>
                                    </div><!-- End .product-cat -->
                                    @if(isset($availableColors) && $availableColors->isNotEmpty())
                                        <div class="product-color row justify-content-center">  
                                            @foreach($availableColors as $color)     
                                                    <div class="radio has-color">
                                                        <label>
                                                            <input type="radio" name="color" value="{{@$color->color_id}}" class="p-cradio">
                                                            <div class="custom-color"><span style="background-color:{{@$color->productColor->code}}" ></span></div>
                                                        </label>
                                                    </div>
                                            @endforeach 
                                        </div><!-- End .product-cat -->
                                    @endif
                                    <h3 class="product-title"><a href="{{route('product',$product->slug)}}">{{$product->name}}</a></h3><!-- End .product-title -->
                                    <div class="product-price">
                                        <div class="w-100">
                                        <span class="new-price">₹{{round($product->discounted_amt) }}</span> @if($product->discounted_amt != $product->price)<span class="old-price">₹{{round($product->price)}}</span> @endif  </div>
                                        <small>(MRP incl Taxes)</small>
                                    </div><!-- End .product-price -->
                                    <div class="atc-container">                                        
                                        <div class="mb-0">                                    
                                            <a href="{{route('product',$product->slug)}}" class="btn-cart" data-id="{{$product->id}}"><span class="product{{$product->id}}">Add to cart</span></a>
                                        </div>
                                    </div>
                                </div><!-- End .product-body -->
                            </div><!-- End .product -->
                       @endforeach
                    @endif

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

                    @if(isset($bestSellers) && $bestSellers->isNotEmpty())
                       @foreach ($bestSellers as $product)
                           <div class="product product-7 text-center">
                                <figure class="product-media">
                                    <?php 
                                        $url = $product->images()->first();
                                        if($url)
                                        {
                                            $url = $product->images()->first()->image;
                                        }
                                        else {
                                            $url = '/images/no-image.jpg';
                                        }
                                    ?>
                                    @if($product->tag != '')<span class="product-label label-new">{{$product->tag}}</span>@endif
                                    <a href="{{url('product/' .$product->slug)}}">
                                        <img src="{{asset($url)}}" alt="{!! @$product->meta_description !!}" class="product-image">
                                    </a>

                                    <div class="product-action-vertical">
                                        @if(is_user_logged_in())
                                          <a href="javascript:void(0);" class="btn-product-icon btn-wishlist btn-expandable add_to_wishlist" data-id="{{$product->id}}" id="wishlist{{$product->id}}"><span class="add_to_wishlist_msg{{$product->id}}">add to wishlist</span></a>
                                        @else
                                          <a href="#signin-modal" data-toggle="modal" class="btn-product-icon btn-wishlist btn-expandable" data-id="{{$product->id}}" id="wishlist{{$product->id}}"></a>
                                        @endif
                                    </div><!-- End .product-action-vertical -->
                                </figure><!-- End .product-media -->
                                <?php
                                    $availableColors = $product->sizesstock()->groupBy('color_id')->get();
                                ?>  
                                <div class="product-body">
                                    <div class="product-cat">
                                        <a href="{{route('categories',$product->category->slug)}}">{{$product->category->title}}</a>
                                    </div><!-- End .product-cat -->
                                    @if(isset($availableColors) && $availableColors->isNotEmpty())
                                        <div class="product-color row justify-content-center">  
                                            @foreach($availableColors as $color)     
                                                    <div class="radio has-color">
                                                        <label>
                                                            <input type="radio" name="color" value="{{@$color->color_id}}" class="p-cradio colorOptions-{{$product->id}}">
                                                            <div class="custom-color"><span style="background-color:{{@$color->productColor->code}}" ></span></div>
                                                        </label>
                                                    </div>
                                            @endforeach 
                                        </div><!-- End .product-cat -->
                                    @endif
                                    <h3 class="product-title"><a href="{{route('product',$product->slug)}}">{{$product->name}}</a></h3><!-- End .product-title -->
                                    <div class="product-price">
                                        <div class="w-100">
                                        <span class="new-price">₹ {{round($product->discounted_amt) }}</span> @if($product->discounted_amt != $product->price)<span class="old-price">₹ {{round($product->price)}}</span> @endif  </div>
                                        <small>(MRP incl Taxes)</small>
                                    </div><!-- End .product-price -->
                                    <div class="atc-container">                                        
                                        <div class="mb-0">                                    
                                            <a href="{{route('product',$product->slug)}}" class="btn-cart" ><span class="product{{$product->id}}">Add to cart</span></a>
                                        </div>
                                    </div>
                                </div><!-- End .product-body -->
                            </div><!-- End .product -->
                       @endforeach
                    @endif
                   
                    
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
                                    <i class="icon-star-o"></i>
                                </span>
                                <div class="icon-box-content">
                                    <h3 class="icon-box-title">Curated Design</h3><!-- End .icon-box-title -->
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
                                    <i class="icon-heart-o"></i>
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