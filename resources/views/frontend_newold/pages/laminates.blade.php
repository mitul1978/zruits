@extends('layouts.app')
@section('content')
@include('layouts.svg-icons')
            <!-- svg end -->
           <div id="page-container">
               <section id="page" class="guide">
                  <!-- Question -->
                  <!-- Question -->

                  <!-- questions -->
                  <div class="guide-step guide-quest guide-quest-weather" data-step="3">
                     <div class="guide-quest-inner">
                        <div class="guide-quest-bg"></div>
                        <div class="guide-quest-bgtitle">
                           <span>A</span>
                           <span>p</span>
                           <span>p</span>
                           <span>l</span>
                           <span>i</span>
                           <span>c</span>
                           <span>a</span>
                           <span>t</span>
                           <span>i</span>
                           <span>o</span>
                           <span>n</span>
                        </div>
                        <div class="guide-quest-wrapper">
                           <div class="guide-quest-icon">
                              <svg  class="guide-quest-icon-circle" height="160" width="160">
                                 <circle cx="80" cy="80" r="75" />
                              </svg>
                              <svg class="icon icon-good-weather">
                                 <use xlink:href="#home" />
                              </svg>
                           </div>
                           <div class="guide-quest-num">
                              Question 1
                           </div>
                           <div class="guide-quest-title">
                              What do you want to revamp?
                           </div>
                        </div>
                     </div>
                  </div>
                  <!-- Answer weather -->
                  <div class="guide-step guide-aweather guide-answer" data-step="4">
                     <div class="guide-answer-item col4-steps-item guide-aweather-good">
                        <div class="guide-answer-item-inner">
                           <div class="guide-answer-wrapper">
                              <div class="guide-answer-title">
                                 Home
                              </div>
                              <div class="guide-answer-desc">
                                 Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                              </div>
                           </div>
                           <div class="guide-answer-icon">
                              <svg class="icon icon-good-weather">
                                 <use xlink:href="#home" />
                              </svg>
                           </div>
                           <a href="javascript:void(0);" class="guide-answer-bt btn btn-white">
                              <div class="btn-bg"></div>
                              <span>Choose</span>
                           </a>
                        </div>
                     </div>
                     <div class="guide-answer-item col4-steps-item guide-aweather-bad">
                        <div class="guide-answer-item-inner">
                           <div class="guide-answer-wrapper">
                              <div class="guide-answer-title">
                                 Office
                              </div>
                              <div class="guide-answer-desc">
                                 Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                              </div>
                           </div>
                           <div class="guide-answer-icon">
                              <svg class="icon icon-bad-weather">
                                 <use xlink:href="#office" />
                              </svg>
                           </div>
                           <div class="guide-answer-bt btn btn-white">
                              <div class="btn-bg"></div>
                              <span>Choose</span>
                           </div>
                        </div>
                     </div>
                     <div class="guide-answer-item col4-steps-item guide-aweather-all" >
                        <div class="guide-answer-item-inner">
                           <div class="guide-answer-wrapper">
                              <div class="guide-answer-title">
                                 Showroom
                              </div>
                              <div class="guide-answer-desc">
                                 Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                              </div>
                           </div>
                           <div class="guide-answer-icon">
                              <svg class="icon icon-all-weather">
                                 <use xlink:href="#showroom" />
                              </svg>
                           </div>
                           <div class="guide-answer-bt btn btn-white">
                              <div class="btn-bg"></div>
                              <span>Choose</span>
                           </div>
                        </div>
                     </div>
                     <div class="guide-answer-item col4-steps-item guide-aweather-bad">
                        <div class="guide-answer-item-inner">
                           <div class="guide-answer-wrapper">
                              <div class="guide-answer-title">
                                 Other
                              </div>
                              <div class="guide-answer-desc">
                                 Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                              </div>
                           </div>
                           <div class="guide-answer-icon">
                              <svg class="icon icon-bad-weather">
                                 <use xlink:href="#office" />
                              </svg>
                           </div>
                           <div class="guide-answer-bt btn btn-white">
                              <div class="btn-bg"></div>
                              <span>Choose</span>
                           </div>
                        </div>
                     </div>
                  </div>
                  <!-- other -->
                  <!-- Question -->
                  <div class="guide-step guide-quest guide-quest-glasses" data-step="5">
                     <div class="guide-quest-inner">
                        <div class="guide-quest-bg"></div>
                        <div class="guide-quest-bgtitle">
                           <span>L</span>
                           <span>a</span>
                           <span>m</span>
                           <span>i</span>
                           <span>n</span>
                           <span>a</span>
                           <span>t</span>
                           <span>e</span>
                           <span>s</span>
                        </div>
                        <div class="guide-quest-wrapper">
                           <div class="guide-quest-icon">
                              <svg  class="guide-quest-icon-circle" height="160" width="160">
                                 <circle cx="80" cy="80" r="75" />
                              </svg>
                              <svg class="icon icon-glasses">
                                 <use xlink:href="#other-texture" />
                              </svg>
                           </div>
                           <div class="guide-quest-num">
                              Question 2
                           </div>
                           <div class="guide-quest-title">
                              What kind of laminate are you looking for?
                           </div>
                        </div>
                     </div>
                  </div>
                  <!-- Answer glasses -->
                  <div class="guide-step guide-answer flex-container-laminate guide-aglasses" data-step="6">
                     <!-- 1 -->
                     <div class="guide-answer-item grid-item-laminates lami-bg-1" >
                        <div class="guide-answer-item-inner">
                           <div class="guide-answer-wrapper">
                              <div class="guide-answer-title">
                                 New Collection
                              </div>
                           </div>
                           <div class="guide-answer-icon">
                              <svg class="icon icon-glasses">
                                 <use xlink:href="#fabric" />
                              </svg>
                           </div>
                           <div class="guide-answer-bt btn btn-white">
                              <div class="btn-bg"></div>
                              <span>Choose</span>
                           </div>
                        </div>
                     </div>
                     <!-- 2 -->
                     <div class="guide-answer-item grid-item-laminates lami-bg-2" >
                        <div class="guide-answer-item-inner">
                           <div class="guide-answer-wrapper">
                              <div class="guide-answer-title">
                                 Stone
                              </div>
                           </div>
                           <div class="guide-answer-icon">
                              <svg class="icon icon-eye">
                                 <use xlink:href="#stone" />
                              </svg>
                           </div>
                           <div class="guide-answer-bt btn btn-white">
                              <div class="btn-bg"></div>
                              <span>Choose</span>
                           </div>
                        </div>
                     </div>
                     <!-- 3 -->
                     <div class="guide-answer-item grid-item-laminates lami-bg-1" >
                        <div class="guide-answer-item-inner">
                           <div class="guide-answer-wrapper">
                              <div class="guide-answer-title">
                                 Dark Wood
                              </div>
                           </div>
                           <div class="guide-answer-icon">
                              <svg class="icon icon-glasses">
                                 <use xlink:href="#fabric" />
                              </svg>
                           </div>
                           <div class="guide-answer-bt btn btn-white">
                              <div class="btn-bg"></div>
                              <span>Choose</span>
                           </div>
                        </div>
                     </div>
                     <!-- 4 -->
                     <div class="guide-answer-item grid-item-laminates lami-bg-2" >
                        <div class="guide-answer-item-inner">
                           <div class="guide-answer-wrapper">
                              <div class="guide-answer-title">
                                 Light Wood
                              </div>
                           </div>
                           <div class="guide-answer-icon">
                              <svg class="icon icon-eye">
                                 <use xlink:href="#stone" />
                              </svg>
                           </div>
                           <div class="guide-answer-bt btn btn-white">
                              <div class="btn-bg"></div>
                              <span>Choose</span>
                           </div>
                        </div>
                     </div>
                     <!-- 5 -->
                     <div class="guide-answer-item grid-item-laminates lami-bg-1 " >
                        <div class="guide-answer-item-inner">
                           <div class="guide-answer-wrapper">
                              <div class="guide-answer-title">
                                 Leather
                              </div>
                           </div>
                           <div class="guide-answer-icon">
                              <svg class="icon icon-glasses">
                                 <use xlink:href="#fabric" />
                              </svg>
                           </div>
                           <div class="guide-answer-bt btn btn-white">
                              <div class="btn-bg"></div>
                              <span>Choose</span>
                           </div>
                        </div>
                     </div>
                     <!-- 6 -->
                     <div class="guide-answer-item  grid-item-laminates lami-bg-2" >
                        <div class="guide-answer-item-inner">
                           <div class="guide-answer-wrapper">
                              <div class="guide-answer-title">
                                 Exotic Wood
                              </div>
                           </div>
                           <div class="guide-answer-icon">
                              <svg class="icon icon-eye">
                                 <use xlink:href="#stone" />
                              </svg>
                           </div>
                           <div class="guide-answer-bt btn btn-white">
                              <div class="btn-bg"></div>
                              <span>Choose</span>
                           </div>
                        </div>
                     </div>
                     <!-- 7 -->
                     <div class="guide-answer-item  grid-item-laminates lami-bg-1" >
                        <div class="guide-answer-item-inner">
                           <div class="guide-answer-wrapper">
                              <div class="guide-answer-title">
                                 Fabrics
                              </div>
                           </div>
                           <div class="guide-answer-icon">
                              <svg class="icon icon-glasses">
                                 <use xlink:href="#fabric" />
                              </svg>
                           </div>
                           <div class="guide-answer-bt btn btn-white">
                              <div class="btn-bg"></div>
                              <span>Choose</span>
                           </div>
                        </div>
                     </div>
                     <!-- 8 -->
                     <div class="guide-answer-item grid-item-laminates lami-bg-2" >
                        <div class="guide-answer-item-inner">
                           <div class="guide-answer-wrapper">
                              <div class="guide-answer-title">
                                 Solid Colours
                              </div>
                           </div>
                           <div class="guide-answer-icon">
                              <svg class="icon icon-eye">
                                 <use xlink:href="#stone" />
                              </svg>
                           </div>
                           <div class="guide-answer-bt btn btn-white">
                              <div class="btn-bg"></div>
                              <span>Choose</span>
                           </div>
                        </div>
                     </div>
                     <!-- 9 -->
                     <div class="guide-answer-item  grid-item-laminates lami-bg-1" >
                        <div class="guide-answer-item-inner">
                           <div class="guide-answer-wrapper">
                              <div class="guide-answer-title">
                                 Vibrant Abstracts
                              </div>
                           </div>
                           <div class="guide-answer-icon">
                              <svg class="icon icon-glasses">
                                 <use xlink:href="#fabric" />
                              </svg>
                           </div>
                           <div class="guide-answer-bt btn btn-white">
                              <div class="btn-bg"></div>
                              <span>Choose</span>
                           </div>
                        </div>
                     </div>
                     <!-- 10-->
                     <div class="guide-answer-item  grid-item-laminates lami-bg-2" >
                        <div class="guide-answer-item-inner">
                           <div class="guide-answer-wrapper">
                              <div class="guide-answer-title">
                                 See All
                              </div>
                           </div>
                           <div class="guide-answer-icon">
                              <svg class="icon icon-eye">
                                 <use xlink:href="#stone" />
                              </svg>
                           </div>
                           <div class="guide-answer-bt btn btn-white">
                              <div class="btn-bg"></div>
                              <span>Choose</span>
                           </div>
                        </div>
                     </div>
                  </div>
                  <!-- Question -->
                  <div class="guide-step guide-quest guide-quest-shape" data-step="7">
                     <div class="guide-quest-inner">
                        <div class="guide-quest-bg"></div>
                        <div class="guide-quest-bgtitle">
                           <span>F</span>
                           <span>i</span>
                           <span>n</span>
                           <span>i</span>
                           <span>s</span>
                           <span>h</span>
                        </div>
                        <div class="guide-quest-wrapper">
                           <div class="guide-quest-icon">
                              <svg  class="guide-quest-icon-circle" height="160" width="160">
                                 <circle cx="80" cy="80" r="75" />
                              </svg>
                              <svg class="icon icon-goggle">
                                 <use xlink:href="#other-finish" />
                              </svg>
                           </div>
                           <div class="guide-quest-num">
                              Question 3
                           </div>
                           <div class="guide-quest-title">
                              What kind of finish would you prefer?
                           </div>
                        </div>
                     </div>
                  </div>
                  <!-- Answer shape -->
                  <div class="guide-step guide-answer guide-ashape" data-step="8">
                     <!-- Cylindric -->
                     <div class="guide-answer-item col4-steps-item guide-ashape-cyl" >
                        <div class="guide-answer-item-inner">
                           <div class="guide-ashape-landscape guide-ashape-landscape-notransform">
                           </div>
                           <div class="guide-ashape-shape-cylindric">
                              <div class="guide-ashape-landscape guide-ashape-landscape-transform">
                              </div>
                           </div>
                           <div class="guide-answer-wrapper">
                              <div class="guide-answer-title">
                                 Matt
                                 <!-- Cylindrical -->
                              </div>
                              <div class="guide-answer-desc">
                                 Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                              </div>
                           </div>
                           <div class="guide-answer-icon">
                              <svg class="icon icon-cylindric">
                                 <use xlink:href="#matt" />
                              </svg>
                           </div>
                           <div class="guide-answer-bt btn btn-white">
                              <div class="btn-bg"></div>
                              <span>Choose</span>
                           </div>
                        </div>
                     </div>
                     <!-- Spheric -->
                     <div class="guide-answer-item col4-steps-item guide-ashape-sph" >
                        <div class="guide-answer-item-inner">
                           <div class="guide-ashape-landscape guide-ashape-landscape-notransform">
                           </div>
                           <div class="guide-ashape-shape-spheric" >
                              <div class="guide-ashape-landscape guide-ashape-landscape-transform">
                                 <div class="guide-ashape-landscape guide-ashape-landscape-transform-mask">
                                 </div>
                              </div>
                           </div>
                           <div class="guide-answer-wrapper">
                              <div class="guide-answer-title">
                                 <!-- Spherical -->
                                 Glossy
                              </div>
                              <div class="guide-answer-desc">
                                 Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                              </div>
                           </div>
                           <div class="guide-answer-icon">
                              <svg class="icon icon-spheric">
                                 <use xlink:href="#glossy" />
                              </svg>
                           </div>
                           <div class="guide-answer-bt btn btn-white">
                              <div class="btn-bg"></div>
                              <span>Choose</span>
                           </div>
                        </div>
                     </div>
                     <!-- other Finish -->
                     <div class="guide-answer-item col4-steps-item guide-ashape-cyl"  >
                        <div class="guide-answer-item-inner">
                           <div class="guide-ashape-landscape guide-ashape-landscape-notransform">
                           </div>
                           <div class="guide-answer-wrapper">
                              <div class="guide-answer-title">
                                 Deep Texture
                              </div>
                              <div class="guide-answer-desc">
                                 Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                              </div>
                           </div>
                           <div class="guide-answer-icon">
                              <svg class="icon icon-cylindric">
                                 <use xlink:href="#other-finish" />
                              </svg>
                           </div>
                           <div class="guide-answer-bt btn btn-white">
                              <div class="btn-bg"></div>
                              <span>Choose</span>
                           </div>
                        </div>
                     </div>
                     <!-- other Finish -->
                     <div class="guide-answer-item col4-steps-item guide-ashape-sph" >
                        <div class="guide-answer-item-inner">
                           <div class="guide-ashape-landscape guide-ashape-landscape-notransform">
                           </div>
                           <div class="guide-ashape-shape-spheric" >
                              <div class="guide-ashape-landscape guide-ashape-landscape-transform">
                                 <div class="guide-ashape-landscape guide-ashape-landscape-transform-mask">
                                 </div>
                              </div>
                           </div>
                           <div class="guide-answer-wrapper">
                              <div class="guide-answer-title">
                                 <!-- Spherical -->
                                 Subtle Texture
                              </div>
                              <div class="guide-answer-desc">
                                 Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                              </div>
                           </div>
                           <div class="guide-answer-icon">
                              <svg class="icon icon-spheric">
                                 <use xlink:href="#glossy" />
                              </svg>
                           </div>
                           <div class="guide-answer-bt btn btn-white">
                              <div class="btn-bg"></div>
                              <span>Choose</span>
                           </div>
                        </div>
                     </div>
                  </div>
                  <!-- Question -->
                  <div class="guide-step guide-quest guide-result " data-step="9">
                     <div class="guide-quest-bg"></div>
                     <div class="guide-quest-bgtitle">
                        <span>s</span>
                        <span>e</span>
                        <span>l</span>
                        <span>e</span>
                        <span>c</span>
                        <span>t</span>
                        <span>i</span>
                        <span>o</span>
                        <span>n</span>
                     </div>
                     <div class="guide-quest-wrapper">
                        <div class="guide-result-title">
                           <strong>Our selection</strong> <span>according to your criterions</span>
                        </div>
                        <div class="guide-result-nbr">
                           <span>0</span>
                        </div>
                        <div class="guide-result-label">
                           Results
                        </div>
                     </div>
                  </div>
               </section>
            </div>
             <!-- form popup -->
      <!-- Modal -->
      <div id="form-popup" class="modal fade" role="dialog">
         <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
               <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                  <!-- <h4 class="modal-title"></h4> -->
               </div>
               <div class="modal-body">
                  <p class="modal-note">Please share your contact details for our executive to get in touch with you.</p>
                  <div class="">
                     <div class="forn-container">
                        <form id="user-info-form" type="" name="user-info-form" action="">
                           <div class="form-group">
                              <label for="name">Enter your Name</label>
                              <input type="text" name="name" placeholder="Name" class="form-control" id="name">
                           </div>
                           <div class="form-group">
                              <label for="phone">Phone</label>
                              <input type="tel" name="phone" placeholder="Phone" class="form-control" id="phone">
                           </div>
                           <div class="form-group">
                              <label for="email">Enter yor email</label>
                              <input type="email" name="email" placeholder="Email" class="form-control" id="email">
                           </div>
                           <div class="submit-block">
                              <input type="submit" class="btn btn-submit" value="Submit">
                           </div>
                        </form>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
@endsection
@section('scripts')
  <script type="text/javascript">
         $(document).ready(function(){
            var baseurl = window.location.protocol;
           $("#abcd").on('click',function(){console.log('a');
              window.location.href = baseurl+'architecture_form';
           });
         });
      </script>
@endsection
