@extends('layouts.frontend.app')

@section('content')

    <!--Page Title-->
    <section class="page-title">
        <div class="pattern-layer-one" style="background-image: url({{ asset('assets/frontend/images/background/pattern-14.png') }})"></div>
        <div class="pattern-layer-two" style="background-image: url({{ asset('assets/frontend/images/background/pattern-15.png') }})"></div>
        <div class="auto-container">
            <h2>Products</h2>
            <ul class="page-breadcrumb">
                <li><a href="{{ url('/') }}">home</a></li>
                <li>Products</li>
            </ul>
        </div>
    </section>
    <!--End Page Title-->

    <!-- Contact Page Section -->


    <section class="contact-page-section">
        <div class="auto-container">
            <div class="row clearfix">

            </div>
        </div>
    </section>
    <!--Sidebar Page Container-->
    <div class="sidebar-page-container">
    	<div class="auto-container">
        	<div class="row clearfix">

                <!--Content Side-->
                <div class="content-side col-lg-12 col-md-12 col-sm-12">
                	<!--Shop Single-->
                	<div class="shop-section">
                        <div class="our-shops"
                            <div class="row clearfix">
                               <div class="row">
                                @foreach ($website_products as $website_product)
                                <div class="card shop-item col-lg-3 col-md-6 col-sm-12">
                                   <div class="inner-box">
                                        <div class="image">
                                            <img class="card-img-top" src="{{ asset($website_product->image ?? get_static_option('no_image') ) }}" alt="Card image cap">
                                            </div>
                                            <div class="card-body">
                                            <h5 class="card-title">{{  $website_product->name }}</h5>
                                            <p class="card-text">{{  $website_product->short_description }}</p>
                                            <div class="text-center">
                                                <a href="#" class="text-center btn btn-primary">Go somewhere</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                               </div>
                            </div>
                        </div>
                       <!-- Post Share Options -->
						<div class="styled-pagination text-center">
							<ul class="clearfix">
								<li class="prev"><a href="#"><span class="fa fa-angle-left"></span> </a></li>
								<li><a href="#">1</a></li>
								<li><a href="#">2</a></li>
								<li class="active"><a href="#">3</a></li>
								<li><a href="#">4</a></li>
								<li><a href="#">5</a></li>
								<li class="next"><a href="#"><span class="fa fa-angle-right"></span> </a></li>
							</ul>
						</div>

                    </div>
                </div>
			</div>
		</div>
	</div>


    <!-- End Contact Page Section -->
    <!-- Contact Info Section -->
    @include('frontend.includes.contact')
    <!-- End Contact Info Section -->
@endsection
