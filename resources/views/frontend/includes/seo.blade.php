<section class="seo-section-three">
    <div class="auto-container">
        <div class="row clearfix">

            <!-- Image Column -->
            <div class="image-column col-lg-6 col-md-12 col-sm-12">
                <div class="inner-column parallax-scene-1">
                    <div class="image" data-depth="0.30">
                        <img src="{{ asset(get_static_option('seo_image') ?? get_static_option('no_image')) }}" alt="" />
                    </div>
                </div>
            </div>

            <!-- Content Column -->
            <div class="content-column col-lg-6 col-md-12 col-sm-12">
                <div class="inner-column">
                    <!-- Sec Title -->
                    <div class="sec-title">
                        <div class="title">{{ get_static_option('who_we_are') }}</div>
                        <h2>{{ get_static_option('seo_highlight') }}</h2>
                        <div class="text">{{ get_static_option('seo_description') }}</div>
                    </div>
                    <ul class="seo-list">
                        @foreach($website_seos as $seo)
                            <li><span class="icon flaticon-check-symbol"></span>{{ $seo->text }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
