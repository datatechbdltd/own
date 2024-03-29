<script>
    $('.message-body').summernote({
        placeholder: 'I need a website for my company ....',
        tabsize: 2,
        height: 220,
        toolbar: [

        ]
    });
</script>
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
<script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>

{!! get_static_option('custom_website_foot_script') !!}
@include('sweetalert::alert')
@stack('script')


<script>
    $('.send-message-button').click(function (){
        $('#order-modal').modal('show');
        $('#send-message-form').trigger('reset');
        $('.message-area').val("I need "+$(this).text()+" service. Please contact me.");
    });
    $('.send-message-button-product').click(function (){
        $('#order-modal').modal('show');
        $('#send-message-form').trigger('reset');
        $('.message-area').val("I need "+$(this).text()+" product. Please contact me.");
    });

    $('.send-message-button-plus').click(function (){
        $('#order-modal').modal('show');
        $('#send-message-form').trigger('reset');
        $('.message-area').val("I need "+$(this).parent().find('.send-message-button').text()+" service. Please contact me.");
    });

    $('.send-message-product-button-plus').click(function (){
        $('#order-modal').modal('show');
        $('#send-message-form').trigger('reset');
        $('.message-area').val("I need "+$(this).parent().find('.send-message-button-product').text()+" product. Please contact me.");
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
    }(document, 'script', 'facebook-jssdk'));
</script>

<!-- Your Chat Plugin code -->
<div class="fb-customerchat"
     attribution="install_email"
     page_id="1124225807788567"
     theme_color="#7646ff">
</div>

<script>
    $('.testimonial-main-slider').slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        dots: false,
        arrows: true,
        fade: true,
        prevArrow: '<span class="slick-prev"><img src="{{ asset('assets/frontend2/img/icon/left.png') }}" alt="img" /></span>',
        nextArrow: '<span class="slick-next"><img src="{{ asset('assets/frontend2/img/icon/right.png') }}" alt="img" /></span>',
        asNavFor: '.testimonial-thumb-slider'
    });
</script>



