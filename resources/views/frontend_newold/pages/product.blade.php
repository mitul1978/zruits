@if(!empty($product))
@extends('frontend.layouts.appproduct')
@section('content')
@include('frontend.layouts.svg-icons')
<style type="text/css">
   h3.rel-product-title1{    opacity: 1;
   opacity: 1;
   /* text-align: center; */
   /* position: absolute; */
   /* vertical-align: middle; */
   /* top: 0%; */
   /* width: 150px; */
   /* margin: 0px; */
   /* background: #000; */
   /* background: linear-gradient(to bottom, #177086, #083d4a, #000000); */
   /* border-radius: 20px; */
   font-size: 14px;
   padding: 10px 20px;
   /* left: 50%; */
   /* transform: translate(-50%,50%); */
   color: #fff;
   /* transition: all 0.5s; */
   z-index: 99;
   }
   h3.rel-product-title{opacity: 1 !important;}



   /*new palette title*/
   .palette-btn-white{
   /*text-align: left;*/
   	padding: 0px!important;

   }
   .palette-btn-white li{
         /*background: #1b5665;*/
   		background: #fff;
   		margin-top: 12px;
   }
   .palette-btn-white li.active{
       background: #1b5665;
   }
   .palette-btn-white li a{
         /*color:#fff;*/
   		color:#353535;
   		    font-weight: 700;
   }
   .palette-btn-white li.active a{
      color:#fff;
   }

   section.product-visuals.observable.custom-gallery::before{
   	padding-top: 0px;
   }
.product-visuals.observable{
	margin-top: 20px;
}
    @media (min-width: 1200px){
    	.product-title{
    		padding-left: 30px;
    	}
    }
</style>

