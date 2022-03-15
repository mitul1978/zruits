<footer class="footer footer-light footer-zehna">
    <div class="footer-top p-5">
        <div class="container p-0">
            <div class="row">
                <div class="col-sm-7 d-flex align-items-center justify-content-sm-start justify-content-center mb-0 mb-sm-5">
                    <div class="row f-wrap">
                        <div class="col-sm-8 col-md-6 align-self-center">
                            <h6 class="mb-2 mb-sm-0" style="/* width: 360px */">Sign Up for Our Newsletter</h6>
                        </div>
                        <div class="col-sm-8">
                            <div class="input-group">
                                <input type="text" class="form-control form-control-lg" placeholder="Email Adress" aria-label="Email Adress" id="newsletter-email" name="newsletter-email" aria-describedby="button-addon2">
                                <div class="input-group-append">
                                    <button class="btn btn-dark sub-btn" type="button" id="submit-newsletter-button">
                                        <i class="icon-angle-right"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-5 d-flex align-items-center justify-content-sm-end justify-content-center">
                    <div class="social-icons ">
                        <a href="https://www.facebook.com/profile.php?id=100078794362634" class="social-icon" target="_blank" title="Facebook"><i class="icon-facebook-f"></i></a>
                        <a href="https://www.instagram.com/Zehna_in/" class="social-icon" target="_blank" title="Instagram"><i class="icon-instagram"></i></a>
                        <a href="https://in.pinterest.com/sachhacreation/_saved/" class="social-icon" target="_blank" title="Pintrest"><i class="icon-pinterest-p"></i></a>

<!--                      <a href="#" class="social-icon" target="_blank" title="Youtube"><i class="icon-youtube"></i></a> -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-middle">
        <div class="container">
            <div class="row">

                <div class="col-sm-6 col-lg-4">
                    <div class="widget">
                        <h4 class="widget-title">About Us</h4><!-- End .widget-title -->

                        <ul class="widget-list">
                            <li><a href="/about-us">About</a></li>
                            <li><a href="/contact">Contact</a></li>
                            <li><a href="{{url('/collaboration')}}">Collaborations</a></li>

                        </ul><!-- End .widget-list -->
                    </div><!-- End .widget -->
                </div><!-- End .col-sm-6 col-lg-3 -->

                <div class="col-sm-6 col-lg-4">
                    <div class="widget">
                        <h4 class="widget-title">HELP</h4><!-- End .widget-title -->

                        <ul class="widget-list">
                            <li><a href="/privacy-policy">Privacy Policy</a></li>
                            <li><a href="/terms-and-conditions">Terms & Conditions</a></li>
                            <li><a href="/returns-exchange-refund">Returns, Exchange & Refund</a></li>
                            <li><a href="/shipping-policy">Shipping Policy</a></li>
                            <li><a href="/cancellation-policy">Cancellation Policy</a></li>
                            <li><a href="/faq">FAQ</a></li>
                        </ul><!-- End .widget-list -->
                    </div><!-- End .widget -->
                </div><!-- End .col-sm-6 col-lg-3 -->

                <div class="col-sm-6 col-lg-4">
                    <div class="widget">
                        <h4 class="widget-title">Account</h4><!-- End .widget-title -->

                        <ul class="widget-list">
                            <li><a href="/user/login">My Account</a></li>
                            <li><a href="/user/login">My Order</a></li>
                            <li><a href="/giftcard">Gift Card</a></li>
                        </ul><!-- End .widget-list -->
                    </div><!-- End .widget -->
                </div><!-- End .col-sm-6 col-lg-3 -->
            </div><!-- End .row -->
        </div><!-- End .container -->
    </div><!-- End .footer-middle -->

    <div class="footer-bottom bg-black">
        <div class="container flex-column py-4">
            <p class="footer-copyright text-center text-white fs-12">Copyright © 2022 Zehna. All Rights Reserved.</p><!-- End .footer-copyright -->
        </div><!-- End .container -->
    </div><!-- End .footer-bottom -->
</footer><!-- End .footer -->

</div><!-- End .page-wrapper -->
<button id="scroll-top" title="Back to Top"><i class="icon-arrow-up"></i></button>

<!-- Mobile Menu -->
<div class="mobile-menu-overlay"></div><!-- End .mobil-menu-overlay -->

<div class="mobile-menu-container mobile-menu-light">
    <div class="mobile-menu-wrapper">
        <span class="mobile-menu-close"><i class="icon-close"></i></span>
        
        <form action="/products" method="get" class="mobile-search">
            <label for="mobile-search" class="sr-only">Search</label>
            <input type="search" class="form-control" name="search" id="search" placeholder="Search product ..." required>
            <button class="btn btn-primary" type="submit"><i class="icon-search"></i></button>
        </form>

        <div class="tab-content">
            <div class="tab-pane active" id="mobile-menu-tab" role="tabpanel" aria-labelledby="mobile-menu-link">
                <nav class="mobile-nav">
                    <ul class="mobile-menu"> 
                        @foreach ($categoriesHeader as $category)
                           <li>
                                <a href="{{url('/categories/'.$category->slug)}}" class="">{{$category->title}}</a>
                           </li>
                        @endforeach 
                        <li>
                            <a href="/products" class="">New Arrivals</a>
                        </li>  
                        <li>
                            <a href="/offers" class="">Offers</a>
                        </li>
                        <li>
                            <a href="{{url('/giftcard')}}" class="">Gift Card</a>
                        </li>
                        <li>
                            <a href="{{url('/collaboration')}}" class="">Collaborations</a>
                        </li>
                    </ul>
                    
                </nav><!-- End .mobile-nav -->
            </div><!-- .End .tab-pane -->
        </div><!-- End .tab-content -->

    </div><!-- End .mobile-menu-wrapper -->
