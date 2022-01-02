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
      <style type="text/css">
         .msg{
         text-align: center;
         color: #000;
         font-size: 15px;
         }
         #formdiv span{color: red;}
         .banner{
         background-image: url('../frontend/images/landing-collection/Wardrobe-laminates.jpg');
         }

         /*new form css*/

         .white-modal .modal-content{
          background: #fff;
          color:#000;
         }
         .white-modal .modal-body{
            padding:0px;
         }
         .white-modal .close{
            color: #000;
            opacity: 1;
         }
         .white-modal .form-control{
          border-bottom: 1px solid #000;
          color: #000!important;
         }
         .form-control:focus{
         	box-shadow: none;
         }
         .edit-num{
              border-bottom: 1px solid #000;
         }
         .green-submit-btn{
          background: #215265!important;
          border:none!important;
         -webkit-box-shadow:0px 15px 15px -15px #000;
        -moz-box-shadow:0px 15px 15px -15px #000;
           box-shadow: 0px 15px 15px -15px #000;
         }
         .green-submit-btn:hover{
          color: #fff!important;
         }
         .w-60{
          width: 60%;
         }
         .w-55{
          width: 55%;
         }
          .w-45{
          width: 45%;
         }
         .w-50{
          width: 50%;
         }
         .white-modal .modal-title{
            width: 85%;
            margin: 0px auto;
            text-align: center;
         }
         .white-modal .form-right-block{
          padding-right: 20px;
         }
         .mg-0{
          margin:0px!important;
         }
          .mg-20-0{
          margin:20px 0px!important;
         }
         .w-full{
            width: 100%;
         }
          @media (max-width: 767px){
            .w-xs-100{
              width: 100%;
            }
            .d-xs-wrap{
              flex-wrap: wrap;
            }
            .white-modal .modal-title{
            	font-size: 12px;
    			margin-bottom: 18px;
            }
          }
         /*new form-css end*/


          @if(Request::segment(2) == 'Stores-across-India')
           .banner:after{
              background: rgb(0 0 0 / 60%);
           }
          @endif

         @media (min-width: 767px){
         	.banner{
	          background-image: url('../frontend/images/landing-collection/Wardrobe-laminatesD.jpg');
	        }

          .form-control{
            height: 34px;
          }
         }
         @media screen and (max-width: 375px){
           .form-control{
            height: 34px;
          }
         }
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
</script>
<noscript><img height="1" width="1" style="display:none" src="https://q.quora.com/_/ad/8f5a6fee5c1345e681c7f4066c1f870a/pixel?tag=ViewContent&noscript=1"/></noscript>
 End of Quora Pixel Code -->

   </head>
   <body  class="collection_page"  >
      <div id="banner-section landing-css">
         <div class="container-fluid pd-0">
            <div class="banner">
               <!-- <img src="images/home/banner.png" class="img-responsive" alt=""> -->
            </div>
            <!-- <a href="https://techcntrl.com/dmp/jsv2/RT_U.js" id="pixel" class="hide"></a> -->
            <div class="banner-content">
               @if(Request::segment(2) == 'Bedroom-laminates')
               <h1 class="hero-title">Want your bedroom to look this beautiful?</h1>
               @elseif(Request::segment(2) == 'Kitchen-laminates')
               <h1 class="hero-title">Want your kitchen to look this sleek?</h1>
               @elseif(Request::segment(2) == 'High-gloss-laminates')
               <h1 class="hero-title"> An assortment of High Gloss Laminates for the perfect kitchen!</h1>
               @elseif(Request::segment(2) == 'WardrobeLaminate_copy')
               <h1 class="hero-title">Contemporary designs curated to make your wardrobe look elegant. </h1>
               @elseif(Request::segment(2) == 'Next-generation-laminates')
               <h1 class="hero-title" style="color: #fff !important;">The future is here... Revolutionary 1.25mm Next Generation laminates from the home of Royalty! Stronger, Thicker & Bolder.</h1>
               @elseif(Request::segment(2) == 'Stores-across-India')
                <h1 class="hero-title">A One-Stop-Shop for all your interior decor needs.</h1>
               @endif
               <!-- <h4 class="hero-subtitle"></h4> -->
               <div class="d-flex">
                  <div class="">
                  <a href="{{url('collection/'.Request::segment(2).'/reach-us')}}" class="btn btn-all btn-rounded d-flex compress-btn" style="display: inline-flex;align-items: center;"><img class="icons-col" src="{{asset('frontend/images/landing-collection/locator-icon.png')}}"><span class="sp-title">Store <br>Locator</span></a>
                 </div>
                 <div>
                    <a href="tel:6351896676" class="btn btn-all btn-rounded d-flex visible-xs"><img class="icons-col" src="{{asset('frontend/images/landing-collection/call-icon.png')}}">Call Us</a>

                     <a data-toggle="modal" data-target="#form-catalogue" class="btn btn-all btn-rounded d-flex hidden-xs" style="display: inline-flex;align-items: center;"><img class="icons-col" src="{{asset('frontend/images/landing-collection/call-icon.png')}}"><span class="sp-title">Request <br> a call</span></a>
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
                  <a data-toggle="modal" data-target="#form-catalogue" class="btn btn-all btn-rounded d-flex"><img class="icons-col" src="{{asset('frontend/images/landing-collection/catalog-icon.png')}}">Get your catalogue</a>
               </div>
               <div>
                  <a href="{{url('https://www.royaletouche.com/guide')}}" class="explore-link">Explore the Collection</a>
               </div>
            </div>
         </div>
      </div>
      <!-- banner section end -->
      <!-- Modal -->
      <div id="form-catalogue" class="modal fade white-modal" role="dialog">
         <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
               <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                  <!-- <h4 class="modal-title">Please fill the details so our team can send you the catalogue.</h4> -->


               </div>
               <div class="modal-body">
                 <h4 class="modal-title">Share your details for us to send you the catalogue and also set up a free consultation with our expert. </h4>
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
                        <input type="text" class="form-control" name="name" id="name" required>
                        <span id="nameError"></span>
                     </div>
                     <input type="hidden" name="utm_source" id="utm_source" value="{{request()->get('utm_source')}}">
                     <input type="hidden" name="utm_campaign" id="utm_campaign" value="{{request()->get('utm_campaign')}}">
                     <input type="hidden" name="utm_medium" id="utm_medium" value="{{request()->get('utm_medium')}}">
                     <div class="form-group">
                        <label for="phoneNo">Mobile No</label>
                        <div class="col-xs-12 form-group nopadding">
                           <div class="col-xs-2 nopadding">
                              <div class="edit-num">+91</div>
                           </div>
                           <div class="col-xs-10 nopadding">
                              <input type="tel" name="contact" class="form-control" id="contact" required maxlength="10">
                           </div>
                        </div>
                        <span class="col-xs-12" id="contactError"></span>
                     </div>
                     <!--  <div class="form-group">
                        <label for="email">Email address:</label>
                        <input type="email" class="form-control" id="email">
                        </div> -->
                     <input type="hidden" value="{{Request::segment(2)}}" id="type" name="type">
                     <input type="submit" id="Submit{{Request::segment(2)}}" name="" class="btn btn-all btn-rounded asdf green-submit-btn w-full mg-20-0" value="Submit">
                     <div id="msg" class="msg"></div>
                     <!-- <button type="submit" >Submit</button> -->
                  </div>
                  <div id="otpdiv" class ="hide">
                     <div class="form-group">
                        <label for="emotpail">OTP:</label>
                        <input type="otp" class="form-control" id="otp" placeholder="Enter OTP" name="otp">
                     </div>
                     <button id="otpSubmit" class="btn btn-primary">Submit</button>
                  </div>
                </div>
                </div>


               </div>
            </div>
         </div>
      </div>
      <script src="//ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
      <!-- // <script src="https://techcntrl.com/dmp/jsv2/RT_U.js" async></script>     -->
      <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
      <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/jquery-migrate/3.2.0/jquery-migrate.min.js"></script>
      <script type="text/javascript">
         $(document).ready(function(){
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


         var type = 'WardrobeLaminate_copy';
          $("#Submit"+type).click(function(){
          	 $("#msg").html();
           var name=$("#name").val();
           var contact= $("#contact").val();
           // var email = $("#email").val();
           var token = $("#csrf").val();

           var utm_source = $("#utm_source").val();
           var utm_campaign = $("#utm_campaign").val();
           var utm_medium = $("#utm_medium").val();
           var phonePattern = /^[0-9]*$/;

           var flag = 0;

           if(name != '' && name != null){

             $('#nameError').html('');
             flag = 0;
           }
           else{
             $('#nameError').html('Please Enter your name');
             flag++;
           }

           if(phonePattern.test(contact) && contact != '' && contact!= null){
            $('#contactError').html('');
             flag = 0;
           }
           else{
              $('#contactError').html('Please Enter 10 digit mobile number');
             flag++;

           }

           if(flag > 0){
               return false;
           }
           else{

             $("#Submit"+type).prop('disabled',true);
                 $("#Submit"+type).html('Please wait..');
          $.ajax({
           url:'/submitFormWardrobe',
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
                  // var elem = document.getElementById("pixel");
                  // if (typeof elem.onclick == "function") {
                  //     elem.onclick.apply(elem);
                  // }
                  //qp('track', 'GenerateLead');
                  var script = document.createElement('script');
                  script.src = "https://techcntrl.com/dmp/jsv2/RT_TY.js";
                  document.getElementsByTagName('head')[0].appendChild(script);
                  hspixel('track', 'GenerateLead');

                 $("#Submit"+type).html('Submit');
                           $("#Submit"+type).prop('disabled',false);
                           $("input[type=text],input[type=tel],input[type=email], textarea").val("");
                       // $("#formdiv").removeClass('show');
                       // $("#formdiv").addClass('hide');
                       // $("#otpdiv").removeClass('hide');
                       // $("#otpdiv").addClass('show');
                       $("#msg").html(result.msg);
                       setTimeout(function(){ $(".close").click(); }, 3000);
                       }
               else{
                   alert("something wrong... please try later");
               }
           }
          })
         }
         })

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

      </script>
   </body>
</html>
