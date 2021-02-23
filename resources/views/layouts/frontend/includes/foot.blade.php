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
<script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
{!! get_static_option('custom_website_foot_script') !!}
@include('sweetalert::alert')
@stack('script')