<div class="page-container">
<button type="submit" class="btn btn-default btn-set store-enq-btn" data-toggle="modal" data-target="#formmodal">Enquire Now</button>
<section id="page" class="product">
<section class="product-heading noselect">
   <div class="product-uiWrapper">
      <a href="{{ url()->previous() }}" class="product-backButton">
         <div class="product-backButton__wrapper">
            <svg>
               <use xlink:href="#arrow"/>
            </svg>
         </div>
      </a>

   </div>
   <div class="product-fallbackVisual">
      <h1 class="product-title noselect visible-xs">
         <span class="product-title__gamme pname">{{$product->name}}</span><br>
         <input type="hidden" name="product_id" id="prod_id1" value="{{$product->id}}">
         <!-- <span class="product-title__number">
            <img src="{{URL::asset('frontend/images/wishlist.png')}}">
            </span> -->
         <span class="product-title__color"><span class="product-title__color-bg"></span>
         <span class="product-title__color-text">{{$product->design}}</span></span>
      </h1>
      <div class="product-fallbackVisual__container ">
         <!-- slick slider with light gallery ends here----------->
         <div class="product-carousel owl-carousel owl-theme" >
            @if(isset($product->a4sheet_view) && !is_null($product->a4sheet_view) && $product->a4sheet_view !='')
            <div class="item a4sheet" data-dot="<div><img src='{{$product->a4sheet_view}}'></div>">
               <div class="pro-slider-img">
                  <a href="{{$product->a4sheet_view}}" class="pro-img-view">
                  <img src="{{$product->a4sheet_view}}" class="pro-slider-img" alt="{{$product->slug}}">
                  </a>
                  @php
                  $img_url = preg_replace("|https:\/\/ik.imagekit.io/heccv5isbw\/\s*/*|","",$product->a4sheet_view);
                  @endphp
                  <a href="{{ url('downloadimg/'.$img_url) }}" image="{{$product->a4sheet_view}}" id="a4sheet" class="download-pro-img"><i class="fa fa-download" aria-hidden="true"></i>
                  </a>
               </div>
               <h2 class="img-caption-product">ZOOMED IN</h2>
            </div>
            @endif
            @if(isset($product->fullsheet_view) && !is_null($product->fullsheet_view) && $product->fullsheet_view !='')
            <div class="item" data-dot="<div><img src='{{$product->fullsheet_view}}'></div>">
               <div class="pro-slider-img">
                  <a href="{{$product->fullsheet_view}}" class="pro-img-view">
                  <img src="{{$product->fullsheet_view}}" alt="{{$product->slug}}">
                  </a>
                  @php
                  $img_url = preg_replace("|https:\/\/ik.imagekit.io/heccv5isbw\/\s*/*|","",$product->fullsheet_view);
                  @endphp
                  <a href="{{ url('downloadimg/'.$img_url) }}" id="fulsheet-view"  image="{{ $product->fullsheet_view }}" class="download-pro-img">
                     <!-- Download -->  <i class="fa fa-download" aria-hidden="true"></i>
                  </a>
               </div>
               <h2 class="img-caption-product">FULL SHEET STRUCTURE </h2>
            </div>
            @endif
            @if(isset($product->room_view) && !is_null($product->room_view) && $product->room_view !='')
            <div class="item" data-dot="<div><img src='{{$product->room_view}}'></div>">
               <div class="pro-slider-img">
                  <a href="{{$product->room_view}}" class="pro-img-view">
                  <img src="{{$product->room_view}}" class="pro-slider-img" alt="{{$product->slug}}">
                  </a>
                  @php
                  $img_url = preg_replace("|https:\/\/ik.imagekit.io/heccv5isbw\/\s*/*|","",$product->room_view);
                  @endphp
                  <a href="{{ url('downloadimg/'.$img_url) }}" image="{{$product->room_view}}" id="room-view" class="download-pro-img">
                     <!-- Download -->  <i class="fa fa-download" aria-hidden="true"></i>
                  </a>
               </div>
               <h2 class="img-caption-product">APPLICATION PHOTO</h2>
            </div>
            @endif
         </div>
      </div>
   </div>
   <div class="product-heading__uiWrapper ">
      <h1 class="product-title noselect hidden-xs">
         <span class="product-title__gamme">{{$product->name}}</span><br>
         <span class="product-title__color"><span class="product-title__color-bg"></span>
         <span class="product-title__color-text">{{$product->design}}</span></span>
      </h1>
      @if(!empty($available1) && count($available1)>0)
      <div class="product-colors noselect" style="top: -2%;z-index: 999999;opacity: 1">
         <div class="product-colors noselect" style="">
            <div class="product-colors__text">  Available
            </div>
            <ul class="product-colors__list">
               @foreach($available1 as $k=>$a)
               <a href="{{url('product/'.$a->slug)}}">
                  <li class="product-colors__item" data-code="@if($k%2 == 0){{'#181516'}} @else {{'#e6e4e3'}} @endif" data-colorname="black" title="{{$a->design_code}}" data-trad="{{$a->design_code}}" style="opacity: 1; transform: matrix(1, 0, 0, 1, 0, 0);">
                     <div class="product-colors__item-bg" style="background-image:url('@if(!empty($a->fullsheet_view)) {{$a->fullsheet_view}} @else {{$a->a4sheet_view}} @endif');"></div>
                  </li>
               </a>
               @endforeach
            </ul>
         </div>
         <a href="{{url('search?term='.preg_replace('|\s|','-',preg_replace('|\+|','',$product->product_texture)))}}" class="view-all-available">
         View All {{$product->product_texture}}
         </a>
      </div>
      @else
      <div class="product-colors noselect" style="">
         <!--------------color pallet button code starts------->
         @if(@$product->color_palettes && count($product->color_palettes) > 0)
         <div class="colorpallet-click colorpallet-click-mobile">
            <a href="#colorpalletid" class="scrollTo">Check out the <br>
            <strong>Color Palette</strong><br>
            for this decor
            </a>
         </div>
         @endif
         <!--------------color pallet button code ends------->
         <div class="product-colors__text">  Available
         </div>
         <ul class="product-colors__list">
            @foreach($product->available as $k=>$a)
            <a href="{{url('product/'.$a->slug)}}">
               <li class="product-colors__item" data-code="@if($k%2 == 0){{'#181516'}} @else {{'#e6e4e3'}} @endif" data-colorname="black" title="{{$a->design_code}}" data-trad="{{$a->design_code}}" style="opacity: 1; transform: matrix(1, 0, 0, 1, 0, 0);">
                  <div class="product-colors__item-bg" style="background-image:url('@if(!empty($a->fullsheet_view)) {{$a->fullsheet_view}} @else {{$a->a4sheet_view}} @endif');"></div>
               </li>
            </a>
            @endforeach
         </ul>
      </div>
      <br><br>
      @endif
      <div class="logo-sarvha">
         <img src="{{URL::asset('/frontend/images/savahh_logo.png')}}" height="50" width="50" class="">
      </div>
      <!--------------color pallet button code starts----->
      @if(@$product->color_palettes && count($product->color_palettes) > 0)

      <div class="colorpallet-click colorpallet-click-desktop">
         <a href="#colorpalletid" class="scrollTo">Check out the <br>
         <strong>Color Palette</strong><br>
         for this decor
         </a>
      </div>
      @endif

      <!--------------color pallet button code ends----->
      <!--  <button class="btn toggle-features visible-xs view-all-available">
         View Characterstics
         </button> -->
      <div class="product-assets product-assets-mobile  noselect">
         <!-- <span class="close-chara">x</span> -->
         <!-- Sizes -->
         <div class="product-assets__size product-assets__category">
            <div class="product-assets__catTitle">
               <h2>Thickness</h2>
            </div>
            <div class="product-assets__list">
               <div class="">
                  <div class="thickness">
                      @forelse ( @$product->thicknesses as $thickness)

                      {{$thickness->name}}

                      @if($loop->last)

                      @else

                      {{' ,'}}
                      @endif
                      @empty

                      'NA'

                      @endforelse
                     @if($product->savahh_flag=='1')
                     <!-- <img src="{{URL::asset('/frontend/images/savahh_logo.png')}}" height="50" width="50" class=""> -->
                     @endif
                  </div>
               </div>
            </div>
         </div>
         <div class="divider-line"></div>
         @if(isset($product->characteristics))
         <div class="product-assets__other product-assets__category">
            <div class="product-assets__catTitle">
               <h2>Characteristics</h2>
            </div>
            <div class="product-assets__list">
               <!-- mist -->
               @foreach($product->characteristics as $val )


               <div class="product-assets__item dashed">
                  <img src="{{asset($val['icon'])}}">
                  <div class="assetTooltip">
                     <div class="assetTooltip-title">{{$val->name}}</div>
                     <div class="assetTooltip-content">{!! $val->pivot->characteristic_value !!}</div>
                  </div>
               </div>
               @endforeach
            </div>
         </div>
         @endif
         <div class="divider-line"></div>
         <div class=" product-assets__category">
            <div class="product-assets__catTitle">
               <h2>Price</h2>
            </div>
            <div class="product-assets__list price-product-assets__list">
               <div class="">
                  <div class="thickness customprice">
                     <span> ₹ {{preg_replace("|per/sheet|","",$product->price)}}</span><span
                        class="product-buyButton__separator">/</span>
                     <span class="product-buyButton__text">SHEET*</span>
                  </div>
                  <!-- <p class="pricetnc">
                     * The MRP is inclusive of all local taxes in India.<br> The MRP is subject to change without any prior notice.
                     </p> -->
               </div>
            </div>
         </div>
         <div class="divider-line"></div>
         <div class="product-assets__category">
            <div class="product-assets__catTitle">
               <h2>Wishlist</h2>
            </div>
            <div class="product-assets__list">
               <div class="thickness ">
                @if(is_user_logged_in())
                <a href="javascript:void(0);"  class="wish-icon btn btn-rounded add_to_wishlist " data-id="{{$product->id}}"><span style="color: white" class="add_to_wishlist_msg{{$product->id}}"></span><img class="add_to_wishlist_img{{$product->id}}" id="wishlist{{$product->id}}" src="{{asset($product->user_wishlist_count ? 'frontend/images/redwishlist.png' : 'frontend/images/wishlist.png')}}"></a>

                 @else
                <a href="{{route('login.form')}}"  class="wish-icon btn btn-rounded " ><img src="{{asset($product->user_wishlist_count ? 'frontend/images/redwishlist.png' : 'frontend/images/wishlist.png')}}"></a>
                 @endif



               </div>
            </div>
         </div>
         <div class="divider-line"></div>
         <div class="product-assets__category">
            <div class="product-assets__catTitle">
               <h2>Buy</h2>
            </div>
            <div class="product-assets__list">
               <div class="thickness ">
                <a href="javascript:void(0);" class="btn btn-default btn-rounded add_to_cart" data-id="{{$product->id}}"><span class="product{{$product->id}}">{{$product->in_cart ? 'Added' :'Add To Cart'}}</span> </i></a>

               </div>
            </div>
         </div>
      </div>
