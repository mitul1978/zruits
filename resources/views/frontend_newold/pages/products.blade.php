@extends('frontend.layouts.app')
@section('content')
@include('frontend.layouts.svg-icons')

<style type="text/css">
    #loader {background-color:white;color:red}
#loader.active {background-color:green;color:white}
/*.grid-item img {
  background: #F1F1FA;
  width: 400px;
  height: 300px;
  display: block;
  margin: 10px auto;
  border: 0;
}*/
   .grid-item__title {top:0.5% !important;}

   .internal-header{
   /*height: 140px;*/
   position: absolute;
   }
    a.home-action-bt {
    height: auto !important;
    }
    .home-action-bt {
    background: #1b5665 !important;
    color: #ffffff !important;
}
   .home-action-bt{    position: relative;
    display: inline-block !important;
    font-size: 14px;
    width: 200px;
    margin: 0 auto 10px auto;
    text-decoration: none;
    text-align: center;
    color: #222;
    border-radius: 20px;
    line-height: 28px;
    -webkit-transition: opacity 0.8s cubic-bezier(0.165, 0.84, 0.44, 1), -webkit-transform 0.8s cubic-bezier(0.165, 0.84, 0.44, 1);
    transition: opacity 0.8s cubic-bezier(0.165, 0.84, 0.44, 1), -webkit-transform 0.8s cubic-bezier(0.165, 0.84, 0.44, 1);
    transition: transform 0.8s cubic-bezier(0.165, 0.84, 0.44, 1), opacity 0.8s cubic-bezier(0.165, 0.84, 0.44, 1);
    transition: transform 0.8s cubic-bezier(0.165, 0.84, 0.44, 1), opacity 0.8s cubic-bezier(0.165, 0.84, 0.44, 1), -webkit-transform 0.8s cubic-bezier(0.165, 0.84, 0.44, 1);
    pointer-events: auto;}
   /*     #main-container.smoothScroll{
   position: fixed;
   }
   */
   .abc{line-height: 1.3 !important;}
   /*.page-container h2,.page-container h3{margin-top: 3% !important;}*/

   .hide_loader{
       display: none !important;
   }
</style>
<script type="text/javascript">

</script>
<div class="page-container pageresult">
<div class="result-block text-center">
   <h2 class="producttitle">
      <span>R</span>
      <span>E</span>
      <span>S</span>
      <span>U</span>
      <span>L</span>
      <span>T</span>
   </h2>
   <p class="productcount"><span class="count-total">{{$products->total()}} </span> <br>Products </p>
</div>

 <div class="scrollContent">
               <section id="page" class="dynamicContent" >
                  <div id="content" class="grid">
   @if(isset($products) && count($products)>0)

   @foreach($products as $key=>$product)
   @php $ids = '';
    if(count($products) > $key+1){
     $ids = $products[$key+1]['id'];
    }
    else{
      $ids = '';
    }
     @endphp

{{-- {{dd($product)}} --}}
   <div href="{{url('product/'.$product->slug)}}" class="grid-item shown" id="{{$product->id}}">
      <div class="grid-item__container">
         <div class="grid-item__bg" style="color: #18a6b6">
         </div>
         <div class="grid-item__visuals">

            <a href="{{url('product/'.$product->slug)}}">

            @if($key <= 5)
            <img alt=""
               src="@if(!empty($product->a4sheet_view)){{$product->a4sheet_view}}@else {{$product->fullsheet_view}} @endif?tr=w-400,h-300"
               class="active grid-item__visuals-blue">
            @else
              <img alt="" src="@if(!empty($product->a4sheet_view)){{$product->a4sheet_view}}@else {{$product->fullsheet_view}} @endif?tr=w-400,h-300,bl-30,q-50"
               data-src="@if(!empty($product->a4sheet_view)){{$product->a4sheet_view}}@else {{$product->fullsheet_view}} @endif?tr=w-400,h-300"
               class="active grid-item__visuals-blue lazy">
            @endif
            </a>
         </div>
         <h2 class="grid-item__title">
            <a href="{{url('product/'.$product->slug)}}">
               <div>
                  <span id="name_{{$product->id}}" class="grid-item__name">{{($product->product_texture)}}</span><span
                     id="names_{{$product->id}}" class="grid-item__color">{{$product->design}}</span>
            </a>
         </h2>
         <div class="grid-item__weatherIcon">

         @if(is_user_logged_in())

        <a href="javascript:void(0);" class="btn btn-default btn-rounded add_to_wishlist" data-id="{{$product->id}}"><span class="add_to_wishlist_msg{{$product->id}}"></span><img  class="add_to_wishlist_img{{$product->id}}"  id="wishlist{{$product->id}}" src="{{asset($product->user_wishlist_count ? 'frontend/images/redwishlist.png' : 'frontend/images/wishlist.png')}}"></a>
         @else
        <a  href="javascript:void(0);"  data-toggle="modal" href="javascript:void(0)" onclick="openLoginModal();" class="btn btn-default btn-rounded " data-id="{{$product->id}}"><img id="wishlist{{$product->id}}" src="{{asset('frontend/images/wishlist.png')}}"></a>

         @endif

        <a href="javascript:void(0);" class="btn btn-default btn-rounded add_to_cart" data-id="{{$product->id}}"><span class="product{{$product->id}}"> {{$product->in_cart ? 'Added' :'Add to Cart'}}</span></a>

         </div>
                  <input type="hidden" id="wishel" value="@if(!empty($wishl)){{json_encode($wishl)}}@endif">
         <div class="grid-item__price">
         &#x20B9;{{$product->product_price}}*/ SHEET
         </div>
         </div>
      </div>
      @endforeach
      @endif
      </div>

             <div id="loader"  style="position: absolute;bottom: 80px;height: 40px;width: 40px;left: 50%;"><img id="loadimg" style="position: absolute; z-index: 100000;" src="{{asset('frontend/images/25.gif')}}" /></div>

      <div class="grid-reset">
         <div class="grid-reset__container">
            <h4>Product searched does not appear?</h4>
            <div class="grid-reset__changeFilters grid-reset__button btn">
               <div class="btn-bg"></div>
               <span>Change filtres</span>
            </div>
            <div class="grid-reset__resetAll grid-reset__button btn">
               <div class="btn-bg"></div>
               <span>Reset</span>
            </div>
         </div>
      </div>
 </section>
              </div>
