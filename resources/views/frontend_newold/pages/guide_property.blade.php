@extends('layouts.app')
@section('content')
@include('layouts.svg-icons')
            <!-- svg end -->
           <div id="page-container">
               <section id="page" class="guide">
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
                    </section>
            </div>
      
@endsection            
@section('scripts')
 
@endsection