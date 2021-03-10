<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <div class="news-slider-area">
{{--                <h6>Some projects</h6>--}}
                <div class="news-slider owl-carousel owl-theme">
                    @foreach($websiteAllClients as $websiteClient4)
                        <div class="item"><img src="{{ asset($websiteClient->company_logo ?? get_static_option('no_image')) }}" alt="img"></div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
