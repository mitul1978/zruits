@extends('layouts.app')
@section('content')
   <style>
    .spinner-wrapper 
             { 
               position: fixed; 
               z-index: 999999; 
               top: 0; right: 0; 
               bottom: 0; left: 0; 
               background: #fff; 
               opacity:0.6;
            } 
            .spinner 
            { 
              position: absolute; 
              top: 50%; 
              /* centers the loading animation vertically one the screen */ 
              left: 50%; 
              /* centers the loading animation horizontally one the screen */ 
              width: 3.75rem; 
              height: 1.25rem; 
              margin: -0.625rem 0 0 -1.875rem; 
              /* is width and height divided by two */ 
              text-align: center; 
            } 
            .spinner > div 
            {
               display: inline-block; 
               width: 1rem; 
               height: 1rem; 
               border-radius: 100%; 
               background-color: #4D4D4D; 
               -webkit-animation: sk-bouncedelay 1.4s infinite ease-in-out both; 
               animation: sk-bouncedelay 1.4s infinite ease-in-out both; 
             } 
             .spinner .bounce1 
             { 
               -webkit-animation-delay: -0.32s; 
               animation-delay: -0.32s; 
             } 
             .spinner .bounce2         
             { 
               -webkit-animation-delay: -0.16s; 
               animation-delay: -0.16s; 
             }
             @-webkit-keyframes sk-bouncedelay 
             { 
               0%, 80%, 100% 
               { 
                 -webkit-transform: scale(0); 
               } 
               40% 
               { 
                 -webkit-transform: scale(1.0); 
               } 
             } 
             @keyframes  sk-bouncedelay 
             {
                0%, 80%, 100% 
                { 
                  -webkit-transform: scale(0); 
                  -ms-transform: scale(0); 
                  transform: scale(0); 
                } 
                40% 
                { 
                  -webkit-transform: scale(1.0); 
                  -ms-transform: scale(1.0); 
                  transform: scale(1.0); 
                } 
             }
    
    </style>
    
    <div class="spinner-wrapper" id="spinner-wrapper">
      <div class="spinner">
        <div class="bounce1"></div>
        <div class="bounce2"></div>
        <div class="bounce3"></div>
      </div>
    </div>
<main class="main">
    <input type="hidden" name="pageValue" id="pageValue" value="{{ request()->has('offerValue') ? decrypt(request()->query('offerValue')) : 0 }}">
            <nav aria-label="breadcrumb" class="breadcrumb-nav border-0 mb-0">
                <div class="container d-flex align-items-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{route('products')}}">Products</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Product</li>
                    </ol>
                </div><!-- End .container -->
            </nav><!-- End .breadcrumb-nav -->
            <input type="hidden" name="product" id="product" value="{{@$product->slug}}">
            <input type="hidden" name="productType" id="productType" value="1">
            <div class="page-content" >
                <div class="container">
                    <div class="product-details-top" id="loadAjax">

                        @include('frontend.singleProduct')

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
                                            @if($product->tag != '')<span class="product-label label-new">{{$product->tag}}</span>@endif
                                            <a href="{{url('product/' .$product->slug)}}">
                                                <img src="{{asset(@$product->images()->first()->image)}}" alt="{!! @$product->meta_description !!}" class="product-image">
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
                                                <span class="new-price">₹ {{round($product->discounted_amt)}}</span>  @if($product->discounted_amt != $product->price) <span class="old-price">₹ {{round($product->price)}}</span> @endif <small>(MRP incl Taxes)</small>
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
        <script>
            
        $(document).ready(function() 
        {  
           // $(this).magnificPopup();
            $('.spinner-wrapper').hide();

            $(document).on('click','.product-gallery-item', function()
            {  
               $('.product-gallery-item').removeClass('active');
               $(this).addClass('active');
               $('#product-zoom').attr('src',$(this).data('image'));
               //$('.zoomContainer').remove();
               $('.zoomWindow').css({
                   'background-image':'url(' + $(this).data('image') + ')',
               });
            });

            $(document).on('click','#btn-product-gallery', function(e)
            { 
                $('#product-zoom').elevateZoom({
                    gallery:'product-zoom-gallery',
                    galleryActiveClass: 'active',
                    zoomType: "inner",
                    cursor: "crosshair",
                    zoomWindowFadeIn: 400,
                    zoomWindowFadeOut: 400,
                    responsive: true
                });
                var ez = $('#product-zoom').data('elevateZoom');
                console.log(ez);
                if ( $.fn.magnificPopup ) 
                {
                    $.magnificPopup.open({
                        items: ez.getGalleryList(),
                        type: 'image',
                        gallery:{
                           enabled:true
                        },
                        fixedContentPos: false,
                        removalDelay: 600,
                        closeBtnInside: false
                    }, 0);

                    e.preventDefault();
                }
            });
           
        });  

           $(document).on('click','.colorOptions', function()
           {   
                $('.spinner-wrapper').show();
                var slug = $('#product').val();
                var colorId = $(this).val();
                $.ajax({
                            url:"/product/" + slug + '?colorId='+colorId,
                            type:"GET",
                            success:function(response)
                            {  
                               $('#loadAjax').empty().append(response);
                               $('.spinner-wrapper').hide();
                               $('.zoomContainer').remove();
                               $('#product-zoom').elevateZoom({
                                  zoomType : "inner",
                               });
                            }
                }); 
           }); 


           $(document).on('click','.changeProductSize', function()
           {  
                var id = $(this).data('id');
                var qty = $(this).data('stock');
                $('.stockLabel').hide();
                $('#dispalyAlert'+ id).show();
                $("#quantity").attr({
                "max" : qty, 
                "min" : 1
                });
           });    

           $(document).on('click','#toggle', function()
           {  
              var stats = $(this).is(':checked');
              console.log(stats);
              if(stats)
              {   
                  $('#sizeImage0').hide();
                  $('#sizeImage1').show();
              }
              else
              {
                  $('#sizeImage1').hide();
                  $('#sizeImage0').show();
              }
           });           
    </script>  
@endsection