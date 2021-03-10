<div class="shape-3" style="background-image: url({{ asset('assets/frontend2/img/shape/3.png') }});">
    <!-- testimonial-area start -->
    <div class="testimonial-area pd-top-80 common-pd-bottom left-bottom-line-bg" style="background-image: url({{ asset('assets/frontend2/img/shape/pen.png') }});">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="testimonial-main-slider">
                        @foreach($website_clients as $website_client)
                            <div class="item">
                                <div class="single-main-client">
                                    <div class="section-title text-lg-left text-center">
                                        <h5 class="subtitle"><span></span>Top Clients</h5>
                                        <h3 class="title">{{ $website_client->title }}</h3>
                                        <p>{{ $website_client->description }}</p>
                                    </div>
                                    <div class="client-info text-lg-left text-center">
                                        <h6>{{ $website_client->name }}</h6>
                                        <p>{{ $website_client->designation }}</p>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="col-lg-6 align-self-center">
                    <div class="testimonial-thumb-slider-wrap">
                        @foreach($website_clients as $website_client2)
                        <img class="testimonial-thumb-slider--img testimonial-thumb-slider--img-{{ $loop->iteration }}" width="90px;" height="90px;" src="{{ asset($website_client2->image ?? get_static_option('no_image')) }}" alt="img">
                        @endforeach
                        <div class="testimonial-thumb-slider-img testimonial-thumb-slider">
                        @foreach($website_clients as $website_client3)
                            <div class="item">
                                <div class="single-thumb-client">
                                    <img src="{{ asset($website_client3->image ?? get_static_option('no_image')) }}" alt="img">
                                </div>
                            </div>
                        @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- testimonial-area end -->
</div>
