 <!DOCTYPE html>
<html>
   <head>
      <title>Royale Touche | Collection </title>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
      <meta name="description" content="  ">
      <meta name="keywords" content="">
      <meta property="og:locale" content="en_US" />
      <meta property="og:type" content="website" />
      <meta property="og:title" content=" Royale Touche " />
      <meta property="og:description"  content=""/>
      <meta property="og:keyword" content="">
      <meta property="og:image" content="">
      <meta property="og:url" content="https://www.royaletouche.com/collection/bedroom">
      <link rel="canonical" href="https://www.royaletouche.com/collection/bedroom" />
      <meta property="og:site_name" content="Royale Touche" />
      <link rel="icon" href="https://www.royaletouche.com/frontend/images/Royale_Touche_Laminate_Favicon.png" sizes="32x32" />
      <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
      <link rel="stylesheet" type="text/css" href="//cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css">
      <link rel="stylesheet" type="text/css" href="https://www.royaletouche.com/frontend/css/demo.css">
      <link rel="stylesheet" href="https://www.royaletouche.com/frontend/css/style.css" />
      <link rel="stylesheet" href="https://www.royaletouche.com/frontend/css/custom.css" />
      <link rel="stylesheet" href="https://www.royaletouche.com/frontend/css/responsive.css" />
      <link rel="stylesheet" href="{{asset('frontend/css/owl.carousel.min.css')}}" integrity="sha256-UhQQ4fxEeABh4JrcmAJ1+16id/1dnlOEVCFOxDef9Lw=" crossorigin="anonymous" />
      <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css" integrity="sha256-kksNxjDRxd/5+jGurZUJd1sdR2v+ClrCl3svESBaJqw=" crossorigin="anonymous" />
      <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.0/animate.min.css" />
      <link rel="stylesheet" type="text/css" href="//unpkg.com/aos@2.3.0/dist/aos.css">
      <!-- fancybox -->
      <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.css" type="text/css" media="screen" />
      <link href="//stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
      <link rel="stylesheet" type="text/css" href="//cdnjs.cloudflare.com/ajax/libs/lightgallery/1.6.14/css/lightgallery.min.css">
      <script src="//ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

      <script src="https://www.royaletouche.com/frontend/js/ScrollMagic.js"></script>
      <script type="text/javascript" src="https://www.royaletouche.com/frontend/js/lazyload.js"></script>
      <link rel="stylesheet" href="https://www.royaletouche.com/frontend/css/style-landing.css" />
      <link rel="stylesheet" href="https://www.royaletouche.com/frontend/css/responsive-landing.css" />
       <!-- <link rel="stylesheet" href="http://www.royaletouche.com/frontend/css/component-chosen.css" /> -->
      <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.1/css/select2.min.css" rel="stylesheet"/>

      <style type="text/css">

         .banner{
           background-image: url('../frontend/images/landing-collection/{{Request::segment(2)}}.jpg');
         }

          @if(Request::segment(2) == 'Stores-across-India')
           .banner:after{
              background: rgb(0 0 0 / 60%);
           }
          @endif

         @media (min-width: 767px){
         	.banner{
	          background-image: url('../frontend/images/landing-collection/{{Request::segment(2)}}D.jpg');
	        }


         }

          #state_id option, #city_id option {
             color: #000 !important;
          }

           .select2{width: 100% !important;}


      </style>
      <!-- Global site tag (gtag.js) - Google Analytics -->
      <script async src="//www.googletagmanager.com/gtag/js?id=UA-44605757-3"></script>
      <script>
         window.dataLayer = window.dataLayer || [];
         function gtag(){dataLayer.push(arguments);}
         gtag('js', new Date());

         gtag('config', 'UA-44605757-3');
      </script>
      <script type="application/ld+json">
         {
           "@context": "//schema.org",
           "@type": "Organization",
           "name": "Royale Touche",
           "alternateName": "Royale Touche",
           "url": "//www.royaletouche.com/",
           "logo": "//royaletouche.com/frontend/images/logo.png",
           "sameAs": [
             "//www.facebook.com/RoyaleToucheOfficial",
             "//www.instagram.com/royale_touche/",
             "//www.linkedin.com/company/31261499"
           ]
         }
      </script>
      <script type="application/ld+json">
         {
           "@context": "//schema.org/",
           "@type": "WebSite",
           "name": "Royale Touche",
           "url": "//www.royaletouche.com/",
           "potentialAction": {
             "@type": "SearchAction",
             "target": "//www.royaletouche.com/search?term={search_term_string}",
             "query-input": "required name=search_term_string"
           }
         }
      </script>
      <!-- Google Tag Manager -->
      <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
         new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
         j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
         '//www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
         })(window,document,'script','dataLayer','GTM-5GDH8T6');
      </script>
      <!-- End Google Tag Manager -->
      <script>
   !function(e,s,t,i,p,c,n){
   e.hspixel||((p=e.hspixel=function(){p.process?
   p.process.apply(p,arguments):p.queue.push(arguments)}).queue=[],
   p.t=1*new Date,(c=s.createElement("script")).async=1,
   c.src="https://hspx.hotstar.com/static/pixel/hspixel.js",
  (n=s.getElementsByTagName("script")[0]).parentNode.insertBefore(c,n)
  )}(window,document),
  hspixel("init","royaletouche"),
  hspixel("track","PageView");
