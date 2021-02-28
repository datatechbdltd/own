<div class="featured-area left-line-bg common-pd-bottom-3" style="background-image: url({{ asset('assets/frontend2/img/shape/pen.png') }});">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-7 col-md-9 text-lg-left text-center">
                <div class="section-title">
                    <h5 class="subtitle"><span></span>{{ get_static_option('who_we_are') }}</h5>
                    <h3 class="title">{{ get_static_option('seo_highlight') }}</h3>
                    <p>{{ get_static_option('seo_description') }}</p>
                </div>
                @foreach($website_seos as $seo)
                    <div class="single-input-wrap m-3">
                        <input class="single-input" value="{{ $seo->text }}" readonly>
                    </div>
                @endforeach
            </div>
            <div class="col-lg-5 col-6 align-self-center banner-thumb-wrap">
                <div class="thumb item-bounce">
                    <img src="{{ asset(get_static_option('seo_image') ?? get_static_option('no_image')) }}" alt="img">
                </div>
            </div>
        </div>
    </div>
</div>
