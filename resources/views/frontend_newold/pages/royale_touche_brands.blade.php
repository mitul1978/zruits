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
                        <h3>Royale Touche Brands</h3>
                     </div>

                     <div class="static-details">
                        <h4>A 45 year journey from the kitchen cabinet to the living room floor.</h4>
                        

                        <div class="carousel-wrap">
                          <div class="owl-carousel">
                            <div class="item"><img src="{{asset('frontend/brands/Pavimento-logo.jpg')}}"></div>
                            <div class="item"><img src="{{asset('frontend/brands/ROYAL_BOND_ISI_LOGOo.jpg')}}"></div>
                            <div class="item"><img src="{{asset('frontend/brands/CRYSTAL_LOGO.jpg')}}"></div>
                            <div class="item"><img src="{{asset('frontend/brands/decor_luxury_furniture1.jpg')}}"></div>
                            <div class="item"><img src="{{asset('frontend/brands/HD_PRINTSLOGO.jpg')}}"></div>
                            <div class="item"><img src="{{asset('frontend/brands/I_MARKS_LOGO.jpg')}}"></div>
                            <div class="item"><img src="{{asset('frontend/brands/NO_MARKS_LOGO.jpg')}}"></div>
                            <div class="item"><img src="{{asset('frontend/brands/vitrified_tiles1.jpg')}}"></div>
                            <div class="item"><img src="{{asset('frontend/brands/luxury_laminates1.jpg')}}"></div>
                          </div>
                        </div>

                     </div>
                  </div>
               </div>
            </div>
@endsection            