</section>
<!-- additional section starts here-->
<section class="product-mainContent   @if(@$color_palette_products && count($color_palette_products) > 0) {{'pallets template2-bg'.count($color_palette_products)}} @endif" id="colorpalletid">
<div class="simulator observable" data-glasscolor="" data-weather="good-weather">
<div class="simulator-container">
<div class="simulator-textContainer">
<!-- <div class="simulator-surtitle">Découvrez la vision du masque</div> -->
<div class="product-title white big text-center" style="opacity: 1;">
<!-- <span class="product-title__gamme"></span> -->
<span class="product-title__gamme pallets">Mood Boards</span>
<!-- <span class="product-title__gamme pallets " "="">Color Palette</span> -->
<!-- <span class="rel-product-line"></span> -->

<div class="palette-btn palette-btn-white">
@if(@$product->color_palettes)
<ul>
@foreach($product->color_palettes as $k=>$v)


<li class="fetchpallets @if($k==0){{'active'}}@endif" id="p_{{$v->id}}" data-pallet="{{$v->name}}" ><a> {{++$k}}</a></li>
<br>

@endforeach
</ul>
@endif
</div>
</div>
</div>
<div class="simulator-close hidden">
<div class="simulator-close__wrapper">
<svg class="simulator-close__edge"><use xlink:href="#circle"></use></svg>
</div>
</div>
</div>
</div>

