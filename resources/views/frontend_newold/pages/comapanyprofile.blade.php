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
                        <h3>Company Profile</h3>
                     </div>

                     <div class="static-details">
                        <p>Royale Touche luxury laminates offers some of India’s finest high pressure and compact laminates. And is a pioneer of luxury laminates in the country. It was started in 1978 in Wadhwan city, Gujarat by 4 brothers Ashwin Patel, Arvind Patel, Dinesh Patel, Jitendra Patel. It was founded on the idea that a laminate is much more than an invisible background. It is a resilient, flexible product that has unlimited potential in surface décor. They not only reinvented the way laminates looked, but also the way people look at laminates.</p>

                        <p>They gave the laminate a complete makeover with finishes and colours like never before. Suddenly the laminate was no longer just an economical, hard-wearing countertop. The brothers created laminates that had texture, unparalleled designs and most importantly; character.</p>

                        <p>They featured rich, luxurious designs that added aesthetic value to interiors. They weren’t just products made for architects, interior designers and end-users, but made in collaboration with them. This helped the brothers to create application-based collections that made it easy to match a Royale Touche laminate to the theme or colour scheme of one’s room.</p>

                        <p>Each Royale Touché laminate is designed to deliver exceptional style and quality. Our laminates are manufactured at world-class facilities equipped with imported machinery form Spain and Italy. Products are created with imported design papers made from highly stable and resistant pigments which guarantee longevity and ensure that the product looks great after years of wear and tear. Each factory maintains a stock of 1500 SKU in order to maintain our 48 hour delivery promise.</p>

                        <p>At Royale Touche our endeavour is to bring newness and positive change to everyday life. One way of doing this is by introducing a new product every 4 days. Our high pressure laminates are available in over 600 designs, 40 realistic textures and 3 sizes (8×4, 10×4.25, 12×6).</p>

                        <p>These products are conducive to both vertical and horizontal applications including Furniture, Laboratories, Medical instrumentation, Bathroom cubicles, Exterior Façades & Outdoor furniture. They also perform exceptionally well in high traffic areas such as hospitality, office spaces, healthcare, retail and commercial spaces.</p>
                     </div>
                  </div>
               </div>
            </div>
@endsection            
