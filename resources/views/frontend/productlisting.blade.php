<?php
    $appendingString = '';
    if(@$pageValue)
    {
       if($pageValue == 1)
       {
          $appendingString = '?offerValue='.encrypt('1');
       }
       else
       {
         $appendingString = '?offerValue='.encrypt('2');
       }                                   
    } 
?>
<div class="toolbox">
    <div class="toolbox-left">
        <div class="toolbox-info">
            Showing <span>{{@$products->count() > 12 ? 12 : @$products->count()}}  of {{@$products->total()}}</span> Products
        </div><!-- End .toolbox-info -->
    </div><!-- End .toolbox-left -->

    <div class="toolbox-right">   
    <div class="show-sidebar-btn"><span>Filter</span></div>     
        <div class="toolbox-sort">
            
            <label for="sortby">Sort by:</label>
            <div class="select-custom">
                <select name="sortby" id="sortby" class="form-control filterBySort">
                    <option value="">Select Options</option>
                    <option value="latest" {{isset($value) && $value=='latest' ? 'selected':''}}>What's New</option>
                    <option value="discount"  {{isset($value) && $value=='discount' ? 'selected':''}}>Better Discount</option>
                    <option value="high"  {{isset($value) && $value=='high' ? 'selected':''}}>Price: High to Low</option>
                    <option value="low"  {{isset($value) && $value=='low' ? 'selected':''}}>Price: Low to High</option>
                </select>
            </div>
        </div><!-- End .toolbox-sort -->
    </div><!-- End .toolbox-right -->
</div><!-- End .toolbox -->

<div class="products mb-3">
    <div class="row justify-content-center">
        @if(isset($products) && $products->isNotEmpty())
            @foreach($products as $product)
                <div class="col-6 col-md-4 col-lg-4">
                    <div class="product product-7 text-center">
                        <figure class="product-media">
                            @if($product->tag != '')<span class="product-label label-new">{{$product->tag}}</span>@endif
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
                            <a href="{{route('product',$product->slug). $appendingString}}">
                                <img src="{{asset($url)}}" alt="{!! $product->meta_description !!}" class="product-image">
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
                            $availableColors = $product->images()->groupBy('color_id')->get();
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
                                                    <input type="radio" name="color" value="{{@$color->color_id}}" class="p-cradio colorOptions">
                                                    <div class="custom-color"><span style="background-color:{{@$color->productColor->code}}" ></span></div>
                                                </label>
                                            </div>
                                    @endforeach 
                                </div><!-- End .product-cat -->
                            @endif
                            <h3 class="product-title"><a href="{{route('product',$product->slug) . $appendingString }}">{{$product->name}}</a></h3><!-- End .product-title -->
                            <div class="product-price">
                                <div class="w-100">
                                <span class="new-price">₹{{round($product->discounted_amt) }}</span>  @if($product->discounted_amt != $product->price) <span class="old-price">₹{{round($product->price)}}</span> @endif </div> 
                                <small>(MRP incl Taxes)</small>
                            </div><!-- End .product-price -->
                            <div class="atc-container">                                                            
                                <div class="mb-2">
                                    <a href="{{route('product',$product->slug) . $appendingString}}" class="btn-cart" ><span class="product{{$product->id}}">Add to cart</span></a>
                                </div>
                            </div>
                        </div><!-- End .product-body -->
                    </div><!-- End .product -->
                </div><!-- End .col-sm-6 col-lg-4 -->
            @endforeach  
        @endif      
</div><!-- End .row -->
</div><!-- End .products -->

<nav aria-label="Page navigation">
    <ul class="pagination justify-content-center">
        <span style="float:right">{!! $products->links() !!}</span>
        {{-- <li class="page-item disabled">
            <a class="page-link page-link-prev" href="#" aria-label="Previous" tabindex="-1" aria-disabled="true">
                <span aria-hidden="true"><i class="icon-long-arrow-left"></i></span>Prev
            </a>
        </li>
        <li class="page-item active" aria-current="page"><a class="page-link" href="#">1</a></li>
        <li class="page-item"><a class="page-link" href="#">2</a></li>
        <li class="page-item"><a class="page-link" href="#">3</a></li>
        <li class="page-item-total">of 6</li>
        <li class="page-item">
            <a class="page-link page-link-next" href="#" aria-label="Next">
                Next <span aria-hidden="true"><i class="icon-long-arrow-right"></i></span>
            </a>
        </li> --}}
    </ul>
</nav>
{{-- <br><br>
<div id="pagination" class="paddingTopBottom-xxl pull-left widthFull">
    <!--$data->appends(@$urlParam)->render()-->
    <span class="pull-left pagination-count">Showing <b>{{$products->firstItem()}} - {{$products->perPage() * $products->currentPage()
        <$products->total() ? $products->perPage() * $products->currentPage() : $products->total()}}/{{$products->total()}}</b>
    </span>
    <span class="pull-right">{!! $products->links() !!}</span>
    <input type="hidden" id="totalCount" value="{{$products->total()}}">
    <input type="hidden" id="sort_column" value= "{{@$column}}">
    <input type="hidden" id="sort_order" value= "{{@$order}}">
</div> --}}
<script>
        $(document).ready(function ()
        {
            $(".show-sidebar-btn").click(function ()
            {
                $("body").addClass("show-hidden-sidebar");
                $(".sidebar-container").addClass("show-hidden-sidebar");
            });
            $(".close-sidebar-btn").click(function ()
            {
                $("body").removeClass("show-hidden-sidebar");
                $(".sidebar-container").removeClass("show-hidden-sidebar");
            });

        });
    </script>