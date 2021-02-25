<!-- banner area start -->
<div class="banner-v3-area banner-v3-bg">
    <!-- banner slider area start -->
    <div class="banner-v3-slider-area-wrapper animated" data-animation-in="slideInDown">
        @foreach($webiste_banners as $banner)
        <div class="banner-slider-item">
            <div class="container">
                <div class="row">
                    <div class="col-lg-7">
                        <div class="banner-inner-wrap">
                            <div class="banner-inner">
                                <!-- banner inner -->
                                <p class="subtitle">{{ $banner->title }}</p>
                                <h2>{{ $banner->highlight }}</h2>
                                <div class="text">{{ $banner->description }}</div>
                                <div class="btn-wrapper animated fadeInUpBig text-left">
                                    <a href="{!! $banner->btn_url !!}" class="btn btn-basic">Click Me</a>
                                    <a href="{!! $banner->video_url !!}" class="video-popup mfp-iframe play-icon-pulse"><i class="fa fa-play"></i></a>

                                </div>
                            </div>
                            <!-- //.banner inner -->
                        </div>

                    </div>
                    <div class="col-lg-5 d-none d-lg-block">
                        <div class="banner-image">
                            <div class="banner-slide-image animated" data-animation-in="slideInUp">
                                <img src="{{ asset($banner->image ?? get_static_option('no_image')) }}" alt="">
                            </div>
                        </div>
                    </div>


                </div>
            </div>
        </div>
        @endforeach
    </div>
    <!-- banner slider area end -->
    <!-- banner slider controls start -->
    <div class="banner-v3-slider-controls">
        <div class="slider-nav"></div>
        <!--slider-nav-->
        <div class="slider-extra">
            <div class="text">
                <span class="first">01</span>
            </div>
            <!--text-->
            <div class="slider-progress">
                <span class="progress-bg"></span>
                <span class="progress-width"></span>
            </div>
            <!--progressbar-->
        </div>
        <!--slider-extra-->
    </div>
    <!-- banner slider controls end -->
    <!--Scroll Down-->
    <div class="scroll-down-area">
        <div class="scroll-bottom">
            <a href="#service"></a>
        </div>
    </div>
</div>
<!-- banner area end -->
