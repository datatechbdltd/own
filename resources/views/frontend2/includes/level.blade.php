<div class="video-area-2 common-pd-bottom right-line-bg" style="background-image: url({{ asset('assets/frontend2/img/shape/pen-2.png') }});">
    <div class="container">
        <div class="row">
            @foreach($website_products as $website_product)
                <div class="col-lg-3 col-md-6">
                    <div class="single-about text-center bg-gradient">
                        <div class="thumb">
                            <div class="thumb">
                                <img height="68px;" width="68px;" src="{{ asset($website_product->image ?? get_static_option('no_image')) }}" alt="icon">
                            </div>
                        </div>
                        <h5><a class="send-message-button-product" href="javascript:0">{{ $website_product->name }}</a></h5>
                        <p>{{ $website_product->short_description }}</p>
                        <a class="btn btn-plus send-message-product-button-plus" href="javascript:0"><i class="fa fa-plus"></i></a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
