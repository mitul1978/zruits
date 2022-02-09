@extends('layouts.app')
@section('content')

        <main class="main">
            <div class="page-header text-center" style="background-image: url('assets/images/page-header-bg.jpg')">
                <div class="container"> 
                    <h1 class="page-title">{{$pageType}}<span>Shop</span></h1>
                </div><!-- End .container -->
            </div><!-- End .page-header -->
            <nav aria-label="breadcrumb" class="breadcrumb-nav mb-2">
                <div class="container">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Products</li>
                    </ol>
                </div><!-- End .container -->
            </nav><!-- End .breadcrumb-nav -->

            <div class="page-content">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-9">
                            <div class="toolbox">
                                <div class="toolbox-left">
                                    <div class="toolbox-info">
                                        Showing <span>{{@$products->count() > 9 ? 9 : @$products->count()}}  of {{@$products->count()}}</span> Products
                                    </div><!-- End .toolbox-info -->
                                </div><!-- End .toolbox-left -->

                                <div class="toolbox-right">
                                    <div class="toolbox-sort">
                                        <label for="sortby">Sort by:</label>
                                        <div class="select-custom">
                                            <select name="sortby" id="sortby" class="form-control filterBySort">
                                                <option value="latest" selected="selected">What's New</option>
                                                <option value="discount">Better Discount</option>
                                                <option value="high">Price: High to Low</option>
                                                <option value="low">Price: Low to High</option>
                                            </select>
                                        </div>
                                    </div><!-- End .toolbox-sort -->
                                </div><!-- End .toolbox-right -->
                            </div><!-- End .toolbox -->

                            <div class="products mb-3">
                                <div class="row justify-content-center">
                                    @include('frontend.productlisting')
                                </div><!-- End .row -->
                            </div><!-- End .products -->

                            <nav aria-label="Page navigation">
                                <ul class="pagination justify-content-center">
                                    <span style="float:right">{{$products->links()}}</span>
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
                        </div><!-- End .col-lg-9 -->

                        <!-- Filter Part Start Here -->
                        <aside class="col-lg-3 order-lg-first">
                            <div class="sidebar sidebar-shop">
                                <div class="widget widget-clean">
                                    <label>Filters:</label>
                                    <a class="sidebar-filter-clear" href="javascript:void(0);" onClick="window.location.reload(true);" id="reset-filter">Clean All</a>
                                </div><!-- End .widget widget-clean -->                                

                                <div class="widget widget-collapsible">
                                    <h3 class="widget-title">
                                        <a data-toggle="collapse" href="#widget-2" role="button" aria-expanded="true" aria-controls="widget-2">
                                            Size
                                        </a>
                                    </h3><!-- End .widget-title -->

                                    <div class="collapse " id="widget-2">
                                        <div class="widget-body">
                                            <div class="filter-items">
                                                @foreach ($sizes as $item)
                                                    <div class="filter-item">
                                                        <div class="custom-control custom-checkbox">
                                                            <input type="checkbox" class="custom-control-input customFilterData" id="size-{{$item->id}}">
                                                            <label class="custom-control-label" for="size-{{$item->id}}">{{$item->name}}</label>
                                                        </div><!-- End .custom-checkbox -->
                                                    </div><!-- End .filter-item -->                                                    
                                                @endforeach
                                            </div><!-- End .filter-items -->
                                        </div><!-- End .widget-body -->
                                    </div><!-- End .collapse -->
                                </div><!-- End .widget -->

                                <div class="widget widget-collapsible">
                                    <h3 class="widget-title">
                                        <a data-toggle="collapse" href="#widget-3" role="button" aria-expanded="true" aria-controls="widget-3">
                                            Colour
                                        </a>
                                    </h3><!-- End .widget-title -->

                                    <div class="collapse " id="widget-3">
                                        <div class="widget-body">
                                            <div class="filter-colors">
                                                @foreach ($colors as $item)
                                                   <a href="javascript:void(0);" style="background: {{$item->code}}" id="color-{{$item->id}}"><span class="sr-only customFilterData">{{$item->name}}</span></a>
                                                @endforeach
                                                
                                            </div><!-- End .filter-colors -->
                                        </div><!-- End .widget-body -->
                                    </div><!-- End .collapse -->
                                </div><!-- End .widget -->

                                <div class="widget widget-collapsible">
                                    <h3 class="widget-title">
                                        <a data-toggle="collapse" href="#widget-4" role="button" aria-expanded="true" aria-controls="widget-4">
                                            Fabric
                                        </a>
                                    </h3><!-- End .widget-title -->

                                    <div class="collapse " id="widget-4">
                                        <div class="widget-body">
                                            <div class="filter-items">
                                                @foreach ($fabrics as $item)
                                                    <div class="filter-item">
                                                        <div class="custom-control custom-checkbox">
                                                            <input type="checkbox" class="custom-control-input" id="fabric-{{$item->id}}">
                                                            <label class="custom-control-label" for="brand-{{$item->id}}">{{$item->name}}</label>
                                                        </div><!-- End .custom-checkbox -->
                                                    </div><!-- End .filter-item -->
                                                @endforeach
                                            </div><!-- End .filter-items -->
                                        </div><!-- End .widget-body -->
                                    </div><!-- End .collapse -->
                                </div><!-- End .widget -->

                                <div class="widget widget-collapsible">
                                    <h3 class="widget-title">
                                        <a data-toggle="collapse" href="#widget-5" role="button" aria-expanded="true" aria-controls="widget-5">
                                            Orientations
                                        </a>
                                    </h3><!-- End .widget-title -->

                                    <div class="collapse " id="widget-5">
                                        <div class="widget-body">
                                            <div class="filter-items">
                                                @foreach ($orientations as $item)
                                                    <div class="filter-item">
                                                        <div class="custom-control custom-checkbox">
                                                            <input type="checkbox" class="custom-control-input" id="orieentation-{{$item->id}}">
                                                            <label class="custom-control-label" for="brand-{{$item->id}}">{{$item->name}}</label>
                                                        </div><!-- End .custom-checkbox -->
                                                    </div><!-- End .filter-item -->
                                                @endforeach
                                            </div><!-- End .filter-items -->
                                        </div><!-- End .widget-body -->
                                    </div><!-- End .collapse -->
                                </div><!-- End .widget -->

                                <div class="widget widget-collapsible">
                                    <h3 class="widget-title">
                                        <a data-toggle="collapse" href="#widget-6" role="button" aria-expanded="false" aria-controls="widget-6">
                                            Price
                                        </a>
                                    </h3><!-- End .widget-title -->

                                    <div class="collapse " id="widget-6">
                                        <div class="widget-body">
                                            <div class="filter-price">
                                                <div class="filter-price-text">
                                                        <input type="text" id="amount" readonly style="border:0; color:#f6931f; font-weight:bold;">
                                                  
                                                       
                                                    <div id="slider-range"></div>
                                                    {{-- <div class="custom-control custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input" id="price-1">
                                                        <label class="custom-control-label" for="price-1">Price < 500</label>
                                                    </div><!-- End .custom-checkbox -->   
                                                    <div class="custom-control custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input" id="price-2">
                                                        <label class="custom-control-label" for="price-2">Price > 500 & Price < 1000</label>
                                                    </div><!-- End .custom-checkbox -->            
                                                    <div class="custom-control custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input" id="price-3">
                                                        <label class="custom-control-label" for="price-3">Price > 1000 & Price < 2000</label>
                                                    </div><!-- End .custom-checkbox -->   
                                                    <div class="custom-control custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input" id="price-4">
                                                        <label class="custom-control-label" for="price-4">Price > 2000</label>
                                                    </div><!-- End .custom-checkbox -->                                                    --}}
                                                </div><!-- End .filter-price-text -->
                                                <div id="price-slider"></div><!-- End #price-slider -->
                                            </div><!-- End .filter-price -->
                                        </div><!-- End .widget-body -->
                                    </div><!-- End .collapse -->
                                </div><!-- End .widget -->
                            </div><!-- End .sidebar sidebar-shop -->
                        </aside><!-- End .col-lg-3 -->
                    </div><!-- End .row -->
                </div><!-- End .container -->
            </div><!-- End .page-content -->
        </main><!-- End .main -->
        <script>
            $(function() {
              $("#slider-range").slider({
                range: true,
                min: 0,
                max: {{$maxValue}},
                values: [ 0, {{$maxValue}} ],
                slide: function( event, ui ) 
                {
                  $( "#amount" ).val( "₹" + ui.values[ 0 ] + " - ₹" + ui.values[ 1 ] );
                }
              });

              $( "#amount" ).val( "₹" + $( "#slider-range" ).slider( "values", 0 ) + " - ₹" + $( "#slider-range" ).slider( "values", 1 ) );
            });
        </script>
@endsection