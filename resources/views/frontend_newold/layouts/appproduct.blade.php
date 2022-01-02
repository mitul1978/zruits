<!DOCTYPE html>
<html>

<head>
      <title>@if(isset($metadata)) {{$metadata->meta_title}} @else @yield('title') @endif</title>
      <meta charset="utf-8">

      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
      <meta name="description" content="@if(isset($metadata->meta_description)){!!$metadata->meta_description!!}@else @yield('meta_description') @endif">
        <meta name="keywords" content="@if(isset($metadata->meta_keyword)){!!$metadata->meta_keyword!!}@endif">
      <meta property="og:locale" content="en_US" />
      <meta property="og:type" content="website" />
        <meta property="og:title" content="@if(isset($metadata)) {{$metadata->meta_title}} @else {{'Royale Touche'}} @endif" />
        <meta property="og:description"  content="@if(isset($metadata->meta_description)){!!$metadata->meta_description!!}@endif"/>
         <meta property="og:keyword" content="@if(isset($metadata->meta_keyword)){!!$metadata->meta_keyword!!}@endif">
        <meta property="og:image" content="@if(isset($metadata->meta_image)){{URL::asset($metadata->meta_image)}}@endif">
        <meta property="og:url" content="{{url()->current()}}">
     <link rel="canonical" href="{{url()->current()}}" />
     <meta property="og:site_name" content="Royale Touche" />
     <link rel="icon" href="{{asset('frontend/images/Royale_Touche_Laminate_Favicon.png')}}" sizes="32x32" />
     <link rel="alternate" href="https://royaletouche.com" hreflang="en-us"/>
     <link rel="stylesheet" href="{{asset('frontend/css/bootstrap.min.css')}}" />
     <link rel="stylesheet" type="text/css" href="{{asset('frontend/css/normalize.css')}}">
     <link rel="stylesheet" type="text/css" href="{{asset('frontend/css/demo.css')}}">
      <link rel="stylesheet" href="{{asset('frontend/css/bootstrap.min.css')}}" />
      <link rel="stylesheet" href="{{asset('frontend/css/style.css')}}" />
      <link rel="stylesheet" href="{{asset('frontend/css/custom.css')}}" />
      <link rel="stylesheet" href="{{asset('frontend/css/responsive.css')}}" />

      <!-- <link rel="stylesheet" href="{{asset('frontend/css/custumscrollcssplugin.css')}}" /> -->


      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" integrity="sha256-UhQQ4fxEeABh4JrcmAJ1+16id/1dnlOEVCFOxDef9Lw=" crossorigin="anonymous" />


      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css" integrity="sha256-kksNxjDRxd/5+jGurZUJd1sdR2v+ClrCl3svESBaJqw=" crossorigin="anonymous" />


      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.0/animate.min.css" />
      <link rel="stylesheet" type="text/css" href="https://unpkg.com/aos@2.3.0/dist/aos.css">
          <!-- fancybox -->
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.css" type="text/css" media="screen" />


      <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

        <script src="{{asset('frontend/js/jquery.min.js')}}"></script>



       <script src="{{asset('frontend/js/ScrollMagic.js')}}"></script>
             <script type="text/javascript" src="{{asset('frontend/js/lazyload.js')}}"></script>

      <!--HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
      <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
      <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
      <![endif]-->
      @yield('css')

      <!-- Global site tag (gtag.js) - Google Analytics -->
      <script async src="https://www.googletagmanager.com/gtag/js?id=UA-44605757-3"></script>
      <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'UA-44605757-3');
      </script>

      <script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "Organization",
  "name": "Royale Touche",
  "alternateName": "Royale Touche",
  "url": "https://www.royaletouche.com/",
  "logo": "https://royaletouche.com/frontend/images/logo.png",
  "sameAs": [
    "https://www.facebook.com/RoyaleToucheOfficial",
    "https://www.instagram.com/royale_touche/",
    "https://www.linkedin.com/company/31261499"
  ]
}
</script>
<script type="application/ld+json">
{
  "@context": "https://schema.org/",
  "@type": "WebSite",
  "name": "Royale Touche",
  "url": "https://www.royaletouche.com/",
  "potentialAction": {
    "@type": "SearchAction",
    "target": "https://www.royaletouche.com/search?term={search_term_string}",
    "query-input": "required name=search_term_string"
  }
}
</script>

   </head>

