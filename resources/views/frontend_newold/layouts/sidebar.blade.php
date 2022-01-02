
           <div class="sidebar" id="sidebaropen">
               <div class="apply-btn-left-sidebar hide hidden-xs">
                  <a href="javascript:void(0)" data-base_url="{{url('/')}}" class="apply-link-sidebar apply-btn">Apply</a>
               </div>
               <div class="apply-btn-left-sidebar hide visible-xs">
                  <a href="javascript:void(0)" data-base_url="{{url('/')}}" class="apply-link-sidebar apply-btn-mobile">Apply</a>
               </div>
               <div class="sidebar-cat col-5 hidden-xs appall">
                  <h3 class="filter-title application">Application</h3>

                  @if(!empty($applications))


                  @foreach($applications as $k=>$application)
                  <div class="sidebar-cat-item good-weather division  @if (isset($selected_apps) && in_array($application->name,$selected_apps)) {{ 'selectdiv active' }} @endif" data-division="{{$application->name}}">
                     <div class="sidebar-cat-item-inner">
                        <div class="sidebar-cat-item-icon">
                           <svg class="icon icon-good-weather">
                              <use xlink:href="#{{$application->icon_tag}}"></use>
                           </svg>
                        </div>
                        <div class="sidebar-cat-item-title">
                          {{$application->name}}
                        </div>
                        <div class="sidebar-cat-item-desc">
                          <!--  Lorem Ipsum is simply dummy text of the printing and typesetting industry. -->
                        </div>
                     </div>
                  </div>
                  @endforeach
                  @php

                  @endphp
                  <div class="select-all sidebar-cat-item good-weather" id="division">
                     <div class="sidebar-cat-item-inner">
                        <div class="sidebar-cat-item-icon">
                           <svg class="icon icon-good-weather">
                              <use xlink:href="#other-texture"></use>
                           </svg>
                        </div>
                        <div class="sidebar-cat-item-title" id="selectdiv">
                         Select All
                        </div>
                        <div class="sidebar-cat-item-desc">
                          <!--  Lorem Ipsum is simply dummy text of the printing and typesetting industry. -->
                        </div>
                     </div>
                  </div>
                  @endif

               </div>
               <div class="sidebar-cat col-2 scroll-cat hidden-xs lamall" id="style-3" >
                  <h3 class="filter-title texture">Texture</h3>
                  @if(!empty($laminates))
                    @foreach($laminates as $k=>$c)
                  <div class="sidebar-cat-item  @if($k==0){{'glasses'}} @else {{'no-glasses'}} @endif @if(in_array($c->name,$selected_lam)) {{ 'selectedcat active' }}  @endif category"  data-category="{{$c->name}}">
                     <div class="sidebar-cat-item-inner">
                        <div class="sidebar-cat-item-icon">
                           <svg class="icon icon-glasses">
                              <use xlink:href="#{{$c->icon_tag}}"></use>
                           </svg>
                        </div>
                        <div class="sidebar-cat-item-title abc">
                           {{$c->name}}
                        </div>
                        <div class="sidebar-cat-item-desc">
                        </div>
                     </div>
                  </div>
                  @endforeach
                    <div class="select-all sidebar-cat-item no-glasses  @if(count($selected_lam) == count($laminates)) {{ 'selectAll'}} @endif" id="category">
                     <div class="sidebar-cat-item-inner">
                        <div class="sidebar-cat-item-icon">
                           <svg class="icon icon-eye">
                              <use xlink:href="#other-texture"></use>
                           </svg>
                        </div>
                        <div class="sidebar-cat-item-title" id="selectedcat">
                         Select All

                        </div>
                        <div class="sidebar-cat-item-desc">
                        </div>
                     </div>
                  </div>
                  @endif


               </div>
               <div class="sidebar-cat col-5 hidden-xs texall" data-cat="finish">
                  <h3 class="filter-title finish">Finish</h3>
                  @if(!empty($textures))
                    @foreach($textures as $k=>$a)
                  <div class="sidebar-cat-item attribute @if($k==0){{'cylindric'}} @else {{'spheric'}} @endif @if(in_array($a->name,$selected_text)) {{ 'selectedattr active' }}  @endif" data-attribute="{{$a->name}}">
                     <div class="sidebar-cat-item-inner">
                        <div class="sidebar-cat-item-icon">
                           <svg class="icon icon-cylindric">
                              <use xlink:href="#{{$a->icon_tag}}"></use>
                           </svg>
                        </div>
                        <div class="sidebar-cat-item-title">
                           {{$a->name}}
                        </div>
                        <div class="sidebar-cat-item-desc">
                          <!--  La forme cylindrique donne une apparence plus arrondie. Elle privilégie la vision périphérique verticale avec un plus grand angle -->
                        </div>
                     </div>
                  </div>
                  @endforeach
                  <div class="select-all sidebar-cat-item  spheric @if(count($selected_text) == count($textures)) {{ 'selectAll'}} @endif" id="attribute">
                     <div class="sidebar-cat-item-inner">
                        <div class="sidebar-cat-item-icon">
                           <svg class="icon icon-cylindric">
                              <use xlink:href="#other-texture"></use>
                           </svg>
                        </div>
                        <div class="sidebar-cat-item-title" id="selectedattr">
                           Select All
                        </div>
                        <div class="sidebar-cat-item-desc">

                        </div>
                     </div>
                  </div>
                  @endif

               </div>


               <div id="mob-filter-sidebar" class="mob-sidebar visible-xs">
               <ul id="accordion" class="accordion">
                    <li>
                      <div class="link">
                        <img class="filter-img-mob" src="{{URL::asset('frontend/icons/application.png')}}" data-src="non-preloaded">
                        Application<i class="fa fa-chevron-down"></i>
                     </div>
                      <ul class="submenu divs">

                           @if(!empty($applications))
                              @foreach($applications as $k=>$application)
                              @php
                              $appaout[]=$application->name;
                              @endphp
                           <li class="@if (isset($selected_apps) && in_array($application->name,$selected_apps)) {{ '' }} @else {{'filterli'}} @endif">
                            <!-- <svg class="icon icon-good-weather">
                              <use xlink:href="#{{$application->icon_tag}}"></use>
                           </svg> -->


                           <input type="checkbox" name="division" class="cat_items division1 @if (isset($selected_apps) && in_array($application->name,$selected_apps)) {{ 'selectdiv1' }} @endif" id="{{$application->id}}" @if (isset($selected_apps) && in_array($application->name,$selected_apps)){{ 'checked selectdiv' }} @endif value="{{$application->name}}"><label for="{{$application->name}}">
                           <svg class="icon icon-good-weather">
                              <use xlink:href="#{{$application->icon_tag}}"></use>
                           </svg>
                            {{$application->name}}</label></li>
                             @endforeach
                           <li class="@if(count($applications) == count($selected_apps))  {{''}} @else {{ 'filterli'}} @endif"><input type="checkbox" class="cat_items select-alldiv" id="division1" name="div" mid="1" value="select-all"><label for="division1" id="divlabel">Select All</label></li>
                           @endif
                      </ul>
                    </li>
                    <li>
                      <div class="link"><img class="filter-img-mob" src="{{URL::asset('frontend/icons/texture.png')}}" data-src="non-preloaded">Laminates<i class="fa fa-chevron-down"></i></div>
                      <ul class="submenu cats">
                          @if(!empty($laminates))
                            @foreach($laminates as $k=>$c)
                             @php
                              $lamaout[]=$c->name;
                              @endphp
                          <li class="@if(in_array($c->name,$selected_lam)) {{ '' }} @else {{'filterli'}} @endif">
                            <!-- <svg class="icon icon-glasses">
                              <use xlink:href="#{{$c->icon_tag}}"></use>
                           </svg> -->
                           <input type="checkbox" class="cat_items category1 @if(in_array($c->name,$selected_lam)) {{ 'selectedcat1' }}  @endif" id="{{$c->name}}" name="category" mid="1" value="{{$c->name}}" @if(in_array($c->name,$selected_lam)) {{ 'checked' }}  @endif><label for="{{$c->name}}">
                           <svg class="icon icon-glasses">
                              <use xlink:href="#{{$c->icon_tag}}"></use>
                           </svg>
                           {{$c->name}}</label></li>
                          @endforeach
                          <li class="@if(count($laminates) == count($selected_lam))  {{''}} @else {{ 'filterli'}} @endif"><input type="checkbox" class="cat_items select-allcat" id="category1"  name="cat" mid="1" value="select-all"><label for="category1" id="catlabel">Select All</label></li>
                          @endif
                      </ul>
                    </li>
                    <li>
                      <div class="link"><img class="filter-img-mob" src="{{URL::asset('frontend/icons/finish.png')}}" data-src="non-preloaded">Finish<i class="fa fa-chevron-down"></i></div>

                      <ul class="submenu attrs">
                           @if(!empty($textures))
                              @foreach($textures as $k=>$a)
                              @php
                              $texout[]=$a->name;
                              @endphp
                          <li class="@if(in_array($a->name,$selected_text)) {{ '' }} @else {{ 'filterli' }} @endif">
                            <!-- <svg class="icon icon-eye">
                              <use xlink:href="#other-texture"></use>
                           </svg> -->
                           <input type="checkbox" class="cat_items attribute1 @if(in_array($a->name,$selected_text)) {{ 'selectedattr1' }}  @endif" id="{{$a->name}}" name="attribute" mid="1" value="{{$a->name}}" @if(in_array($a->name,$selected_text)) {{ 'checked' }}  @endif data-attribute="{{$a->name}}"><label for="{{$a->name}}">
                            <svg class="icon icon-eye">
                              <use xlink:href="#other-texture"></use>
                           </svg>
                           {{$a->name}}</label></li>
                             @endforeach
                           <li class="@if(count($textures) == count($selected_text))  {{''}} @else {{ 'filterli'}} @endif"><input type="checkbox" class="cat_items select-allattr" id="attribute1" name="att" mid="1"  value="select-all"><label for="attribute1" id="atrlable">  Select All</label></li>
                              @endif
                      </ul>
                    </li>
                  </ul>
               </div>
                <div class="hide" id="out">{{request()->query('applications')}}</div>
                <div class="hide" id="out1">{{request()->query('laminates')}}</div>
                <div class="hide" id="out2">{{request()->query('textures')}}</div>
                <div class="hide" id="appout">@php echo implode(",",$appaout); @endphp</div>
                <div class="hide" id="lamout1">@php echo implode(",",$lamaout); @endphp</div>
                <div class="hide" id="textout2">@php echo implode(",",$texout); @endphp</div>



               <div class="sidebar-right">
                  <div class="sidebar-right-valid visible-xs" id="apply-btn-mobile">
                     <svg class="icon icon-check">
                        <use xlink:href="#check"></use>
                     </svg>
                     <div class="icon close"></div>
                  </div>
                  <div class="sidebar-right-valid hidden-xs" id="apply-btn">
                     <svg class="icon icon-check">
                        <use xlink:href="#check"></use>
                     </svg>
                     <div class="icon close"></div>
                  </div>
                  <div class="sidebar-right-filters hidden-xs">
                     <div class="sidebar-right-filters-item">
                        <div class="sidebar-right-filters-icon">
                           <img class="filter-img" src="{{asset('frontend/images/application.png')}}" data-src="non-preloaded">
                        </div>
                        <div class="sidebar-right-filters-txt no-selection">
                           <div class="sidebar-right-filters-txt-inner">
                              <h3 class="custom-filters-title"><strong>Application</strong>
                              Change</h3>
                           </div>
                        </div>
                        <div class="sidebar-right-filters-txt selection">
                           <div class="sidebar-right-filters-txt-inner">
                              <h3 class="custom-filters-title"><strong>Application</strong>
                              Change</h3>
                           </div>
                        </div>
                     </div>
                     <div class="sidebar-right-filters-item" >
                        <div class="sidebar-right-filters-icon">
                           <img class="filter-img" src="{{asset('frontend/images/texture.png')}}" data-src="non-preloaded">

                        </div>
                        <div class="sidebar-right-filters-txt no-selection">
                           <div class="sidebar-right-filters-txt-inner">
                              <h3 class="custom-filters-title"><strong>Laminates</strong>
                              Change</h3>
                           </div>
                        </div>
                        <div class="sidebar-right-filters-txt selection">
                           <div class="sidebar-right-filters-txt-inner">
                              <h3 class="custom-filters-title"><strong>Texture</strong>
                              Change</h3>
                           </div>
                        </div>
                     </div>
                     <div class="sidebar-right-filters-item" >
                        <div class="sidebar-right-filters-icon">
                           <img class="filter-img" src="{{asset('frontend/images/finish.png')}}" data-src="non-preloaded">

                        </div>
                        <div class="sidebar-right-filters-txt no-selection">
                           <div class="sidebar-right-filters-txt-inner">
                              <h3 class="custom-filters-title"><strong>Finish</strong>
                              Change</h3>
                           </div>
                        </div>
                        <div class="sidebar-right-filters-txt selection">
                           <div class="sidebar-right-filters-txt-inner">
                              <h3 class="custom-filters-title"><strong>Finish</strong>
                              Change</h3>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>




            <!-- mobile edit filter btn -->
      <div class="sidebar-right-filters visible-xs">
                     <div class="sidebar-right-filters-item">
                        <div class="sidebar-right-filters-icon">
                         <div class="mob-filter-text">
                             <strong>Edit Filters</strong>
                         </div>
                        </div>
                     </div>
                  </div>