<span id="pallete_data">
@if(!empty($product->color_palettes[0]) && $product->color_palettes[0]->color_palette_design)
@include('frontend.pages.color_palette_template.' . $product->color_palettes[0]->color_palette_design->design)
@endif
</span>
<section class="product-description observable">
<div class="product-description__gamme-container">
<div class="product-description__gamme" style="">{{$product->name}}</div>
</div>
<p class="product-description__content"></p>
<div class="product-description__visual observable">
<img src="{{URL::asset($product->a4sheet_view)}}" alt="" data-src="preloaded">
</div>
</section>
</section>
@if(isset($product->features) && count($product->features))
<section class="product-details observable">
<div class="product-details__container">
@foreach($product->features as $c)
<div class="product-details__item">
<div class="product-details__item-icon">
<img src="{{asset($c->icon)}}">
</div>
<div class="product-details__item-text">
<h3 class="product-details__item-title">{{$c->name}}</h3>
<p class="product-details__item-content">{!!$c->content!!}</p>
</div>
</div>
@endforeach
</div>
<p class="pricetnc-bottom">
* The MRP is inclusive of all local taxes in India.<br> The MRP is subject to change without any prior notice.
</p>
</section>
@endif
@if(!empty($nextproduct))
<a href="{{ url('product/' . $nextproduct->slug)}}" class="nextProduct observable custom-next-product">
<div class="nextProduct-bg"></div>
<div class="nextProduct-visualContainer">
<div class="nextProduct-visual">
<img src="{{$nextproduct->a4sheet_view}}" alt="" data-src="preloaded">
</div>
</div>
<div class="nextProduct-container">
<div class="product-title noselect">
<span class="product-title__gamme next-product-name">{{$nextproduct->name}}</span><br>
<!--    <span class="product-title__number"><img src="http://dev.firsteconomy.com/royaleTouche/images/icons/wishlist.png">
   </span> -->
