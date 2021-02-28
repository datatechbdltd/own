<!-- vendor js here -->
<script src="{{ asset('assets/frontend2/js/vendor.js') }}"></script>
<!--signin -->
<script src="{{ asset('assets/frontend2/js/signin.js') }}"></script>
<!-- magnific popup -->
<script src="{{ asset('assets/frontend2/js/jquery.magnific-popup.min.js') }}"></script>
<!-- counterup -->
<script src="{{ asset('assets/frontend2/js/jquery.counterup.min.js') }}"></script>
<!-- waypoint -->
<script src="{{ asset('assets/frontend2/js/jquery.waypoints.js') }}"></script>
<!-- slick slider -->
<script src="{{ asset('assets/frontend2/js/slick.min.js') }}"></script>
<!-- Slick Animation -->
<script src="{{ asset('assets/frontend2/js/slick-animation.js') }}"></script>
<!-- main js  -->
<script src="{{ asset('assets/frontend2/js/main.js') }}"></script>

<script src="{{ asset('assets/helper.js') }}"></script>
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
