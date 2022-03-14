@extends('layouts.app')
@section('content')

        <main class="main">
        	<div class="page-header text-center" style="background-image: url('assets/images/page-header-bg.jpg')">
        		<div class="container">
        			<h1 class="page-title">Contact us<span>Pages</span></h1>
        		</div><!-- End .container -->
        	</div>
            <nav aria-label="breadcrumb" class="breadcrumb-nav">
                <div class="container">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Contact us</li>
                    </ol>
                </div><!-- End .container -->
            </nav><!-- End .breadcrumb-nav -->

            <div class="page-content pb-0">
                <div class="container">
                	<div class="row">
                		<div class="col-lg-6 mb-2 mb-lg-0">
                			<h2 class="title mb-1">We Love Hearing From You!</h2><!-- End .title mb-2 -->
                			<p class="mb-3">Whether you have a query, feedback, or a complaint; we are always on our toes to address your concerns. Feel free to drop in your message along with your contact details and someone from our customer service team will get in touch with you.</p>
                			<div class="row">
                				<div class="col-sm-7">
                					<div class="contact-info">
                						<h3>Get in touch</h3>

                						<ul class="contact-list">
                							<li>
                								<i class="icon-map-marker"></i>
	                							<b>Satthiya Fashions</b><br> 
												Gala No 201-202 Kanorita Hub, Jogeshwari East, Mumbai-400060, Maharashtra, India
	                						</li>
                							<li>
                								<i class="icon-phone"></i>
												<b>Call or Whatsapp on</b> <br>
												<a href="tel:#">+91 9876543210</a>
                							</li>
                							<li>
                								<i class="icon-envelope"></i>
												<b>Mail us</b><br>
                								<a href="mailto:#">zehnalynxx@gmail.in</a>
                							</li>
                						</ul><!-- End .contact-list -->
                					</div><!-- End .contact-info -->
                				</div><!-- End .col-sm-7 -->

                				
                			</div><!-- End .row -->
                		</div><!-- End .col-lg-6 -->
                		<div class="col-lg-6">
                			<h2 class="title mb-1">Got Any Questions?</h2><!-- End .title mb-2 -->
                			<p class="mb-2">Use the form below to get in touch with the sales team</p>
							@if(session('success'))
                              <div class="alert alert-success" role="alert">
                                        {!! \Session::get('success') !!}
							  </div>
							@endif

                			<form action="{{url('submit-contact')}}" class="contact-form mb-3" method="post">
								@csrf
                				<div class="row">
                					<div class="col-sm-6">
                                        <label for="name" class="sr-only">Name</label>
                						<input type="text" class="form-control" id="name" name="name" placeholder="Name *" required>
                					</div><!-- End .col-sm-6 -->

                					<div class="col-sm-6">
                                        <label for="email" class="sr-only">Email</label>
                						<input type="email" class="form-control" id="email" name="email" placeholder="Email *" required>
                					</div><!-- End .col-sm-6 -->
                				</div><!-- End .row -->

                				<div class="row">
                					<div class="col-sm-6">
                                        <label for="mobile" class="sr-only">Phone</label>
                						<input type="tel" class="form-control" id="mobile" name="mobile" placeholder="Phone *" required>
                					</div><!-- End .col-sm-6 -->

                					<div class="col-sm-6">
                                        <label for="subject" class="sr-only">Subject</label>
                						<input type="text" class="form-control" id="subject" name="subject" placeholder="Subject">
                					</div><!-- End .col-sm-6 -->
                				</div><!-- End .row -->

                                <label for="message" class="sr-only">Message</label>
                				<textarea class="form-control" cols="30" rows="4" id="message" name="message" required placeholder="Message *"></textarea>

                				<button type="submit" class="btn btn-outline-primary-2 btn-minwidth-sm">
                					<span>SUBMIT</span>
            						<i class="icon-long-arrow-right"></i>
                				</button>
                			</form><!-- End .contact-form -->
							
                		</div><!-- End .col-lg-6 -->
                	</div><!-- End .row -->
                </div><!-- End .container -->
            	<!-- <div id="map"></div> --><!-- End #map -->
            </div><!-- End .page-content -->
        </main><!-- End .main -->

@endsection      