<span class="product-title__color"><span class="product-title__color-bg" style="background-color:#e6e4e3;"></span><span class="product-title__color-text">{{$nextproduct->design}}</span>
</span>
</div>
<div class="nextProduct-button">
<svg class="icon icon-arrow"> <use xlink:href="#arrow"></use></svg>
</div>
<!--   <div class="hover-next-pro-block">
   <h4 class="hover-next-pro-text">View</h4>
   </div> -->
</div>
</a>
@endif
<!-- additional section ends here-->
<div id="myModal" class="modal fade" role="dialog">
<div class="modal-dialog">
<!-- Modal content-->
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal">&times;</button>
<h4 class="modal-title">Please fill in your details for us to send your wishlist to you.</h4>
</div>
<div class="modal-body">
<div id="email_form" class="form-horizontal enroll-form">
<div class="col-lg-12 col-xs-12">
<div class="form-group">
<input type="text" name="name" id="name1" class="form-control mt-2" placeholder="Name*" required="required">
</div>
</div>
<div class="col-lg-12 col-xs-12 form-group ">
<div class="col-lg-2 col-xs-2 nopadding">
<div class="edit-num">+91</div>
</div>
<div class="col-lg-10 col-xs-10 nopadding">
<input type="number" class="form-control" name="mobile" placeholder="Phone" data-validation="number length" data-validation-length="min10" pattern="[789][0-9]{9}" maxlength="10" onchange="checkMobileNumber(this)" class="mt-2" id="mobile1" required="required">
</div>
</div>

<div class="form-group">
<div class="col-md-12">
<input type="hidden" name="product_id" id="prod_id">
<input type="email" class="form-control" placeholder="Enter Email" id="email" name="email" required="required">
</div>
</div>
<div class="form-group">
<input type="hidden" name="utm_source" class="utm_source" id="utm_source1" value="{{request()->query('utm_source')}}">
<input type="hidden" name="utm_medium"  id="utm_medium1" class="utm_medium" value="{{request()->query('utm_medium')}}">
<input type="hidden" name="utm_campaign" id="utm_campaign1" class="utm_campaign" value="{{request()->query('utm_campaign')}}">
<div class="submit-block">
<input type="submit" id="abcd" class="btn btn-submit" value="Submit">
</div>
<div id="msg" style="color: #fff;font-size: 14px;"></div>
</div>
</div>
</div>
</div>
</div>
</div>
<div id="formmodal" class="modal fade" role="dialog">
<div class="modal-dialog">
<!-- Modal content-->
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal">&times;</button>
<h4 class="modal-title">Please fill your contact details, our executive will get in touch with you.</h4>
</div>
<div class="modal-body">
<form action="javascript:void(0)" class="store_enquiry" id="store_enquiry">
<input type="hidden" id="catid" name="catid" value="">
<div class="">
<div class="col-lg-12 col-xs-12">
<div class="form-group">
<input type="text" name="name" id="name" class="form-control mt-2" placeholder="Name*">
</div>
</div>
<div class="col-lg-12 col-xs-12 form-group ">
<div class="col-lg-2 col-xs-2 nopadding">
<div class="edit-num">+91</div>
</div>
<div class="col-lg-10 col-xs-10 nopadding">
<input type="number" class="form-control" name="mobile" placeholder="Phone" data-validation="number length" data-validation-length="min10" pattern="[789][0-9]{9}" maxlength="10" onchange="checkMobileNumber(this)" class="mt-2" id="mobile">
</div>
</div>
<div class="col-lg-12 col-xs-12">
<div class="form-group">
<input type="email" name="email" id="email1" class="form-control mt-2" placeholder="Email">
</div>
</div>
<div class="col-lg-12 col-xs-12">
<div class="form-group">

                            <select name="state_id" class="form-control" id="state_id" onChange="getcity('/select-city?state_id='+this.value)">

                                                                     <option value="1">Andhra Pradesh</option>
                                                                        <option value="2">Assam</option>
                                                                        <option value="3">Bihar</option>
                                                                        <option value="4">Chandigarh</option>
                                                                        <option value="5">Chhattisgarh</option>
                                                                        <option value="6">Gujarat</option>
                                                                        <option value="7">Jharkhand</option>
                                                                        <option value="8">Karnataka</option>
                                                                        <option value="9">Madhya Pradesh</option>
                                                                        <option value="10">Maharashtra</option>
                                                                        <option value="11">New Delhi</option>
                                                                        <option value="12">Odisha</option>
                                                                        <option value="13">Punjab</option>
                                                                        <option value="14">Rajasthan</option>
                                                                        <option value="15">Tamil Nadu</option>
                                                                        <option value="16">Uttar Pradesh</option>
                                                                        <option value="17">West Bengal</option>
                                                                        <option value="18">Telangana</option>
                                                                        <option value="19">Haryana</option>
                                                                        <option value="20">Nepal</option>
                                                                        <option value="21">Kerala</option>
                                                                    </select>
                          </div>
                       </div>
                       <div class="col-lg-12 col-xs-12">
                         <div class="form-group" id="citydiv">
                            <select name="city_id" id="city_id" class="form-control" style="pointer-events:none" >
                                     <option value="">Select city</option>
                            </select>
                          </div>
                       </div>
