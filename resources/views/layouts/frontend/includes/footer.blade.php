<footer class="main-footer style-two">
    <!--Waves end-->
    <div class="auto-container">
        <!--Widgets Section-->
        <div class="widgets-section">
            <div class="row clearfix">

                <!-- Column -->
                <div class="big-column col-lg-6 col-md-12 col-sm-12">
                    <div class="row clearfix">

                        <!-- Footer Column -->
                        <div class="footer-column col-lg-7 col-md-6 col-sm-12">
                            <div class="footer-widget logo-widget">
                                <div class="logo">
                                    <a href="{{ url('/') }}"><img src="{{ get_static_option('webiste_logo') }}" alt="Logo" /></a>
                                </div>
                                <div class="text">{{ get_static_option('footer_text') }}</div>
                                <!-- Social Box -->
                                <ul class="social-box">
                                    <li><a target="_blank" href="{{ get_static_option('company_facebook_link') }}" class="fa fa-facebook-f"></a></li>
                                    <li><a target="_blank" href="{{ get_static_option('company_linkedin_link') }}" class="fa fa-linkedin"></a></li>
                                    <li><a target="_blank" href="{{ get_static_option('company_twitter_link') }}" class="fa fa-twitter"></a></li>
                                    <li><a target="_blank" href="{{ get_static_option('company_github_link') }}" class="fa fa-github"></a></li>
                                    <li><a target="_blank" href="{{ get_static_option('company_instagram_link') }}" class="fa fa-instagram"></a></li>
                                    <li><a target="_blank" href="{{ get_static_option('company_whatsapp_link') }}" class="fa fa-whatsapp"></a></li>
                                </ul>
                            </div>
                        </div>

                        <!-- Footer Column -->
                        <div class="footer-column col-lg-5 col-md-6 col-sm-12">
                            <div class="footer-widget links-widget">
                                <h4>About us</h4>
                                <ul class="list-link">
                                    @foreach(active_custom_pages() as $page)
                                        <li> <a href="{{ route('frontend.customPage', $page->slug) }}"> {{ $page->name }} </a></li>
                                    @endforeach
                                        <li> <a href="{{ route('frontend.contactUs') }}"> Contact us </a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Column -->
                <div class="big-column col-lg-6 col-md-12 col-sm-12">
                    <div class="row clearfix">

                        <!-- Footer Column -->
                        <div class="footer-column col-lg-5 col-md-6 col-sm-12">
                            <div class="footer-widget links-widget">
                                <h4>Quick link</h4>
                                <ul class="list-link">
                                    <li><a href={{ route('frontend.homePage') }}#">Home</a></li>
                                    <li><a href={{ route('frontend.servicesPage') }}#">Services</a></li>
                                    <li><a href={{ route('frontend.products') }}#">Products</a></li>
                                </ul>
                            </div>
                        </div>

                        <!-- Footer Column -->
                        <div class="footer-column col-lg-7 col-md-6 col-sm-12">
                            <div class="footer-widget subscribe-widget">
                                <h4>Subscribe Now</h4>
                                <div class="text">{{ get_static_option('subscribe_text') }}</div>
                                <div class="newsletter-form">
                                    <form>
                                        <div class="form-group">
                                            <input id="subscribe-email" type="email" name="email" value="" placeholder="Your Email" required="">
                                            <button  type="submit" class="theme-btn subscribe-now-btn submit-btn"><span class="txt flaticon-send"></span>&nbsp; Start</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

            </div>
        </div>

        <!-- Footer Bottom -->
        <div class="footer-bottom">
            <div class="copyright">Copyright © {{ date('Y') }}  <a href="{{ url('/') }}">{{ config('app.name') }}</a> All Rights Reserved.</div>
        </div>
    </div>
</footer>
<script>
    // select and reject
    $('.subscribe-now-btn').click(function (){
        $.ajax({
            method: 'POST',
            url: "{{ route('frontend.subscribeStore') }}",
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            data: { email:  $('#subscribe-email').val()},
            dataType: 'JSON',
            beforeSend: function (){
                $(".subscribe-now-btn").prop("disabled",true);
            },
            complete: function (){
                $(".subscribe-now-btn").prop("disabled",false);
            },
            success: function (response) {
                if (response.type == 'success'){
                    $('#subscribe-email').val("");
                    Swal.fire(
                        'Thank you !',
                        response.message,
                        'success'
                    )

                }else{
                    Swal.fire(
                        'Sorry !',
                        response.message,
                        response.type
                    )
                }
            },
            error: function (xhr) {
                var errorMessage = '<div class="card bg-danger">\n' +
                    '                        <div class="card-body text-center p-5">\n' +
                    '                            <span class="text-white">';
                $.each(xhr.responseJSON.errors, function(key,value) {
                    errorMessage +=(''+value+'<br>');
                });
                errorMessage +='</span>\n' +
                    '                        </div>\n' +
                    '                    </div>';
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    footer: errorMessage
                })
            },
        })

    });
</script>
