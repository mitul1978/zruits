@extends('frontend.layouts.app')
@section('content')
@include('frontend.layouts.svg-icons')
@include('frontend.layouts.right-sidebar')
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
                              <h2>Question 3</h2>
                           </div>
                           <div class="guide-quest-title">
                              <h1>What kind of finish would you prefer?</h1>
                           </div>
                        </div>
                     </div>
                  </div>
                  <!-- Answer shape -->
                  <div class="guide-step guide-answer guide-ashape" data-step="8">
                     <div class="mobile-answer-flex-block">
                     <!-- Cylindric -->

                     @if(!empty($textures))

                      @foreach($textures as $k=>$texture)
                      
                     <div class="attribute guide-answer-item col5-steps-item guide-ashape-@if(($k)%2==0){{'cyl'}}@else{{'sph'}}@endif" data-prefer="{{$texture->name}}">
                        <div class="guide-answer-item-inner">
                          
                           <div class="guide-answer-wrapper">
                              <div class="guide-answer-title">
                                <h2>
                                 {{$texture->name}}</h2>
                                 <!-- Cylindrical -->
                              </div>
                              <div class="guide-answer-desc">

                              </div>
                           </div>
                           <div class="guide-answer-icon">
                              <svg class="icon icon-cylindric">
                                 <use xlink:href="#{{Str::slug($texture->icon_tag)}}" />
                              </svg>
                           </div>
                          
                        </div>
                     </div>
                     @endforeach
                     <div class="select-all guide-answer-item col5-steps-item guide-ashape-@if(count($textures)%2 == 0){{'cyl'}}@else{{'sph'}}@endif" data-prefer="all">
                        <div class="guide-answer-item-inner">                         
                           <div class="guide-answer-wrapper">
                              <div class="guide-answer-title">
                                 Select All
                                 <!-- Cylindrical -->
                              </div>
                              <div class="guide-answer-desc">

                              </div>
                           </div>
                           <div class="guide-answer-icon">
                              <svg class="icon icon-cylindric">
                                 <use xlink:href="#other-finish" />
                              </svg>
                           </div>
                           
                        </div>
                     </div>                    
                      
                     @endif
                   </div>

                  </div>
                     <button type="button" name="button" class="btn-floating">Click To Proceed</button>
                    </section>
                 
            </div>

@endsection
@section('scripts')
 <script type="text/javascript">
 $(document).ready(function(){

   var baseurl = window.location.protocol;
   $('.select-all').on('click',function() {

     var selected_count = $('.selected').length;
     var total_count = $('.attribute').length;


     if(selected_count == total_count)
     {
       $(this).removeClass('selected-grid-block');
       $('.attribute').removeClass('selected');
     }
     else
     {
       $(this).addClass('selected-grid-block');
       $('.attribute').addClass('selected');

     }

     

   });

   $('.attribute').on('click',function(){

      $(this).toggleClass('selected');
      var selected_count = $('.selected').length;
     var total_count = $('.attribute').length;


     if(selected_count == total_count)
     {
       $('.select-all').addClass('selected-grid-block');      
     }
     else
     {
       $('.select-all').removeClass('selected-grid-block');
     }
      
      // var prefer = $(this).attr('data-prefer');
      // window.location.href = baseurl+'productlisting?category='+laminate+'&prefer='+prefer;
   });

   $('.btn-floating').on('click',function () {


       var paras = [];
       var para;

       $('.selected').each(function(){
         para = '';
         para = $(this).attr('data-prefer');
         if(para !=undefined)
         paras.push(para);
       });

       if(paras.length==0){

         $('.attribute').each(function(){
            para = '';
            para = $(this).attr('data-prefer');

            if(para !=undefined)
            paras.push(para);
         });
       }

       var url_para = paras.toString();

      window.location.href = '{{url("guide/result")}}'+'?textures='+url_para;



   });


});
</script>
@endsection
