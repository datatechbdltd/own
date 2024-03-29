<section class="call-to-action-section" style="background-image: url({{ asset('assets/frontend/images/background/map-pattern.png') }})">
    <div class="dotted-layer" style="background-image: url({{ asset('assets/frontend/images/background/pattern-11.png') }})"></div>

    <div class="icon-layer" style="background-image: url({{ asset('assets/frontend/images/icons/cross-icon.png') }})"></div>
    <div class="icon-layer-two" style="background-image: url({{ asset('assets/frontend/images/icons/icon-1.png') }})"></div>
    <div class="icon-layer-three" style="background-image: url({{ asset('assets/frontend/images/icons/icon-2.png') }})"></div>
    <div class="icon-layer-four" style="background-image: url({{ asset('assets/frontend/images/icons/icon-1.png') }})"></div>

    <div class="auto-container">
        <div class="title">{{ get_static_option('call_to_action') }}</div>
        <h2>{{ get_static_option('call_to_action_highlight') }}</h2>
        <a href="{{ route('frontend.contactUs') }}" class="theme-btn btn-style-three"><span class="txt">Join Us</span></a>
    </div>
</section>
