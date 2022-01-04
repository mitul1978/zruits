<!DOCTYPE html>
<html lang="en">

<!-- molla/index-2.html  22 Nov 2019 09:55:32 GMT -->
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Zehna</title>
    <meta name="keywords" content="Zehna">
    <meta name="description" content="Zehna">
    <meta name="author" content="Zruits">
    <!-- Favicon -->
    <link rel="apple-touch-icon" sizes="180x180" href="{{URL::asset('assets/images/icons/apple-touch-icon.png')}}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{URL::asset('assets/images/icons/favicon-32x32.png')}}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{URL::asset('assets/images/icons/favicon-16x16.png')}}">
    <link rel="manifest" href="{{URL::asset('assets/images/icons/site.html')}}">
    <link rel="mask-icon" href="{{URL::asset('assets/images/icons/safari-pinned-tab.svg')}}" color="#666666">
    <link rel="shortcut icon" href="{{URL::asset('assets/images/icons/favicon.ico')}}">
    <meta name="apple-mobile-web-app-title" content="Zehna">
    <meta name="application-name" content="Zehna">
    <meta name="msapplication-TileColor" content="#cc9966">
    <meta name="msapplication-config" content="{{URL::asset('assets/images/icons/browserconfig.xml')}}">
    <meta name="theme-color" content="#ffffff">
    <!-- Plugins CSS File -->
    <link rel="stylesheet" href="{{URL::asset('assets/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{URL::asset('assets/css/plugins/owl-carousel/owl.carousel.css')}}">
    <link rel="stylesheet" href="{{URL::asset('assets/css/plugins/magnific-popup/magnific-popup.css')}}">
    <!-- Main CSS File -->
    <link rel="stylesheet" href="{{URL::asset('assets/css/style.css')}}">
    <link rel="stylesheet" href="{{URL::asset('assets/css/demos/demo-2.css')}}">

    @livewireStyles
</head>

<body>
    
    <!-- Header File -->
    @include('layouts.header')

    @yield('content')

    <!-- Footer -->
   
       @include('layouts.footer2')
    
   

    <!-- Plugins JS File -->
    <script src="{{URL::asset('assets/js/jquery.min.js')}}"></script>
    <script src="{{URL::asset('assets/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{URL::asset('assets/js/jquery.hoverIntent.min.js')}}"></script>
    <script src="{{URL::asset('assets/js/jquery.waypoints.min.js')}}"></script>
    <script src="{{URL::asset('assets/js/superfish.min.js')}}"></script>
    <script src="{{URL::asset('assets/js/owl.carousel.min.js')}}"></script>
    <script src="{{URL::asset('assets/js/jquery.magnific-popup.min.js')}}"></script>
    <!-- Main JS File -->
    <script src="{{URL::asset('assets/js/main.js')}}"></script>
    <script src="{{URL::asset('assets/js/demos/demo-2.js')}}"></script>
    @livewireScripts

</body>

</html>