<!-- <div id="right-sidebar-fix" class="right-sidebar slide-right-sidebar">
   <div class="choice-change">
      <h3 class="sel-option">
         <span class="txt-sel">Selected Options</span>
      </h3>
      <i class="fa fa-times close-right-sidebar" aria-hidden="true"></i>
   </div>
   <div class="block-option">
       @if(Session::has('divisions'))
       @php $divisions=''; $divisions = Session::get('divisions'); @endphp

      <div class="single-right-block">
         <h4>Application</h4>
        <div class="all-selected-block">


            @foreach($divisions as $k=>$d)

            <div class="sidebar-right-item">
            <div class="sidebar-cat-item-inner">
               <div class="sidebar-cat-item-icon">
                  <svg class="icon icon-glasses">
                     <use xlink:href="#{{strtolower($d)}}"></use>
                  </svg>
               </div>
               <div class="sidebar-cat-item-title">
                  {{$d}}
               </div>
               <div class="sidebar-cat-item-desc">
               </div>
               </div>
            </div>
           @endforeach
         </div>
         <a href="{{url('guide')}}" class="switch-link">Switch Choice</a>
      </div>
      @endif
      @if(Session::has('category'))
      @php $category='';$d=''; $category = Session::get('category');
         if(Session::has('divisions')){
         $div = Session::get('divisions');
         $d=implode(",",$div);
      }
       @endphp
      <div class="single-right-block">
         <h4>Laminates</h4>
         <div class="all-selected-block">
         @foreach($category as $k=>$cat)

         <div class="sidebar-right-item">
           <div class="sidebar-cat-item-inner">
               <div class="sidebar-cat-item-icon">
                  <svg class="icon icon-glasses">
                     <use xlink:href="#{{str_slug($cat)}}"></use>
                  </svg>
               </div>
               <div class="sidebar-cat-item-title">
                 {{$cat}}
               </div>
               <div class="sidebar-cat-item-desc">
               </div>
            </div>
          </div>
         @endforeach
        </div>
         <a href="{{url('chooselaminates?division='.$d)}}" class="switch-link">Switch Choice</a>
      </div>
      @endif
      @if(Session::has('preference'))
      @php $preference='';$c='';$d=''; $preference = Session::get('preference');
      if(Session::has('category')) {
       $category = Session::get('category'); $c=implode(",",$category);
      }
        if(Session::has('divisions')){
         $div = Session::get('divisions');
         $d=implode(",",$div);
      }
      @endphp
      <div class="single-right-block">
         <h4>Finish</h4>
           <div class="all-selected-block">
            @foreach($preference as $k=>$prefer)
            <div class="sidebar-right-item">
            <div class="sidebar-cat-item-inner">
               <div class="sidebar-cat-item-icon">
                  <svg class="icon icon-glasses">
                     <use xlink:href="#{{str_slug($prefer)}}"></use>
                  </svg>
               </div>
               <div class="sidebar-cat-item-title">
                 {{$prefer}}
               </div>
               <div class="sidebar-cat-item-desc">
               </div>
            </div>
         </div>
           @endforeach
         </div>
         <a href="{{url('choosepreference?category='.$c.'&division='.$d)}}" class="switch-link">Switch Choice</a>
      </div>
      @endif
   </div>
</div> -->


  <div class="sidebar">
         <div class="sidebar-right">
            <div class="sidebar-right-filters">
              @if(Request::segment(1) == 'chooselaminates')
               <a href="{{url('guide')}}" class="sidebar-right-filters-item">
                  <div class="sidebar-right-filters-icon">
                    <img class="filter-img" src="http://dev.firsteconomy.com/royaletouche-new/assets/img/icons/application.png" data-src="non-preloaded">
                  </div>
                  <div class="sidebar-right-filters-txt no-selection">
                     <div class="sidebar-right-filters-txt-inner">
                    @php
                    $app=request()->get('applications');
                    @endphp
                       <!--  <strong> @if(Session::has('applications')) {{count(Session::get('applications'))}}  Application  choosen @else Application @endif</strong> -->
                         <strong> @if(isset($app) && $app != '') @if(count(explode(",",$app)) == 1) {{count(explode(",",$app))}}  Application  chosen @elseif(count(explode(",",$app)) > 1) {{count(explode(",",$app))}} Applications chosen @else Application @endif @endif</strong>

                     </div>
                  </div>
                  <div class="sidebar-right-filters-txt selection">
                     <div class="sidebar-right-filters-txt-inner">
                        <strong>Application</strong>
                        Switch
                     </div>
                  </div>
               </a>
               @endif
                @if(Request::segment(1) == 'choosepreference')
               <a href="{{url('guide')}}" class="sidebar-right-filters-item">
                  <div class="sidebar-right-filters-icon">
                   <img class="filter-img" src="http://dev.firsteconomy.com/royaletouche-new/assets/img/icons/application.png" data-src="non-preloaded">
                  </div>
                  <div class="sidebar-right-filters-txt no-selection">
                     <div class="sidebar-right-filters-txt-inner">
                       <!--  <strong> @if(Session::has('applications')) {{count(Session::get('applications'))}}  Application  choosen @else Application @endif </strong> -->
                        @php
                    $app=request()->get('applications');
                    @endphp
                       <!--  <strong> @if(Session::has('applications')) {{count(Session::get('applications'))}}  Application  choosen @else Application @endif</strong> -->
                         <strong> @if(isset($app) && $app != '') @if(count(explode(",",$app)) == 1) {{count(explode(",",$app))}}  Application  chosen @elseif(count(explode(",",$app)) > 1) {{count(explode(",",$app))}} Applications chosen @else Application @endif @endif</strong>

                     </div>
                  </div>
                  <div class="sidebar-right-filters-txt selection">
                     <div class="sidebar-right-filters-txt-inner">
                        <strong>Application</strong>
                        Switch
                     </div>
                  </div>
               </a>
               <a href="{{url('chooselaminates')}}" class="sidebar-right-filters-item">
                  <div class="sidebar-right-filters-icon">
                   <img class="filter-img" src="http://dev.firsteconomy.com/royaletouche-new/assets/img/icons/texture.png" data-src="non-preloaded">
                   </div>
                  <div class="sidebar-right-filters-txt no-selection">
                     <div class="sidebar-right-filters-txt-inner">
                          @php
                    $lam=request()->get('laminates');
                    @endphp

                         <strong>@if(isset($lam) && $lam != '') @if(count(explode(",",$lam)) == 1) {{count(explode(",",$lam))}}  Laminate  chosen @elseif(count(explode(",",$lam)) > 1) {{count(explode(",",$lam))}} Laminates chosen @else Laminate @endif @endif</strong>
                       <!--  <strong>@if(Session::has('laminates')) {{count(Session::get('laminates'))}}  Laminates  choosen @else Laminates @endif </strong> -->

                     </div>
                  </div>
                  <div class="sidebar-right-filters-txt selection">
                     <div class="sidebar-right-filters-txt-inner">
                        <strong>Laminates</strong>
                        Switch
                     </div>
                  </div>
               </a>
               @endif

            </div>
         </div>
      </div>

