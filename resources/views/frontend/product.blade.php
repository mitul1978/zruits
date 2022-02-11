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
            <input type="hidden" name="product_id" id="product_id" value="{{@$product->id}}">
            <div class="page-content" >
                <div class="container">
                    <div class="product-details-top" id="loadAjax">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="product-gallery product-gallery-vertical">
                                    <div class="row">
                                        <figure class="product-main-image">
                                            <img id="product-zoom" src="{{asset(@$product->images()->first()->image)}}" data-zoom-image="{{asset(@$product->images()->first()->image)}}" alt="product image">

                                            <a href="#" id="btn-product-gallery" class="btn-product-gallery">
                                                <i class="icon-arrows"></i>
                                            </a>
                                        </figure><!-- End .product-main-image -->

                                        <div id="product-zoom-gallery" class="product-image-gallery">
                                            @foreach($product->images as $key => $image)
                                                @if($key == 0)
                                                    <a class="product-gallery-item active" href="#" data-image="{{asset(@$image->image)}}" data-zoom-image="{{asset(@$image->image)}}">
                                                        <img src="{{asset(@$image->image)}}" alt="product side">
                                                    </a>
                                                @else
                                                    <a class="product-gallery-item" href="#" data-image="{{asset(@$image->image)}}" data-zoom-image="{{asset(@$image->image)}}">
                                                        <img src="{{asset(@$image->image)}}" alt="product side">
                                                    </a>
                                                @endif
                                            @endforeach
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
                                     <?php
                                        $availableColors = $product->sizesstock()->groupBy('color_id')->get();
                                        $availableSizes = $product->sizesstock()->groupBy('size_id')->get();
                                     ?>
                                    <div class="table-cell radio-cell">
                                        <div class="label text-underline fw-400 mr-4">Color</div>
                                        <div id="" class="d-flex">
                                            @if(isset($availableColors) && $availableColors->isNotEmpty())  
                                               @foreach($availableColors as $color)                                     
                                                <div class="radio has-color">
                                                    <label>
                                                        <input type="radio" name="color" value="{{@$color->color_id}}" class="p-cradio colorOptions">
                                                        <div class="custom-color"><span style="background-color:{{@$color->productColor->code}}" ></span></div>
                                                     </label>
                                                </div>
                                               @endforeach 
                                            @endif
                                            
                                        </div>
                                    </div>

                                    <div class="table-cell radio-cell">
                                        <div class="label text-underline fw-400 mr-4">Size</div>
                                        <div id="" class="d-flex">
                                            @if(isset($availableSizes) && $availableSizes->isNotEmpty())  
                                               @foreach($availableSizes as $size)              
                                                 <div class="radio has-image">
                                                    <label>
                                                        <input type="radio" name="size" value="{{@$size->size_id}}" class="p-cradio ">
                                                        <div class="custom-size"><span>{{@$size->productSize->name}}</span></div>
                                                    </label>
                                                 </div>
                                                @endforeach
                                            @endif     
                                           
                                        </div>
                                        <a href="#" class="size-guide"><i class="icon-th-list"></i>size guide</a>
                                    </div>

                                    <div id="displayProdCount">                           
                                    </div><!-- End .details-filter-row -->

                                    <div class="details-filter-row details-row-size">
                                        <label for="qty">Qty:</label>
                                        <div class="product-details-quantity">
                                            <input type="number" id="qty" class="form-control" value="1" min="1" max="5" step="1" data-decimals="0" required>
                                        </div><!-- End .product-details-quantity -->
                                    </div><!-- End .details-filter-row -->

                                    <div class="details-filter-row details-row-size">
                                        <label id="availableContsu"></label>                                        
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
                                            <a href="javascript:void(0);">{{$product->category->title}}</a>
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
                                    {!! $product->additional_information !!}
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
                        @if(isset($relatedProducts) && @$relatedProducts->isNotEmpty())
                            @foreach ($relatedProducts as $product)
                                <div class="product product-7 text-center">
                                        <figure class="product-media">
                                            <span class="product-label label-new">{{$product->tag}}</span>
                                            <a href="{{url('product/' .$product->slug)}}">
                                                <img src="{{asset(@$product->images()->first()->image)}}" alt="Product image" class="product-image">
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
                                                <a href="{{route('product',$product->category->slug)}}">{{$product->category->title}}</a>
                                            </div><!-- End .product-cat -->
                                            @if(isset($availableColors) && $availableColors->isNotEmpty())
                                                <div class="product-color row justify-content-center">  
                                                    @foreach($availableColors as $color)     
                                                            <div class="radio has-color">
                                                                <label>
                                                                    <input type="radio" name="color" value="{{@$color->color_id}}" class="p-cradio colorOptions">
                                                                    <div class="custom-color"><span style="background-color:{{@$color->productColor->code}}" ></span></div>
                                                                </label>
                                                            </div>
                                                    @endforeach 
                                                </div><!-- End .product-cat -->
                                            @endif
                                            <h3 class="product-title"><a href="{{route('product',$product->slug)}}">{{$product->name}}</a></h3><!-- End .product-title -->
                                            <div class="product-price">
                                                ₹ {{$product->price }} <small>(MRP incl Taxes)</small>
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
                       

                    </div><!-- End .owl-carousel -->
                </div><!-- End .container -->
            </div><!-- End .page-content -->
        </main><!-- End .main -->

@endsection