@extends('layouts.frontend2.app')
@push('title') Home @endpush
@section('content')
    <!-- banner area start -->
    @include('frontend2.includes.banner')
    <!-- banner area end -->

<div class="shape-4" style="background-image: url({{ asset('assets/frontend2/img/shape/4.png') }});">
    <!-- service area start -->
    @include('frontend2.includes.service')
    <!-- service area end -->

    <!-- seo area start -->
    @include('frontend2.includes.seo')
    <!-- seo area end -->

    <!-- counter area start -->
    @include('frontend2.includes.counter')
    <!-- counter area end -->

    <!-- level start -->
    @include('frontend2.includes.level')
    <!-- level -->
</div>

<!-- price-table-area start -->
    @include('frontend2.includes.price-table')
<!-- price-table-area end -->

{{--<div class="shape-2" style="background-image: url({{ asset('assets/frontend2/img/shape/2.png') }});">--}}
{{--    <!-- why-choose-us-area start -->--}}
{{--    <div class="why-choose-us-area pd-bottom-85">--}}
{{--        <div class="container">--}}
{{--            <div class="row">--}}
{{--                <div class="col-lg-5 align-self-center">--}}
{{--                    <div class="thumb item-bounce d-none d-lg-block">--}}
{{--                        <img src="assets/img/why-choose-us/01.png" alt="img">--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="col-lg-7">--}}
{{--                    <div class="single-facility media">--}}
{{--                        <span class="number">1</span>--}}
{{--                        <div class="thumb align-self-center">--}}
{{--                            <img src="assets/img/icon/tree.png" alt="icon">--}}
{{--                        </div>--}}
{{--                        <div class="facility-details media-body">--}}
{{--                            <h5>Stable & Profitable</h5>--}}
{{--                            <p>Lorem ipsuelit, sed do eiusmod tempor ofincidid labore et dolore magna</p>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="single-facility media">--}}
{{--                        <span class="number">2</span>--}}
{{--                        <div class="thumb align-self-center">--}}
{{--                            <img src="assets/img/icon/tree.png" alt="icon">--}}
{{--                        </div>--}}
{{--                        <div class="facility-details media-body">--}}
{{--                            <h5>Instant Withdraw</h5>--}}
{{--                            <p>Lorem ipsuelit, sed do eiusmod tempor ofincidid labore et dolore magna</p>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="single-facility media">--}}
{{--                        <span class="number">3</span>--}}
{{--                        <div class="thumb align-self-center">--}}
{{--                            <img src="assets/img/icon/tree.png" alt="icon">--}}
{{--                        </div>--}}
{{--                        <div class="facility-details media-body">--}}
{{--                            <h5>Referral Provides</h5>--}}
{{--                            <p>Lorem ipsuelit, sed do eiusmod tempor ofincidid labore et dolore magna</p>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--    <!-- why-choose-us-area end -->--}}

