<footer class="footer-area">
    <div class="footer-top">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-6 col-sm-8">
                    <div class="footer-widget widget widget-about-us">
                        <a href="{{ url('/') }}" class="footer-logo">
                            <img src="{{ get_static_option('website_logo') }}" alt="footer logo">
                        </a>
                        <p>{{ get_static_option('footer_text') }}</p>
                        <ul class="footer-social social-area-2">
                            <li><a target="_blank" href="{{ get_static_option('company_facebook_link') }}" class="fa fa-facebook-f text-white"></a></li>
                            <li><a target="_blank" href="{{ get_static_option('company_linkedin_link') }}" class="fa fa-linkedin text-white"></a></li>
                            <li><a target="_blank" href="{{ get_static_option('company_twitter_link') }}" class="fa fa-twitter text-white"></a></li>
                            <li><a target="_blank" href="{{ get_static_option('company_github_link') }}" class="fa fa-github text-white"></a></li>
                            <li><a target="_blank" href="{{ get_static_option('company_instagram_link') }}" class="fa fa-instagram text-white"></a></li>
                            <li><a target="_blank" href="{{ get_static_option('company_whatsapp_link') }}" class="fa fa-whatsapp text-white"></a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6">
                    <div class="footer-widget widget widget_nav_menu">
                        <h4 class="widget-title">About Us <span class="dot">.</span></h4>
                        <ul class="list-link">
                            @foreach(active_custom_pages() as $page)
                                <li> <a href="{{ route('frontend.customPage', $page->slug) }}"><i class="fa fa-long-arrow-right" aria-hidden="true"></i> {{ $page->name }} </a></li>
                            @endforeach
                            <li> <a href="{{ route('frontend.contactUs') }}"> Contact us </a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="footer-widget widget contact-widget">
                        <h4 class="widget-title">Contact Us <span class="dot">.</span></h4>
                        <p> {{ get_static_option('company_address') }}, <br>{{ get_static_option('company_address_district_country') }}</p>
                        <p><a href="mailto:{{ get_static_option('company_email') }}"> {{ get_static_option('company_email') }}</a></p>
                        <p><a href="tel:{{ get_static_option('company_phone') }}"> {{ get_static_option('company_phone') }}</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-bottom">
        <div class="container">
            <div class="row">
                <div class="col-lg-7 text-lg-left text-center">
                    <ul class="footer-menu">
                        <li><a href={{ route('frontend.homePage') }}#">Home</a></li>
                        <li><a href={{ route('frontend.servicesPage') }}#">Services</a></li>
                        <li><a href={{ route('frontend.products') }}#">Products</a></li>
                    </ul>
                </div>
                <div class="col-lg-5 text-center text-lg-right">
                    <p class="copyright">Copyright © {{ date('Y') }}  <a href="{{ url('/') }}">{{ config('app.name') }}</a> All Rights Reserved.</p>
                </div>
            </div>
        </div>
    </div>
</footer>
