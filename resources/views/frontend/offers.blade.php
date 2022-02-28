@extends('layouts.app')
@section('content')


		<main class="main">
		    <div class="page-header text-center" style="background-image: url('assets/images/page-header-bg.jpg')">
		        <div class="container">
		            <h1 class="page-title">Offers<span></span></h1>
		        </div><!-- End .container -->
		    </div><!-- End .page-header -->
		    <nav aria-label="breadcrumb" class="breadcrumb-nav">
		        <div class="container">
		            <ol class="breadcrumb">
		                <li class="breadcrumb-item"><a href="/">Home</a></li>
		                <li class="breadcrumb-item active" aria-current="page">Offers</li>
		            </ol>
		        </div><!-- End .container -->
		    </nav><!-- End .breadcrumb-nav -->

		    <div class="page-content pb-3">
		        <div class="container">
		            <div class="row">
		                <div class="col-sm-6 mb-2">
		                    <a href="{{url('offers/' . encrypt('offer2'))}}">
		                        <div class="overflow-hidden rounded-lg">
		                            <img src="{{url('assets/images/home/offer-2.jpeg')}}" alt="Buy 3 Get 2"  class="scale-11">
		                        </div>
		                    </a>
		                </div>
		                <div class="col-sm-6">
		                    <a href="{{url('offers/' . encrypt('offer1'))}}">
		                        <div class="overflow-hidden rounded-lg">
		                            <img src="{{url('assets/images/home/offer-1.jpeg')}}" alt="Buy 3 Get 2" class="scale-11">
		                        </div>
		                    </a>
		                </div>
		            </div>

		        </div><!-- End .container -->

		    </div><!-- End .page-content -->
		</main>









@endsection