{{--    <!-- pricing-area start -->--}}
{{--    <div class="pricing-area pd-bottom-85">--}}
{{--        <div class="container">--}}
{{--            <div class="row justify-content-start">--}}
{{--                <div class="col-lg-12">--}}
{{--                    <div class="section-title text-lg-left text-center">--}}
{{--                        <h5 class="subtitle"><span></span>Investon Price</h5>--}}
{{--                        <h3 class="title">Grab Our Mega Package</h3>--}}
{{--                        <div class="row">--}}
{{--                            <div class="col-lg-8">--}}
{{--                                <p class="mb-0">Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will uncover many</p>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="col-12">--}}
{{--                    <div class="pricing-tab">--}}
{{--                        <nav>--}}
{{--                            <div class="nav nav-tabs text-center" id="nav-tab">--}}
{{--                                <a class="btn ml-0 nav-item nav-link active" id="nav-monthly-tab" data-toggle="tab" href="#nav-monthly">Monthly</a>--}}
{{--                                <a class="btn nav-item nav-link" id="nav-yearly-tab" data-toggle="tab" href="#nav-yearly">Yearly</a>--}}
{{--                            </div>--}}
{{--                        </nav>--}}
{{--                        <div class="tab-content" id="nav-tabContent">--}}
{{--                            <div class="tab-pane fade show active" id="nav-monthly">--}}
{{--                                <div class="row justify-content-center">--}}
{{--                                    <div class="col-lg-4 col-md-6">--}}
{{--                                        <div class="single-pricing-wrap text-center">--}}
{{--                                            <span class="animate-dots"></span>--}}
{{--                                            <div class="price">5.50%</div>--}}
{{--                                            <div class="thumb">--}}
{{--                                                <img src="assets/img/pricing/01.png" alt="icon">--}}
{{--                                            </div>--}}
{{--                                            <h5>Investon Advanced</h5>--}}
{{--                                            <ul>--}}
{{--                                                <li><a href="#">Miximum Deposit $10,00</a></li>--}}
{{--                                                <li><a href="#">Minimum Deposit $10</a></li>--}}
{{--                                                <li><a href="#">Up to 50 Users available</a></li>--}}
{{--                                            </ul>--}}
{{--                                            <a class="btn btn-plus" href="#"><i class="fa fa-plus"></i></a>--}}
{{--                                            <a class="btn btn-white" href="#">Buy Now</a>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                    <div class="col-lg-4 col-md-6">--}}
{{--                                        <div class="single-pricing-wrap text-center">--}}
{{--                                            <span class="animate-dots"></span>--}}
{{--                                            <div class="price">5.50%</div>--}}
{{--                                            <div class="thumb">--}}
{{--                                                <img src="assets/img/pricing/01.png" alt="icon">--}}
{{--                                            </div>--}}
{{--                                            <h5>Investon Advanced</h5>--}}
{{--                                            <ul>--}}
{{--                                                <li><a href="#">Miximum Deposit $10,00</a></li>--}}
{{--                                                <li><a href="#">Minimum Deposit $10</a></li>--}}
{{--                                                <li><a href="#">Up to 50 Users available</a></li>--}}
{{--                                            </ul>--}}
{{--                                            <a class="btn btn-plus" href="#"><i class="fa fa-plus"></i></a>--}}
{{--                                            <a class="btn btn-white" href="#">Buy Now</a>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                    <div class="col-lg-4 col-md-6">--}}
{{--                                        <div class="single-pricing-wrap text-center">--}}
{{--                                            <span class="animate-dots"></span>--}}
{{--                                            <div class="price">5.50%</div>--}}
{{--                                            <div class="thumb">--}}
{{--                                                <img src="assets/img/pricing/01.png" alt="icon">--}}
{{--                                            </div>--}}
{{--                                            <h5>Investon Advanced</h5>--}}
{{--                                            <ul>--}}
{{--                                                <li><a href="#">Miximum Deposit $10,00</a></li>--}}
{{--                                                <li><a href="#">Minimum Deposit $10</a></li>--}}
{{--                                                <li><a href="#">Up to 50 Users available</a></li>--}}
{{--                                            </ul>--}}
{{--                                            <a class="btn btn-plus" href="#"><i class="fa fa-plus"></i></a>--}}
{{--                                            <a class="btn btn-white" href="#">Buy Now</a>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="tab-pane fade" id="nav-yearly">--}}
{{--                                <div class="row justify-content-center">--}}
{{--                                    <div class="col-lg-4 col-md-6">--}}
{{--                                        <div class="single-pricing-wrap text-center">--}}
{{--                                            <span class="animate-dots"></span>--}}
{{--                                            <div class="price">5.50%</div>--}}
{{--                                            <div class="thumb">--}}
{{--                                                <img src="assets/img/pricing/01.png" alt="icon">--}}
{{--                                            </div>--}}
{{--                                            <h5>Investon Advanced</h5>--}}
{{--                                            <ul>--}}
{{--                                                <li><a href="#">Miximum Deposit $10,00</a></li>--}}
{{--                                                <li><a href="#">Minimum Deposit $10</a></li>--}}
{{--                                                <li><a href="#">Up to 50 Users available</a></li>--}}
{{--                                            </ul>--}}
{{--                                            <a class="btn btn-plus" href="#"><i class="fa fa-plus"></i></a>--}}
{{--                                            <a class="btn btn-white" href="#">Buy Now</a>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                    <div class="col-lg-4 col-md-6">--}}
{{--                                        <div class="single-pricing-wrap text-center">--}}
{{--                                            <span class="animate-dots"></span>--}}
{{--                                            <div class="price">5.50%</div>--}}
{{--                                            <div class="thumb">--}}
{{--                                                <img src="assets/img/pricing/01.png" alt="icon">--}}
{{--                                            </div>--}}
{{--                                            <h5>Investon Advanced</h5>--}}
{{--                                            <ul>--}}
{{--                                                <li><a href="#">Miximum Deposit $10,00</a></li>--}}
{{--                                                <li><a href="#">Minimum Deposit $10</a></li>--}}
{{--                                                <li><a href="#">Up to 50 Users available</a></li>--}}
{{--                                            </ul>--}}
{{--                                            <a class="btn btn-plus" href="#"><i class="fa fa-plus"></i></a>--}}
{{--                                            <a class="btn btn-white" href="#">Buy Now</a>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                    <div class="col-lg-4 col-md-6">--}}
{{--                                        <div class="single-pricing-wrap text-center">--}}
{{--                                            <span class="animate-dots"></span>--}}
{{--                                            <div class="price">5.50%</div>--}}
{{--                                            <div class="thumb">--}}
{{--                                                <img src="assets/img/pricing/01.png" alt="icon">--}}
{{--                                            </div>--}}
{{--                                            <h5>Investon Advanced</h5>--}}
{{--                                            <ul>--}}
{{--                                                <li><a href="#">Miximum Deposit $10,00</a></li>--}}
{{--                                                <li><a href="#">Minimum Deposit $10</a></li>--}}
{{--                                                <li><a href="#">Up to 50 Users available</a></li>--}}
{{--                                            </ul>--}}
{{--                                            <a class="btn btn-plus" href="#"><i class="fa fa-plus"></i></a>--}}
{{--                                            <a class="btn btn-white" href="#">Buy Now</a>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--    <!-- pricing-area end -->--}}
{{--</div>--}}


