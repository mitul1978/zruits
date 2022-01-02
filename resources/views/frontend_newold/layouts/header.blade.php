<style type="text/css">

</style>

<div class="side_header">
<div class="search-container">
  <!-- <div class="search-box">
    <input type="text" class="input" placeholder="Search" name="term" id="term">
    <div class="btn-search-all">
       <i class="fa fa-search faSearch"  aria-hidden="true"></i>
       <i class="fa fa-close faClose"  aria-hidden="true"></i>
        <button type="submit" id="search"><i class="fa fa-search"></i></button>
     </div>
  </div> -->

  <div class="search-box">
  	<form id="searchform" action="{{url('products')}}">
     <input class="search-txt product_search_keyword" type="text" name="search" id="term" placeholder="Type to Search" value="{{request()->get('search')}}" autocomplete="off">
      <button type="submit" class="hide" id="search"></button>

	</form>
	<div class="search-btn">
        <i class="fa fa-search"></i>
    </div>
  </div>
</div>
<a href="{{route('cart')}}">

<div class="cart-btn">
    <i class="fa fa-shopping-cart" aria-hidden="true"></i> 
  
    <span class="cart-count"> @livewire('cart-counter') </span>

 </div>
</a>

<!-- login btn -->
@if(is_user_logged_in())
<button id="open_profile_card" class="login-btn">
  <i class="fa fa-user"></i>
</button>
@else
<button class="login-btn" data-toggle="modal" href="javascript:void(0)" onclick="openLoginModal();">
    <i class="fa fa-user"></i>
</button>
@endif
<!-- login btn end-->

 <!-- Profile cart -->
 @auth
     
<div class="profile-card">

    <a href="javascript:void(0);" class="close-profile"><i class="fa fa-close"></i></a>
  
    <div class="profile-block">    
      <div class="user-img">
        <span>{{strtoupper(substr(auth()->user()->name,-1))}}</span>
      </div>
      <div class="user-details">
        <h3>{{auth()->user()->name}}</h3>      
      </div>
      <a href="{{route('user-profile')}}" class="edit-profile"> <i class="fa fa-edit"></i> Edit Profile</a>
    </div>
      <ul class="profile-cart-list">
       
        <li><a href="{{route('user.order.index')}}"><i class="fa fa-list"></i>Your Orders</a></li>
        <li><a href="{{route('wishlist')}}"><i class="fa fa-heart"></i>Your Wishlist</a></li>
        <li><a href="{{route('user.logout')}}"><i class="fa fa-sign-out"></i>Sign Out</a></li>
      </ul>
  </div>
  <!-- Profile cart end -->
  @endauth