</script>
 <noscript>
   <img height="1" width="1" style="display:none"  src="https://hspx.hotstar.com/v1/events/track/cp_page_view?pi=royaletouche">
 </noscript>

 <!-- DO NOT MODIFY -->
<!-- Quora Pixel Code (JS Helper) -->
<!-- <script>
!function(q,e,v,n,t,s){if(q.qp) return; n=q.qp=function(){n.qp?n.qp.apply(n,arguments):n.queue.push(arguments);}; n.queue=[];t=document.createElement(e);t.async=!0;t.src=v; s=document.getElementsByTagName(e)[0]; s.parentNode.insertBefore(t,s);}(window, 'script', 'https://a.quora.com/qevents.js');
qp('init', '8f5a6fee5c1345e681c7f4066c1f870a');
qp('track', 'ViewContent');
</script> -->
<noscript><img height="1" width="1" style="display:none" src="https://q.quora.com/_/ad/8f5a6fee5c1345e681c7f4066c1f870a/pixel?tag=ViewContent&noscript=1"/></noscript>
<!-- End of Quora Pixel Code -->

   </head>
   <body class="collection_page"  >
    <p id="demo" style="display:none;" onLoad="">Your coordinates:Latitude: <br>Longitude: </p>
      <div id="banner-section landing-css">
         <div class="container-fluid pd-0">
            <div class="banner">
               <!-- <img src="images/home/banner.png" class="img-responsive" alt=""> -->
            </div>
            <!-- <a href="https://techcntrl.com/dmp/jsv2/RT_U.js" id="pixel" class="hide"></a> -->
             @php $pagetype='';
             if(Request::segment(2) == 'Bedroom-laminates')
             $pagetype='bedroom';
             elseif(Request::segment(2) == 'Kitchen-laminates')
             $pagetype='kitchen';
             elseif(Request::segment(2) == 'High-gloss-laminates')
             $pagetype='highgloss';
             elseif(Request::segment(2) == 'Wardrobe-laminates')
             $pagetype='wardrobe';
             elseif(Request::segment(2) == 'Next-generation-laminates')
             $pagetype='nextgen';
             elseif(Request::segment(2) == 'Stores-across-India')
             $pagetype='storeacrossindia';

             @endphp

            <div class="banner-content">
               @if(Request::segment(2) == 'Bedroom-laminates')
               <h1 class="hero-title" style="color: #fff !important;">Want your bedroom to look this beautiful?</h1>
               @elseif(Request::segment(2) == 'Kitchen-laminates')
               <h1 class="hero-title" style="color: #fff !important;">Want your kitchen to look this sleek?</h1>
               @elseif(Request::segment(2) == 'High-gloss-laminates')
               <h1 class="hero-title" style="color: #fff !important;"> An assortment of High Gloss Laminates for the perfect kitchen!</h1>
               @elseif(Request::segment(2) == 'Wardrobe-laminates')
               <h1 class="hero-title" style="color: #fff !important;">Contemporary designs curated to make your wardrobe look elegant. </h1>
               @elseif(Request::segment(2) == 'Next-generation-laminates')
               <h1 class="hero-title" style="color: #fff !important;">The future is here... Revolutionary 1.25mm Next Generation laminates from the home of Royalty! Stronger, Thicker & Bolder.</h1>
               @elseif(Request::segment(2) == 'Stores-across-India')
                <h1 class="hero-title" style="color: #fff !important;">A One-Stop-Shop for all your interior decor needs.</h1>
               @endif
               <!-- <h4 class="hero-subtitle"></h4> -->

               <div class="d-flex">
                  @php
                     $source = Request::get('utm_source');
                     $mobilenumber = '9687671045';
                     if(preg_match("|googledisplay|is",$source)){
                     $mobilenumber = '9687671042';
                    }
                    else if(preg_match("|googlesearch|is",$source)){
                     $mobilenumber = '9687671043';
                    }
                    else if(preg_match("|facebook|is",$source)){
                     $mobilenumber = '9687671044';
                    }

                  @endphp
                  <div class="">
                  <a href="{{url('collection/'.Request::segment(2).'/reach-us')}}" class="btn btn-all btn-rounded d-flex compress-btn" style="display: inline-flex;align-items: center;"><img class="icons-col" src="{{asset('frontend/images/landing-collection/locator-icon.png')}}"><span class="sp-title">Store <br>Locator</span></a>
                 </div>
                 <div>
                    <a data-toggle="modal" data-target="#{{ $pagetype }}-form-catalogue" class="btn btn-all btn-rounded d-flex visible-xs"><img class="icons-col" src="{{asset('frontend/images/landing-collection/call-icon.png')}}">Request a call back</a>

                     <a data-toggle="modal" data-target="#{{ $pagetype }}-form-call" class="btn btn-all btn-rounded d-flex hidden-xs" style="display: inline-flex;align-items: center;"><img class="icons-col" src="{{asset('frontend/images/landing-collection/call-icon.png')}}"><span class="sp-title">Request <br> a call back</span></a>
                 </div>
               </div>

               <div>
                @if(Request::segment(2) == 'Stores-across-India')
                <h4 class="hero-subtitle"><strong>150+</strong> Experience centers <br><strong>20</strong> states | <strong>1</strong> Trusted Brand</h4>
                @else
                <h4 class="hero-subtitle"><strong>800</strong> Designs | <strong>100+</strong>Textures with 1 new design every 4 days</h4>
                @endif
               </div>
               <div class="logo-royale">
                  <img src="{{asset('frontend/images/landing-collection/logo-royale.png')}}">
                  <p class="tagline">India's Only 1.25mm Laminates</p>
               </div>
               <div>
                  <p>Unlock the Largest Collection of Laminates</p>
                  <a data-toggle="modal" data-target="#{{ $pagetype }}-form-catalogue" class="btn btn-all btn-rounded d-flex"><img class="icons-col" src="{{asset('frontend/images/landing-collection/catalog-icon.png')}}">Get your catalogue</a>
               </div>

               <div>
                  <a href="{{url('https://www.royaletouche.com/guide')}}" class="explore-link">Explore the Collection</a>
               </div>
            </div>
         </div>
      </div>
      <!-- banner section end -->
      <!-- Modal -->
      <div id="{{ $pagetype }}-form-catalogue" class="modal fade @if(Request::segment(2) == 'Wardrobe-laminates') {{'white-modal'}} @endif" role="dialog">
         @if(Request::segment(2) == 'Wardrobe-laminates')
             @include('collection_wardrobe')
         @else
             @include('collection_allform')
         @endif
      </div>

           <!---Callus form --->
              <!-- Modal -->
      <div id="{{ $pagetype }}-form-call" class="modal fade white-modal nxt-gen-modal" role="dialog">
         <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
               <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
               <div class="modal-body">
                 <h4 class="modal-title">Please provide your details for us to get back to you. </h4>
                <div class="d-flex mg-0">
                  <div class="form-left-block w-45">
                  <div class="img-block-form">
                    <img src="../frontend/images/landing-collection/object-table.png">
                  </div>
                </div>

                 <div class="form-right-block w-55">
                  <div id="formdiv">
                     <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" name="name" id="name1" required>
                        <span id="nameError1"></span>
                     </div>
                     <input type="hidden" name="utm_source" id="utm_source1" value="{{request()->get('utm_source')}}">
                     <input type="hidden" name="utm_campaign" id="utm_campaign1" value="{{request()->get('utm_campaign')}}">
                     <input type="hidden" name="utm_medium" id="utm_medium1" value="{{request()->get('utm_medium')}}">
                     <div class="form-group">
                        <label for="phoneNo">Mobile No</label>
                        <div class="col-xs-12 form-group nopadding">
                           <div class="col-xs-2 nopadding">
                              <div class="edit-num">+91</div>
                           </div>
                           <div class="col-xs-10 nopadding">
                              <input type="tel" name="contact" class="form-control" id="contact1" required maxlength="10">
                           </div>
                        </div>
                        <span class="col-xs-12" id="contactError1"></span>
                     </div>

                    <input type="hidden" value="{{Request::segment(2)}}_callus" id="type1" name="type">
                     <input type="submit" id="Submitcall" name="" class="btn btn-all btn-rounded asdf green-submit-btn w-full mg-20-0" value="Request Call">
                     <div id="msg1" class="msg"></div>
                  </div>

                </div>
                </div>


               </div>
            </div>
         </div>
      </div>
      <!--End callus form -->
      <script src="//ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
      <!-- // <script src="https://techcntrl.com/dmp/jsv2/RT_U.js" async></script>     -->
      <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
      <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/jquery-migrate/3.2.0/jquery-migrate.min.js"></script>
      <!-- <script src="//cdnjs.cloudflare.com/ajax/libs/chosen/1.8.6/chosen.jquery.min.js"></script> -->
      <script src="//cdnjs.cloudflare.com/ajax/libs/select2/4.0.0/js/select2.full.js"></script>

      <script type="text/javascript">

   $(document).ready(function(){
      // $('.chosen-select-deselect').chosen(
      //     { allow_single_deselect: true,
      //       width: '100%'
      //     });

      // $('.chosen-select-deselect1').chosen(
      //     { allow_single_deselect: true,
      //       width: '100%'
      //     });

      function matchStart (term, text) {
          if (text.toUpperCase().indexOf(term.toUpperCase()) == 0) {
            return true;
          }

          return false;
        }

        $.fn.select2.amd.require(['select2/compat/matcher'], function (oldMatcher) {
          $("select").select2({
            matcher: oldMatcher(matchStart)
          })
        });


     // $("#city_id").on('change',function(){
     //    var cityid = $(this).val();
     //         $.ajax({
     //           url:'/fetchstate',
     //           type:'POST',
     //           data:{
     //               cityid:cityid
     //             },
     //           success:function(result){
     //               $("#statesid").html(result);
     //           }
     //          });
     //     });
    var type = $("#type").val();
          $("#Submit-"+type).click(function(){
             $("#msg").html();
           var name=$("#name").val();
           var contact= $("#contact").val();
           // var email = $("#email").val();
           var token = $("#csrf").val();
           //var state_id = $("#state_id").val();
           //var city_id = $("#city_id").val();
           var type = $("#type").val();
           var utm_source = $("#utm_source").val();
           var utm_campaign = $("#utm_campaign").val();
           var utm_medium = $("#utm_medium").val();
           var phonePattern = /^[0-9]{10}$/;

           var flag = 0;

           if(name != '' && name != null){

             $('#nameError').html('');

           }
           else{
             $('#nameError').html('Please Enter your name');
             flag++;
           }

           if(phonePattern.test(contact) && contact != '' && contact!= null){
            $('#contactError').html('');

           }
           else{
              $('#contactError').html('Please Enter 10 digit mobile number');
             flag++;

           }

           // if(state_id!='select' && state_id!=null){
           //    $('#stateError').html('');

           // }else{
           //    $('#stateError').html('Please select state');
           //    flag++;
           // }
           // if(city_id!=-1 && city_id!='select' && city_id!=null && city_id.length >0){
           //    $('#cityError').html('');

           // }else{
           //    $('#cityError').html('Please select city');
           //    flag++;
           // }

           if(flag > 0){

               return false;
           }
           else{

           $("#Submit-"+type).prop('disabled',true);
           $("#Submit-"+type).html('Please wait..');
           $.ajax({
           url:'/submitForm',
           type:'POST',
           data:{
               _token:token,
               name:name,
               contact:contact,
              // state_id:state_id,
               //city_id:city_id,
               type:type,
               utm_source:utm_source,
               utm_medium:utm_medium,
               utm_campaign:utm_campaign
             },
           success:function(result){
               var result = JSON.parse(result);
               // alert(result);
               if(result.statusCode == 200){
                   var script = document.createElement('script');
                   script.src = "https://techcntrl.com/dmp/jsv2/Royal_Touche.js";
                   document.getElementsByTagName('head')[0].appendChild(script);
                  hspixel('track', 'GenerateLead');
                  //triggerEvent("Download");

                 $("#Submit-"+type).html('Submit');
                           $("#Submit-"+type).prop('disabled',false);
                           $("input[type=text],input[type=tel],input[type=email], textarea").val("");
                       // $("#formdiv").removeClass('show');
                       // $("#formdiv").addClass('hide');
                       // $("#otpdiv").removeClass('hide');
                       // $("#otpdiv").addClass('show');
                       $("#msg").html(result.msg);
                       setTimeout(function(){ $(".close").click(); }, 3000);
                       }
               else{
                   $("#msg").html('');
               }
           }
          })
         }
         })

          $("#Submitcall").click(function(){
             $("#msg1").html();
           var name=$("#name1").val();
           var contact= $("#contact1").val();
           var token = $("#csrf").val();
           var type = $("#type1").val();

           var utm_source = $("#utm_source1").val();
           var utm_campaign = $("#utm_campaign1").val();
           var utm_medium = $("#utm_medium1").val();
           var phonePattern = /^[0-9]{10}$/;

           var flag = 0;

           if(name != '' && name != null){

             $('#nameError1').html('');

           }
           else{
             $('#nameError1').html('Please Enter your name');
             flag++;
           }

           if(phonePattern.test(contact) && contact != '' && contact!= null){
            $('#contactError1').html('');

           }
           else{
              $('#contactError1').html('Please Enter 10 digit mobile number');
             flag++;

           }

           if(flag > 0){
               return false;
           }
           else{

             $("#Submitcall").prop('disabled',true);
                 $("#Submitcall").html('Please wait..');
          $.ajax({
           url:'/submitForm',
           type:'POST',
           data:{
               _token:token,
               name:name,
               contact:contact,
               type:type,
               utm_source:utm_source,
               utm_medium:utm_medium,
               utm_campaign:utm_campaign
             },
           success:function(result){
               var result = JSON.parse(result);
               // alert(result);
               if(result.statusCode == 200){

                 $("#Submitcall").html('Submit');
                           $("#Submitcall").prop('disabled',false);
                       $("input[type=text],input[type=tel],input[type=email], textarea").val("");
                       $("#msg1").html('Thank you!! Our team will connect with you promptly. In the meantime we have shared our e-catalogue via whatsapp for your perusal.');
                       //$("#call-catalogue").modal('hide');
                       setTimeout(function(){ $(".close").click(); }, 3000);
               }
               else{
                   alert("something wrong... please try later");
               }
           }
          })
         }
         })


var x=document.getElementById("demo");
 getLocation1();
function getLocation1() {

  if (navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(showPosition);

  }
  else{
    x.innerHTML="Geolocation is not supported by this browser.";
  }
}
function showPosition(position)
{
 x.innerHTML = "Latitude: " + position.coords.latitude + "<br>Longitude: " + position.coords.longitude;

            //     var ajax_data = {
            //     Latitude : position.coords.latitude,
            //     Longitude : position.coords.longitude,
            // };
            var ajax_data = {
                Latitude : position.coords.latitude,
                Longitude : position.coords.longitude,
            };

            $.ajaxSetup({
                      headers: {
                         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                     });
            $.ajax({
                type: "POST",
                url: '/fetch-latlng',
                data: ajax_data,
                success: function(result) {
                    var a = JSON.parse(result);
                   var state = a[0].state;
                   var city = a[0].city;
                  // console.log(city,state);
                  $('#city_id').html(city);
                  $('#statesid').html(state);

                    // $.when($("select#city_id").val(city).change()).then(function() {
                    //     setTimeout(function(){
                    //      $("#city_id").val(state);

                    //     },4000);
                    // });


                },
                error: function() {


                }
            });
}

         // if(! /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent) ) {
         // window.location.href = 'https://www.royaletouche.com/';

         // }


         var queryForm = function(settings){
         var reset = settings && settings.reset ? settings.reset : false;
         var self = window.location.toString();
         var querystring = self.split("?");
         if (querystring.length > 1) {
         var pairs = querystring[1].split("&");
         for (i in pairs) {
           var keyval = pairs[i].split("=");
           if (reset || sessionStorage.getItem(keyval[0]) === null) {
             sessionStorage.setItem(keyval[0], decodeURIComponent(keyval[1]));
           }
         }
         }
         var hiddenFields = document.querySelectorAll("input[type=hidden], input[type=text]");
         for (var i=0; i<hiddenFields.length; i++) {
         var param = sessionStorage.getItem(hiddenFields[i].name);
         if (param) document.getElementsByName(hiddenFields[i].name)[0].value = param;
         }
         }

         setTimeout(function(){queryForm();}, 3000);




         $("#otpSubmit").click(function(){
           var otp = $("#otp").val();
           otp = otp.trim();
           var token = $("#csrf").val();
           console.log("---",otp);
           $.ajax({
               type:"post",
               url:'/submitotp',
               data:{
                   _token:token,
                   otp:otp
               },
               success:function(otpResult){
                   otpResult = JSON.parse(otpResult);
                   if(otpResult.statusCode == 200){
                       location.replace("/showresult");
                   }
                   else{
                       alert("otp not match. Please try again");
                   }
               }
           })
         })
         });

    function getXMLHTTP() {
    var xmlhttp = false;
    try {
        xmlhttp = new XMLHttpRequest();
    } catch (e) {
        try {
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        } catch (e) {
            try {
                xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
            } catch (e1) {
                xmlhttp = false;
            }
        }
    }
    return xmlhttp;
}
//     function getcity(strURL) {
//     var req4 = getXMLHTTP();
//     if (req4) {
//         req4.onreadystatechange = function() {
//              $('.chosen-select-deselect1').chosen(
//                     { allow_single_deselect: true,
//                       width: '100%'
//                     });
//             if (req4.readyState == 4) {
//                 if (req4.status == 200) {

//                     document.getElementById('citydiv').innerHTML = req4.responseText;

//                 } else {
//                     alert("There was a problem while using XMLHTTP:\n" + req4.statusText);
//                 }
//             }
//         }
//         req4.open("GET", strURL, true);
//         req4.send(null);
//     }
// }

function checkMobileNumber(str) {
    var regx1 = /^(?:(?:\+|0{0,2})91(\s*[\-]\s*)?|[0]?)?[56789]\d{9}$/;

    var mobile = str.value;
    var numb_arr = [];
    var numb_arr =['1111111111','2222222222','3333333333','4444444444','5555555555','6666666666','7777777777','8888888888','9999999999'];


    if(!regx1.test(mobile))
    {
        alert('Invalid Mobile Number');
        console.log("Numbers do not start from 7- 9");
        str.value = '';
        return false;
    }

    else if(jQuery.inArray(mobile, numb_arr) !== -1){
      alert('Invalid Mobile Number');

      str.value = '';
      return false;
    }
  }

      </script>
   </body>
</html>