<div id="myModal" class="modal fade" role="dialog">
   <div class="modal-dialog">
      <!-- Modal content-->
      <div class="modal-content">
         <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">If you want to email your wishlist.Then enter your email id</h4>
         </div>
         <div class="modal-body">
            <div id="email_form" class="form-horizontal enroll-form">
               <div class="form-group">
                  <div class="col-md-12">
                     <input type="hidden" name="product_id" id="prod_id">
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
                     <input type="email" class="form-control" placeholder="Enter Email" id="email" name="email" required="required">
                     <input type="hidden" name="utm_source" class="utm_source" id="utm_source" value="{{request()->query('utm_source')}}">
                                              <input type="hidden" name="utm_medium"  id="utm_medium" class="utm_medium" value="{{request()->query('utm_medium')}}">
                                              <input type="hidden" name="utm_campaign" id="utm_campaign" class="utm_campaign" value="{{request()->query('utm_campaign')}}">
                  </div>
               </div>
               <div class="form-group">
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

<div id="productModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
   <div class="modal-dialog">
      <!-- Modal content-->
      <div class="modal-content">

         <div class="modal-body">
            <div id="" class="">
               Hello,<br>
               We have an extensive collection of designs with over 800+ products. We recommend that you let us guide you.</div><br>
               <div class="text-center"><a href="{{url('guide')}}" class="home-action-bt btn btn-default">
                           <span>Yes</span>
                        </a>
                    <button type="button" class="home-action-bt btn btn-default" data-dismiss="modal">No</button>
            </div>
         </div>
      </div>
   </div>
</div>
<input type="hidden" id="laminates" value="@if(!empty($_REQUEST['laminates'])) {{$_REQUEST['laminates']}} @endif">
<input type="hidden" id="applications" value="@if(!empty($_REQUEST['applications'])){{$_REQUEST['applications']}}@endif">
<input type="hidden" id="textures" value="@if(!empty($_REQUEST['textures'])){{$_REQUEST['textures']}}@endif">


@endsection
@section('scripts')

