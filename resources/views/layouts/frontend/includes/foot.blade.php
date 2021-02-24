<script src="{{ asset('assets/frontend/js/jquery.js') }}"></script>
<script src="{{ asset('assets/frontend/js/popper.min.js') }}"></script>
<script src="{{ asset('assets/frontend/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('assets/frontend/js/jquery.mCustomScrollbar.concat.min.js') }}"></script>
<script src="{{ asset('assets/frontend/js/jquery.fancybox.js') }}"></script>
<script src="{{ asset('assets/frontend/js/appear.js') }}"></script>
<script src="{{ asset('assets/frontend/js/parallax.min.js') }}"></script>
<script src="{{ asset('assets/frontend/js/tilt.jquery.min.js') }}"></script>
<script src="{{ asset('assets/frontend/js/jquery.paroller.min.js') }}"></script>
<script src="{{ asset('assets/frontend/js/owl.js') }}"></script>
<script src="{{ asset('assets/frontend/js/mixitup.js') }}"></script>
<script src="{{ asset('assets/frontend/js/wow.js') }}"></script>
<script src="{{ asset('assets/frontend/js/nav-tool.js') }}"></script>
<script src="{{ asset('assets/frontend/js/jquery-ui.js') }}"></script>
<script src="{{ asset('assets/frontend/js/script.js') }}"></script>
<script src="{{ asset('assets/frontend/js/color-settings.js') }}"></script>
<script src="{{ asset('assets/helper.js') }}"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
{!! get_static_option('custom_website_foot_script') !!}
@include('sweetalert::alert')
@stack('script')
<script>
    $('.send-message-button').click(function (){
        $('#order-modal').modal('show');
        $('#send-message-form').trigger('reset');
    });
</script>

<!-- Load Facebook SDK for JavaScript -->
<div id="fb-root"></div>
<script>
    window.fbAsyncInit = function() {
        FB.init({
            xfbml            : true,
            version          : 'v10.0'
        });
    };

    (function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = 'https://connect.facebook.net/bn_IN/sdk/xfbml.customerchat.js';
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));</script>

<!-- Your Chat Plugin code -->
<div class="fb-customerchat"
     attribution="install_email"
     page_id="1124225807788567"
     theme_color="#7646ff">
</div>

