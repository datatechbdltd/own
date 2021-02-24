<section class="banner-section-three">
    <!-- Social Box -->
    <ul class="social-box">
            <li><a target="_blank" href="{{ get_static_option('company_facebook_link') }}" class="fa fa-facebook-f"></a></li>
            <li><a target="_blank" href="{{ get_static_option('company_linkedin_link') }}" class="fa fa-linkedin"></a></li>
            <li><a target="_blank" href="{{ get_static_option('company_twitter_link') }}" class="fa fa-twitter"></a></li>
            <li><a target="_blank" href="{{ get_static_option('company_github_link') }}" class="fa fa-github"></a></li>
            <li><a target="_blank" href="{{ get_static_option('company_instagram_link') }}" class="fa fa-instagram"></a></li>
            <li><a target="_blank" href="{{ get_static_option('company_whatsapp_link') }}" class="fa fa-whatsapp"></a></li>
    </ul>

    <div class="pattern-layer-one" style="background-image: url({{ asset('assets/frontend/images/icons/pattern-1.png') }})"></div>
    <div class="patern-layer-two" style="background-image: url({{ asset('assets/frontend/images/background/pattern-1.png') }})"></div>
    <div class="pattern-layer-three" style="background-image: url({{ asset('assets/frontend/images/background/pattern-5.png') }})"></div>
    <div class="main-slider-carousel owl-carousel owl-theme">
        @foreach($webiste_banners as $banner)
            <div class="slide">
                <div class="auto-container">
                    <div class="row clearfix">

                        <!-- Content Column -->
                        <div class="content-column col-lg-6 col-md-12 col-sm-12">
                            <div class="inner-column">
                                <div class="title">{{ $banner->title }}</div>
                                <h1>Rank Your Local <br>{{ $banner->highlight }}</h1>
                                <div class="text">{{ $banner->description }}</div>
                                <div class="btns-box">
                                    <a target="_blank" href="{{ $banner->btn_url }}" class="theme-btn btn-style-one"><span class="txt">Start Now</span></a>
                                    <a target="_blank" href="{{ $banner->video_url }}" class="lightbox-image video-box"><span class="fa fa-play"><i class="ripple"></i></span></a>
                                </div>
                            </div>
                        </div>

                        <!-- Image Column -->
                        <div class="image-column col-lg-6 col-md-12 col-sm-12">
                            <div class="inner-column">
                                <div class="image">
                                    <img src="{{ asset($banner->image ?? get_static_option('no_image')) }}" alt="" />
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        @endforeach
    </div>
    <!--Waves Container-->
    <div>
      <svg class="waves" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
      viewBox="0 24 150 28" preserveAspectRatio="none" shape-rendering="auto">
      <defs>
      <path id="gentle-wave" d="M-160 44c30 0 58-18 88-18s 58 18 88 18 58-18 88-18 58 18 88 18 v44h-352z" />
      </defs>
      <g class="parallax">
      <use xlink:href="#gentle-wave" x="48" y="0" fill="rgba(255,255,255,0.7" />
      <use xlink:href="#gentle-wave" x="48" y="3" fill="rgba(255,255,255,0.5)" />
      <use xlink:href="#gentle-wave" x="48" y="5" fill="rgba(255,255,255,0.3)" />
      <use xlink:href="#gentle-wave" x="48" y="7" fill="#fff" />
      </g>
      </svg>
    </div>
    <!--Waves end-->
</section>