<div class="navbar mobile-navbar gd-sldm">
    <div class="sldm">

        <nav>



            <div class="sldm-nav-container">
                <div class="sldm-header">
                    <div class="sldm-header-image-wrapper">
                        <!-- Add Header Image Here -->

                          <!-- <img src="images/logo.png">       -->
                    </div>
                </div>

                <div class="sldm-nav">

                    <a href="{{url('/')}}" class="home-top-logo" style="opacity: 1; transform: matrix(1, 0, 0, 1, 0, 0);">
                        <img src="https://ik.imagekit.io/heccv5isbw/logo.png">
                    </a>
                    <ul class="sldm-default">
                      <!--   <li>


                            <a href="{{url('/')}}">

                                <div class="sidebar-right-item">
                                    <div class="sidebar-cat-item-inner">
                                       <div class="sidebar-cat-item-icon">
                                           <img src="https://ik.imagekit.io/heccv5isbw/home.png">
                                       </div>
                                       <div class="sidebar-cat-item-title">
                                          Home
                                       </div>
                                    </div>
                                </div>
                             </a>
                        </li> -->

                         <li>
                            <a href="{{url('about-us')}}">
                                <div class="sidebar-right-item">
                                    <div class="sidebar-cat-item-inner">
                                       <div class="sidebar-cat-item-icon">
                                           <img src="https://ik.imagekit.io/heccv5isbw/about_us.png">
                                       </div>
                                       <div class="sidebar-cat-item-title">
                                            About Us
                                       </div>
                                    </div>
                                </div>
                          </a>
                        </li>
                         <li>
                            <a href="{{url('quality')}}">
                             <div class="sidebar-right-item">
                                    <div class="sidebar-cat-item-inner">
                                       <div class="sidebar-cat-item-icon">
                                           <img src="https://ik.imagekit.io/heccv5isbw/quality.png">
                                       </div>
                                       <div class="sidebar-cat-item-title">
                                         Our Quality
                                       </div>
                                    </div>
                            </div>
                            </a>
                        </li>

                        <li class="sldm-submenu hide">
                            <a href="#" class="">Categories</a>
                            <ul class="sldm-default" style="display: none;">
                                @if(!empty($category))
                                @foreach($category as $k=>$c)
                                <li>
                                    <a href="https://royaletouche.com/productlisting?category={{$c->name}}">{{$c->name}}</a>
                                </li>
                                @endforeach
                                @endif
                            </ul>
                        </li>
                          <li>
                            <a href="{{url('catalogues')}}">
                             <div class="sidebar-right-item">
                                    <div class="sidebar-cat-item-inner">
                                       <div class="sidebar-cat-item-icon">
                                           <img src="https://ik.imagekit.io/heccv5isbw/catalog.png">
                                       </div>
                                       <div class="sidebar-cat-item-title">
                                        Our Catalogues
                                       </div>
                                    </div>
                            </div>
                        </a>
                        </li>



                         <li>
                            <a href="{{url('/careers')}}">
                             <div class="sidebar-right-item">
                                    <div class="sidebar-cat-item-inner">
                                       <div class="sidebar-cat-item-icon">
                                           <img src="https://ik.imagekit.io/heccv5isbw/newsletter.png">
                                       </div>
                                       <div class="sidebar-cat-item-title">
                                           Careers
                                       </div>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href='https://stores.royaletouche.com'>
                                <div class="sidebar-right-item">
                                    <div class="sidebar-cat-item-inner">
                                       <div class="sidebar-cat-item-icon">
                                           <img src="https://ik.imagekit.io/heccv5isbw/store_locator.png">
                                       </div>
                                       <div class="sidebar-cat-item-title">
                                          Reach Us
                                       </div>
                                    </div>
                                </div>
                            </a>
                        </li>

                          <li>


                            <a href="https://www.pavimentofloors.com/" target="_blank">

                                <div class="sidebar-right-item">
                                    <div class="sidebar-cat-item-inner">
                                       <div class="sidebar-cat-item-icon">
                                           <img style="filter: invert(0);" src="{{asset('frontend/images/icons/PavimentoFloors.png')}}">
                                       </div>
                                       <div class="sidebar-cat-item-title">
                                       Pavimento Wooden Floors
                                       </div>
                                    </div>
                                </div>
                             </a>
                        </li>


                    </ul>
                    <ul class="sldm-social">
                        <li>
                            <a href="https://www.facebook.com/RoyaleToucheOfficial" class="sldm-facebook"><i class="fa fa-facebook"></i></a>
                        </li>
                        <li>
                            <a href="https://www.linkedin.com/company/royale-touche-laminates-pvt.-ltd" class="sldm-linkedin"><i class="fa fa-linkedin"></i></a>
                        </li>
                        <li>
                            <a href="https://twitter.com/Royale_Touche" class="sldm-twitter"><i class="fa fa-twitter"></i></a>
                        </li>
                        <li>
                            <a href="https://www.instagram.com/royale_touche/" class="sldm-instagram"><i class="fa fa-instagram"></i></a>
                        </li>
                        <li>
                            <a href="https://www.youtube.com/user/RoyaleToucheOfficial" class="sldm-youtube"><i class="fa fa-youtube-play"></i></a>
                        </li>
                    </ul>

                   <!--  <div class="pavimentofloors">
                        <p><a href="https://www.pavimentofloors.com/" target="_blank">www.pavimentofloors.com</a></p>
                    </div> -->

                    <div class="copyright">
                        <p>Powered By <a href="https://www.firsteconomy.com/" target="_blank">First Economy</a></p>
                    </div>
                </div>

            </div>

            <a class="sldm-toggle">
                <i class="fa fa-times sldm-close"></i>
                <i class="fa fa-bars sldm-open visible-xs"></i>
                <!-- <img src="images/open-menu.png"  class="sldm-open visible-xs"> -->
               <!--   <button type="button" class="sldm-open visible-xs">
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                </button> -->
            </a>
        </nav>
    </div>

</div>
</div>

          <h1 class="home-top-left" >
                        <!-- <span class="home-top-title">
                        Luxury Laminates
                        </span>
                        <span class="home-top-brand">
                        Royale Touche
                        </span>   -->
                        <a href="{{url('/')}}" class=""><img src="https://ik.imagekit.io/heccv5isbw/logo.png"></a>
                     </h1>


                <div class="home-top internal-header">

                     <!-- <a href="{{url('/')}}" class="home-top-logo">
                     <img src="{{asset('frontend/images/logo.png')}}">
                     </a> -->

                    <div class="product-noticeButton sldm-toggle">
                      <div class="product-noticeButton__wrapper">
                        <!--   <svg>
                              <use xlink:href="#notice"/>
                          </svg> -->
                           <svg height="384pt" viewBox="0 -53 384 384" width="384pt" xmlns="http://www.w3.org/2000/svg"><path d="m368 154.667969h-352c-8.832031 0-16-7.167969-16-16s7.167969-16 16-16h352c8.832031 0 16 7.167969 16 16s-7.167969 16-16 16zm0 0"/><path d="m368 32h-352c-8.832031 0-16-7.167969-16-16s7.167969-16 16-16h352c8.832031 0 16 7.167969 16 16s-7.167969 16-16 16zm0 0"/><path d="m368 277.332031h-352c-8.832031 0-16-7.167969-16-16s7.167969-16 16-16h352c8.832031 0 16 7.167969 16 16s-7.167969 16-16 16zm0 0"/></svg>
                            <!-- <i class="fa fa-bars sldm-open"></i> -->
                      </div>
                    </div>
                @if(isset($breadcrumb) && !empty($breadcrumb))
                @if(!empty($product))
                    <ul class="page-breadcrumb">


                      {!! $breadcrumb->breadcrumb !!}
                        @if(Request::segment(1)=='product')
                        <li> {{$product->name}}</li>
                        @endif

                    </ul>
                   @endif
                @endif
                  </div>

                  <script type="text/javascript">
                  
                      $('#open_profile_card').on('click',function(){
                          
                        $('.profile-card').addClass('open')
                      })


                      $('.close-profile').on('click',function(){
                          
                          $('.profile-card').removeClass('open')
                        })
                  </script>