<body class="product_page">
     <div class="page-wrapper">

      <!-- preloader -->
      <div id="preloader">
         <div class="loader-block">
         <!-- <img src="images/logo.png" class="logo-loader"> -->
         <div class="lds-ring">
            <div></div>
            <div></div>
            <div></div>
            <div></div>
         </div>
        </div>

      </div>

         <main>
             @include('frontend.layouts.header')
             @include('frontend.layouts.login-register')
            <!-- <div id="main-container" class=" @if(Request::segment(1) =='products' || Request::segment(1) =='product') {{'smoothScroll'}} @endif">                 -->
            <div id="main-container" class="smoothScroll">

            @yield("content")
            @include('frontend.layouts.footer')
            </div>


        </main>
    </div>
      <!-- <script src="{{asset('frontend/js/jquery.min.js')}}"></script>  -->

      <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-migrate/3.2.0/jquery-migrate.min.js"></script>

       <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/1.20.3/TweenMax.min.js"></script>
       <script src="{{asset('frontend/js/TimelineMax.min.js')}}"></script>

      <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js" integrity="sha256-pTxD+DSzIwmwhOqTFN+DB+nHjO4iAsbgfyFq5K5bcE0=" crossorigin="anonymous"></script>

      <script src="{{asset('frontend/js/bootstrap.min.js')}}"></script>
      <script type="text/javascript" src="https://unpkg.com/aos@2.3.0/dist/aos.js"></script>
      <!-- fancybox -->
      <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.js"></script>
      <script src="{{asset('frontend/js/customscrollplugin.js')}}"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/ScrollMagic/2.0.7/ScrollMagic.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/ScrollMagic/2.0.7/plugins/animation.gsap.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/ScrollMagic/2.0.7/plugins/debug.addIndicators.min.js"></script>

      <script  src="{{asset('vendor/sweetalert/sweetalert.all.js')}}"></script>


      <script src="{{asset('frontend/js/customgsap.js')}}"></script>
      <script src="{{asset('frontend/js/main.js')}}"></script>
      <script src="{{asset('frontend/js/jquery.exitintent.js')}}"></script>
       <!-- <script type="text/javascript" src="{{asset('frontend/js/promise.min.js')}}"></script>
      <script type="text/javascript" src="{{asset('frontend/js/brushstroke.js')}}"></script>
      <script type="text/javascript" src="{{asset('frontend/js/demo.js')}}"></script>
 -->
      <script type="text/javascript">
         $(document).ready(function(){
          $('#search').prop('disabled', true);
            $('.search-btn').click(function(e) {
              if($("#term").val().length > 0 ) {
                 $('#search').prop('disabled', false);
                 $("#searchform").submit();
              } else {
                  $('#search').prop('disabled', true);
                  e.preventDefault();
              }
            });


          $('#term').keypress(function (e) {
             var key = e.which;
             if(key == 13)  // the enter key code
              {
                $("#searchform").submit();
                return false;
              }
            });

        //     $.exitIntent('enable');
        //     $(document).bind('exitintent', function() {

        //     $.ajax({
        //         type: "POST",
        //         url: '/wishlistmail',
        //         success: function(result) {
        //             if(result == 1)
        //             {


        //             }
        //             else
        //             {

        //             }

        //         },
        //         error: function() {

        //         }
        //     });
        // });




           AOS.init();

          $('.sldm-toggle, .sldm-overlay').on("click", function (e) {
        e.preventDefault();
        $('.sldm').toggleClass('sldm-active');
        $('.sldm-bg-image').toggleClass('active');
    });


          //   $('.home-carousel').owlCarousel({
          //       loop:true,
          //       margin:10,
          //       dots:false,
          //       animateIn: 'fadeIn',
          //       animateOut: 'fadeOut',
          //       nav:true,
          //       mouseDrag:false,
          //       touchDrag:false,
          //       smartSpeed:5500,
          //       // autoplaySpeed:5500,
          //       mouseDrag:false,
          //       // fluidSpeed:5500,
          //       autoplay:true,

          //       responsive:{
          //           0:{
          //               items:1
          //           },
          //           600:{
          //               items:1
          //           },
          //           1000:{
          //               items:1
          //           }
          //       }
          //   });

            var owl1 = $('.product-carousel');
             owl1 .owlCarousel({
                loop:true,
                margin:10,
                // dots:false,
                animateIn: 'fadeIn',
                animateOut: 'fadeOut',
                nav:true,
                mouseDrag:false,
                touchDrag:false,
                smartSpeed:30000,
               autoplayHoverPause:true,
                // autoplaySpeed:30000,
                mouseDrag:false,
                // autoplayTimeout: 30000,
                // fluidSpeed:5500,


               dotsData: true,
                dots: true,

                autoplay:true,

                responsive:{
                    0:{
                        items:1
                    },
                    600:{
                        items:1
                    },
                    1000:{
                        items:1
                    }

                }
            });

            $('.product-carousel .owl-dot').click(function () {
            owl1.trigger('to.owl.carousel', [$(this).index()],200);

            });




         });
      </script>
      @yield('scripts')
</body>

</html>