<div class="col-lg-12  col-xs-12 text-center">
<button class="btn btn-light" id="store_enquiry_btn" type="submit">Submit</button>
<input type="hidden" name="utm_source" id="utm_source" class="utm_source" value="{{request()->query('utm_source')}}">
<input type="hidden" name="utm_medium" class="utm_medium" id="utm_medium" value="{{request()->query('utm_medium')}}">
<input type="hidden" name="utm_campaign" id="utm_campaign" class="utm_campaign" value="{{request()->query('utm_campaign')}}">
<span id="store_enquiry_msg" style="font-size: 17px !important;"></span>
</div>
</div>
</form>
</div>
<div class="modal-footer">
<!-- <button type="button" class="btn btn-default" data-dismiss="modal">Close</button> -->
</div>
</div>
</div>
</div>
</div>
@endsection
@else
<!DOCTYPE html>
<html lang="en">
   <head>
      <meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
      <link rel="stylesheet" href="custom.css">
      <style type="text/css">
         .home-top-left{display: none;}
         .search-container{display: none;}
         .product-noticeButton__wrapper{display: none;}
         body{
         height: 100% !important;
         margin-top: 150px;
         background-color: #ffffff;
         }
         #footer{bottom: 0;position: fixed !important;}
         .error-main{
         background-color: #fff;
         /*box-shadow: 0px 10px 10px -10px #5D6572;*/
         box-shadow: 1px 2px 10px 1px #cccccc;
         border-radius: 20px;
         }
         .error-main h1 {
         font-weight: bold;
         color: #1b5665;
         font-size: 100px;
         text-shadow: 2px 4px 5px #1b5665;
         }
         .error-main h6{
         color: #42494F;
         font-size: 27px;
         }
         .error-main p{
         color: #9897A0;
         font-size: 14px;
         }
         /**/
         .error-main{
         /*background: radial-gradient(circle, rgba(155,135,52,1) 0%, rgba(166,143,48,1) 34%, rgba(21,20,20,1) 100%) !important;*/
         }
         .container.btn-outer {
         padding: 5% 0px;
         }
         .btn-outer .btn-inner{
         display: inline-flex;
         text-align: center;
         }
         .btn-outer .btn-inner .cbtn{
         border-radius: 24px;
         border: 2px solid #1B5665;
         background: #1B5665;
         color: #ffffff;
         padding: 10px;
         margin: 0px 1.5%;
         flex: 0 0 22%;
         }
         .btn-outer .btn-inner .cbtn a{
         color: #ffffff;
         }
         .goback-btn {
         margin: 53px !important;
         font-size: 24px !important;
         color: #bda337;
         font-weight: bold;
         color: #1b5665;
         }
         @media(max-width: 767px){
         .error-main {
         box-shadow: none;
         margin-bottom: 50px;
         }
         .btn-outer .btn-inner {
         display: block;
         }
         .btn-outer .btn-inner .cbtn {
         width: 81%;
         margin: 0 auto;
         margin-bottom: 18px;
         }
         }
      </style>
   </head>
   <body style="height: 100px !important;overflow: hidden !important;">
      <div class="container">
         <div class="row text-center">
            <div class="col-lg-6 offset-lg-3 col-sm-6 offset-sm-3 col-12 p-3 error-main">
               <div class="row">
                  <div class="col-lg-8 col-12 col-sm-10 offset-lg-2 offset-sm-1">
                     <h1 class="m-0">404</h1>
                     <h6>Page not found</h6>
                     <a class="goback-btn" href="{{url('/')}}">Go back</a>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <div class="container btn-outer">
         <div class="row">
            <div class="col-md-12 btn-inner">
               <div class="col-md-3"></div>
               <div class="col-md-3 cbtn"><a href="{{url('guide')}}">Guide My Choice</a></div>
               <div class="col-md-3 cbtn"><a href="{{url('productlisting')}}">Whole Collection</a> </div>
               <div class="col-md-3"></div>
            </div>
         </div>
      </div>
   </body>
