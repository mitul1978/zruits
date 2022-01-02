@extends('layouts.app')

@section('title',Request::get('term').'| Royale Touche Laminates')
@section('meta_description', Request::get('term').'|Royale Touche is the best laminate brand in India that offers an exclusive range of luxury laminates. Check out our products now!')
@section('content')
@include('layouts.svg-icons')
           
            <style type="text/css">
              .ajax-load{

            

          }
              .grid-item__title {top:0.5% !important;}
             
              .internal-header{
                /*height: 140px;*/
                position: absolute;
              }
         /*     #main-container.smoothScroll{
                   position: fixed;
               }
*/
              .abc{line-height: 1.3 !important;}
              .page-container h2,.page-container h3{margin-top: 3% !important;}

            </style>
           
                             
         
                    
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
   <p class="productcount"><span class="count-total">{{$count}}</span> <br>Products </p>
   <span id="counts" class="hidden">@if(Request::has('laminates')){{count($products)}}@else{{$count}}@endif</span>
</div>
             <input type="hidden" id="terms" value="<?php echo $_REQUEST['term'];?>">      
       <div class="scrollContent">
               <section id="page" class="dynamicContent" >
                  <div id="content" class="grid">
           @if(isset($products) && count($products)>0)

   @foreach($products as $key=>$product)         

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
         @if(Session::has('email'))
         @if(in_array($product->id, $wishl))
         <a href="javascript:void(0);" class="btn btn-default btn-rounded wish1" data-id="{{$product->id}}"><img class="wishs" id="wishlist{{$product->id}}" src="{{asset('frontend/images/redwishlist.png')}}"></a>
         @else
         <a href="javascript:void(0);" class="btn btn-default btn-rounded wish1" data-id="{{$product->id}}"><img id="wishlist{{$product->id}}" src="{{asset('frontend/images/wishlist.png')}}"></a>
         @endif
         @else
         <a href="javascript:void(0);" data-toggle="modal" data-target="#myModal" class="btn btn-default btn-rounded wish1" data-id="{{$product->id}}"><img id="wishlist{{$product->id}}" src="{{asset('frontend/images/wishlist.png')}}"></a>
         @endif
         </div>
         <div class="grid-item__price">
         &#x20B9;{{$product->product_price}}*/ SHEET
         </div>
         </div>
      </div>
      @endforeach
      @endif
      </div>

             <div id="loader" style="position: absolute;bottom: 80px;height: 40px;width: 40px;left: 50%;"><img id="loadimg" style="position: absolute; z-index: 100000;" src="{{asset('frontend/images/25.gif')}}" /></div>

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
                        <input type="email" class="form-control" placeholder="Enter Email" id="email" name="email" required="required">
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
<input type="hidden" id="laminates" value="@if(!empty($_REQUEST['laminates'])) {{$_REQUEST['laminates']}} @endif">
<input type="hidden" id="applications" value="@if(!empty($_REQUEST['applications'])){{$_REQUEST['applications']}}@endif">
<input type="hidden" id="textures" value="@if(!empty($_REQUEST['textures'])){{$_REQUEST['textures']}}@endif">
@endsection
@section('scripts')
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/lazysizes/5.2.0/lazysizes.min.js"></script>
<script src="{{asset('frontend/js/jquery.jscroll.min.js')}}"></script>
<script type="text/javascript">


  $(document).ready(function(){

  // window.addEventListener("beforeunload", function (e) {
  //           var confirmationMessage = "\o/";

  //           (e || window.event).returnValue = ''; //Gecko + IE
  //           $.ajax({
  //               type: "POST",
  //               url: '/wishlistmail',
  //               success: function(result) {
  //                   if(result == 1)
  //                   {
                        
                       
  //                   }
  //                   else
  //                   {
                        
  //                   }

  //               },
  //               error: function() {
                    
  //               }
  //           });                          //Webkit, Safari, Chrome
  //         });
    
  var count = $(".count-total").html();
  var controller5 = new ScrollMagic.Controller();

// build scene
var scene = new ScrollMagic.Scene({triggerElement: ".dynamicContent #loader", triggerHook: "onEnter"})
.setPin(".sticky") // pins the element for the the scene's duration
.addTo(controller5)
.on("enter", function (e) {
  if (!$("#loader").hasClass("active")) {
    $("#loader").addClass("active");

    // simulate ajax call to add content using the function below
     setTimeout(addBoxes,100,9);
  }
});


function addBoxes(count){

  var loc = window.location;
      var baseURL = loc.protocol + "//" + loc.hostname;
       var count1 = $("#counts").html();
            var _totalCurrentResult=$(".grid-item").length;
            var term = $('#terms').val();
            var laminates = $("#laminates").val(); 
            var applications = $("#applications").val();
            var textures = $("#textures").val();
            // Ajax Reuqest
            $.ajax({
                url:baseURL+'/load-more-searchdata',
                type:'get',
                dataType:'json',
                data:{
                    skip:_totalCurrentResult,
                    term:term,
                    laminates:laminates,
                    applications:applications,
                    textures:textures
                },
                beforeSend:function(){

                },
                success:function(response){
                   var _html='';
                    var image="";
                    var img = '';
                    var v = '';
                    var urls = "{{url('product/')}}/";
                    var wishlist = "{{asset('frontend/images/wishlist.png')}}";

                    if(count1 > _totalCurrentResult){
                    $.each(response,function(index,value){
                      if(response[index+1]){
                       var v = response[index+1].id;
                      }
                     
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
                     
                       _html+='<div href="'+urls+value.slug+'" class="grid-item shown" id="'+value.id+'">';
_html+='<div class="grid-item__container"><div class="grid-item__bg" style="color: #18a6b6"></div><div class="grid-item__visuals">';
_html+='<a href="'+urls+value.slug+'"><img alt="" src="'+img+'" data-src="'+image+'" class="active grid-item__visuals-blue lazy"></a></div>';
_html+='<h2 class="grid-item__title"><a href="'+urls+value.slug+'"><div><span id="name_'+value.id+'" class="grid-item__name">'+value.product_texture+'</span><span id="names_'+value.id+'" class="grid-item__color">'+value.design+'</span></a></h2><div class="grid-item__weatherIcon">';
_html+=' <a href="javascript:void(0);" class="btn btn-default btn-rounded wish1" data-id="'+value.id+'"><img class="wishs" id="wishlist'+value.id+'" src="'+wishlist+'"></a></div>';
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
});
</script>
 <script type="text/javascript" src="{{asset('frontend/js/lazyload.js')}}"></script>

    
@endsection
