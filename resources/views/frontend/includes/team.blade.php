<!-- Team Section Three -->
<section class="team-section-three">
    <div class="auto-container">
        <!-- Sec Title -->
        <div class="sec-title light centered">
            <div class="title">{{ get_static_option('team_title') }}</div>
            <h2>{{ get_static_option('team_highlight') }}</h2>
            <div class="text">{{ get_static_option('team_description') }}</div>
        </div>

        <div class="three-item-carousel owl-carousel owl-theme">
        @foreach($website_teams as $website_team)
            <!-- Team Block -->
            <div class="team-block-two @if($loop->even)  style-three @endif">
                <div class="inner-box">
                    <div class="image-box">
                        <div class="image">
                            <img src="{{ asset($website_team->image ?? get_static_option('no_image')) }}" alt="" />
                        </div>
                        <!-- Social Box -->
                        <div class="social-outer">
                            <ul class="social-box">
                                <li><a href="{{ $website_team->facebook_link }}" class="fa fa-facebook-f"></a></li>
                                <li><a href="{{ $website_team->linkedin_link }}" class="fa fa-linkedin"></a></li>
                                <li><a href="{{ $website_team->github_link }}" class="fa fa-github"></a></li>
                                <li><a href="{{ $website_team->twitter_link }}" class="fa fa-twitter"></a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="lower-box">
                        <h4><a target="_blank" href="{{ $website_team->slug }}">{{ $website_team->name }}</a></h4>
                        <div class="designation">{{ $website_team->designation }}</div>
                    </div>
                </div>
            </div>
        @endforeach

        </div>

    </div>
    <div class="bottom-layer"></div>
</section>
<!-- End Team Section Three -->