<script type="text/javascript">
  $(document).ready(function() {

  var count = $(".count-total").html();
  var controller5 = new ScrollMagic.Controller();

// build scene
var scene = new ScrollMagic.Scene({triggerElement: ".dynamicContent #loader", triggerHook: "onEnter"})
.setPin(".sticky") // pins the element for the the scene's duration
.addTo(controller5)
.on("enter", function (e) {
  if (!$("#loader").hasClass("active")) {
    $("#loader").addClass("active");
     setTimeout(addBoxes,100,9);
  }
});

var next_page_url = '{{url("/products?page=2")}}';

function addBoxes(count){

        if(next_page_url=='stop'){
            $("#loader").addClass("hide_loader");
            return false;
        }


       var laminates = $("#laminates").val();
       var applications = $("#applications").val();
       var textures = $("#textures").val();
       var search = $('.product_search_keyword').val();


            // Ajax Reuqest
            $.ajax({
                url:next_page_url,
                type:'get',
                dataType:'json',
                data:{
                    laminates,
                    applications,
                    textures,
                    search
                },
                beforeSend:function(){

                },
                success:function(response){
                    next_page_url = response.next_page_url ? response.next_page_url :'stop';
                    var _html='';
                    var image="";
                    var img = '';
                    var v = '';
                    var urls = "{{url('product/')}}/";

                    if(response.data.length>0){
                    $.each(response.data,function(index,value){

                    var wishlist = value.user_wishlist_count ? "{{asset('frontend/images/redwishlist.png')}}" : "{{asset('frontend/images/wishlist.png')}}";


                      if(value.a4sheet_view != '')
                      {
                        img = value.a4sheet_view+'?tr=w-400,h-300,bl-30,q-50';
                        image = value.a4sheet_view+'?tr=w-400,h-300';
                      }
                      else
                      {
                        img = value.fullsheet_view+'?tr=w-400,h-300,bl-30,q-50';
                        image = value.fullsheet_view+'?tr=w-400,h-300';
                      }

                      var cart_button_title = value.in_cart ? 'Added' :'Add to Cart';

                       _html+='<div href="'+urls+value.slug+'" class="grid-item shown" id="'+value.id+'">';
_html+='<div class="grid-item__container"><div class="grid-item__bg" style="color: #18a6b6"></div><div class="grid-item__visuals">';
_html+='<a href="'+urls+value.slug+'"><img alt="" src="'+img+'" data-src="'+image+'" class="active grid-item__visuals-blue lazy"></a></div>';

_html+='<h2 class="grid-item__title"><a href="'+urls+value.slug+'"><div><span id="name_'+value.id+'" class="grid-item__name">'+value.product_texture+'</span><span id="names_'+value.id+'" class="grid-item__color">'+value.design+'</span></a></h2><div class="grid-item__weatherIcon">';

@if(is_user_logged_in())
_html+=' <a href="javascript:void(0);" class="btn btn-default btn-rounded add_to_wishlist" data-id="'+value.id+'"><span class="add_to_wishlist_msg'+value.id+'"></span><img class="add_to_wishlist_img'+value.id+'" id="wishlist'+value.id+'" src="'+wishlist+'"></a>';
@else
_html+=' <a href="javascript:void(0);" onclick="openLoginModal();" class="btn btn-default btn-rounded" ><img class="wishs" id="wishlist'+value.id+'" src="'+wishlist+'"></a>';
@endif
_html+=' <a href="javascript:void(0);" class="btn btn-default btn-rounded add_to_cart" data-id="'+value.id+'"><span class="product'+value.id+'"> '+cart_button_title+'</span></a>';

_html+='</div>';
                                    _html+=' <div class="grid-item__price">&#x20B9;'+value.product_price+'</div></div></div>';
                    });

                      $(".dynamicContent #content").append(_html);
                      var lazyloadImages;

  if ("IntersectionObserver" in window) {
    lazyloadImages = document.querySelectorAll(".lazy");
    var imageObserver = new IntersectionObserver(function(entries, observer) {
      entries.forEach(function(entry) {
        if (entry.isIntersecting) {
          var image = entry.target;
          image.src = image.dataset.src;
          image.classList.remove("lazy");
          imageObserver.unobserve(image);
        }
      });
    });

    lazyloadImages.forEach(function(image) {
      imageObserver.observe(image);
    });
  } else {
    var lazyloadThrottleTimeout;
    lazyloadImages = $(".lazy");

    function lazyload () {
      if(lazyloadThrottleTimeout) {
        clearTimeout(lazyloadThrottleTimeout);
      }

      lazyloadThrottleTimeout = setTimeout(function() {
          var scrollTop = $(window).scrollTop();
          lazyloadImages.each(function() {
              var el = $(this);
              if(el.offset().top - scrollTop < window.innerHeight) {
                var url = el.attr("data-src");
                el.attr("src", url);
                el.removeClass("lazy");
                lazyloadImages = $(".lazy");
              }
          });
          if(lazyloadImages.length == 0) {
            $(document).off("scroll");
            $(window).off("resize");
          }
      }, 20);
    }

    $(document).on("scroll", lazyload);
    $(window).on("resize", lazyload);
  }
                    }
                    else{
                      $("#loadimg").css('display','none');
                      $("#loader").attr('style','');
                    }
                }
              });

            scene.update();
            $("#loader").css('display','none');
            $("#loader").removeClass("active");
}

addBoxes(count);




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

});
</script>
 <script type="text/javascript" src="{{asset('frontend/js/lazyload.js')}}"></script>

@endsection
