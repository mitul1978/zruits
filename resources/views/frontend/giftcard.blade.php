@extends('layouts.app')
@section('content')

<main class="main">
            <nav aria-label="breadcrumb" class="breadcrumb-nav border-0 mb-0">
                <div class="container d-flex align-items-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
                        <li class="breadcrumb-item"><a href="javascript:void(0);">Gift Card</a></li>
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
                                            <img id="product-zoom" src="assets/images/zehna-gift.jpg" data-zoom-image="assets/images/zehna-gift.jpg" alt="product image">                                            
                                        </figure><!-- End .product-main-image -->

                                        {{-- <div id="product-zoom-gallery" class="product-image-gallery">
                                            <a class="product-gallery-item active" href="#" data-image="assets/images/products/single/1.jpg" data-zoom-image="assets/images/products/single/1-big.jpg">
                                                <img src="assets/images/zehna-gift.jpg" alt="product side">
                                            </a>

                                            <a class="product-gallery-item" href="#" data-image="assets/images/products/single/2.jpg" data-zoom-image="assets/images/products/single/2-big.jpg">
                                                <img src="assets/images/zehna-gift.jpg" alt="product cross">
                                            </a>

                                            <a class="product-gallery-item" href="#" data-image="assets/images/products/single/3.jpg" data-zoom-image="assets/images/products/single/3-big.jpg">
                                                <img src="assets/images/zehna-gift.jpg" alt="product with model">
                                            </a>

                                            <a class="product-gallery-item" href="#" data-image="assets/images/products/single/4.jpg" data-zoom-image="assets/images/products/single/4-big.jpg">
                                                <img src="assets/images/zehna-gift.jpg" alt="product back">
                                            </a>
                                        </div><!-- End .product-image-gallery --> --}}
                                    </div><!-- End .row -->
                                </div><!-- End .product-gallery -->
                            </div><!-- End .col-md-6 -->
                            <input type="hidden" name="productType" id="productType" value="0">
                            <div class="col-md-6">
                                <h3>Gift Card</h3>
                                <div class="product-details">
                                    <h1 class="product-title">Gift Your Loved Ones</h1><!-- End .product-title -->

                                    <div class="details-filter-row details-row-size">
                                        <label for="size">Amount:</label>
                                        <div class="select-custom">
                                            <select name="product" id="product" class="form-control">
                                                <option value="" selected="selected">Select Amount</option>
                                                @foreach ($giftcards as $card)
                                                  <option value="{{$card->id}}">&#8377; {{$card->price}}</option>
                                                @endforeach
                                            </select>
                                        </div><!-- End .select-custom -->
                                    </div><!-- End .details-filter-row -->

                                    <div class="details-filter-row details-row-size">
                                        <label for="qty">Qty:</label>
                                        <div class="product-details-quantity">
                                            <input type="number" id="quantity" name="quantity" class="form-control" value="1" min="1" max="10" step="1" data-decimals="0" required>
                                        </div><!-- End .product-details-quantity -->
                                    </div><!-- End .details-filter-row -->
                                    <div class="details-filter-row details-row-size">
                                        <label for="gift_card_to_name" >To</label>
                                        <input type="text" id="gift_card_to_name" name="gift_card_to_name" class="form-control" placeholder="Enter name of recipient" value="" required>
                                       
                                    </div>

                                    <div class="details-filter-row details-row-size">
                                        <label for="gift_card_to" >To</label>
                                        <input type="email" id="gift_card_to" name="gift_card_to" class="form-control" placeholder="Enter an email address of recipient" value="" required>
                                        
                                    </div>
                                
                                    <div class="details-filter-row details-row-size">
                                        <label for="gift_card_from" >From</label>
                                        <input type="text" id="gift_card_from" name="gift_card_from" class="form-control" placeholder="Your name" value="" required>
                                    </div>
                                
                                    <div class="details-filter-row details-row-size">
                                        <label for="giftcard_message" >Message (optional)</label>
                                        <textarea class="form-control" id="giftcard_message" name="giftcard_message" placeholder="Add a message"></textarea>
                                        
                                    </div>
                                    <div class="product-details-action"> 
                                        @foreach ($giftcards as $key => $product)
                                          @if($key == 0)
                                            <a href="javascript:void(0);" class="btn-product btn-cart wishlist_rows add_to_cart" data-id="{{$product->id}}" id="product{{$product->id}}"><span class="product{{$product->id}}">add to cart</span></a>
                                          @else
                                          <a href="javascript:void(0);" style="display:none;" class="btn-product btn-cart wishlist_rows add_to_cart" data-id="{{$product->id}}" id="product{{$product->id}}"><span class="product{{$product->id}}">add to cart</span></a>
                                          @endif
                                        @endforeach  

                                        <div class="details-action-wrapper"> 
                                            @if(is_user_logged_in())                                            
                                                @foreach ($giftcards as $key => $product)
                                                   @if($key == 0)
                                                    <a href="javascript:void(0);" class="btn-product btn-wishlist wishlist_rows add_to_wishlist" data-id="{{$product->id}}" title="Wishlist"  id="wishlist{{$product->id}}"><span class="add_to_wishlist_msg{{$product->id}}">Add to Wishlist</span></a>                                                   
                                                   @else
                                                     <a href="javascript:void(0);" style="display:none;" class="btn-product btn-wishlist wishlist_rows add_to_wishlist" data-id="{{$product->id}}" title="Wishlist"  id="wishlist{{$product->id}}"><span class="add_to_wishlist_msg{{$product->id}}">Add to Wishlist</span></a>    
                                                   @endif
                                               @endforeach  
                                            @else
                                                <a href="#signin-modal" data-toggle="modal" class="btn-product btn-wishlist" title="Wishlist"><span>Add to Wishlist</span></a>
                                            @endif     
                                           
                                        </div><!-- End .details-action-wrapper -->
                                    </div><!-- End .product-details-action -->

                                    
                                </div><!-- End .product-details -->
                            </div><!-- End .col-md-6 -->
                        </div><!-- End .row -->
                    </div><!-- End .product-details-top -->
                </div><!-- End .container -->
            </div><!-- End .page-content -->
        </main><!-- End .main -->
@endsection