@extends('layouts.app')
@section('content')

        <main class="main">
            <div class="page-header text-center" style="background-image: url('assets/images/page-header-bg.jpg')">
                <div class="container">
                    <h1 class="page-title">Collaboration<span>Pages</span></h1>
                </div><!-- End .container -->
            </div>
            <nav aria-label="breadcrumb" class="breadcrumb-nav">
                <div class="container">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                        <li class="breadcrumb-item"><a href="#">Pages</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Collaboration</li>
                    </ol>
                </div><!-- End .container -->
            </nav><!-- End .breadcrumb-nav -->

            <div class="page-content pb-0 mb-3">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-4 mb-2 mb-lg-0">
                            <img src="assets/images/coll.jpg">
                        </div><!-- End .col-lg-6 -->
                        <div class="col-lg-6 offset-lg-1">
                            <h2 class="title mb-2">Business Enquiry</h2><!-- End .title mb-2 -->
                            <p class="mb-2">Fill out this easy application and our team will get in touch with you within the next 24-48 hours.</p>
                            <form action="#" class="contact-form mb-3">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <label for="cname" class="sr-only">Company Name </label>
                                        <input type="text" class="form-control" id="cname" placeholder="Company Name *" required>
                                    </div><!-- End .col-sm-6 -->

                                    <div class="col-sm-6">
                                        <label for="cemail" class="sr-only">Email</label>
                                        <input type="email" class="form-control" id="cemail" placeholder="Email *" required>
                                    </div><!-- End .col-sm-6 -->
                                </div><!-- End .row -->

                                <div class="row">
                                    <div class="col-sm-6">
                                        <label for="cphone" class="sr-only">Mobile</label>
                                        <input type="tel" class="form-control" id="cphone" placeholder="Mobile *" required>
                                    </div><!-- End .col-sm-6 -->

                                    <div class="col-sm-6">
                                        <label for="sname" class="sr-only">State </label>
                                        <input type="text" class="form-control" id="sname" placeholder="State *" required>
                                    </div><!-- End .col-sm-6 -->
                                </div><!-- End .row -->

                                <div class="row">
                                    <div class="col-sm-6">
                                        <label for="ccity" class="sr-only">City</label>
                                        <input type="tel" class="form-control" id="ccity" placeholder="City *" required>    
                                    </div><!-- End .col-sm-6 -->

                                    <div class="col-sm-6">
                                        <label for="cbtype" class="sr-only">Bussiness Type </label>
                                        <select class="form-control" id="cbtype" required>
                                            <option value="Retailer">Retailer</option>
                                            <option value="Wholeseller">Wholeseller</option>
                                            <option value="Distributor">Distributor</option>
                                        </select>
                                    </div><!-- End .col-sm-6 -->
                                </div><!-- End .row -->

                                <label for="cstores" class="sr-only">GST Number</label>
                                <input type="text" class="form-control" id="cstores" placeholder="GST Number *" required>

                                <label for="cmessage" class="sr-only">Message</label>
                                <textarea class="form-control" cols="30" rows="4" id="cmessage" required placeholder="Message *"></textarea>

                                <button type="submit" class="btn btn-outline-primary-2 btn-minwidth-sm">
                                    <span>SUBMIT</span>
                                    <i class="icon-long-arrow-right"></i>
                                </button>
                            </form><!-- End .contact-form -->
                        </div><!-- End .col-lg-6 -->
                    </div><!-- End .row -->
                </div><!-- End .container -->
            </div><!-- End .page-content -->
        </main><!-- End .main -->

@endsection      