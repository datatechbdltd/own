<div class="navbar-area navbar-area-2">
    <div class="navbar-top">
        <div class="container">
            <div class="row">
                <div class="col-sm-7 text-sm-left text-center">
                    <ul class="topbar-left">
                        <li class="topbar-single-info"> <a href="mailto:{{ get_static_option('company_email') }}"> <i class="fa fa-envelope"></i> {{ get_static_option('company_email') }}</a></li>
                        <li class="topbar-single-info ml-3 ml-lg-0"> <a href="tel:{{ get_static_option('company_phone') }}"> <i class="fa fa-phone"></i> {{ get_static_option('company_phone') }}</a></li>
                    </ul>
                </div>
                <div class="col-sm-5 text-sm-right text-center">
                    <ul class="topbar-right float-md-right">
{{--                        <li class="topbar-single-info">--}}
{{--                            <span class="d-none d-lg-inline-block">Invest Offer</span>--}}
{{--                        </li>--}}
                        <li class="topbar-single-info topbar-social-icon"><a target="_blank" href="{{ get_static_option('company_facebook_link') }}"><i class="fa fa-facebook-f"></i></a></li>
                        <li class="topbar-single-info topbar-social-icon"><a target="_blank" href="{{ get_static_option('company_linkedin_link') }}"><i class="fa fa-linkedin"></i></a></li>
                        <li class="topbar-single-info topbar-social-icon"><a target="_blank" href="{{ get_static_option('company_whatsapp_link') }}"><i class="fa fa-whatsapp mr-0"></i></a></li>
                        <li class="topbar-single-info topbar-signin sign-nav ml-3 ml-lg-0">

                        @guest
                            <li class="topbar-single-info topbar-social-icon signin-modal-btn"><i class="fa fa-user-o"></i><a href="javascript:0">{{ __('Login') }}</a></li>
                            <li class="topbar-single-info topbar-social-icon signup-modal-btn"><i class="fa fa-user-o"></i><a href="javascript:0">{{ __('Register') }}</a></li>
                        @else
                            <li class="topbar-single-info topbar-social-icon"><i class="fa fa-user-o"></i><a href="{{ route('login') }}">{{ auth()->user()->name }}</a></li>
                            <li class="topbar-single-info topbar-social-icon logout-btn"><i class="fa fa-user-o"></i><a href="javascript:0">Logout</a></li>
                        @endif
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <nav class="navbar navbar-area navbar-expand-lg nav-transparent">
        <div class="container nav-container nav-white">
            <div class="responsive-mobile-menu">
                <button class="menu toggle-btn d-block d-lg-none" data-toggle="collapse" data-target="#investon_main_menu" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="icon-left"></span>
                    <span class="icon-right"></span>
                </button>
            </div>
            <div class="logo">
                <a href="{{ url('/') }}"> <img src="{{ get_static_option('website_logo') }}" alt="logo"></a>
            </div>
            <div class="collapse navbar-collapse" id="investon_main_menu">
                <ul class="navbar-nav menu-open">
                    <li>
                        <a href="{{ url('/') }}">Home</a>
                    </li>
                    <li class="menu-item-has-children">
                        <a href="javascript:0">About Us</a>
                        <ul class="sub-menu">
                            @foreach(active_custom_pages() as $page)
                                <li> <a href="{{ route('frontend.customPage', $page->slug) }}"> <i class="fa fa-long-arrow-right"></i> {{ $page->name }} </a></li>
                            @endforeach
                        </ul>
                    </li>
                    <li class="menu-item-has-children">
                        <a href="javascript:0">Services</a>
                        <ul class="sub-menu">
                            <li>
                                <a href="{{ route('frontend.maskingSms') }}">Masking SMS</a>
                            </li>
                            <li>
                                <a href="{{ route('frontend.nonMaskingSms') }}">Non Masking SMS</a>
                            </li>
                            <li>
                                <a href="{{ route('frontend.servicesPage') }}">All Services</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="{{ route('frontend.products') }}">Products</a>
                    </li>
                    <li class="menu-item-has-children">
                        <a href="#">Career</a>
                        <ul class="sub-menu">
                            <li><a href="#"><i class="fa fa-long-arrow-right"></i>Apply for Internship</a></li>
                            <li><a href="#"><i class="fa fa-long-arrow-right"></i>Apply Job</a></li>
                            <li><a href="{{ route('frontend.leadCollectionPage') }}"><i class="fa fa-long-arrow-right"></i>Data collection</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="{{ route('frontend.contactUs') }}">Contact us</a>
                    </li>
                    <li>
                        <a href="#message-section">Send Message</a>
                    </li>
                </ul>
            </div>
{{--            <ul class="right-part-search pr-0">--}}
{{--                <li class="search" id="">--}}
{{--                    <a href="#"><i class="fa fa-search"></i></a>--}}
{{--                </li>--}}
{{--                <li class="menubar d-none d-lg-block" id="navigation-button">--}}
{{--                    <a><i class="flaticon-menu-button"></i></a>--}}
{{--                </li>--}}
{{--            </ul>--}}
        </div>
    </nav>
</div>
