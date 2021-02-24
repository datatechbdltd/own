<div class="xs-sidebar-group info-group">
    <div class="xs-overlay xs-bg-black"></div>
    <div class="xs-sidebar-widget">
        <div class="sidebar-widget-container">
            <div class="widget-heading">
                <a href="#" class="close-side-widget">
                    X
                </a>
            </div>
            <div class="sidebar-textwidget">

                <!-- Sidebar Info Content -->
                <div class="sidebar-info-contents">
                    <div class="content-inner">
                        <div class="logo">
                            <a href="{{ url('/') }}"><img src="images/logo.png" alt="" /></a>
                        </div>
                        <div class="content-box">
                            <h2>About Us</h2>
                            <p class="text">{{ get_static_option('footer_text') }}</p>
                            <a href="{{ route('frontend.contactUs') }}" class="theme-btn btn-style-two"><span class="txt">Contact us</span></a>
                        </div>
                        <div class="contact-info">
                            <h2>Contact Info</h2>
                            <ul class="list-style-one">
                                <li><span class="icon fa fa-location-arrow"></span>{{ get_static_option('company_address') }}</li>
                                <li><span class="icon fa fa-phone"></span>{{ get_static_option('company_phone') }}</li>
                                <li><span class="icon fa fa-envelope"></span>{{ get_static_option('company_email') }}</li>
                                <li><span class="icon fa fa-clock-o"></span>24/7 for support</li>
                            </ul>
                        </div>
                        <!-- Social Box -->
                        <ul class="social-box">
                            <li class="facebook"><a target="_blank" href="{{ get_static_option('company_facebook_link') }}" class="fa fa-facebook-f"></a></li>
                            <li class="linkedin"><a target="_blank" href="{{ get_static_option('company_linkedin_link') }}" class="fa fa-linkedin"></a></li>
                            <li class="twitter"><a target="_blank" href="{{ get_static_option('company_twitter_link') }}" class="fa fa-twitter"></a></li>
                            <li class="github"><a target="_blank" href="{{ get_static_option('company_github_link') }}" class="fa fa-github"></a></li>
                            <li class="whatsapp"><a target="_blank" href="{{ get_static_option('company_whatsapp_link') }}" class="fa fa-whatsapp"></a></li>
                        </ul>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
