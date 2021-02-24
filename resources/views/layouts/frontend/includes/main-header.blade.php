<header class="main-header header-style-three">

    <!-- Header Top -->
    <div class="header-top">
        <div class="auto-container">
            <div class="inner-container clearfix">

                <!-- Top Left -->
                <div class="top-left pull-left">
                    <!-- Page Nav -->
                    <ul class="page-nav">
                        @guest
                            <li><a href="javascript:0"  data-toggle="modal" data-target="#login-modal">{{ __('Login') }}</a></li>
                            <li><a href="javascript:0"  data-toggle="modal" data-target="#register-modal">{{ __('Register') }}</a></li>
                        @else
                            <li><a href="{{ route('login') }}">{{ auth()->user()->name }}</a></li>
                            <li class="logout-btn"><a href="javascript:0">Logout</a></li>
                        @endif
                    </ul>
                </div>

                <!-- Top Right -->
                <div class="top-right pull-right">
                    <!-- Info List -->
                    <ul class="info-list">
                        <li><span class="icon flaticon-maps-and-flags"></span> {{ get_static_option('company_address') }}, {{ get_static_option('company_address_district_country') }}</li>
                        <li><span class="icon flaticon-email-4"></span><a href="mailto:{{ get_static_option('company_email') }}"> {{ get_static_option('company_email') }}</a></li>
                    </ul>
                </div>

            </div>
        </div>
    </div>

    <!--Header-Upper-->
    <div class="header-upper">
        <div class="auto-container">
            <div class="inner-container clearfix">

                <div class="pull-left logo-box">
                    <div class="logo"><a href="{{ url('/') }}"><img src="{{ asset(get_static_option('website_logo') ) }}" alt="" title=""></a></div>
                </div>

                <div class="nav-outer clearfix">
                    <!--Mobile Navigation Toggler-->
                    <div class="mobile-nav-toggler"><span class="icon flaticon-menu"></span></div>
                    <!-- Main Menu -->
                    <nav class="main-menu navbar-expand-md">
                        <div class="navbar-header">
                            <!-- Toggle Button -->
                            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                        </div>

                        <div class="navbar-collapse collapse clearfix" id="navbarSupportedContent">
                            <ul class="navigation clearfix">
                                <li><a href="{{ url('/') }}">{{ __('Home') }}</a></li>

                                <li class="dropdown"><a href="#">About</a>
                                    <ul>
                                        @foreach(active_custom_pages() as $page)
                                        <li> <a href="{{ route('frontend.customPage', $page->slug) }}"> {{ $page->name }} </a></li>
                                        @endforeach
                                    </ul>
                                </li>

                                <li><a href="{{ route('frontend.servicesPage') }}">Services</a>
                                </li>
                                <li><a href="{{ route('frontend.products') }}">Products</a>
                                </li>
                                <li class="dropdown"><a href="#">Career</a>
                                    <ul>
                                        <li><a href="#">Apply for Internship</a></li>
                                        <li><a href="#">Apply Job</a></li>
                                        <li><a href="{{ route('frontend.leadCollectionPage') }}">Data collection</a></li>
                                    </ul>
                                </li>
                                <li><a href="{{ route('frontend.contactUs') }}">Contact us</a></li>
                            </ul>
                        </div>
                    </nav>
                    <!-- Main Menu End-->
                    <div class="outer-box clearfix">
                        <!-- Search Btn -->
                        <div class="search-box-btn search-box-outer"><span class="icon fa fa-search"></span></div>
                        <!-- Quote Btn -->
                        <div class="btn-box">
                           <a href="javascript:0" class="quote-btn btn-style-four send-message-button"><span class="txt">{{ __('Contact Now') }}</span></a>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </div>
    <!--End Header Upper-->

    <!-- Sticky Header  -->
    <div class="sticky-header">
        <div class="auto-container clearfix">
            <!--Logo-->
            <div class="logo pull-left">
                <a href="{{ url('/') }}" title=""><img src="{{ asset(get_static_option('website_logo')) }}" alt="" title=""></a>
            </div>
            <!--Right Col-->
            <div class="pull-right">
                <!-- Main Menu -->
                <nav class="main-menu">
                    <!--Keep This Empty / Menu will come through Javascript-->
                </nav><!-- Main Menu End-->

                <!-- Main Menu End-->
                <div class="outer-box clearfix">

                    <div class="search-box-btn search-box-outer"><span class="icon fa fa-search"></span></div>

                    <!-- Nav Btn -->
                    <div class="nav-btn navSidebar-button"><span class="icon flaticon-menu"></span></div>

                </div>

            </div>
        </div>
    </div><!-- End Sticky Menu -->

    <!-- Mobile Menu  -->
    <div class="mobile-menu">
        <div class="menu-backdrop"></div>
        <div class="close-btn"><span class="icon flaticon-multiply"></span></div>

        <nav class="menu-box">
            <div class="nav-logo"><a href="{{ route('frontend.homePage') }}"><img src="{{ asset(get_static_option('website_logo')) }}" alt="" title=""></a></div>
            <div class="menu-outer"><!--Here Menu Will Come Automatically Via Javascript / Same Menu as in Header--></div>
        </nav>
    </div><!-- End Mobile Menu -->

</header>



