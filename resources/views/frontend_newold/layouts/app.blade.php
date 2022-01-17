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
      <meta property="og:site_name" content="Zehna" />
      <link rel="icon" href="{{URL::asset('frontend/images/Royale_Touche_Laminate_Favicon.png')}}" sizes="32x32" />
      <link rel="alternate" href="{{url('/')}}" hreflang="en-us"/>
      <link rel="stylesheet" href="{{asset('frontend/css/bootstrap2.min.css')}}" />
      <link rel="stylesheet" type="text/css" href="{{asset('frontend/css/normalize.min.css')}}">
      @if(Request::is('/quality/*'))
        <link rel="stylesheet" type="text/css" href="{{URL::asset('frontend/css/demo.css')}}">
      @endif
      @if(Request::is('products/*' || 'laminates/*'))
        <link rel="stylesheet" href="{{URL::asset('frontend/css/style.css')}}" />
        <link rel="stylesheet" href="{{URL::asset('frontend/css/checkout-popup.css')}}" />
        <link rel="stylesheet" href="{{URL::asset('frontend/css/custom.css')}}" />
        <link rel="stylesheet" href="{{URL::asset('frontend/css/responsive.css')}}" />
        <link rel="stylesheet" type="text/css" href="{{asset('frontend/css/lightgallery.min.css')}}">
      @endif
      <link rel="stylesheet" href="{{asset('frontend/css/owl.carousel.min.css')}}" crossorigin="anonymous" />
      <link rel="stylesheet" href="{{asset('frontend/css/owl.theme.default.min.css')}}" />
      <link rel="stylesheet" href="{{asset('frontend/css/animate.min.css')}}" />
      <link rel="stylesheet" href="{{asset('frontend/css/mycss.css')}}" />
      <link rel="stylesheet" type="text/css" href="{{asset('frontend/css/aos.css')}}">
      <link rel="stylesheet" href="{{asset('frontend/css/jquery.fancybox.min.css')}}" type="text/css" media="screen" />
      <link href="{{asset('frontend/css/font-awesome.min.css')}}" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
      <script src="{{asset('frontend/js/jquery.min.js')}}"></script>
      <script src="{{asset('frontend/js/ScrollMagic.js')}}"></script>
      <script type="text/javascript" src="{{URL::asset('frontend/js/lazyload.js')}}"></script>
        <!--HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="//oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="//oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
      @yield('css')
      {{-- <script type="application/ld+json">
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
        </script> --}}
        {{-- <script type="application/ld+json">
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
        </script> --}}

      <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" rel="stylesheet">
      <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" rel="stylesheet">
      @livewireStyles
    </head>

    <body @if(Request::is('/'))class="homepage" @elseif(Request::is('collection/*'))class="reach-us_page" @elseif(Request::is('/products/*')) class="productlisting_page" @else class="{{Request::segment(1)}}_page"  @endif>
    
     <p id="demo" style="display:none;" onLoad="">Your coordinates:Latitude: <br>Longitude: </p>


     <div class="page-wrapper">

          @include('sweetalert::alert')

          <!-- preloader -->
          {{-- <div id="preloader">
            <div class="loader-block">
            <!-- <img src="images/logo.png" class="logo-loader"> -->
            <div class="lds-ring">
                <div></div>
                <div></div>
                <div></div>
                <div></div>
            </div>
            </div>

          </div> --}}

         <main>
            @include('frontend.layouts.header')
            @include('frontend.layouts.login-register')
            @if(Request::segment(1) =='products' || Request::segment(1) =='search')
              @include('frontend.layouts.sidebar')
            @endif

            <div id="main-container" class=" @if(Request::segment(1) =='products') {{'smoothScroll'}} @endif">
              @yield("content")
              @include('frontend.layouts.footer')
            </div>
        </main>
     </div>
        <!-- <script src="{{asset('frontend/js/jquery.min.js')}}"></script>  -->
        <!-- Global site tag (gtag.js) - Google Analytics -->
        {{-- <script async src="//www.googletagmanager.com/gtag/js?id=UA-44605757-3"></script>
        <script>
          window.dataLayer = window.dataLayer || [];
          function gtag(){dataLayer.push(arguments);}
          gtag('js', new Date());

          gtag('config', 'UA-44605757-3');
        </script> --}}
        <!-- Google Tag Manager -->
        {{-- <script>
        (function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
        new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
        j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
        '//www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
        })(window,document,'script','dataLayer','GTM-5GDH8T6');</script> --}}
        <!-- End Google Tag Manager -->
          <!-- Google Tag Manager (noscript) -->
        {{-- <noscript><iframe src="//www.googletagmanager.com/ns.html?id=GTM-5GDH8T6"
        height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript> --}}
            <!-- End Google Tag Manager (noscript) -->

      <script async type="text/javascript" src="{{asset('frontend/js/jquery-migrate.min.js')}}"></script>
      @if(Request::segment(1) == 'products' || Request::segment(1) == 'search')
        <script type="text/javascript" src="{{asset('frontend/js/filter.js')}}"></script>
      @endif
      <script  src="{{asset('vendor/sweetalert/sweetalert.all.js')}}"></script>
      <script  src="{{asset('frontend/js/TweenMax2.min.js')}}"></script>
      <script src="{{asset('frontend/js/TimelineMax.min.js')}}"></script>
      <script async type="text/javascript" src="{{asset('frontend/js/lightgallery-all.min.js')}}"></script>
      <script src="{{asset('frontend/js/owl.carousel.min.js')}}" ></script>
      <script async src="{{asset('frontend/js/bootstrap2.min.js')}}"></script>
      <script type="text/javascript" src="{{asset('frontend/js/aos.js')}}"></script>
      <script async type="text/javascript" src="{{asset('frontend/js/jquery.fancybox.min.js')}}"></script>
      <script async type="text/javascript" src="{{asset('frontend/js/picturefill.min.js')}}"></script>
      <script async type="text/javascript" src="{{asset('frontend/js/jquery.mousewheel.min.js')}}"></script>
      <script src="{{asset('frontend/js/customscrollplugin.js')}}"></script>
      <script  src="{{asset('frontend/js/ScrollMagic.min.js')}}"></script>
      <script src="{{asset('frontend/js/animation.gsap.js')}}"></script>
      <script src="{{asset('frontend/js/debug.addIndicators.min.js')}}"></script>
      <script src="{{asset('frontend/js/customgsap.js')}}"></script>
      <script src="{{asset('frontend/js/jquery.form-validator.min.js')}}"></script>
      <script src="{{URL::asset('frontend/js/jquery.exitintent.js')}}"></script>
      <script src="{{URL::asset('frontend/js/main.js')}}"></script>
      <script type="text/javascript" src="{{asset('frontend/js/slick.min.js')}}"></script>
      <script type="text/javascript" src="{{asset('frontend/js/lightgallery-all2.min.js')}}"></script>
        <!-- <script type="text/javascript" src="{{asset('frontend/js/promise.min.js')}}"></script>
        <script type="text/javascript" src="{{asset('frontend/js/brushstroke.js')}}"></script>
        <script type="text/javascript" src="{{asset('frontend/js/demo.js')}}"></script>
        -->
      <script type="text/javascript">
        $(document).ready(function()
        {
                  // $(".sidebar-right-filters-item").click(function(){
                  //   $(".sidebar").addClass("open");
                  // });
                  // $(".sidebar-right-valid").click(function(){
                  //   $(".sidebar").removeClass("open");
                  // });
            $.validate({
              form : '#user-info-form'
            });

            setTimeout(function(){
              $("div.alert").remove();
            }, 5000 ); // 5 secs

            $('.sldm-toggle, .sldm-overlay').on("click", function (e) {
                  e.preventDefault();
                  $('.sldm').toggleClass('sldm-active');
                  $('.sldm-bg-image').toggleClass('active');
              });
        });
      </script>
      @yield('scripts')
      @livewireScripts
    </body>
</html>