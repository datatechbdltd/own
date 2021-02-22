<section class="level-section">
    <div class="auto-container">
        <div class="inner-container">
            <div class="pattern-one" style="background-image: url({{ asset('assets/frontend/images/background/pattern-9.png') }})"></div>
            <a href="{{ get_static_option('level_video_link') }}" class="lightbox-image video-box"><span class="fa fa-play"><i class="ripple"></i></span></a>
            <div class="clearfix">

                <div class="pull-left">
                    <h2>{{ get_static_option('level_title') }}</h2>
                </div>

                <div class="pull-right">
                    <div class="rocket-image">
                        <img height="120px;" width="250px;" src="{{ get_static_option('level_image') ?? get_static_option('no_image') }}" alt="" />
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>
