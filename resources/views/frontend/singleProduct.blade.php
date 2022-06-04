                        <div class="row">
                            <div class="col-md-6">
                                <div class="product-gallery product-gallery-vertical">
                                    <?php
                                        $colorId  = @$colorId ? $colorId:0; 

                                        if($colorId != 0)
                                        {   
                                            $priImage = @$product->images()->where('color_id','=',$colorId)->first()->image;
                                            $images = $product->images()->where('color_id',$colorId)->get();
                                        }
                                        else 
                                        {  
                                            $colorId = @$product->sizesstock()->first()->color_id;
                                            $priImage = @$product->images()->first()->image;
                                            $images = $product->images()->where('color_id',$colorId)->get();
                                        }                     
                                    ?>                                    
                                   
                                    <div class="row">
                                        <figure class="product-main-image">                                            
                                            <img id="product-zoom" src="{{asset(@$priImage)}}" data-zoom-image="{{asset(@$priImage)}}" alt="{!! @$product->meta_description !!}">
                                            <a href="javascript:void(0);" id="btn-product-gallery" class="btn-product-gallery">
                                                <i class="icon-arrows"></i>
                                            </a>
                                        </figure><!-- End .product-main-image -->

                                        <div id="product-zoom-gallery" class="product-image-gallery">                                           
                                            @foreach($images as $key => $image)                                              
                                                @if($key == 0)
                                                    <a class="product-gallery-item active" href="javascript:void(0);" data-image="{{asset(@$image->image)}}" data-zoom-image="{{asset(@$image->image)}}">
                                                        <img src="{{asset(@$image->image)}}" alt="product side">
                                                    </a>
                                                @else
                                                    <a class="product-gallery-item" href="javascript:void(0);" data-image="{{asset(@$image->image)}}" data-zoom-image="{{asset(@$image->image)}}">
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
                                        <span class="new-price">₹ {{round($product->discounted_amt)}}</span> @if($product->discounted_amt != $product->price) <span class="old-price">₹ {{round($product->price)}}</span> @endif  <small>(MRP incl Taxes)</small>
                                    </div><!-- End .product-price -->

                                    <div class="product-content">
                                        {!! $product->title !!}
                                    </div><!-- End .product-content -->
                                     <?php
                                        $availableColors = $product->sizesstock()->groupBy('color_id')->get();
                                        $availableSizes = $product->sizesstock()->where('color_id',$colorId)->groupBy('size_id')->get();
                                     ?>
                                    <div class="table-cell radio-cell">
                                        <div class="label text-underline fw-400 mr-4">Color</div>
                                        <div id="" class="d-flex">
                                            @if(isset($availableColors) && $availableColors->isNotEmpty())
                                               @foreach($availableColors as $color)                                   
                                                <div class="radio has-color">
                                                    <label>
                                                        <input type="radio" name="color" value="{{@$color->color_id}}" {{$colorId == $color->color_id ? 'checked' : '' }} class="p-cradio colorOptions colorOptions{{$product->id}}">
                                                        <div class="custom-color" ><span style="background-color:{{@$color->productColor->code}}" ></span></div>
                                                     </label>
                                                </div>
                                               @endforeach 
                                            @endif                                            
                                        </div>
                                    </div>

                                    <div class="table-cell radio-cell">
                                        <div class="label text-underline fw-400 mr-4">Size</div>
                                        @if(isset($availableSizes) && $availableSizes->isNotEmpty())  
                                            <div id="" class="d-flex">                                           
                                                @foreach($availableSizes as $size) 
                                                   @if($size->stock_qty > 0) 
                                                        <div class="radio has-image">
                                                            <label>
                                                                <input type="radio" name="size" value="{{@$size->size_id}}" data-id="{{$size->id}}" data-stock="{{@$size->stock_qty}}" class="p-cradio changeProductSize sizeOptions{{$product->id}}">
                                                                <div class="custom-size"><span>{{@$size->productSize->name}}</span></div>
                                                            </label>
                                                        </div>
                                                    @else                                                       
                                                        @if(count($availableSizes) == 1)
                                                           <div class="label fw-400 mr-4">Out of Stock</div>
                                                        @endif                                                           
                                                    @endif
                                                @endforeach
                                            </div>
                                            <a href="#" class="size-guide" data-toggle="modal" data-target="#exampleModal"><i class="icon-th-list"></i>Size Guide</a>
                                            <!-- Modal -->
                                            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Size Guide</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body p-4">
                                                            <div class="size-toggle mb-2 d-flex justify-content-center align-items-center">
                                                              <span class="mr-0 text-dark">IN</span>
                                                                <input type="checkbox" id="toggle"/>
                                                                <label for="toggle"></label>
                                                                <span class="ml-2 text-dark">CM</span>	
                                                            </div>
                                                            @if($sizeCharts && $sizeCharts->isNotEmpty())
                                                              @foreach($sizeCharts as $k => $chart)
                                                                 @if($k == 0)
                                                                   <img class="sg-img" id="sizeImage{{$k}}"  src="{{URL::asset($chart->image)}}">
                                                                 @else
                                                                   <img class="sg-img" id="sizeImage{{$k}}" style="display:none;" src="{{URL::asset($chart->image)}}">
                                                                 @endif
                                                              @endforeach
                                                            @endif                                                            
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @else
                                          <div class="label fw-400 mr-4">Out of Stock</div>
                                        @endif     
                                    </div>
                                    @if(isset($availableSizes) && $availableSizes->isNotEmpty())  
                                        @foreach($availableSizes as $size)
                                           @if($size->stock_qty <= 2 && $size->stock_qty > 0)     
                                            <div class="product-price stockLabel" style="display:none;" id="dispalyAlert{{$size->id}}">
                                                <small>Only {{$size->stock_qty}} Left In stock</small>    
                                            </div>
                                           @endif
                                        @endforeach
                                    @endif                                       
                                   

                                    <div id="displayProdCount">                           
                                    </div><!-- End .details-filter-row -->
                                    @if(isset($availableSizes) && $availableSizes->isNotEmpty())  
                                        <div class="details-filter-row details-row-size">
                                            <label for="quantity">Qty:</label>
                                            <div class="product-details-quantity">
                                                <input type="number" id="quantity" class="form-control" value="1" min="1" max="5" step="1" data-decimals="0" required>
                                            </div><!-- End .product-details-quantity -->
                                        </div><!-- End .details-filter-row -->
                                    @endif    

                                    <div class="details-filter-row details-row-size">
                                        <label id="availableContsu"></label>                                        
                                    </div><!-- End .details-filter-row -->

                                    <div class="product-details-action">
                                        @if(isset($availableSizes) && $availableSizes->isNotEmpty())  
                                         <a href="javascript:void(0);" class="btn-product btn-cart add_to_cart" data-id="{{$product->id}}"><span class="product{{$product->id}}">Add to cart</span></a>
                                        @endif
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
                   