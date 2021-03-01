<div class="team-area-2 common-pd-bottom">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="section-title text-lg-left text-center">
                    <h5 class="subtitle"><span></span>{{ get_static_option('team_title') }}</h5>
                    <h3 class="title">{{ get_static_option('team_highlight') }}</h3>
                    <p>{{ get_static_option('team_description') }}</p>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            @foreach($website_teams as $website_team)
                <div class="col-lg-3 col-sm-6">
                    <div class="single-team-wrap text-center">
                        <div class="thumb">
                            <img height="217px;" width="210px;" src="{{ asset($website_team->image ?? get_static_option('no_image')) }}" alt="img">
                        </div>
                        <div class="team-details">
                            <h6>{{ $website_team->name }}</h6>
                            <h6>{{ $website_team->designation }}</h6>
                            <ul class="social-area">
                                <li><a target="_blank" href="{{ $website_team->facebook_link }}"><i class="fa fa-facebook-f"></i></a></li>
                                <li><a target="_blank" href="{{ $website_team->twitter_link }}"><i class="fa fa-twitter"></i></a></li>
                                <li><a target="_blank" href="{{ $website_team->linkedin_link }}"><i class="fa fa-linkedin"></i></a></li>
                                <li><a target="_blank" href="{{ $website_team->github_link }}"><i class="fa fa-github"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
