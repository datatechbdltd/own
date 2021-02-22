<section class="counter-section-three">
    <div class="auto-container">
        <div class="row clearfix">

            <!-- Counter Column -->
            <div class="counter-column col-lg-6 col-md-12 col-sm-12">
                <div class="inner-column">
                    <!-- Sec Title -->
                    <div class="sec-title">
                        <div class="title">{{ get_static_option('real_members' ) }}</div>
                        <h2>{{ get_static_option('counter_highlight') }}</h2>
                        <div class="text">{{ get_static_option('counter_description') }}</div>
                    </div>

                    <!-- Fact Counter -->
                    <div class="fact-counter-two style-two">
                        <div class="row clearfix">
                            <!-- Column -->
                            <div class="column counter-column col-lg-6 col-md-6 col-sm-12">
                                <div class="inner wow fadeInLeft" data-wow-delay="0ms" data-wow-duration="1500ms">
                                    <div class="content">
                                        <div class="icon-box">
                                            <span class="icon"><img src="{{ asset('assets/frontend/images/icons/counter-1.png') }}" alt="" /></span>
                                        </div>
                                        <div class="count-outer count-box">
                                            <span class="count-text" data-speed="3000" data-stop="{{ get_static_option('active_clients_number') }}">0</span>+
                                        </div>
                                        <h4 class="counter-title">{{ get_static_option('active_clients') }}</h4>
                                    </div>
                                </div>
                            </div>

                            <!-- Column -->
                            <div class="column counter-column col-lg-6 col-md-6 col-sm-12">
                                <div class="inner wow fadeInLeft" data-wow-delay="300ms" data-wow-duration="1500ms">
                                    <div class="content">
                                        <div class="icon-box">
                                            <span class="icon"><img src="{{ asset('assets/frontend/images/icons/counter-2.png') }}" alt="" /></span>
                                        </div>
                                        <div class="count-outer count-box alternate">
                                            <span class="count-text" data-speed="5000" data-stop="{{ get_static_option('team_advisors_number') }}">0</span>+
                                        </div>
                                        <h4 class="counter-title">{{ get_static_option('team_advisors') }}</h4>
                                    </div>
                                </div>
                            </div>

                            <!-- Column -->
                            <div class="column counter-column col-lg-6 col-md-6 col-sm-12">
                                <div class="inner wow fadeInLeft" data-wow-delay="600ms" data-wow-duration="1500ms">
                                    <div class="content">
                                        <div class="icon-box">
                                            <span class="icon"><img src="{{ asset('assets/frontend/images/icons/counter-3.png') }}" alt="" /></span>
                                        </div>
                                        <div class="count-outer count-box">
                                            <span class="count-text" data-speed="2000" data-stop="{{ get_static_option('projects_done_number') }}">0</span>+
                                        </div>
                                        <h4 class="counter-title">{{ get_static_option('projects_done') }}</h4>
                                    </div>
                                </div>
                            </div>

                            <!-- Column -->
                            <div class="column counter-column col-lg-6 col-md-6 col-sm-12">
                                <div class="inner wow fadeInLeft" data-wow-delay="900ms" data-wow-duration="1500ms">
                                    <div class="content">
                                        <div class="icon-box">
                                            <span class="icon"><img src="{{ asset('assets/frontend/images/icons/counter-4.png') }}" alt="" /></span>
                                        </div>
                                        <div class="count-outer count-box">
                                            <span class="count-text" data-speed="3500" data-stop="{{ get_static_option('glorious_years_number') }}">0</span>+
                                        </div>
                                        <h4 class="counter-title">{{ get_static_option('glorious_years') }}</h4>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

                </div>
            </div>

            <!-- Image Column -->
            <div class="image-column col-lg-6 col-md-12 col-sm-12">
                <div class="inner-column parallax-scene-2">
                    <div class="image" data-depth="0.30">
                        <img src="{{ asset(get_static_option('counter_image') ?? get_static_option('no_image')) }}" alt="" />
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>
