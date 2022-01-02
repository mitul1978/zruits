@extends('layouts.app')
@section('content')
@include('layouts.svg-icons')
@section('css')
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.0/animate.min.css" />
   <link rel="stylesheet" href="{{asset('frontend/css/aboutus.css')}}" />
   <style type="text/css">
       .gm-style-iw-d p{color: #000 !important;} 
              .gm-style-iw-d p a{color: #000 !important;}
              p:hover > a{color:#00626E !important; }
              a{color: #fff;}
      footer{
         bottom: 0;
         position: fixed !important;
      }
      .container{margin-top: 5% !important;}
   </style>
@endsection
          <section id="storeLocator" class="store-locator">

            <!--   <canvas height="750" id="one" width="1200" hidpi="off" class="relative" style="-webkit-user-drag: none; user-select: none; -webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></canvas>


                <svg viewBox="0 0 1200 750" class="shape-back-store"><clipPath id="one"><path d="M-600,-375c504.28506,50 1008.57012,100 1200,150c191.42988,50 70.0046,100 33.18006,150c-36.82453,50 10.95169,100 29.25952,150c18.30782,50 7.14725,100 29.76596,150c22.61871,50 79.0167,100 103.54446,150c24.52776,50 17.18528,100 4.60952,150c-12.57575,50 -30.38478,100 -66.98189,150c-36.59711,50 -91.9823,100 -66.76034,150c25.22196,50 131.05106,100 -66.61729,150c-197.66836,50 -698.83418,100 -1200,150" fill="#000"></path></clipPath></svg> -->

              <div class="custom-container">
            
                  <div class="shape">
                    
                  </div>

                  <!--Store locator starts here-->

                  <div class="col-md-12 store-locator-outer">                  

                    <div class="col-md-6 store-locator-details">

                      <h1 class="title-int-pages">Reach Us </h1>

                      <div class="store-locator-header">
                        <form class="search-form">
                           <div class="input-group">                                
                                <input type="hidden" name="search_param" value="all" id="search_param">
                                 <span class="input-group-btn">
                                    <button class="btn btn-default" type="button"><i class="fa fa-search" aria-hidden="true"></i></button>
                                </span>         
                                <input type="text" class="form-control" name="x" placeholder="Find a store">
                                <div class="input-group-btn search-panel">
                                    <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                                      <span id="search_concept"><i class="fa fa-filter" aria-hidden="true"></i></span> <span class="caret"></span>
                                    </button>
                                    <ul class="dropdown-menu" role="menu">
                                      <li><a href="#contains">Contains</a></li>
                                      <li><a href="#its_equal">It's equal</a></li>
                                      <li><a href="#greather_than">Greather than ></a></li>
                                      <li><a href="#less_than">Less than < </a></li>
                                      <li class="divider"></li>
                                      <li><a href="#all">Anything</a></li>
                                    </ul>
                                </div>
                            </div>
                        </form>
                      </div>
                      <div class="store-listing">
                        <!-- <h4>Our Locations</h4> -->
                        <ul>
                          <li>
                            <a href="" class="flex-info-store">
                            <div class="info">
                              <strong>DESIGN HQ – ROYALE TOUCHE Baba Plywood & Sunmica House</strong>                          
                              <p>
                                D-10 Madhuvihar, Opp.Sector-5, Dwarka ,New Delhi-110075 Mr. Vishal Rana, Mob: +91 9560666675
                              </p>
                            </div>
                            <div class="show-map-icon">
                              <i class="fa fa-info-circle" aria-hidden="true"></i>
                            </div> 
                            </a>                          
                          </li>

                          <li>
                            <a href="" class="flex-info-store">
                            <div class="info">
                              <strong>DESIGN HQ – ROYALE TOUCHE Baba Plywood & Sunmica House</strong>                          
                              <p>
                                D-10 Madhuvihar, Opp.Sector-5, Dwarka ,New Delhi-110075 Mr. Vishal Rana, Mob: +91 9560666675
                              </p>
                            </div>
                            <div class="show-map-icon">
                              <i class="fa fa-info-circle" aria-hidden="true"></i>
                            </div> 
                            </a>                          
                          </li>

                          <li>
                            <a href="" class="flex-info-store">
                            <div class="info">
                              <strong>DESIGN HQ – ROYALE TOUCHE Baba Plywood & Sunmica House</strong>                          
                              <p>
                                D-10 Madhuvihar, Opp.Sector-5, Dwarka ,New Delhi-110075 Mr. Vishal Rana, Mob: +91 9560666675
                              </p>
                            </div>
                            <div class="show-map-icon">
                              <i class="fa fa-info-circle" aria-hidden="true"></i>
                            </div> 
                            </a>                          
                          </li>

                          <li>
                            <a href="" class="flex-info-store">
                            <div class="info">
                              <strong>DESIGN HQ – ROYALE TOUCHE Baba Plywood & Sunmica House</strong>                          
                              <p>
                                D-10 Madhuvihar, Opp.Sector-5, Dwarka ,New Delhi-110075 Mr. Vishal Rana, Mob: +91 9560666675
                              </p>
                            </div>
                            <div class="show-map-icon">
                              <i class="fa fa-info-circle" aria-hidden="true"></i>
                            </div> 
                            </a>                          
                          </li>


                          <li>
                            <a href="" class="flex-info-store">
                            <div class="info">
                              <strong>DESIGN HQ – ROYALE TOUCHE Baba Plywood & Sunmica House</strong>                          
                              <p>
                                D-10 Madhuvihar, Opp.Sector-5, Dwarka ,New Delhi-110075 Mr. Vishal Rana, Mob: +91 9560666675
                              </p>
                            </div>
                            <div class="show-map-icon">
                              <i class="fa fa-info-circle" aria-hidden="true"></i>
                            </div> 
                            </a>                          
                          </li>
                          <li>
                            <a href="" class="flex-info-store">
                            <div class="info">
                              <strong>DESIGN HQ – ROYALE TOUCHE Baba Plywood & Sunmica House</strong>                          
                              <p>
                                D-10 Madhuvihar, Opp.Sector-5, Dwarka ,New Delhi-110075 Mr. Vishal Rana, Mob: +91 9560666675
                              </p>
                            </div>
                            <div class="show-map-icon">
                              <i class="fa fa-info-circle" aria-hidden="true"></i>
                            </div> 
                            </a>                          
                          </li>
                          <li>
                            <a href="" class="flex-info-store">
                            <div class="info">
                              <strong>DESIGN HQ – ROYALE TOUCHE Baba Plywood & Sunmica House</strong>                          
                              <p>
                                D-10 Madhuvihar, Opp.Sector-5, Dwarka ,New Delhi-110075 Mr. Vishal Rana, Mob: +91 9560666675
                              </p>
                            </div>
                            <div class="show-map-icon">
                              <i class="fa fa-info-circle" aria-hidden="true"></i>
                            </div> 
                            </a>                          
                          </li>

                      
                        
                        </ul>
                      </div>
                    </div>

                      <div class="col-md-6">
                      <div class="store-map">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3821.5793543233285!2d74.23591931536538!3d16.697920126716337!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3bc10014e3f15a1b%3A0x2bc9604d4e1e119e!2sDesign%20HQ%20-%20Royale%20Touche!5e0!3m2!1sen!2sin!4v1583752384611!5m2!1sen!2sin" width="100%" frameborder="0" style="border:0;" allowfullscreen=""></iframe> 
                      </div>
                      </div>

                 
                  </div>
                  <!--Store locator ends here-->
                  
               </div>
            </section>
@endsection            
@section('scripts')

     
     
      <script type="text/javascript">
         
      </script>
@endsection