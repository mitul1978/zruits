@extends('frontend.layouts.app')
@section('content')
@include('frontend.layouts.svg-icons')

@if(Session::has('divisions') || Session::has('category') || Session::has('preference'))
@include('layouts.right-sidebar')
@endif
<style type="text/css">
 .guide-answer-item.selected {
    background: linear-gradient(to bottom, #4CAF50, #00e2fa, #499859);
    box-shadow: 0px 0px 10px #1b5665;
  }
  .disabled{
    pointer-events: none !important;
    /*opacity: 0.4 !important;*/
  }
</style>
            <!-- svg end -->
           <div id="page-container">
               <section id="page" class="guide">
                 
                 
                  <!-- questions -->
                  <div class="guide-step guide-quest guide-quest-weather" data-step="2">
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
                              <h2>Question 1</h2>
                           </div>
                           <div class="guide-quest-title">
                              <h1>What do you want to revamp?</h1>
                           </div>
                        </div>
                     </div>
                  </div>
                  <!-- Answer weather -->
                  <div class="guide-step guide-aweather guide-answer" data-step="3">
                    <div class="mobile-answer-flex-block">
                  @if(!empty($applications))  

                  @foreach($applications as $k=>$application)  
                  <div class="guide-answer-item  division col5-steps-item guide-aweather-@if($k%2 == 0){{'bad'}}@else{{'good'}}@endif" data-prefer="{{ $application->name}}">
                        <div class="guide-answer-item-inner">
                           <div class="guide-answer-wrapper">
                              <div class="guide-answer-title">
                                <h2>
                                 {{$application->name}}                     </h2>     
                              </div>
                              <div class="guide-answer-desc">
                               
                              </div>
                           </div>
                           <div class="guide-answer-icon">
                              <svg class="icon icon-good-weather">
                                 <use xlink:href="#{{$application->icon_tag}}" />
                              </svg>
                           </div>
                        </div>
                     </div>
                  @endforeach
                   <div class="select-all guide-answer-item col5-steps-item guide-aweather-@if(count($applications)%2 == 0){{'bad'}}@else{{'good'}}@endif" data-prefer="all">
                        <div class="guide-answer-item-inner">
                           <div class="guide-answer-wrapper">
                              <div class="guide-answer-title">
                                 Select All                              
                              </div>
                              <div class="guide-answer-desc">
                               
                              </div>
                           </div>
                           <div class="guide-answer-icon">
                              <svg class="icon icon-good-weather">
                                 <use xlink:href="#all-application" />
                              </svg>
                           </div>
                     <div class="guide-answer-bt btn btn-white select-all">
                              <div class="btn-bg"></div>
                              <span>Choose</span>
                           </div>
                        </div>
                     </div>
              
                 
                  @endif
                </div>

                         
                  </div>

                  <!-- other -->
                  <!-- Question -->
                  <button type="button" name="button" class="btn-floating">
                   Click To Proceed
                  </button>
               </section>
            </div>
             <!-- form popup -->
      <!-- Modal -->
     
@endsection            
@section('scripts')
  <script type="text/javascript">
         $(document).ready(function(){
   

            $('.select-all').on('click',function() {

     var selected_count = $('.selected').length;
     var total_count = $('.division').length;
     //alert(total_count);

     if(selected_count == total_count)
     {
       $(this).removeClass('selected-grid-block');
       $('.division').removeClass('selected');
     }
     else
     {
       $(this).addClass('selected-grid-block');
       $('.division').addClass('selected');

     }

     

   });
            var baseurl = window.location.protocol;
           // $(".revamp").on('click',function(){
           //     var id = $(this).attr('data-id');
           //     console.log(id);
           //     $("#add_"+id).addClass('selected');
           //     $(this).parent('.btn-bg').css('border','1px solid red');
           //     $(this).css('color','red');
           // });

           $('.division').on('click',function(){

               $(this).toggleClass('selected');
                  var selected_count = $('.selected').length;
                  var total_count = $('.division').length;
                  if(selected_count == total_count)
                  {
                      $('.select-all').addClass('selected-grid-block');
                  }else{
                        $('.select-all').removeClass('selected-grid-block');
                  }

      // var prefer = $(this).attr('data-prefer');
      // window.location.href = baseurl+'productlisting?category='+laminate+'&prefer='+prefer;
            });

           $('.btn-floating').on('click',function () {

     if(true)
     {
       var paras = [];
       var para;

       $('.selected').each(function(){
         para = '';
         para = $(this).attr('data-prefer');
         if(para !=undefined)
         paras.push(para);
       });
       
   
       if(paras.length==0){
         $('.division').each(function(){
         para = '';
         para = $(this).attr('data-prefer');
         
         if(para !=undefined)
            paras.push(para);
       });
       }
   

       var url_para = paras.toString();
       
       /******************* Change as per ur page ***********************************/
 
      window.location.href = '{{url("guide/laminates")}}'+'?applications='+url_para;

       /**************************************************************************************/
     }
     
   });
 });

       
      </script>
@endsection
