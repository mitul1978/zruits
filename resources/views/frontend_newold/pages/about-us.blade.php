@extends('frontend.layouts.app')
@section('content')
@include('frontend.layouts.svg-icons')
@section('css')
   <link rel="stylesheet" href="{{asset('frontend/css/custom1.css')}}" />
   <link rel="stylesheet" href="{{asset('frontend/css/aboutus.css')}}" />
   <style type="text/css">
      footer{
         bottom: 0;
         /*position: fixed !important;*/
      }
      section#about-banner {
          height: 100vh;
      }
     .ba-slider{

     }

   </style>
@endsection



         <section id="about-banner">
            <div class="aboutus-banner-block">
               <!-- <h2 class="about-head heading-catalog typography-headline-super transition-1 large-10 large-centered small-12 gradient-h2">The home of <br> Luxury Laminates </h2> -->
               <h1 class="about-head heading-catalog typography-headline-super transition-1 large-10 large-centered small-12 gradient-h2">The home of <br> Luxury Laminates </h1>

               <div class="ba-slider about-desktop">
                 <img src="{{asset('frontend/images/about/banner/2.jpg')}}" class="hidden-xs" alt="">
                 <img src="{{asset('frontend/images/about/banner/m2.jpg')}}" class="visible-xs" alt="">
                 <div class="resize">
                   <img src="{{asset('frontend/images/about/banner/1.jpg')}}"  class="hidden-xs" alt="">
                   <img src="{{asset('frontend/images/about/banner/m1.jpg')}}" class="visible-xs" alt="">
                 </div>
                 <span class="handle"></span>
               </div>

               <div class="about-mobile">
                 <img src="{{asset('frontend/images/abt-factory.jpg')}}">
               </div>
            </div>


                 <!--
                  <div class="aboutus-banner-text">
                     <h3>About Us</h3>
                     <h1 class="main-text">The home <br> of <span class="highlight-text"> Luxury Laminates</span></h1>
                  </div>    -->


         </section>


         <section class="story-section">
            <!--    <div class="shape-container" data-shape-fill="sct-color-1" data-shape-style="opaque_waves_2" data-shape-position="bottom" style="height: 100px;"> <svg class="shape-item" fill="" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1000 300" preserveAspectRatio="none">
                   <path d="M 1000 299 l 2 -279 c -155 -36 -310 135 -415 164 c -102.64 28.35 -149 -32 -232 -31 c -80 1 -142 53 -229 80 c -65.54 20.34 -101 15 -126 11.61 v 54.39 z"></path>
                   </svg>
               </div>  -->
               <div class="container">
               <div class="row">
                  <div class="col-md-12 aboutus-ourstory-block">
                     <div class="aboutus-ourstory-text">
                        <h2 class="heading-about story-text">Our Story</h2>
                        <ul class="mainul">
                           <li class="story-item">The year was 1978 when 5 brothers Ashwin Patel, Arvind Patel, Dinesh Patel, Bharat Patel and Jitendra Patel from Gujarat, decided to change the way India looked at Laminates. They wanted to change the country's perception of laminates being just an economical, hard-wearing background.</li>
                           <li class="story-item">The dream was turned into reality when the Royale Touche's first-ever manufacturing unit was set up in Wadhwan city.</li>
                           <li class="story-item">It was a start-up built on two simple rules:
                              <ul class="subul">
                                 <li>1. Ever-changing designs and never-changing quality</li>
                                 <li>2. A royale customer is to be treated like Royalty</li>
                              </ul>
                           </li>
                           <li class="story-item">Over time, Royale Touche has grown to be India's most premium laminate brand with a vast variety of designs and the promise of impeccable quality.</li>
                        </ul>
                     </div>
                  </div>
               </div>
            </div>
         </section>
            <section class="cmp-profile">
            <div class="container">
               <div class="row">
                  <div class="col-md-12 aboutus-company-block">
                     <div class="aboutus-company-text">
                        <div class="col-md-4">
                           <div class="profile-block">
                                 <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 751.3 771.74" class="about-blob-3 absolute z-0">
                                    <path d="M208.81,0C153.4,0,100.24,15.82,60,68.8c-70.14,92.4-87.11,186.66-5.85,297.86s86,246.53,103.61,292.84c13.79,36.12,68.9,112.24,130.85,112.24,17.36,0,35.25-6,52.94-20.49,48.6-39.89,92.83-53.49,131.64-53.49,25.68,0,49,6,69.61,14.18,15.11,6,34.37,9.66,55,9.66,50.12,0,108.68-21.37,137.52-82.05,36.36-68.47,3.89-117.4-32.18-201.36-44.26-105.66-14.13-206-14.13-206S726.36,97.7,619,39c-34.63-19.78-69.9-25.29-105.19-25.29-22.23,0-44.47,2.18-66.57,4.37s-44.06,4.38-65.72,4.38c-16.76,0-33.35-1.31-49.68-4.94C292.5,8.76,250,0,208.81,0" fill="#1b5665"></path>
                                 </svg>

                                 <img src="{{asset('frontend/abt-coffee.png')}}" class="img-cmp-profile">
                           </div>

                        </div>
                        <div class="col-md-8 aboutus-company-righttext">
                           <h2 class="heading-about profile-text">Company Profile</h2>
                           <ul class="mainul">
                              <li class="profile-item">Olympic Decor LLP offers India's most premium and luxury laminates, Royale Touche was built with the idea that a laminate is not just an invisible background. With this ideology, we have aimed to reinvent the way people looked at laminates.</li>
                              <li class="profile-item">Royale Touche products are manufactured at top-notch facilities with modern equipment imported from Spain and Italy.
                              </li>
                              <li class="profile-item">We use imported papers with highly stable and resistant pigments to guarantee the longevity of our products. We also have a 48-hour delivery promise.</li>
                              <li class="profile-item">600+ Designs, 40+ Realistic Textures. 3 Sizes. And 1 New Design every 4 Days.</li>
                           </ul>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </section>




            <!-- new timeline -->

   <div class="our-story-content overflow-hidden relative z-2">


   <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 393.65 969.57" class="timeline-blob absolute left-0">
      <path d="M0,16.68C44.74-3.58,123.41-20.57,190.29,61.83c91,108.25,71.72,261.94,126.37,378.36s115.76,256.24,45.11,384S199.26,1009,54.22,940A391.7,391.7,0,0,0,.13,919.05Z" fill="#8fb7c1"></path>
   </svg>
   <div class="timeline-wrap t-container relative z-1">
      <div class="timeline relative">
         <div class="timeline-line absolute z-2" >

         </div>
         <div class="timeline-item flex flex-column flex-row-ns items-center tl relative">


            <span class="timeline-item-dot absolute bg-color-orange-dark dib trans-50-50" style="align-self: baseline;"></span>
            <div class="timeline-item-text flex flex-column relative z-2">
               <h3 class="timeline-item-heading hwt-artz lh-solid ma0 relative color-orange-dark">1978</h3>
               <div class="timeline-item-copy f3 lh-copy">
                  <p>First Laminate Factory was established at Surendranagar.</p>
               </div>
            </div>
            <div class="timeline-item-img-wrap flex-shrink-0 self-end relative z-2 z-0-ns">
               <div class="gooey-image">
                  <div class="gooey-figure-wrap relative h-100 w-100">
                     <figure class="gooey-figure flex ma0 relative h-100 w-100 overflow-hidden gooey-loaded">
                        <img src="{{asset('frontend/images/about/timeline/m1978.jpg')}}" alt="" class="gooey-img h-100 w-100" style="opacity: 1;"><!---->

                     </figure>
                  </div>
               </div>
            </div>
         </div>
         <div class="timeline-item flex flex-column flex-row-ns items-center tl relative">
            <!----><!----><span class="timeline-item-dot absolute bg-color-orange-dark dib trans-50-50"></span>
            <div class="timeline-item-text flex flex-column relative z-2">
               <h3 class="timeline-item-heading hwt-artz lh-solid ma0 relative color-orange-dark">1999</h3>
               <div class="timeline-item-copy f3 lh-copy">
                  <p>Second Laminate Factory was established in Ahmedabad.</p>
               </div>
            </div>
            <div class="timeline-item-img-wrap flex-shrink-0 self-end relative z-2 z-0-ns">
               <div class="gooey-image">
                  <div class="gooey-figure-wrap relative h-100 w-100">
                     <figure class="gooey-figure flex ma0 relative h-100 w-100 overflow-hidden gooey-loaded">
                        <img src="{{asset('frontend/images/about/timeline/m1999.png')}}" alt="" class="gooey-img h-100 w-100"><!---->
                      <!--   <canvas crossorigin="anonymous" class="absolute top-0 left-0 w-100 h-100" style="opacity: 1;"></canvas> -->
                     </figure>
                  </div>
               </div>
            </div>
         </div>
         <div class="timeline-item flex flex-column flex-row-ns items-center tl relative">
            <!----><!----><span class="timeline-item-dot absolute bg-color-orange-dark dib trans-50-50"></span>
            <div class="timeline-item-text flex flex-column relative z-2">
               <h3 class="timeline-item-heading hwt-artz lh-solid ma0 relative color-orange-dark">2002</h3>
               <div class="timeline-item-copy f3 lh-copy">
                  <p>Modular Furniture Factory was established in Rajkot.</p>
               </div>
            </div>
            <div class="timeline-item-img-wrap flex-shrink-0 self-end relative z-2 z-0-ns">
               <div class="gooey-image">
                  <div class="gooey-figure-wrap relative h-100 w-100">
                     <figure class="gooey-figure flex ma0 relative h-100 w-100 overflow-hidden gooey-loaded">
                        <img src="{{asset('frontend/images/about/timeline/m2002.png')}}" alt="" class="gooey-img h-100 w-100" style="opacity: 1;"><!---->
                     <!--    <canvas crossorigin="anonymous" class="absolute top-0 left-0 w-100 h-100" style="opacity: 1; width: 400px; height: 526.656px;" width="400" height="526"></canvas> -->
                     </figure>
                  </div>
               </div>
            </div>
         </div>
         <div class="timeline-item flex flex-column flex-row-ns items-center tl relative">
            <!----><!----><span class="timeline-item-dot absolute bg-color-orange-dark dib trans-50-50"></span>
            <div class="timeline-item-text flex flex-column relative z-2">
               <h3 class="timeline-item-heading hwt-artz lh-solid ma0 relative color-orange-dark">2005</h3>
               <div class="timeline-item-copy f3 lh-copy">
                  <p>An Aluminium extrusion unit with 3 top of the line presses started in Ahmedabad</p>
               </div>
            </div>
            <div class="timeline-item-img-wrap flex-shrink-0 self-end relative z-2 z-0-ns">
               <div class="gooey-image">
                  <div class="gooey-figure-wrap relative h-100 w-100">
                     <figure class="gooey-figure flex ma0 relative h-100 w-100 overflow-hidden gooey-loaded">
                        <img src="{{asset('frontend/images/about/timeline/m2005.png')}}" alt="" class="gooey-img h-100 w-100" style="opacity: 1;"><!---->
                       <!--  <canvas crossorigin="anonymous" class="absolute top-0 left-0 w-100 h-100" style="opacity: 1; width: 400px; height: 517.797px;" width="400" height="517"></canvas> -->
                     </figure>
                  </div>
               </div>
            </div>
         </div>
         <div class="timeline-item flex flex-column flex-row-ns items-center tl relative">

            <!----><span class="timeline-item-dot absolute bg-color-orange-dark dib trans-50-50"></span>
            <div class="timeline-item-text flex flex-column relative z-2">
               <h3 class="timeline-item-heading hwt-artz lh-solid ma0 relative">2006</h3>
               <div class="timeline-item-copy f3 lh-copy">
                  <p>Pre-laminated Board Plant was set up in Ahmedabad. Adhesives Plant also began operations in Ahmedabad.</p>
               </div>
            </div>
            <div class="timeline-item-img-wrap flex-shrink-0 self-end relative z-2 z-0-ns">
               <div class="gooey-image">
                  <div class="gooey-figure-wrap relative h-100 w-100">
                     <figure class="gooey-figure flex ma0 relative h-100 w-100 overflow-hidden gooey-loaded">
                        <img src="{{asset('frontend/images/about/timeline/m2006.jpg')}}" alt="" class="gooey-img h-100 w-100"><!---->
                       <!--  <canvas crossorigin="anonymous" class="absolute top-0 left-0 w-100 h-100" style="opacity: 1;"></canvas> -->
                     </figure>
                  </div>
               </div>
            </div>
         </div>
         <div class="timeline-item flex flex-column flex-row-ns items-center tl relative">
             <!---->
           <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 751.3 771.74" class="timeline-blob-3 absolute z-0">
               <path d="M208.81,0C153.4,0,100.24,15.82,60,68.8c-70.14,92.4-87.11,186.66-5.85,297.86s86,246.53,103.61,292.84c13.79,36.12,68.9,112.24,130.85,112.24,17.36,0,35.25-6,52.94-20.49,48.6-39.89,92.83-53.49,131.64-53.49,25.68,0,49,6,69.61,14.18,15.11,6,34.37,9.66,55,9.66,50.12,0,108.68-21.37,137.52-82.05,36.36-68.47,3.89-117.4-32.18-201.36-44.26-105.66-14.13-206-14.13-206S726.36,97.7,619,39c-34.63-19.78-69.9-25.29-105.19-25.29-22.23,0-44.47,2.18-66.57,4.37s-44.06,4.38-65.72,4.38c-16.76,0-33.35-1.31-49.68-4.94C292.5,8.76,250,0,208.81,0" fill="#1b5665"></path>
            </svg>
            <span class="timeline-item-dot absolute bg-color-orange-dark dib trans-50-50"></span>
            <div class="timeline-item-text flex flex-column relative z-2">
               <h3 class="timeline-item-heading hwt-artz lh-solid ma0 relative color-white">2010</h3>
               <div class="timeline-item-copy f3 lh-copy">
                  <p>Vitrified tiles was started at Morbi.</p>
               </div>
            </div>
            <div class="timeline-item-img-wrap flex-shrink-0 self-end relative z-2 z-0-ns">
               <div class="gooey-image">
                  <div class="gooey-figure-wrap relative h-100 w-100">
                     <figure class="gooey-figure flex ma0 relative h-100 w-100 overflow-hidden gooey-loaded">
                        <img src="{{asset('frontend/images/about/timeline/m2010.jpg')}}" alt="" class="gooey-img h-100 w-100" style="opacity: 1;"><!---->
                        <!-- <canvas crossorigin="anonymous" class="absolute top-0 left-0 w-100 h-100" style="opacity: 1;"></canvas> -->
                     </figure>
                  </div>
               </div>
            </div>
         </div>

           <div class="timeline-item flex flex-column flex-row-ns items-center tl relative">

            <!----><span class="timeline-item-dot absolute bg-color-orange-dark dib trans-50-50"></span>
            <div class="timeline-item-text flex flex-column relative z-2">
               <h3 class="timeline-item-heading hwt-artz lh-solid ma0 relative color-white">2012</h3>
               <div class="timeline-item-copy f3 lh-copy">
                  <p>Another laminate factory was established for compact & exterior laminates in Ahmedabad.</p>
               </div>
            </div>
            <div class="timeline-item-img-wrap flex-shrink-0 self-end relative z-2 z-0-ns">
               <div class="gooey-image">
                  <div class="gooey-figure-wrap relative h-100 w-100">
                     <figure class="gooey-figure flex ma0 relative h-100 w-100 overflow-hidden gooey-loaded">
                        <img src="{{asset('frontend/images/about/timeline/m2012.png')}}" alt="" class="gooey-img h-100 w-100" style="opacity: 1;"><!---->
                        <!-- <canvas crossorigin="anonymous" class="absolute top-0 left-0 w-100 h-100" style="opacity: 1;"></canvas> -->
                     </figure>
                  </div>
               </div>
            </div>
         </div>
         <div class="timeline-item flex flex-column flex-row-ns items-center tl relative">

            <span class="timeline-item-dot absolute bg-color-orange-dark dib trans-50-50"></span>
            <div class="timeline-item-text flex flex-column relative z-2">
               <h3 class="timeline-item-heading hwt-artz lh-solid ma0 relative color-white">2017</h3>
               <div class="timeline-item-copy f3 lh-copy">
                  <p>Expanded the production capacity of the unit by 35%</p>
               </div>
            </div>
            <div class="timeline-item-img-wrap flex-shrink-0 self-end relative z-2 z-0-ns">
               <div class="gooey-image">
                  <div class="gooey-figure-wrap relative h-100 w-100">
                     <figure class="gooey-figure flex ma0 relative h-100 w-100 overflow-hidden gooey-loaded">
                        <img src="{{asset('frontend/images/about/timeline/m2017.jpg')}}" alt="" class="gooey-img h-100 w-100" style="opacity: 1;"><!---->
                        <!-- <canvas crossorigin="anonymous" class="absolute top-0 left-0 w-100 h-100" style="opacity: 1;"></canvas> -->
                     </figure>
                  </div>
               </div>
            </div>
         </div>

         <div class="timeline-item flex flex-column flex-row-ns items-center tl relative">
            <!----><span class="timeline-item-dot absolute bg-color-orange-dark dib trans-50-50"></span>
            <div class="timeline-item-text flex flex-column relative z-2">
               <h3 class="timeline-item-heading hwt-artz lh-solid ma0 relative color-white">2018</h3>
               <div class="timeline-item-copy f3 lh-copy">
                  <p>Launched Pavimento Wooden Flooring across India.</p>
               </div>
            </div>
            <div class="timeline-item-img-wrap flex-shrink-0 self-end relative z-2 z-0-ns">
               <div class="gooey-image">
                  <div class="gooey-figure-wrap relative h-100 w-100">
                     <figure class="gooey-figure flex ma0 relative h-100 w-100 overflow-hidden gooey-loaded">
                        <img src="{{asset('frontend/images/about/timeline/m2018.jpg')}}" alt="" class="gooey-img h-100 w-100" style="opacity: 1;"><!---->
                        <!-- <canvas crossorigin="anonymous" class="absolute top-0 left-0 w-100 h-100" style="opacity: 1;"></canvas> -->
                     </figure>
                  </div>
               </div>
            </div>
         </div>

         <div class="timeline-item flex flex-column flex-row-ns items-center tl relative">

            <span class="timeline-item-dot absolute bg-color-orange-dark dib trans-50-50"></span>
            <div class="timeline-item-text flex flex-column relative z-2">
               <h3 class="timeline-item-heading hwt-artz lh-solid ma0 relative color-white">2020</h3>
               <div class="timeline-item-copy f3 lh-copy">
                  <p>Installed a new press with a further 30% increase in production capacity</p>
               </div>
            </div>
            <div class="timeline-item-img-wrap flex-shrink-0 self-end relative z-2 z-0-ns">
               <div class="gooey-image">
                  <div class="gooey-figure-wrap relative h-100 w-100">
                     <figure class="gooey-figure flex ma0 relative h-100 w-100 overflow-hidden gooey-loaded">
                        <img src="{{asset('frontend/images/about/timeline/m2020.png')}}" alt="" class="gooey-img h-100 w-100" style="opacity: 1;"><!---->
                        <!-- <canvas crossorigin="anonymous" class="absolute top-0 left-0 w-100 h-100" style="opacity: 1;"></canvas> -->
                     </figure>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>

            <!-- new timeline end -->
            <div class="row achievements-row hidden" data-aos="fade-up" data-aos-duration="500">
               <div class="container">
                  <div class="col-md-10 col-md-offset-1 aboutus-achievements-block">
                     <div class="aboutus-achievements-text">
                        <h3>ACHIEVEMENTS</h3>
                        <div class="demo-gallery">
                            <ul id="lightgallery">
                              <li data-responsive="{{asset('frontend/images/Manufacturer_Laminate_in_Algeria_rt_certificate.jpg')}}" data-src="{{asset('frontend/images Manufacturer_Laminate_in_Algeria_rt_certificate.jpg')}}" data-sub-html="<h4>GLAMME CERTIFICATE</h4>" data-pinterest-text="Pin it" data-tweet-text="share on twitter ">
                                <a href="">
                                  <img class="img-responsive" src="{{asset('frontend/images/Manufacturer_Laminate_in_Algeria_rt_certificate.jpg')}}">
                                  <div class="demo-gallery-poster">
                                    <img src="https://sachinchoolur.github.io/lightGallery/static/img/zoom.png">
                                  </div>
                                </a>
                                <h4>GLAMME CERTIFICATE</h4>
                              </li>
                              <li data-responsive="{{asset('frontend/images/Manufacturer_Laminate_in_America_glamme_trophy.jpg')}}" data-src="{{asset('frontend/images/Manufacturer_Laminate_in_America_glamme_trophy.jpg')}}" data-sub-html="<h4>GLAMME AWARD</h4>" data-pinterest-text="Pin it" data-tweet-text="share on twitter " >
                                <a href="">
                                  <img class="img-responsive" src="{{asset('frontend/images/Manufacturer_Laminate_in_America_glamme_trophy.jpg')}}">
                                  <div class="demo-gallery-poster">
                                    <img src="https://sachinchoolur.github.io/lightGallery/static/img/zoom.png">
                                  </div>
                                </a>
                                <h4>GLAMME AWARD</h4>
                              </li>
                            </ul>

                          </div>
                     </div>
                  </div>
               </div>
            </div>



            <div class="row corporate-video-row hidden" >
               <div class="container">
                  <div class="col-md-10 col-md-offset-1 aboutus-corporate-video-block">
                     <div class="aboutus-company-text">
                        <h3>CORPORATE VIDEO</h3>
                           <div class="static-details">
                              <div class="col-md-6 video-block p-l-0">
                                 <iframe width="100%" height="250" src="https://www.youtube.com/embed/_Io3jjKjvcU" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen=""></iframe>
                                 <h3 class="static-video-title"><a href="https://www.youtube.com/watch?v=_Io3jjKjvcU&amp;feature=emb_title" target="_blank">Watch Our Corporate Film</a></h3>
                              </div>
                              <div class="col-md-6 video-block p-r-0">
                                 <iframe width="100%" height="250" src="https://www.youtube.com/embed/udXob_TTTxw" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen=""></iframe>
                                 <h3 class="static-video-title"><a href="https://www.youtube.com/watch?v=udXob_TTTxw&amp;feature=emb_title" target="_blank">Watch Our Brand New TVC – 1</a></h3>
                              </div>
                              <div class="col-md-6 video-block p-l-0">
                                 <iframe width="100%" height="250" src="https://www.youtube.com/embed/7U6y6hO9jA8" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen=""></iframe>
                                 <h3 class="static-video-title"><a href="https://www.youtube.com/watch?v=7U6y6hO9jA8&amp;feature=emb_title" target="_blank">Watch Our Brand New TVC – 2</a></h3>
                              </div>
                              <div class="col-md-6 video-block p-r-0">
                                 <iframe width="100%" height="250" src="https://www.youtube.com/embed/hD4cggrSD1Y" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen=""></iframe>
                                 <h3 class="static-video-title"><a href="https://www.youtube.com/watch?v=IWkkCuPKIks&amp;feature=c4-overview-vl&amp;list=PLJu4JE0xKpVfG2wjQi_ES3bTHu4_BVkz-" target="_blank">Watch Our Brand New TVC – 3</a></h3>
                              </div>
                           </div>
                     </div>
                  </div>
               </div>
            </div>


            <section class="brand-section">
            <div class="row our-brands-row">
               <div class="container">
                  <div class="col-md-10 col-md-offset-1 aboutus-our-brands-block">
                     <div class="aboutus-our-brands-text">
                        <h2 class="heading-about brand-text">OUR BRANDS</h2>
                        <div class="static-details">

                        <p>What stared off as a humble yet ambitious portfolio of the country’s very first decorative laminates, has today snowballed into a repertoire of diverse interior solutions.</p>

                        <div class="carousel-wrap">
                          <div class="owl-carousel">
                           <div class="item">
                              <a href="https://www.royaletouche.com/" target="_blank"><img class="savah" src="{{asset('frontend/images/savahh_logo.png')}}"></a>
                           </div>
                            <div class="item">
                              <a href="https://www.pavimentofloors.com/" target="_blank"><img src="{{asset('frontend/brands/Pavimento-logo.jpg')}}"></a>
                           </div>
                           <div class="item">
                              <a href="https://www.royaletouche.com/royalbond/" target="_blank"><img src="{{asset('frontend/brands/ROYAL_BOND_ISI_LOGOo.jpg')}}"></a>
                           </div>
                           <div class="item">
                              <a href="https://www.royaletouche.com/" target="_blank"><img src="{{asset('frontend/brands/CRYSTAL_LOGO.jpg')}}"></a>
                           </div>
                           <div class="item">
                              <a href="http://www.royaldecorfurniture.co.in/" target="_blank"><img src="{{asset('frontend/brands/decor_luxury_furniture1.jpg')}}"></a>
                           </div>
                           <div class="item">
                              <a href="https://www.royaletouche.com/" target="_blank"><img src="{{asset('frontend/brands/HD_PRINTSLOGO.jpg')}}"></a>
                           </div>
                           <div class="item">
                              <a href="https://www.royaletouche.com/" target="_blank"><img src="{{asset('frontend/brands/I_MARKS_LOGO.jpg')}}"></a>
                           </div>
                           <div class="item">
                              <a href="https://www.royaletouche.com/" target="_blank"><img src="{{asset('frontend/brands/NO_MARKS_LOGO.jpg')}}"></a>
                           </div>
                           <div class="item">
                              <a href="http://www.royaletouchevitrified.in/" target="_blank"><img src="{{asset('frontend/brands/vitrified_tiles1.jpg')}}"></a>
                           </div>
                           <div class="item">
                              <a href="https://www.royaletouche.com/" target="_blank"><img src="{{asset('frontend/brands/luxury_laminates1.jpg')}}"></a>
                           </div>
                          </div>
                        </div>

                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </section>
