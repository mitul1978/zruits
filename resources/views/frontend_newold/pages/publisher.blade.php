<!DOCTYPE html>
<html>
   <head>
      <title> Royale Touche - Publisher </title>
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
      <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.2/css/bootstrap-select.min.css"> -->
      <script type="text/javascript" src="https://www.royaletouche.com/frontend/js/lazyload.js"></script>
      <link rel="stylesheet" href="https://www.royaletouche.com/frontend/css/style-landing.css" />
      <link rel="stylesheet" href="https://www.royaletouche.com/frontend/css/responsive-landing.css" />
      <link rel="stylesheet" href="{{URL::asset('frontend/css/component-chosen.css')}}" />
      <style type="text/css">

        .form-block-landing{
          display: table;
          margin: 15px;
          background: #2e6472cf;
          border-radius: 20px;
          padding-top: 20px;
        }

         .msg{
         text-align: center;
         color: #fff;
         font-size: 15px;
         }
         .btn.btn-rounded:hover{
          color:#fff;
         }
         #formdiv span{color: red;}
         .banner{
         /*background-image: url('../frontend/images/landing-collection/RT_PC Website1-09.jpg');*/
         background-image: url('../frontend/images/landing-collection/Next-generation-laminates.jpg');
         }

         .collection_page select option{color: #000 !important;}

          @if(Request::segment(2) == 'Stores-across-India')
           .banner:after{
              background: rgb(0 0 0 / 60%);
           }
          @endif

         @media (min-width: 767px){
         	.banner{
            /*background-image: url('../frontend/images/landing-collection/RT_Phone Website1-09.jpg');*/
	          background-image: url('../frontend/images/landing-collection/Next-generation-laminatesD.jpg');
	        }
         }

         @media (min-width: 992px) and (max-width: 1279px){
          .banner-content{
              width: 80%;
          }
          }

       .bootstrap-select>.dropdown-toggle {
            background-color: transparent !important;
            color: #fff !important;
            border: 0;
            border-bottom: 1px solid #fff;
            border-radius: 0;
        }

        .bs-searchbox .form-control, .chosen-container-single .chosen-search input[type="text"] {
          color: #000 !important;
        }

        .chosen-container-single .chosen-single {
            color: #fff !important;
            border: 0;
            border-bottom: 1px solid #fff;
            border-radius: 0;
        }
        .chosen-container-single .chosen-single, .chosen-container-single .chosen-single div {
          background-color: transparent !important;

        }

        .chosen-container-single .chosen-single span {
          color: #fff;
        }
          .form-control:focus{
            box-shadow: none;

          }
          .banner-content{
  width: 60%;
}

         @media (max-width: 1600px){
            .hero-title{
            letter-spacing: 1px;
            font-size: 18px;
          }
         h4.hero-subtitle{
             font-size: 20px;
             width: 80%;
             margin: auto;
          }
          .logo-royale {
              margin: 32px 0;
          }
          }
        @media (max-width: 1366px){
          .hero-title{
            letter-spacing: 1px;
            font-size: 16px;
          }
          h4.hero-subtitle {
            font-size: 18px;
          }
          .logo-royale img{
            width: 100px;
          }

          .logo-royale {
               margin: 30px 0;
            }
            .form-block-landing{
              width: 70%;
              margin: 15px auto;
            }
          }

          @media (max-width: 767px){
         .edit-num{
            height: 26px;
                font-size: 12px;
                    letter-spacing: 1px;
                    line-height: 2.2;
         }
         .hero-title{
              margin-bottom: 10px;
              font-size: 12px;
              line-height: 14px;
              font-weight: 600;
              text-transform: capitalize;
         }
         .banner-content
         {
          width: 100%;
          padding: 10px 10px 0px;

          overflow: auto;
          height: 95vh;
         }
         h4.hero-subtitle{
          font-size: 12px;
           text-transform: capitalize;
         }
         .form-block-landing{
              margin: 5px auto;

         }
         .collection2page .logo-royale{
              margin: 16px 0px;
         }
           .form-block-landing{
              padding-top: 15px;
        }
        .logo-royale img{
          width: 70px;
        }
        .edit-num{
          height: 34px;
        }


       }
       @media (max-width: 320px){
        .hero-title{
           font-size: 10px;
           line-height: 12px;
        }
        h4.hero-subtitle{
          font-size: 10px;
        }
        .collection2page .logo-royale{
              margin: 12px 0px;
        }
        .form-block-landing{
              padding-top: 10px;
        }
       }




/*note css*/
.note-block {
    padding: 10px;
    /* margin: 12px 0px 00px; */
    background: #1a5969;
    border-radius: 16px;
    color: #cecece;
}
.note-block span{
  font-size: 12px;
    line-height: 16px;
    display: block;
    letter-spacing: 0.5px;
}
.policy-link{
  color:#fff;
}
.space-block{
  height: 30px;
}
.p-close{
  color: #23504a;
    opacity: 1;
    background: #fff!important;
    width: 30px;
    height: 30px;
}
/*note css end*/
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
   </head>
   <body  class="collection_page collection2page"  >
      <!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-5GDH8T6"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->
      <div id="banner-section landing-css">
         <div class="container-fluid pd-0">
            <div class="banner">
               <!-- <img src="images/home/banner.png" class="img-responsive" alt=""> -->
            </div>
            <div class="banner-content">
               <h1 class="hero-title" style="color: #fff !important;">The future is here... <br>Revolutionary 1.25mm Next Generation laminates from the home of Royalty!<br> Stronger, Thicker & Bolder.</h1>

               <div>
                <h4 class="hero-subtitle"><strong>800</strong> Designs | <strong>100+</strong>Textures with 1 new design every 4 days</h4>
                </div>
               <div class="logo-royale">
                  <img src="{{asset('frontend/images/landing-collection/logo-royale.png')}}">
                  <p class="tagline">India's Only 1.25mm Laminates</p>
               </div>
               <div>
                  <p>Unlock the Largest Collection of Laminates</p>
                  <!-- BTN CATALOGUE START-->
                <!--   <a data-toggle="modal" data-target="#form-catalogue" class="btn btn-all btn-rounded d-flex"><img class="icons-col" src="{{asset('frontend/images/landing-collection/catalog-icon.png')}}">Get your catalogue</a> -->
                  <!-- BTN CATALOGUE END-->
                      <input type="hidden" name="utm_source" id="utm_source" value="{{request()->get('utm_source')}}">
                     <input type="hidden" name="utm_campaign" id="utm_campaign" value="{{request()->get('utm_campaign')}}">
                     <input type="hidden" name="utm_medium" id="utm_medium" value="{{request()->get('utm_medium')}}">
                  <div class="form-block-landing">
                  	<div>
                  		<div class="col-md-12 col-xs-12">
                  			<div class="form-group  col-xs-12 col-md-4 pd-5">
                  				<input type="text" class="form-control" name="name" id="name" required="" placeholder="Enter Name">
                           <span class="error" id="nameError"></span>
                  			</div>


                        <div class="form-group  col-xs-12 col-md-4 pd-5">
                           <div class="col-xs-2 nopadding">
                              <div class="edit-num" style="margin-right: 0px;">+91</div>
                           </div>
                           <div class="col-xs-10 nopadding">
                             <input type="tel" class="form-control" name="phone" id="phone" required="" placeholder="Enter Mobile No" maxlength="10">
                           <span class="error" id="phoneError"></span>
                           </div>
                        </div>

                  			<div class="form-group col-xs-12 col-md-4 pd-5">
                  				<input type="email" class="form-control" name="email" id="email" required="" placeholder="Enter Email Id">
                           <span class="error" id="emailError"></span>
                            </div>
                  		</div>
                     	<div class="col-md-12 col-xs-12">
                  			<div class="form-group col-md-6 col-xs-12 pd-5">

                <select name="city" id="city" data-container="body" class="form-control chosen-select-deselect">
                  <option value="">Select City</option>
                  @foreach($city as $c=>$t)
                  <option value="{{ $t->city_name}}">{{ $t->city_name}}</option>

                  @endforeach
                </select>
                 <span class="error" id="cityError"></span>
                     		</div>
                  			<div class="form-group col-md-6 col-xs-12 pd-5">
								<select class="form-control" id="revamp" name="revamp">
								    <option> What do you want to revamp?</option>
                    <option value="Home">Home</option>
                    <option value="Office">Office</option>
                    <option value="Showroom and Resturant">Showroom and Resturant</option>
                    <option value="Kitchen">Kitchen</option>
								    <option value="Other">Other</option>
								    </select>
                     		</div>
						</div>
						<div class="form-group col-md-12 col-xs-12 pd-5">
                     <input type="submit" id="Submit-nextgen" name="" class="btn btn-all btn-rounded asdf" value="Submit">
                     <div id="msg" class="msg"></div>
                     		</div>
                  	</div>
                    <div class="clearfix"></div>
                     <div class="note-block">
                     <span>*By clicking Submit you agree to Royale Touche's <a href="javascript:void(0);" class="policy-link">privacy policy.</a></span>
                  </div>
                  </div>

               </div>
               <div>
                  <a href="{{url('https://www.royaletouche.com/guide')}}" class="explore-link">Explore the Collection</a>
               </div>
            </div>
         </div>
      </div>
      <!-- banner section end -->
      <!-- Modal -->
      <!-- <div id="form-catalogue" class="modal fade" role="dialog"> -->

      </div>
      <!-- Privacy policy popup -->
      <div id="privacy-policy-popup" class="modal fade white-modal nxt-gen-modal" role="dialog">
         <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
               <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body thank-you-body">
                 <h5 class="modal-title text-center">Royale Touche's privacy policy
                  <br>
                   You Authorize Royale Touche to send you updates via Whatsapp.</h5>
               </div>
               <div class="space-block"></div>
            </div>
         </div>
      </div>
      <!-- privacy policy end -->
      <div id="pixel-div">

      </div>
      <div id="zemantapixel-div"></div>
      <div id="cpl-div"></div>
      <script src="//ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
      <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
      <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/jquery-migrate/3.2.0/jquery-migrate.min.js"></script>
      <script src="//cdnjs.cloudflare.com/ajax/libs/chosen/1.8.6/chosen.jquery.min.js"></script>

<!--       <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.2/js/bootstrap-select.min.js"></script>
 -->      <script type="text/javascript">
         // $('.selectpicker').selectpicker('render');
          $('.chosen-select-deselect').chosen(
          { allow_single_deselect: true,
            width: '100%'
          });

         $(document).ready(function(){

           $('.policy-link').click(function(){
             $('#privacy-policy-popup').modal('show');
          });

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



          $("#Submit-nextgen").click(function(){
          	 $("#msg").html();
           var name=$("#name").val();
           var phone= $("#phone").val();
           var email = $("#email").val();
           var city = $("#city").val();
           var revamp = $("#revamp").val();
           var token = $("#csrf").val();
           var utm_source = $("#utm_source").val();
           var utm_campaign = $("#utm_campaign").val();
           var utm_medium = $("#utm_medium").val();
           var phonePattern = /^[0-9]{10}$/;

           var flag = 0;

           if(name != '' && name != null){

             $('#nameError').html('');
             flag = 0;
           }
           else{
             $('#nameError').html('Please Enter your name');
             flag++;
           }

           if(phonePattern.test(phone) && phone != '' && phone != null){
            $('#phoneError').html('');
             flag = 0;
           }
           else{
              $('#phoneError').html('Please Enter 10 digit mobile number');
             flag++;

           }

           if(city != '' && city != null){

             $('#cityError').html('');
             flag = 0;
           }
           else{
             $('#cityError').html('Please select the city');
             flag++;
           }

           if(flag > 0){
               return false;
           }
           else{

             $("#Submit-nextgen").prop('disabled',true);
                 $("#Submit-nextgen").html('Please wait..');
          $.ajax({
           url:'/submitForm1',
           type:'POST',
           data:{
               _token:token,
               name:name,
               phone:phone,
               email:email,
               city:city,
               revamp:revamp,
               utm_source:utm_source,
               utm_medium:utm_medium,
               utm_campaign:utm_campaign
             },
           success:function(result){
               var result = JSON.parse(result);
               // alert(result);
               if(result.statusCode == 200){
                 $("#Submit-nextgen").html('Submit');
                 $("#msg").html(result.msg);
                           $("#Submit-nextgen").prop('disabled',false);
                           $("input[type=text],input[type=tel],input[type=email],select, textarea").val("");

                       // $("#formdiv").removeClass('show');
                       // $("#formdiv").addClass('hide');
                       // $("#otpdiv").removeClass('hide');
                       // $("#otpdiv").addClass('show');
                       $('#pixel-div').html('<img src="https://partner.cpiperform.co.in/pixel?adid=5f55e88dfb3a2107bf3bd3e2&txn_id='+result.lead_id+'>');
$('#zemantapixel-div').html('<img src="https://p1.zemanta.com/p/7685/8174/" height="1" width="1" border="0" alt="" /><img width="1" height="1" alt="" style="display:none;" src="https://adgebra.co.in/Tracker/Conversion?p1=4303&p2=[order_Id]&p3=[product_Id]&p4=[cartvalue]&p5=[flag~custom_values];p6=CACHE_BUSTER"></img>');
  $("#cpl-div").html('<img src="https://optimidea.go2cloud.org/aff_l?offer_id=1966&amp;adv_sub='+result.lead_id+' width="1"; height="1"></img><img src="https://erinlabs.o18.click/p?oid=9874687&mid=1869&t=i&adv_sub1='+result.lead_id+'&adv_sub2='+result.city_name+'" width="0px" height="0px"><img src="https://momagic.g2afse.com/success.jpg?offer_id=6394&afstatus=1" height="1" width="1" alt="" /><iframe src="https://momagic.g2afse.com/success.php?offer_id=6394&afstatus=1" height="1" width="1" />')
                       var script = document.createElement('script');
                   script.src = "https://techcntrl.com/dmp/jsv2/Royal_Touche.js";
                   document.getElementsByTagName('head')[0].appendChild(script);
                   var script1 = document.createElement('script');
                   script1.src = "https://techcntrl.com/dmp/jsv2/RoyaletoucheMar.js";
                   document.getElementsByTagName('head')[0].appendChild(script1);

                   triggerEvent("Download");

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
