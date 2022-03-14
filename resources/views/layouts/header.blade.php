<div class="page-wrapper">
    <header class="header zehna-header">

        <div class="header-middle sticky-header">
        <div class="topbar-content">
                    <div class="top-bar-left p-3">                        
                        <ul class="lqd-custom-menu reset-ul inline-nav">
                            <li><a href="#" target="_self">Great Craftmanship</a></li>
                            <li><a href="#" target="_self">Curated Designs</a></li>
                            <li><a href="#" target="_self">Pan India Free Shipping</a></li>
                        </ul>
                    </div>
                </div>
            <!-- <div class="coupon-ticker covid">
                <span class="ticker-content">
                    <a href="/">AMAZING DEALS ON THIS SEASON'S FAVOURITES.</a> <a href="#">*T&amp;C Apply.</a>
                </span>
            </div> -->

            <div class="container main-header">
                <div class="header-left">
                    <button class="mobile-menu-toggler">
                        <span class="sr-only">Toggle mobile menu</span>
                        <i class="icon-bars"></i>
                    </button>

                    <a href="/" class="logo">
                        <img src="{{URL::asset('assets/images/logo.png')}}" alt="Molla Logo" width="105" height="25">
                    </a>
                </div>
                <div class="header-center">
                    <nav class="main-nav">
                        <ul class="menu sf-arrows">
                            <li>
                                <a href="/products" class="">New Arrivals</a>
                            </li>
                            @foreach ($categoriesHeader as $category)
                                <li>
                                    <a href="{{url('/categories/'.$category->slug)}}" class="">{{$category->title}}</a>
                                </li>
                            @endforeach
                            <li>
                                <a href="/offers" class="">Offers</a>
                            </li>
                            <li>
                                <a href="{{url('/giftcard')}}" class="">Gift Card</a>
                            </li>
                            {{-- <li>
                                <a href="{{url('/collaboration')}}" class="">Collaborations</a>
                            </li> --}}
                        </ul><!-- End .menu -->
                    </nav><!-- End .main-nav -->
                </div><!-- End .header-left -->

                <div class="header-right">
                    <div class="header-search">
                        <a href="#" class="search-toggle" role="button" title="Search"><i class="icon-search"></i></a>
                        <form action="/products" method="get">
                            <div class="header-search-wrapper">
                                <label for="search" class="sr-only">Search</label>
                                <input type="search" class="form-control" name="search" id="search" placeholder="Search in..." required>
                            </div><!-- End .header-search-wrapper -->
                        </form>
                    </div><!-- End .header-search -->

                    <div class="user-login">
                        @if(@auth()->user())
                            <a href="{{route('user')}}" >
                                <i class="icon-user"></i>
                            </a>                           
                        @else
                            <a href="#signin-modal" data-toggle="modal">
                                <i class="icon-user"></i>
                            </a>                           
                        @endif
                    </div>

                    <div class="wishlist">
                        @if(is_user_logged_in())
                           <a href="{{route('user')}}?tab=wishlist" title="Wishlist">
                        @else
                           <a href="#signin-modal" data-toggle="modal">
                        @endif
                            <div class="icon">
                                <i class="icon-heart-o"></i>
                                @if(@Helper::getAllProductFromWishlist() && count(Helper::getAllProductFromWishlist()))
                                 <span class="wishlist-count badge">{{count(Helper::getAllProductFromWishlist())}}</span>
                                @endif 
                            </div>
                        </a>
                    </div>

                    <div class="dropdown cart-dropdown">
                        @if(is_user_logged_in())
                           <a href="{{route('user-cart')}}" class="dropdown-toggle" role="button"  aria-haspopup="true" aria-expanded="false" data-display="static">
                        @else
                           <a href="{{route('cart')}}" class="dropdown-toggle" role="button" aria-haspopup="true" aria-expanded="false" data-display="static">
                        @endif     
                            <i class="icon-shopping-cart"></i>
                               <span class="cart-count"> @livewire('cart-counter') </span>
                                {{-- @if(@Helper::getAllProductFromCart() && count(Helper::getAllProductFromCart()))
                                    <span class="cart-count">{{count(Helper::getAllProductFromCart())}}</span>
                                @endif --}}
                        </a>

                        {{-- <div class="dropdown-menu dropdown-menu-right"> --}}
                            {{-- @livewire('cart-list')                             --}}

                            {{-- <div class="dropdown-cart-total">
                                <span>Total</span>
                                <span class="cart-total-price">$160.00</span>
                                </div><!-- End .dropdown-cart-total --> --}}
                            
                            {{-- @if(is_user_logged_in())
                                <div class="dropdown-cart-action">
                                    <a href="{{route('user-cart')}}" class="btn btn-primary">View Cart</a>
                                    <a href="{{route('checkout')}}" class="btn btn-outline-primary-2"><span>Checkout</span><i class="icon-long-arrow-right"></i></a>
                                </div><!-- End .dropdown-cart-total -->
                            @else
                                <div class="dropdown-cart-action">
                                    <a href="{{route('cart')}}" class="btn btn-primary">View Cart</a>
                                    <a href="{{route('checkout')}}" class="btn btn-outline-primary-2"><span>Checkout</span><i class="icon-long-arrow-right"></i></a>
                                </div><!-- End .dropdown-cart-total -->
                            @endif    
                        </div><!-- End .dropdown-menu --> --}}
               
                    </div><!-- End .cart-dropdown -->
                </div><!-- End .header-right -->
            </div><!-- End .container -->
        </div><!-- End .header-middle -->
    </header><!-- End .header -->