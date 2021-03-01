<div class="shape-5" style="background-image: url({{ asset('assets/frontend2/img/shape/5.png') }});">
    <!-- client area start -->
    <div class="partner-area common-pd-bottom-4 right-bottom-line-bg" style="background-image: url({{ asset('assets/frontend2/img/shape/pen-3.png') }});">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="partner-slider owl-carousel owl-theme">
                        @foreach($websiteAllClients as $websiteClient)
                            <div class="item">
                                <a target="_blank" href="{{ $websiteClient->company_url }}"><img width="171px;" height="60px;"  src="{{ asset($websiteClient->company_logo ?? get_static_option('no_image')) }}" alt="client"></a>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- client area end -->
</div>
