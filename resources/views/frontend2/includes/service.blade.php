<div class="work-area common-pd-2 bg-none">
    <div class="container">
        <div class="row justify-content-center">
            <div class="row">
                @foreach($website_services as $service)
                    <div class="col-lg-4 col-md-4">
                        <div class="single-work text-center">
                            <span class="common-icon-circle bg-pink"><img src="{{ asset('assets/frontend2/img/icon/02.png') }}" alt="icon"></span>
                            <h4><a href="{{ $service->url ?? 'javascript:0' }}">{{ $service->name }}</a></h4>
                            <p>{{ $service->short_description }}</p>
                            <a class="btn btn-plus" href="{{ $service->url ?? 'javascript:0' }}"><i class="fa fa-plus"></i></a>
                        </div>
                    </div>
                @endforeach
                <div class="col-lg-12 mb-5 mb-mg-0">
                    <div class="single-input-wrap text-center text-lg-right">
                        <input placeholder="Open an account - enter you email" type="text" class="single-input">
                        <a class="btn btn-basic" href="#">GO ON</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
