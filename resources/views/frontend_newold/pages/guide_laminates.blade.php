@extends('frontend.layouts.app')
@section('content')
@include('frontend.layouts.svg-icons')
@include('frontend.layouts.right-sidebar')
<style type="text/css">
  .guide-answer-item.selected {
    background: linear-gradient(to bottom, #4CAF50, #00e2fa, #499859);
    box-shadow: 0px 0px 10px #1b5665;
  }
  .disabled1{
    /*pointer-events: none !important;*/
    /*opacity: 0.4 !important;*/
  }

  .middle {
     transition: .5s ease;
    opacity: 0;
    position: absolute;
    /* top: 50%; */
    height: 100%;
    width: 100%;
    /* left: 50%; */
    /* transform: translate(-50%, -50%); */
    -ms-transform: translate(-50%, -50%);
    text-align: center;
    background: #224248;
}

.disabled1:hover .guide-answer-item-inner {
 opacity: 0.1;
}

.disabled1:hover .middle {
 opacity: 1;
}

.text {
    color: white;
    font-size: 16px;
    padding: 16px 32px;
    top: 50%;
    position: absolute;
    text-align: center;
    width: 100%;
}

</style>
            
           <div id="page-container">
               <section id="page" class="guide">

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
                              <h2>Question 2</h2>
                           </div>
                           <div class="guide-quest-title">
                              <h1>What kind of laminate are you looking for?</h1>
                           </div>
                        </div>
                     </div>
                  </div>
                  
                    <div class="guide-step guide-answer flex-container-laminate guide-aglasses" data-step="6">
                    <div class="mobile-answer-flex-block">
                     <!-- 1 -->
                     @if(!empty($laminates))

                        @foreach($laminates as $k=>$laminate)
                           <div class="guide-answer-item grid-item-laminates lami-bg-@if($laminate->sort_order%2 == 0){{'1'}}@else{{'2'}}@endif category data-prefer="{{$laminate->name}}" data-lam="{{$laminate->name}}" >
                              <div class="guide-answer-item-inner">
                                 <div class="guide-answer-wrapper">
                                    <div class="guide-answer-title">
                                      <h2>
                                       {{$laminate->name}}
                                     </h2>
                                    </div>
                                 </div>
                                 <div class="guide-answer-icon">
                                    <svg class="icon icon-glasses">
                                       <use xlink:href="#{{$laminate->icon_tag}}" />
                                    </svg>
                                 </div>                                
                              </div>
                                <div class="middle">
                              <div class="text"> Laminates Not Available </div>
                            </div>
                           </div>
                         @endforeach
                       <div class="select-all guide-answer-item grid-item-laminates lami-bg-1" >
                          <div class="guide-answer-item-inner">
                             <div class="guide-answer-wrapper">
                                <div class="guide-answer-title">
                                   Select All
                                </div>
                             </div>
                             <div class="guide-answer-icon">
                                <svg class="icon icon-eye">
                                   <use xlink:href="#other-texture" />
                                </svg>
                             </div>
                             <div class="guide-answer-bt btn btn-white select-all" data-lam="all">
                                <div class="btn-bg"></div>
                                <span>Choose</span>
                             </div>

                          </div>
                       </div>
                  
                   
                     @endif
                     <!-- 2 -->
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
   // $('.lam-btn-choose').on('click',function(){
   //    var laminate = $(this).attr('data-lam');

   //    window.location.href = baseurl+'choosepreference?category='+laminate;
   // });

    $('.category').on('click',function(){

               $(this).toggleClass('selected');
                  var selected_count = $('.selected').length;
                  var total_count = $('.category').length;
                  if(selected_count == total_count)
                  {
                      $('.select-all').addClass('selected-grid-block');
                  }else{
                        $('.select-all').removeClass('selected-grid-block');
                  }

            });

   $('.btn-floating').on('click',function () {

     console.log($('.selected').length);

       var paras = [];
       var para;

       $('.selected').each(function(){
         para = '';
         para = $(this).attr('data-lam');

         if(para !=undefined)
         paras.push(para);

       });

       if(paras.length==0){

         $('.category').each(function(){
         para = '';
         para = $(this).attr('data-lam');

         if(para !=undefined)
            paras.push(para);

       });

       }
   

       var url_para = paras.toString();
       
       /******************* Change as per ur page ***********************************/
 
      window.location.href = '{{url("guide/textures")}}'+'?laminates='+url_para;

       /**************************************************************************************/
     
   });

   $('.select-all').on('click',function() {

     var selected_count = $('.selected').length;
     var total_count = $('.category').length;


     if(selected_count == total_count)
     {
       $(this).removeClass('selected-grid-block');
       $('.category').removeClass('selected');
     }
     else
     {
       $(this).addClass('selected-grid-block');
       $('.category').addClass('selected');

     }


   });

});
   function getParameterByName(name) {

            name = name.replace(/[\[]/, "\\\[").replace(/[\]]/, "\\\]");

            var regexS = "[\\?&]" + name + "=([^&#]*)";

            var regex = new RegExp(regexS);

            var results = regex.exec(window.location.search);

            if (results == null)
                return "";
            else
                return decodeURIComponent(results[1].replace(/\+/g, " "));
        }
      
</script>
@endsection
