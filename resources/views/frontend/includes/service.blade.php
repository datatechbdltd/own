<section class="services-section-five">
    <div class="pattern-layer-one" style="background-image: url(images/background/service-pattern-3.png)"></div>
    <div class="pattern-layer-two" style="background-image: url(images/background/service-pattern-4.png)"></div>
    <div class="gradient-layer"></div>
    <div class="auto-container">

        <!-- Sec Title -->
        <div class="sec-title centered">
            <div class="title">{{ get_static_option('our_service') }}</div>
            <h2>{{ get_static_option('service_highlight') }}</h2>
            <div class="text">{{ get_static_option('service_description') }}</div>
        </div>

        <div class="row clearfix">
            @foreach($website_services as $service)
                <div class="service-block-five col-lg-4 col-md-6 col-sm-12">
                    <div class="inner-box wow fadeInLeft" data-wow-delay="0ms" data-wow-duration="1500ms">
                        <div class="icon-box">
                            <span class="icon flaticon-statistics"></span>
                            <div class="circles-box">
                                <span class="circle-one"></span>
                                <span class="circle-two"></span>
                            </div>
                        </div>
                        <div class="lower-content">
                            <div class="left-pattern"></div>
                            <div class="right-pattern"></div>
                            <h4><a href="services-detail.html">{{ $service->name }}</a></h4>
                            <div class="text">{{ $service->short_description }}</div>
                        </div>
                    </div>
                </div>
            @endforeach
            <!-- Service Block Five -->

        </div>
        @if(Route::is('frontend.servicesPage'))

        @else
            <div class="btn-box centered">
                <a href="{{ route('frontend.servicesPage') }}" class="theme-btn btn-style-three"><span class="txt">View Service</span></a>
            </div>
        @endif

    </div>
</section>
