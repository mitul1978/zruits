<div class="page-wrapper">
    <header class="header zehna-header">

        <div class="header-middle sticky-header">
            <div class="coupon-ticker covid">
                <span class="ticker-content">
                    <a href="/">AMAZING DEALS ON THIS SEASON'S FAVOURITES.</a><!-- <a href="#">*T&amp;C Apply.</a> -->
                </span>
            </div>

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
                            @foreach ($categoriesHeader as $category)
                                <li>
                                    <a href="{{url($category->slug)}}" class="">{{$category->title}}</a>
                                </li>
                            @endforeach
                           
                            <li>
                                <a href="#" class="">New Arrrivals</a>
                            </li>
                            <li>
                                <a href="#" class="">Offers</a>
                            </li>
                            <li>
                                <a href="#" class="">Gift Card</a>
                            </li>
                            <li>
                                <a href="{{url('/collaboration')}}" class="">Collaborations</a>
                            </li>

                        </ul><!-- End .menu -->
                    </nav><!-- End .main-nav -->
                </div><!-- End .header-left -->

                <div class="header-right">
                    <div class="header-search">
                        <a href="#" class="search-toggle" role="button" title="Search"><i class="icon-search"></i></a>
                        <form action="#" method="get">
                            <div class="header-search-wrapper">
                                <label for="q" class="sr-only">Search</label>
                                <input type="search" class="form-control" name="q" id="q" placeholder="Search in..." required>
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
                        <a href="{{route('user')}}?tab=wishlist" title="Wishlist">
                            <div class="icon">
                                <i class="icon-heart-o"></i>
                                @if(@Helper::getAllProductFromWishlist() && count(Helper::getAllProductFromWishlist()))
                                 <span class="wishlist-count badge">{{count(Helper::getAllProductFromWishlist())}}</span>
                                @endif 
                            </div>
                        </a>
                    </div>

                    <div class="dropdown cart-dropdown">

                            <a href="javascript:void(0);" class="dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-display="static">
                                <i class="icon-shopping-cart"></i>
                                @if(@Helper::getAllProductFromCart() && count(Helper::getAllProductFromCart()))
                                <span class="cart-count">{{count(Helper::getAllProductFromCart())}}</span>
                                @endif
                            </a>

                        <div class="dropdown-menu dropdown-menu-right">
                            <div class="dropdown-cart-products">
                                <span class="cart-count"> @livewire('cart-counter') </span>
                                {{-- @foreach(Helper::getAllProductFromCart() as $key=>$cart)
                                    @if($cart->product)
                                        <div class="product">
                                            <div class="product-cart-details">
                                                <h4 class="product-title">
                                                    <a href="product.html">Beige knitted elastic runner shoes</a>
                                                </h4>

                                                <span class="cart-product-info">
                                                    <span class="cart-product-qty">1</span>
                                                    x $84.00
                                                </span>
                                            </div><!-- End .product-cart-details -->

                                            <figure class="product-image-container">
                                                <a href="product.html" class="product-image">
                                                    <img src="assets/images/products/cart/product-1.jpg" alt="product">
                                                </a>
                                            </figure>
                                            <a href="#" class="btn-remove" title="Remove Product"><i class="icon-close"></i></a>
                                        </div><!-- End .product -->       
                                    @endif                              --}}
                            </div><!-- End .cart-product -->

                            {{-- <div class="dropdown-cart-total">
                                <span>Total</span>

                                <span class="cart-total-price">$160.00</span>
                            </div><!-- End .dropdown-cart-total --> --}}
                            @if(@count(Helper::getAllProductFromCart()) > 0)
                                <div class="dropdown-cart-action">
                                    <a href="{{route('user-cart')}}" class="btn btn-primary">View Cart</a>
                                    <a href="{{route('checkout')}}" class="btn btn-outline-primary-2"><span>Checkout</span><i class="icon-long-arrow-right"></i></a>
                                </div><!-- End .dropdown-cart-total -->
                            @else
                                <div class="dropdown-cart-action">
                                    <p>Your Cart is Empty</p>
                                </div><!-- End .dropdown-cart-total -->
                            @endif    
                        </div><!-- End .dropdown-menu -->
               
                    </div><!-- End .cart-dropdown -->
                </div><!-- End .header-right -->
            </div><!-- End .container -->
        </div><!-- End .header-middle -->
    </header><!-- End .header -->