<div class="work-area common-pd-2 bg-none">
    <div class="container">
        <div class="row justify-content-center">
            <div class="row">
                @foreach($website_services as $service)
                    <div class="col-lg-4 col-md-4">
                        <div class="single-work text-center">
                            <span class="common-icon-circle bg-pink"><img src="{{ asset('assets/frontend2/img/icon/02.png') }}" alt="icon"></span>
                            <h4><a href="{{ $service->url ?? 'javascript:0' }}" class="send-message-button">{{ $service->name }}</a></h4>
                            <p>{{ $service->short_description }}</p>
                            <a class="btn btn-plus send-message-button-plus" href="{{ $service->url ?? 'javascript:0' }}"><i class="fa fa-plus"></i></a>
                        </div>
                    </div>
                @endforeach
                <div class="col-lg-12 mb-5 mb-mg-0">
                    <div class="single-input-wrap text-center text-lg-right">
                        @if(!Route::is('frontend.servicesPage'))
                        <a class="btn btn-basic" href="{{ route('frontend.servicesPage') }}">More services</a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
