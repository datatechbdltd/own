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

                                <li class="dropdown"><a href="#">Services</a>
                                    <ul>
                                        <li><a href="services.html">Services</a></li>
                                        <li><a href="services-detail.html">Services Detail</a></li>
                                    </ul>
                                </li>
                                <li class="dropdown"><a href="#">Projects</a>
                                    <ul>
                                        <li><a href="projects.html">Projects</a></li>
                                        <li><a href="projects-detail.html">Projects Detail</a></li>
                                    </ul>
                                </li>
                                <li class="dropdown"><a href="#">Shop</a>
                                    <ul>
                                        <li><a href="shop.html">Our Products</a></li>
                                        <li><a href="shop.html">Our Products</a></li>
                                        <li><a href="shop-single.html">Product Single</a></li>
                                        <li><a href="shopping-cart.html">Shopping Cart</a></li>
                                        <li><a href="checkout.html">Checkout</a></li>
                                        <li><a href="account.html">Account</a></li>
                                    </ul>
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
                        <!-- Cart Box -->
                        <div class="cart-box">
                            <div class="dropdown">
                                <button class="cart-box-btn dropdown-toggle" type="button" id="dropdownMenu" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span class="flaticon-shopping-bag-1"></span><span class="total-cart">2</span></button>
                                <div class="dropdown-menu pull-right cart-panel" aria-labelledby="dropdownMenu3">

                                    <div class="cart-product">
                                        <div class="inner">
                                            <div class="cross-icon"><span class="icon fa fa-remove"></span></div>
                                            <div class="image"><img src="images/resource/post-thumb-1.jpg" alt="" /></div>
                                            <h3><a href="shop-single.html">Flying Ninja</a></h3>
                                            <div class="quantity-text">Quantity 1</div>
                                            <div class="price">$99.00</div>
                                        </div>
                                    </div>
                                    <div class="cart-product">
                                        <div class="inner">
                                            <div class="cross-icon"><span class="icon fa fa-remove"></span></div>
                                            <div class="image"><img src="images/resource/post-thumb-2.jpg" alt="" /></div>
                                            <h3><a href="shop-single.html">Patient Ninja</a></h3>
                                            <div class="quantity-text">Quantity 1</div>
                                            <div class="price">$99.00</div>
                                        </div>
                                    </div>
                                    <div class="cart-total">Sub Total: <span>$198</span></div>
                                    <ul class="btns-boxed">
                                        <li><a href="shoping-cart.html">View Cart</a></li>
                                        <li><a href="checkout.html">CheckOut</a></li>
                                    </ul>

                                </div>
                            </div>
                        </div>

                        <!-- Search Btn -->
                        <div class="search-box-btn search-box-outer"><span class="icon fa fa-search"></span></div>

                        <!-- Quote Btn -->
                        <div class="btn-box">
                           <a href="javascript:0" class="quote-btn btn-style-four" data-toggle="modal" data-target="#order-modal"><span class="txt">{{ __('Order Now') }}</span></a>
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

                    <!-- Cart Box -->
                    <div class="cart-box">
                        <div class="dropdown">
                            <button class="cart-box-btn dropdown-toggle" type="button" id="dropdownMenu" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span class="flaticon-shopping-bag-1"></span><span class="total-cart">2</span></button>
                            <div class="dropdown-menu pull-right cart-panel" aria-labelledby="dropdownMenu3">

                                <div class="cart-product">
                                    <div class="inner">
                                        <div class="cross-icon"><span class="icon fa fa-remove"></span></div>
                                        <div class="image"><img src="images/resource/post-thumb-1.jpg" alt="" /></div>
                                        <h3><a href="shop-single.html">Flying Ninja</a></h3>
                                        <div class="quantity-text">Quantity 1</div>
                                        <div class="price">$99.00</div>
                                    </div>
                                </div>
                                <div class="cart-product">
                                    <div class="inner">
                                        <div class="cross-icon"><span class="icon fa fa-remove"></span></div>
                                        <div class="image"><img src="images/resource/post-thumb-2.jpg" alt="" /></div>
                                        <h3><a href="shop-single.html">Patient Ninja</a></h3>
                                        <div class="quantity-text">Quantity 1</div>
                                        <div class="price">$99.00</div>
                                    </div>
                                </div>
                                <div class="cart-total">Sub Total: <span>$198</span></div>
                                <ul class="btns-boxed">
                                    <li><a href="shoping-cart.html">View Cart</a></li>
                                    <li><a href="checkout.html">CheckOut</a></li>
                                </ul>

                            </div>
                        </div>
                    </div>

                    <!-- Search Btn -->
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
            <div class="nav-logo"><a href="index.html"><img src="images/logo-2.png" alt="" title=""></a></div>
            <div class="menu-outer"><!--Here Menu Will Come Automatically Via Javascript / Same Menu as in Header--></div>
        </nav>
    </div><!-- End Mobile Menu -->

</header>

<!-- Order modal -->
<div class="modal fade" id="order-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <div class="default-form contact-form">
                    <form method="post" action=" {{ route('frontend.contactUsStore') }} ">
                        @csrf
                        <div class="form-group">
                            <input type="text" name="name" value="{{ old('name') }}" placeholder="Name" required>
                        </div>

                        <div class="form-group">
                            <input type="email" name="email" value="{{ old('email') }}" placeholder="Email" required>
                        </div>

                        <div class="form-group">
                            <input type="text" name="phone" value="{{ old('phone') }}" placeholder="Phone" required>
                        </div>

                        <div class="form-group">
                            <textarea name="message" placeholder="I need a website for my company ...." required>{{ old('message') }}</textarea>
                        </div>

                        <div class="form-group">
                            <button type="submit" class="theme-btn btn-style-four"><span class="txt">Send Message</span></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Login modal -->
<div class="modal fade" id="login-modal" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <div class="default-form contact-form">
                    <form method="post" action=" {{ route('login') }} ">
                        @csrf
                        <div class="form-group">
                            <input type="email" name="email" value="{{ old('email') }}" placeholder="Email" required>
                            @error('email')
                            <div class="alert alert-danger" role="alert">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <input type="text" name="password" placeholder="Password" required>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="theme-btn btn-style-four"><span class="txt">Send Message</span></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Register modal -->
<div class="modal fade" id="register-modal" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <div class="default-form contact-form">
                    <form novalidate="novalidate" action="{{ route('register') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <input type="text" name="name" value="{{ old('name') }}" placeholder="Name">
                        </div>
                        <div class="form-group">
                            <input type="text" name="phone" value="{{ old('phone') }}" placeholder="Phone">
                        </div>
                        <div class="form-group">
                            <input type="text" name="email" value="{{ old('email') }}" placeholder="Email">
                        </div>
                        <div class="form-group">
                            <input type="text" name="password" value="{{ old('password') }}" placeholder="Password">
                        </div>
                        <div class="form-group">
                            <input type="text" name="password_confirmation" value="{{ old('password_confirmation') }}" placeholder="Confirm Password">
                        </div>
                        <div class="form-group">
                            <button type="submit" class="theme-btn btn-style-four"><span class="txt">Register and earn</span></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