</div><!-- End .mobile-menu-container -->

<!-- Sign in / Register Modal -->
<div class="modal fade" id="signin-modal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"><i class="icon-close"></i></span>
                </button>

                <div class="form-box">
                    <div class="form-tab">
                        <ul class="nav nav-pills nav-fill" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="signin-tab" data-toggle="tab" href="#signin" role="tab" aria-controls="signin" aria-selected="true">Sign In</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link " id="register-tab" data-toggle="tab" href="#register" role="tab" aria-controls="register" aria-selected="true">Register</a>
                            </li>
                        </ul>
                        <div class="tab-content " id="tab-content-5">
                            <div class="tab-pane fade show active" id="signin" role="tabpanel" aria-labelledby="signin-tab">
                                <form method="post" action="{{route('login.submit')}}" >
                                    @csrf
                                    <div class="form-group">
                                        <label for="singin-email">Username or email address *</label>
                                        <input type="text" class="form-control" id="email" name="email" required>
                                    </div><!-- End .form-group -->

                                    <div class="form-group">
                                        <label for="singin-password">Password *</label>
                                        <input type="password" class="form-control" id="password" name="password" required>
                                    </div><!-- End .form-group -->

                                    <div class="form-footer">
                                        <button type="submit" class="btn btn-outline-primary-2">
                                            <span>LOG IN</span>
                                            <i class="icon-long-arrow-right"></i>
                                        </button>

                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="signin-remember">
                                            <label class="custom-control-label" for="signin-remember">Remember Me</label>
                                        </div><!-- End .custom-checkbox -->

                                        <a href="{{ route('password.request') }}" class="forgot-link">Forgot Your Password?</a>
                                    </div><!-- End .form-footer -->
                                </form>

                            </div><!-- .End .tab-pane -->
                            <div class="tab-pane fade show " id="register" role="tabpanel" aria-labelledby="register-tab">
                                <form method="post" action="{{route('register.submit')}}" >
                                    @csrf
                                    <div class="form-group">
                                        <label for="name">Your Full Name *</label>
                                        <input type="text" class="form-control" id="name" name="name" required>
                                    </div><!-- End .form-group -->
                                    <div class="form-group">
                                        <label for="register-email">Your email address *</label>
                                        <input type="email" class="form-control keyup-email" id="email" name="email" required>
                                    </div><!-- End .form-group -->

                                    <div class="form-group">
                                        <label for="register-password">Password *</label>
                                        <input type="password" class="form-control" id="password" name="password" required>
                                    </div><!-- End .form-group -->

                                    <div class="form-footer">
                                        <button type="submit" class="btn btn-outline-primary-2">
                                            <span>SIGN UP</span>
                                            <i class="icon-long-arrow-right"></i>
                                        </button>

                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="register-policy" required>
                                            <label class="custom-control-label" for="register-policy">I agree to the <a href="#">privacy policy</a> *</label>
                                        </div><!-- End .custom-checkbox -->
                                    </div><!-- End .form-footer -->
                                </form>
                            </div><!-- .End .tab-pane -->
                            <div class="form-choice">
                                <p class="text-center">or sign in with</p>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <a href="{{ url('login/google') }}" class="btn btn-login btn-g">
                                            <i class="icon-google"></i>
                                            Login With Google
                                        </a>
                                    </div><!-- End .col-6 -->
                                    <!--<div class="col-sm-6">
                                        <a href="#" class="btn btn-login btn-f">
                                            <i class="icon-facebook-f"></i>
                                            Login With Facebook
                                        </a>
                                    </div><!-- End .col-6 -->
                                </div><!-- End .row -->
                            </div><!-- End .form-choice -->
                        </div><!-- End .tab-content -->
                    </div><!-- End .form-tab -->
                </div><!-- End .form-box -->
            </div><!-- End .modal-body -->
        </div><!-- End .modal-content -->
    </div><!-- End .modal-dialog -->
</div><!-- End .modal -->

{{-- <div class="container newsletter-popup-container mfp-hide" id="newsletter-popup-form">
    <div class="row justify-content-center">
        <div class="col-12 col-sm-10">
            <div class="row no-gutters bg-white newsletter-popup-content">
                <div class="col-xl-3-5col col-lg-7 banner-content-wrap">
                    <div class="banner-content text-center">
                        <img src="{{url('assets/images/logo.png')}}" class="logo" alt="logo" width="100">
                        <h2 class="banner-title">get <span>25<light>%</light></span> off</h2>
                        <p>Subscribe to the Zehna newsletter to receive timely updates from your favorite products.</p>
                        <form action="#">
                            <div class="input-group input-group-round">
                                <input type="email" class="form-control form-control-white" placeholder="Your Email Address" aria-label="Email Adress" required>
                                <div class="input-group-append">
                                    <button class="btn" type="submit"><span>go</span></button>
                                </div><!-- .End .input-group-append -->
                            </div><!-- .End .input-group -->
                        </form>
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="register-policy-2" required>
                            <label class="custom-control-label" for="register-policy-2">Do not show this popup again</label>
                        </div><!-- End .custom-checkbox -->
                    </div>
                </div>
                <div class="col-xl-2-5col col-lg-5 ">
                    <img src="{{url('assets/images/popup/newsletter/img-1.jpg')}}" class="newsletter-img" alt="newsletter">
                </div>
            </div>
        </div>
    </div>
</div> --}}

