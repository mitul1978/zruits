@extends('layouts.app')
@section('content')
@include('layouts.svg-icons')
            <!-- svg end -->
           <div id="page-container">
               <section id="page" class="guide">
                  <!-- Question -->
                  <!-- Question -->
                  <div class="guide-step guide-quest guide-quest-glasses" data-step="1">
                     <div class="guide-quest-inner">
                        <div class="guide-quest-bg"></div>
                        <div class="guide-quest-bgtitle">
                           <span>W</span>
                           <span>H</span>
                           <span>O</span>                          
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
                              Question 1
                           </div>
                           <div class="guide-quest-title">
                              Are you an Architect or Customer?
                           </div>
                        </div>
                     </div>
                  </div>
                  <!-- Answer glasses -->
                  <div class="guide-step guide-answer guide-aglasses" data-step="2">
                     <!-- Yes -->
                     <div class="guide-answer-item col2-steps-item guide-aglasses-yes" >
                        <div class="guide-answer-item-inner">
                           <div class="guide-answer-wrapper">
                              <div class="guide-answer-title">
                                 Architect
                                 <!-- With glasses -->
                              </div>
                              <div class="guide-answer-desc">
                              </div>
                           </div>
                           <div class="guide-answer-icon">
                              <svg class="icon icon-glasses">
                                 <use xlink:href="#fabric" />
                              </svg>
                           </div>
                           <a href="javascript:void(0)" id="abcd" class="guide-answer-bt btn btn-white">
                              <div class="btn-bg"></div>
                              <span>Choose</span>
                           </a>
                        </div>
                     </div>
                     <!-- No -->
                     <div class="guide-answer-item col2-steps-item guide-aglasses-no" >
                        <div class="guide-answer-item-inner">
                           <div class="guide-answer-wrapper">
                              <div class="guide-answer-title">
                                 Customer
                              </div>
                              <div class="guide-answer-desc">
                              </div>
                           </div>
                           <div class="guide-answer-icon">
                              <svg class="icon icon-eye">
                                 <use xlink:href="#stone" />
                              </svg>
                           </div>
                           <a href="{{ url('/chooselaminates') }}">
                           <div class="guide-answer-bt btn btn-white">
                              <div class="btn-bg"></div>
                              <span>Choose</span>
                           </div>
                        </a>
                        </div>
                     </div>
                  </div>
                  
                  
                  
                  
               </section>
            </div>
      
@endsection            
@section('scripts')
 
@endsection