{{--<!-- history-area start -->--}}
{{--<div class="history-area pd-bottom-85">--}}
{{--    <div class="container">--}}
{{--        <div class="row">--}}
{{--            <div class="col-lg-7">--}}
{{--                <div class="section-title text-lg-left text-center">--}}
{{--                    <h5 class="subtitle"><span></span>Investon History</h5>--}}
{{--                    <h3 class="title">Know More Us</h3>--}}
{{--                    <p>Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will uncover many</p>--}}
{{--                </div>--}}
{{--                <div class="row">--}}
{{--                    <div class="col-sm-4">--}}
{{--                        <div class="single-history-wrap text-center text-lg-left">--}}
{{--                            <h1 class="counter">234</h1>--}}
{{--                            <p>Every week Investor logins </p>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="col-sm-4">--}}
{{--                        <div class="single-history-wrap text-center text-lg-left">--}}
{{--                            <h1 class="counter">542</h1>--}}
{{--                            <p>Every week Investor logins </p>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="col-sm-4">--}}
{{--                        <div class="single-history-wrap text-center text-lg-left">--}}
{{--                            <h1 class="counter">132</h1>--}}
{{--                            <p>Every week Investor logins </p>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <div class="col-lg-5 d-lg-block d-none align-self-center">--}}
{{--                <div class="thumb item-bounce">--}}
{{--                    <img src="assets/img/history/01.png" alt="img">--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</div>--}}
{{--<!-- history-area end -->--}}

<!-- team area start -->
    @include('frontend2.includes.team')
<!-- team area end -->

<!-- customer-slider-area start-->
    @include('frontend2.includes.customer')
<!-- customer-slider-area end -->

<!-- blog-area start -->
    @include('frontend2.includes.blog')
<!-- blog-area end -->

<!-- message--area start -->
    @include('frontend2.includes.message')
<!-- message--area end -->

    @include('frontend2.includes.testimonial')
    @include('frontend2.includes.client')


@endsection
