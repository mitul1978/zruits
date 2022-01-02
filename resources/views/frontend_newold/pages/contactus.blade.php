@extends('layouts.app')
@section('content')
@include('layouts.svg-icons')
@section('css')
   <link rel="stylesheet" href="{{asset('frontend/css/custom1.css')}}" />
   <style type="text/css">
      footer{
         bottom: 0;
         position: fixed !important;
      }
      .container{margin-top: 5% !important;}
   </style>
@endsection
          <div class="row">
               <div class="container">
                  <div class="col-md-10 col-md-offset-1 static-block">
                     <div class="static-title">
                        <h3>Contact Us</h3>
                     </div>

                     <div class="static-details">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3671.474838787817!2d72.51156256496812!3d23.043046934942762!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x395e9b4ef2f8c771%3A0xd7483ca4ac845d6!2sRoyal%20Touch%20International%20LLP.!5e0!3m2!1sen!2sin!4v1587909750685!5m2!1sen!2sin" width="100%" height="350" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>                        
                     </div>

                     <div class="static-details address-block">
                        <div class="col-md-12 address">
                           <h4>1. Head Office</h4>
                           <h4 class="address-title">Royale Touche Group Laminate Division (Olympic Decor LLP)</h4>
                           <p><i class="fa fa-map-marker" aria-hidden="true"></i> 106, Patel Avenue, 1st Floor, Near Gurudwara, S.G. Highway, Ahmedabad – 380054, Gujarat, India.</p>
                           <p><a href="tel:7940017979"><i class="fa fa-phone" aria-hidden="true"></i> +91 79 4001 7979</a></p>
                           <p><a href="tel:18001034357"><i class="fa fa-phone" aria-hidden="true"></i> 1800 103 4357</a></p>
                           <a href="mailto:sales@royaletouche.com"><i class="fa fa-envelope" aria-hidden="true"></i> sales@royaletouche.com</a>
                        </div>

                        <div class="col-md-12 address">
                           <h4>2. Factory </h4>
                           <h4 class="address-title">Royale Touche Group Laminate Division</h4>
                           <p><i class="fa fa-map-marker" aria-hidden="true"></i> Block No. 49-50, Village Karoli, Taluka Kalol, Dist.: Gandhinagar - 382721, Gujarat, India.</p>
                           <p><a href="tel:2764281503"><i class="fa fa-phone" aria-hidden="true"></i> +91 2764 281503 </a></p>
                           <p><a href="tel:2764281504"><i class="fa fa-phone" aria-hidden="true"></i> +91 2764 281504</a></p>
                           <a href="https://www.royaletouche.com" target="_blank"><i class="fa fa-globe" aria-hidden="true"></i> www.royaletouche.com</a>
                        </div>

                        <div class="col-md-12 address">
                           <h4>3. International Inquiries</h4>
                           <h4 class="address-title">Royale Touche Group Laminate Division</h4>
                           <p><a href="tel:18001034357"><i class="fa fa-phone" aria-hidden="true"></i> 1800 103 4357</a></p>
                           <p><a href="tel:9825230742"><i class="fa fa-phone" aria-hidden="true"></i> +91 98252 30742</a></p>
                           <p><a href="tel:7940017979"><i class="fa fa-phone" aria-hidden="true"></i> +91 79 4001 7979</a></p>
                           <a href="mailto:sales@royaletouche.com"><i class="fa fa-envelope" aria-hidden="true"></i> sales@royaletouche.com</a>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
@endsection            