@endsection
@section('scripts')



      <script type="text/javascript">
   // Call & init
$(document).ready(function(){
  $('.ba-slider').each(function(){
    var cur = $(this);
    // Adjust the slider
    var width = cur.width()+'px';
    cur.find('.resize img').css('width', width);
    // Bind dragging events
    drags(cur.find('.handle'), cur.find('.resize'), cur);
  });


// Update sliders on resize.
// Because we all do this: i.imgur.com/YkbaV.gif
$(window).resize(function(){
  $('.ba-slider').each(function(){
    var cur = $(this);
    var width = cur.width()+'px';
    cur.find('.resize img').css('width', width);
  });
});

function drags(dragElement, resizeElement, container) {

  // Initialize the dragging event on mousedown.
  dragElement.on('mousedown touchstart', function(e) {

    dragElement.addClass('draggable');
    resizeElement.addClass('resizable');

    // Check if it's a mouse or touch event and pass along the correct value
    var startX = (e.pageX) ? e.pageX : e.originalEvent.touches[0].pageX;

    // Get the initial position
    var dragWidth = dragElement.outerWidth(),
        posX = dragElement.offset().left + dragWidth - startX,
        containerOffset = container.offset().left,
        containerWidth = container.outerWidth();

    // Set limits
    minLeft = containerOffset + 10;
    maxLeft = containerOffset + containerWidth - dragWidth - 10;

    // Calculate the dragging distance on mousemove.
    dragElement.parents().on("mousemove touchmove", function(e) {

      // Check if it's a mouse or touch event and pass along the correct value
      var moveX = (e.pageX) ? e.pageX : e.originalEvent.touches[0].pageX;

      leftValue = moveX + posX - dragWidth;

      // Prevent going off limits
      if ( leftValue < minLeft) {
        leftValue = minLeft;
      } else if (leftValue > maxLeft) {
        leftValue = maxLeft;
      }

      // Translate the handle's left value to masked divs width.
      widthValue = (leftValue + dragWidth/2 - containerOffset)*100/containerWidth+'%';

      // Set the new values for the slider and the handle.
      // Bind mouseup events to stop dragging.
      $('.draggable').css('left', widthValue).on('mouseup touchend touchcancel', function () {
        $(this).removeClass('draggable');
        resizeElement.removeClass('resizable');
      });
      $('.resizable').css('width', widthValue);
    }).on('mouseup touchend touchcancel', function(){
      dragElement.removeClass('draggable');
      resizeElement.removeClass('resizable');
    });
    e.preventDefault();
  }).on('mouseup touchend touchcancel', function(e){
    dragElement.removeClass('draggable');
    resizeElement.removeClass('resizable');
  });
}



         $('.owl-carousel').owlCarousel({
           loop: true,
           margin: 10,
           nav: true,
           dots:true,
           navText: [
             "<i class='fa fa-caret-left'></i>",
             "<i class='fa fa-caret-right'></i>"
           ],
           autoplay: true,
           autoplayHoverPause: true,
           responsive: {
             0: {
               items: 1
             },
             600: {
               items: 2
             },
             1000: {
               items: 3
             }
           }
         })

});

    </script>


@endsection