</html>
@endif
@section('scripts')
 <script type="text/javascript" src="{{asset('frontend/js/lazyload.js')}}"></script>
<script type="text/javascript" src="{{asset('frontend/js/product.js')}}"></script>
<script type="text/javascript">
   $(document).ready(function(){
  

$("body").on('click','.add_to_wishlist',function(){

var product_id = $(this).data('id');

$(".add_to_wishlist_img"+product_id).hide();
$(".add_to_wishlist_msg"+product_id).show();
$(".add_to_wishlist_msg"+product_id).text('Please Wait');
            // Swal.fire({
            //     icon: "info",
            //     showConfirmButton:false,
            //     title: "Please Wait..",
            //     toast: true,
            //     position: 'top-right',

            // })


$.ajax({
     url: "{{route('add-to-wishlist')}}",
     type: 'post',
     data:{_token:"{{csrf_token()}}",product_id},
     success: function(response) {


        if(response.wishlist_product){


            var res = response.msg;
            Swal.fire({
                icon: "success",
                text: res,
                toast: true,
                position: 'top-right',
                timer: 5000,
                showConfirmButton:false,
                title: response.wishlist_product+"!",

            })

            // Swal.fire("Deleted!", "Your imaginary file has been deleted.", "success");



            var image_name= response.wishlist_product=='Added' ? '/redwishlist.png' :'/wishlist.png';

            var imgs = "{{url('/frontend/images/')}}";
            $("#wishlist"+product_id).attr('src',imgs+image_name) ;

             }else{


                Swal.fire({
                icon: "error",
                text: res,
                toast: true,
                position: 'top-right',
                timer: 5000,
                showConfirmButton:false,
                title: response.error+"!",

            })


        }

         $(".add_to_wishlist_img"+product_id).show();
         $(".add_to_wishlist_msg"+product_id).hide();

          //    setTimeout(function(){
          //      location.reload();
          // }, 1000);

     }
});
});

    $("body").on('click','.add_to_cart',function(){
        var product_id = $(this).data('id');
        $('.product'+product_id).text('Please Wait...');
        $.ajax({
            url: "{{route('ajax-add-to-cart')}}",
            type: 'post',
            data:{
                _token:"{{csrf_token()}}",
                product_id
            },
            success: function(response) {
                if(response.add_to_cart){
                    var res = response.msg;
                    Swal.fire({
                        icon: "success",
                        text: res,
                        toast: true,
                        position: 'top-right',
                        timer: 5000,
                        showConfirmButton:false,
                        title: response.add_to_cart+"!",
                    })
                    $('.cart-count').text(response.cart_count);

                }else{
                    Swal.fire({
                    icon: "error",
                    text: res,
                    toast: true,
                    position: 'top-right',
                    timer: 5000,
                    showConfirmButton:false,
                    title: response.error+"!",
                    })
                }
                $('.product'+product_id).text('Added');

            }
        });
    });
})
</script>
@endsection
