<div class="fact-count-area pd-top-120">
    <div class="container">
        <div class="row justify-content-center">
            @foreach($website_counters as $website_counter)
                <div class="col-lg-4 col-md-6">
                    <div class="single-fact-count text-center">
                        <div class="thumb">
                            <img width="101px;" height="101px" src="{{ asset($website_counter->image ?? get_static_option('no_image')) }}" alt="icon">
                        </div>
                        <h4 class="fact-title">{{ $website_counter->title }}</h4>
                        <h2 class="counter">{{ $website_counter->number }}</h2>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
