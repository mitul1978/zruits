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
    <input type="hidden" name="productType" id="productType" value="1">
    <input type="hidden" name="pageValue" id="pageValue" value="{{ isset($pageValue)?$pageValue:0 }}">
        <main class="main">
            @if($pageType == 'Shop By Products' || $pageType == 'Shop By Categories')
             <input type="hidden" name="pageType" id="pageType" value="0">
            @else
             <input type="hidden" name="pageType" id="pageType" value="{{@$catId}}">
            @endif
            <div class="page-header text-center" style="background-image: url('{{URL::asset('assets/images/page-header-bg.jpg')}}')">
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
                        <div class="col-lg-9" id="productListings">
                           
                            @include('frontend.productlisting')
                               
                        </div><!-- End .col-lg-9 -->

                        <!-- Filter Part Start Here -->
                        <aside class="col-lg-3 order-lg-first sidebar-container">
                            <div class="sidebar sidebar-shop">
                                <div class="d-block d-lg-none text-right close-sidebar-btn"><span><i class="icon-times"></i> </span>
                                </div>
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
                                                            <input type="checkbox" class="custom-control-input customFilterData" id="size-{{$item->id}}" data-id="{{$item->id}}" >
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
                                                    <div class="radio has-color">
                                                        <label>
                                                            <input style="background: {{$item->code}}" type="radio" id="color-{{$item->id}}"  name="color-{{$item->id}}" class="p-cradio customFilterData " value="{{$item->id}}">
                                                            <div class="custom-color" data-toggle="tooltip" title="{{$item->name}}"><span style="background-color:{{$item->code}}" ></span></div>
                                                        </label>
                                                    </div>
                                                   <!-- <input style="background: {{$item->code}}" type="radio" id="color-{{$item->id}}"  name="color-{{$item->id}}" class="customFilterData" value="{{$item->id}}"> -->
                                                   {{-- <a href="javascript:void(0);" class="customFilterData" style="background: {{$item->code}}" id="color-{{$item->id}}" name="color-{{$item->id}}" value="{{$item->id}}"></a> --}}
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
                                                            <input type="checkbox" class="custom-control-input customFilterData" id="fabric-{{$item->id}}" data-id="{{$item->id}}">
                                                            <label class="custom-control-label" for="fabric-{{$item->id}}">{{$item->name}}</label>
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
                                                        <div class="custom-control custom-radio">
                                                            <input type="radio" class="custom-control-input customFilterData" id="orientation-{{$item->id}}" data-id="{{$item->id}}" name="customOrientation">
                                                            <label class="custom-control-label" for="orientation-{{$item->id}}">{{$item->name}}</label>
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
                                                     <input type="text" id="amount" readonly style="border:0; color:#5b34e7; font-weight:bold;">                                                 
                                                       
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
                                               <!-- <div id="price-slider"></div><!-- End #price-slider -->
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
        <script src="https://code.jquery.com/jquery-1.10.2.js"></script>
        <script src="https://code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
        <script>
            // $(document).ready(function() {
                $(function() {
                    $("#slider-range").slider({
                        range: true,
                        min: 0,
                        max: {{$maxValue}},
                        values: [ 0, {{$maxValue}} ],
                        slide: function( event, ui ) 
                        {
                            $( "#amount" ).val( "₹" + ui.values[ 0 ] + " - ₹" + ui.values[ 1 ] );
                            $('.spinner-wrapper').show();

                            var sizes = [];
                            var colors = [];
                            var fabrics = [];
                            var orientations = null;
                            var pageType = $('#pageType').val();
                            var min = ui.values[0];
                            var max = ui.values[1];

                            $('*[id*=size-]:visible').each(function() 
                            {   
                                console.log($(this).is(':checked'));                    
                                if($(this).is(':checked'))
                                {  
                                    sizes.push( $(this).data('id'));
                                    //$(this).trigger("change");
                                }
                            });

                            $('*[id*=color-]').each(function() 
                            {       
                                var isChecked = $(this).is(':checked')?true:false; 
                                console.log(isChecked);                 
                                if(isChecked)
                                {  
                                    colors.push($(this).val());
                                    //$(this).trigger("change");
                                }
                            });

                            $('*[id*=fabric-]:visible').each(function() 
                            {   
                                console.log('fabric' ,$(this).is(':checked'));                    
                                if($(this).is(':checked'))
                                {  
                                    fabrics.push( $(this).data('id'));
                                    //$(this).trigger("change");
                                }
                            });

                            $('*[id*=orientation-]:visible').each(function() 
                            {   
                                console.log('o',$(this).is(':checked'));                    
                                if($(this).is(':checked'))
                                {  
                                    orientations = $(this).data('id');
                                    //$(this).trigger("change");
                                }
                            });

                            $.ajax({
                                    url:"/filter-product",
                                    data:{
                                        sizes:sizes,
                                        colors:colors,
                                        fabrics:fabrics,
                                        min:min,
                                        max:max,
                                        orientations:orientations,
                                        pageType:pageType
                                    },
                                    type:"POST",
                                    success:function(response)
                                    {  
                                        $('#productListings').empty().append(response);
                                        $('.spinner-wrapper').hide();
                                    }
                            }); 
                        }
                    });

                    $( "#amount" ).val( "₹" + $( "#slider-range" ).slider( "values", 0 ) + " - ₹" + $( "#slider-range" ).slider( "values", 1 ) );
                });
            // });
        </script>
        <script>
         $(document).ready(function() 
          {  
               $('.spinner-wrapper').hide();
               $(document).on('click','.customFilterData', function()
               {  
                    $('.spinner-wrapper').show();
                    if($(this).hasClass("imChecked"))
                    {
                        $(this).removeClass("imChecked");
                        $(this).prop('checked', false);
                    }
                    else
                    {
                        $(this).prop('checked', true);
                        $(this).addClass("imChecked");
                        //colors.push($(this).val());
                    }    
                    filterData();                             
               });

               $(document).on('change','.filterBySort', function()
               {  
                   $('.spinner-wrapper').show();
                   filterData();           
               });

               $(document).on('click', '.pagination a', function(ev) {                   
                    ev.preventDefault();
                    $('.spinner-wrapper').show();
                    var url = $(this).attr('href');   
                
                    var pageValue = $('#pageValue').val();
                    var sizes = [];
                    var colors = [];
                    var fabrics = [];
                    var orientations = null;
                    var price = [];
                    var pageType = $('#pageType').val();
                    var min = 0;
                    var max = "{{@$maxValue}}";
                    var flag = 0;
                    var value = $('.filterBySort').val();                  

                    $('*[id*=size-]:visible').each(function() 
                    {   
                        console.log($(this).is(':checked'));                    
                        if($(this).is(':checked'))
                        {  
                            sizes.push( $(this).data('id'));
                            //$(this).trigger("change");
                        }
                    });

                    $('*[id*=color-]').each(function() 
                    {       
                        var isChecked = $(this).is(':checked')?true:false; 
                        console.log(isChecked);                 
                        if(isChecked)
                        {  
                            colors.push($(this).val());
                            //$(this).trigger("change");
                        }
                    });

                    $('*[id*=fabric-]:visible').each(function() 
                    {   
                        console.log('fabric' ,$(this).is(':checked'));                    
                        if($(this).is(':checked'))
                        {  
                            fabrics.push( $(this).data('id'));
                            //$(this).trigger("change");
                        }
                    });

                    $('*[id*=orientation-]:visible').each(function() 
                    {   
                        console.log('o',$(this).is(':checked'));                    
                        if($(this).is(':checked'))
                        {  
                            orientations = $(this).data('id');
                            //$(this).trigger("change");
                        }
                    });

                    if(value != '')
                    {
                        $("#slider-range").slider({
                            range: true,
                            min: 0,
                            max: {{$maxValue}},
                            values: [ 0, {{$maxValue}} ]
                        });   
                        
                        $( "#amount" ).val( "₹" + 0 + " - ₹" + {{$maxValue}} ); 

                        flag = 1;
                    }
                    else
                    {
                        min = $("#slider-range").slider("values")[0];;
                        max = $("#slider-range").slider("values")[1];
                    } 

                    $.ajax({
                        url:url,
                        data:{
                            '_token':"{{ csrf_token() }}",
                            sizes:sizes,
                            colors:colors,
                            fabrics:fabrics,
                            orientations:orientations,
                            pageType:pageType,
                            value:value,
                            min:min,
                            max:max,
                            flag:flag,
                            pageValue:pageValue
                        },
                        type:"POST",
                        success:function(response)
                        {  
                           $('#productListings').empty().append(response);
                           $('.spinner-wrapper').hide();
                        }
                    }); 
                }); 

                                
             function filterData()
             {
                    var sizes = [];
                    var colors = [];
                    var fabrics = [];
                    var orientations = null;
                    var pageType = $('#pageType').val();
                    var value = $('.filterBySort').val(); 
                    var min = 0;
                    var max = "{{@$maxValue}}";
                    var pageValue = $('#pageValue').val();

                    $('*[id*=size-]:visible').each(function() 
                    {   
                        console.log($(this).is(':checked'));                    
                        if($(this).is(':checked'))
                        {  
                            sizes.push( $(this).data('id'));
                            //$(this).trigger("change");
                        }
                    });

                    $('*[id*=color-]').each(function() 
                    {       
                        var isChecked = $(this).is(':checked')?true:false; 
                        console.log(isChecked);                 
                        if(isChecked)
                        {  
                            if($(this).hasClass("imChecked"))
                            {
                                colors.push($(this).val());
                                // $(this).removeClass("imChecked");
                                // $(this).prop('checked', false);
                            }
                            else
                            {
                                        $(this).prop('checked', true);
                                        $(this).addClass("imChecked");
                                        colors.push($(this).val());
                            }    
                            
                            //$(this).trigger("change");
                        }
                    });

                    $('*[id*=fabric-]:visible').each(function() 
                    {   
                        console.log('fabric' ,$(this).is(':checked'));                    
                        if($(this).is(':checked'))
                        {  
                            fabrics.push( $(this).data('id'));
                            //$(this).trigger("change");
                        }
                    });

                    $('*[id*=orientation-]:visible').each(function() 
                    {   
                        console.log('o',$(this).is(':checked'));                    
                        if($(this).is(':checked'))
                        {  
                            orientations = $(this).data('id');
                            //$(this).trigger("change");
                        }
                    });

                    if(value != '')
                    {
                        $("#slider-range").slider({
                            range: true,
                            min: 0,
                            max: {{$maxValue}},
                            values: [ 0, {{$maxValue}} ]
                        });   

                        $( "#amount" ).val( "₹" + 0 + " - ₹" + {{$maxValue}} ); 
                        // flag = 1;
                    }
                    else
                    {
                        min = $("#slider-range").slider("values")[0];;
                        max = $("#slider-range").slider("values")[1];
                    }   

                    $.ajax({
                            url:"/filter-product",
                            data:{
                                sizes:sizes,
                                colors:colors,
                                fabrics:fabrics,
                                orientations:orientations,
                                pageType:pageType,
                                value:value,
                                min:min,
                                max:max,
                                pageValue:pageValue
                            },
                            type:"POST",
                            success:function(response)
                            {  
                               $('#productListings').empty().append(response);
                               $('.spinner-wrapper').hide();
                            }
                    });    
             }
          
          });
        </script>
@endsection