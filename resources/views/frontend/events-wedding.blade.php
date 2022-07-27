@extends('layouts.app')
@section('content')

        <main class="main">
        	<div class="page-header text-center" style="background-image: url('assets/images/page-header-bg.jpg')">
        		<div class="container">
        			<h1 class="page-title">Events & Wedding</h1>
        		</div><!-- End .container -->
        	</div>
            <nav aria-label="breadcrumb" class="breadcrumb-nav">
                <div class="container">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Events & Wedding</li>
                    </ol>
                </div><!-- End .container -->
            </nav><!-- End .breadcrumb-nav -->

            <div class="page-content pb-0">
                <div class="container">
                	<div class="row">
                		<div class="col-lg-6 mb-2">
                			<h5 class="mb-1">We are Events & Wedding Planner</h5><!-- End .title mb-2 -->
                			<p class="mb-3">Weddings are occasions to celebrate with full glamor and grandeur and our sole purpose is to concoct essence of merriment to the divine celebrations of marriages. With constant creative flow, zeal for great work, and total commitment, we have organized more than 15000 weddings till date. From the stressful venue decoration to sumptuous menu selection, we cater to requirements of people with all kind of budgets. We have a large repertoire of exclusive tie-ups with national and international floral and set designers of highest repute.
							</p>
                		</div><!-- End .col-lg-6 -->
                		<div class="col-lg-6">
                			<h5 class="mb-1">Request a Callback</h5><!-- End .title mb-2 -->
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
                                        <label for="mobile" class="sr-only">Mobile</label>
                						<input type="text" class="form-control" id="name" name="name" placeholder="Mobile *" required>
                					</div><!-- End .col-sm-6 -->

                					<div class="col-sm-6">
                                        <label for="email" class="sr-only">Email</label>
                						<input type="email" class="form-control" id="email" name="email" placeholder="Email *" required>
                					</div><!-- End .col-sm-6 -->

									<div class="col-sm-6">
                                        <label for="email" class="sr-only">Budget</label>
                						<select name="budget" required="" id="budget" class="form-control">
											<option value="0" selected="">Budget</option>
											<option value="5 - 10 Lacs">5 - 10 Lacs</option>
											<option value="10 - 15 Lacs">10 - 15 Lacs</option>
											<option value="15 - 25 Lacs">15 - 25 Lacs</option>
											<option value="25 - 50 Lacs">25 - 50 Lacs</option>
											<option value="More than 50 Lacs">More than 50 Lacs</option>
										</select>
                					</div><!-- End .col-sm-6 -->

                					<div class="col-sm-6">
                                        <label for="mobile" class="sr-only">Event Type</label>
                						<input type="text" class="form-control" id="mobile" name="mobile" placeholder="Event Type *" required>
                					</div><!-- End .col-sm-6 -->

									<div class="col-sm-6">
                                        <label for="mobile" class="sr-only">Date</label>
                						<input type="text" id="datepicker" placeholder="DD/MM/YYYY" name="date" class="form-control" required>
                					</div><!-- End .col-sm-6 -->

                					<div class="col-sm-6">
                                        <label for="subject" class="sr-only">Location</label>
                						<input type="text" class="form-control" id="subject" name="" placeholder="Location">
                					</div><!-- End .col-sm-6 -->

									<div class="col-sm-6">
										<label for="message" class="sr-only">Message</label>
                						<textarea class="form-control" cols="30" rows="1" id="message" name="message" required="" placeholder="Message *" style="min-height: 26px !important;"></textarea>
                					</div><!-- End .col-sm-6 -->
                				</div><!-- End .row -->                                

                				<button type="submit" class="btn btn-outline-primary-2 btn-minwidth-sm">
                					<span>SUBMIT</span>
            						<i class="icon-long-arrow-right"></i>
                				</button>
                			</form><!-- End .contact-form -->
							
                		</div><!-- End .col-lg-6 -->

						<div class="col-lg-12">
						<div class="product-details-tab">
                        <ul class="nav nav-pills justify-content-center" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="event-link1" data-toggle="tab" href="#event-tab1" role="tab" aria-controls="event-tab1" aria-selected="true">Planning</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="event-link2" data-toggle="tab" href="#event-tab2" role="tab" aria-controls="event-tab2" aria-selected="false">Decoration </a>
                            </li>
							<li class="nav-item">
                                <a class="nav-link" id="event-link3" data-toggle="tab" href="#event-tab3" role="tab" aria-controls="event-tab3" aria-selected="false">Corporate Event Planning</a>
                            </li>
							<li class="nav-item">
                                <a class="nav-link" id="event-link4" data-toggle="tab" href="#event-tab4" role="tab" aria-controls="event-tab4" aria-selected="false">Gallery</a>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane fade show active" id="event-tab1" role="tabpanel" aria-labelledby="event-link1">
                                <div class="product-desc-content fabout">
									<div class="services-sec">
										<img src="https://www.fnp.com/assets/images/custom/team-images/weddings-images/gallery/9.jpg" alt="">
										<img src="https://www.fnp.com/assets/images/custom/team-images/weddings-images/gallery/8.jpg" alt="">
										<img src="https://www.fnp.com/assets/images/custom/team-images/weddings-images/gallery/7.jpg" alt="">
									</div>
									<p>
										Wedding is a very special day in everyone's life and thus this day
										has to be a gorgeous one. In a busy city life, it becomes really
										messy for people to organize events and social functions on their
										own because there is always a 9-5 job to attend. So, here comes the
										big role of wedding planners. We are a bunch of professionals who
										know how to design your big day in a memorable manner. From
										selecting the venue to deciding the decor elements, from vendor
										management to menu selection, we would look into every aspect of
										your wedding. We are not only one of the best wedding planners in
										Delhi, but we also have a PAN India presence. We are based in Delhi
										but we are resourceful and creative enough to organize your wedding
										in other locations also. Or in case people are interested to tie the
										knot in Delhi, we can do that also. We are one of the top
										destination wedding planners in Delhi and we would never let you
										down with your plans and programs.
									</p>

									<h5>A wide variety of wedding themes only for you!</h5>

									<p>
										As this wedding day is the most important day in life, there is no
										second thought that people would love to splurge money to make this
										day an unforgettable one. Many people have wishes to take the
										wedding vows in a style. And as we are the best wedding event
										planners you would ever come across, we are offering you a gamut of
										themes to choose from. Our creative arrangements would surely tag as
										the best kind of Modern Wedding Planner, Contemporary Wedding
										Planner, and Traditional Wedding Planner all at the same time. Not
										only in category of themes, but we would also offer you a wide range
										of decor items. Floral accessories, lighting, chandeliers,
										furniture, etc. are also in our platter for you to select from.
										Definitely then, you would not find any better wedding organizer in
										Delhi.
									</p>

									<h5>FNP Weddings...the most trustworthy name in wedding planning</h5>

									<p>
										To make the dream wedding a reality for you, we work day and night.
										In case you have a different idea of wedding decor you are free to
										share that with us and we would give that a proper shape and make
										your marriage the most talked about event of your life. If you want
										to sway in luxury wedding, trust us. If you want a simplistic
										approach in your wedding, select us. And if you want a royal affair
										in your wedding day, do let us know. Because we are the best Indian
										wedding planners. For your wedding occasions in Delhi or NCR, don't
										forget us and also in case you want to take the wedding vows away
										from Delhi, we can organize that.
									</p>
									</div><!-- End .product-desc-content -->
                            </div><!-- .End .tab-pane -->
                            <div class="tab-pane fade" id="event-tab2" role="tabpanel" aria-labelledby="event-link2">
                                <div class="product-desc-content fabout">
									<div class="services-sec">
										<img src="https://www.fnp.com/assets/images/custom/team-images/weddings-images/gallery/6.jpg" alt="">
										<img src="https://www.fnp.com/assets/images/custom/team-images/weddings-images/gallery/5.jpg" alt="">
										<img src="https://www.fnp.com/assets/images/custom/team-images/weddings-images/gallery/4.jpg" alt="">
									</div>
									<p>
										Needless to say how important a wedding day is for all of us! It is
										a milestone moment for all of us and we all want this day to be
										remembered by friends and family. It is a special day not only for
										the bride and groom but also for the relatives who are giving time
										to attend the show. That's why everything has to be organized. With
										our wedding decoration services, we can help you create some
										wonderful memories to cherish forever. Don't worry at all! Be it the
										cocktail party on wedding night or the wedding reception
										arrangement, every details would be worked out well. As per the
										design of wedding services selected by you, we would be there at the
										venue with all the glitz and glamour to make this day really a
										fabulous one.
									</p>

									<p>
										Apart from wedding decorations, we also deal into mata ki chowki,
										birthday, anniversary or corporate parties.
									</p>

									<h5>Fabulous Wedding decoration services in Delhi</h5>
									<p>
										With a team of hard working professionals, our sole aim is to
										provide you a world class treatment in all your wedding and
										corporate events.
									</p>
									<p>
										In a metro city like Delhi, where most of the people are busy in
										designing their lives, the utter need of a wedding planner or
										decorator becomes all the more important. Because of lack of time in
										people's lives, the work of a wedding decorator is increasing day by
										day. We are one of the finest workers in this department and thus
										when you want a contemporary wedding decorator in Delhi, you must
										come to us. With various lights, chandeliers, and flowers, we would
										prepare an amazing show for the most special day of your life. If
										you want us to organize only the reception, we can also do that.
										Many upmarket venue would be shown to you before the final approval.
										A special segment in our wedding planning is given to entertainment
										and there we offer DJ party, Rock show, Dance items by famous
										personalities, and also sufi night. In short, we are just the
										perfect medium to get the wedding table decorations or the wedding
										stage decoration done properly.
									</p>
                                </div><!-- End .product-desc-content -->
                            </div><!-- .End .tab-pane -->

							<div class="tab-pane fade" id="event-tab3" role="tabpanel" aria-labelledby="event-link3">
                                <div class="product-desc-content fabout">
									<div class="services-sec">
										<img src="https://www.fnp.com/assets/images/custom/team-images/weddings-images/gallery/3.jpg" alt="">
										<img src="https://www.fnp.com/assets/images/custom/team-images/weddings-images/gallery/2.jpg" alt="">
										<img src="https://www.fnp.com/assets/images/custom/team-images/weddings-images/gallery/1.jpg" alt="">
									</div>
									<p>
										Have you ever explored why companies conduct corporate events? Why
										are big business moguls organizing corporate events for their
										company? Well, the answer to both these questions is simple-
										Corporate events are the mediums which help in spreading the message
										of the company among its targeted customer base or audience. It is
										their universal appeal which makes them so much popular among
										businesses these days.
									</p>
									<p>
										Handling corporate events is not an easy task as it involves the
										reputation of a company which could be maligned if proper attention
										is not given in the execution of the event. A corporate event is
										attended by the business people around the world and thus they need
										to be concluded in an error free manner.
									</p>
									<p>
										Due to the huge significance of these events, they need to be
										handled by professional corporate event planners that can make the
										entire event a huge success. Ferns N Petals is one such name that
										has a huge experience in the field of corporate event planning so as
										to ensure your hard reputation of the company is restored fully. The
										company has an experienced team of event planners that can
										effortlessly execute the task of organizing any corporate event
										without any hurdle. You would not have to rush here and there
										anymore for the successful conclusion of your corporate event as
										Ferns N Petals is ready to take up all your trouble.
									</p>
									<p>
										The corporate team of the company just needs to contact us and we
										will be available for you with our expert services. We believe in
										the motto of Client satisfaction and the company is ready to walk
										the talk when it comes to the delivery of its services. Our
										corporate event planning company is dedicated to offer you an
										experience that can encourage you to forge future business
										engagements with us. We would employ the best of our experiences,
										manpower and corporate exposure so that your corporate event really
										stands out in the crowd.
									</p>
									<p>
										It is now time for you to make your mark in the business arena by
										hiring the services of our corporate event planning company. Enhance
										your brand value and customer reach by organizing the corporate
										event in the most successful manner with our unmatched services.
									</p>

								</div>
							</div>

							<div class="tab-pane fade" id="event-tab4" role="tabpanel" aria-labelledby="event-link4">
                                <div class="product-desc-content fabout">
								<ul class="wedding-gallery">
									<li>
									<a href="https://www.fnp.com/assets/images/custom/team-images/weddings-images/gallery/1.jpg" data-imagelightbox="g" data-ilb2-caption=""><img target="_blank" src="https://www.fnp.com/assets/images/custom/team-images/weddings-images/gallery/1.jpg" alt=""></a>
									</li>

									<li>
									<a href="https://www.fnp.com/assets/images/custom/team-images/weddings-images/gallery/2.jpg" data-imagelightbox="g" data-ilb2-caption=""><img target="_blank" src="https://www.fnp.com/assets/images/custom/team-images/weddings-images/gallery/2.jpg" alt=""></a>
									</li>

									<li>
									<a href="https://www.fnp.com/assets/images/custom/team-images/weddings-images/gallery/3.jpg" data-imagelightbox="g" data-ilb2-caption=""><img target="_blank" src="https://www.fnp.com/assets/images/custom/team-images/weddings-images/gallery/3.jpg" alt=""></a>
									</li>

									<li>
									<a href="https://www.fnp.com/assets/images/custom/team-images/weddings-images/gallery/4.jpg" data-imagelightbox="g" data-ilb2-caption=""><img target="_blank" src="https://www.fnp.com/assets/images/custom/team-images/weddings-images/gallery/4.jpg" alt=""></a>
									</li>
									<li>
									<a href="https://www.fnp.com/assets/images/custom/team-images/weddings-images/gallery/5.jpg" data-imagelightbox="g" data-ilb2-caption=""><img target="_blank" src="https://www.fnp.com/assets/images/custom/team-images/weddings-images/gallery/5.jpg" alt=""></a>
									</li>
									<li>
									<a href="https://www.fnp.com/assets/images/custom/team-images/weddings-images/gallery/6.jpg" data-imagelightbox="g" data-ilb2-caption=""><img target="_blank" src="https://www.fnp.com/assets/images/custom/team-images/weddings-images/gallery/6.jpg" alt=""></a>
									</li>
									<li>
									<a href="https://www.fnp.com/assets/images/custom/team-images/weddings-images/gallery/7.jpg" data-imagelightbox="g" data-ilb2-caption=""><img target="_blank" src="https://www.fnp.com/assets/images/custom/team-images/weddings-images/gallery/7.jpg" alt=""></a>
									</li>
									<li>
									<a href="https://www.fnp.com/assets/images/custom/team-images/weddings-images/gallery/8.jpg" data-imagelightbox="g" data-ilb2-caption=""><img target="_blank" src="https://www.fnp.com/assets/images/custom/team-images/weddings-images/gallery/8.jpg" alt=""></a>
									</li>
									<li>
									<a href="https://www.fnp.com/assets/images/custom/team-images/weddings-images/gallery/9.jpg" data-imagelightbox="g" data-ilb2-caption=""><img target="_blank" src="https://www.fnp.com/assets/images/custom/team-images/weddings-images/gallery/9.jpg" alt=""></a>
									</li>
								</ul>

								</div>
							</div>
                        </div><!-- End .tab-content -->
                    </div><!-- End .product-details-tab -->

						</div>
                	</div><!-- End .row -->
                </div><!-- End .container -->
            	<!-- <div id="map"></div> --><!-- End #map -->
            </div><!-- End .page-content -->
        </main><!-- End .main -->

@endsection      