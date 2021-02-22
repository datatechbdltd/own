<!DOCTYPE html>
<html>

<!-- Design and developed by datatech bd ltd -->
<head>
@include('layouts.frontend.includes.head')
</head>

<body class="hidden-bar-wrapper">

<div class="page-wrapper">

    <!-- Preloader -->
    <div class="preloader"></div>

 	<!-- Main Header-->
     @include('layouts.frontend.includes.main-header')
    <!-- End Main Header -->

	<!-- Sidebar Cart Item -->
    @include('layouts.frontend.includes.side-bar-card-item')
	<!-- END sidebar widget item -->

	@yield('content')

	<!-- Main Footer -->
    @include('layouts.frontend.includes.footer')
	<!-- End Main Footer -->

</div>
<!--End pagewrapper-->

<!-- Color Palate / Color Switcher -->

<div class="color-palate">
    <div class="color-trigger">
        <i class="fa fa-gear"></i>
    </div>
    <div class="color-palate-head">
        <h6>DATATECH BD LTD.</h6>
    </div>

	<ul class="rtl-version option-box"> <li class="rtl">Call: +880 1304-734623</li> </ul>

    <a href="{{ route('frontend.contactUs') }}" class="purchase-btn">Order Us</a>

    <div class="palate-foo">
        <span>Shawpno Neer, 272/Kha/3/F, West Agargaon, She-E-Bangla Nagar, Dhaka-1207</span>
    </div>

</div>

<!-- Search Popup -->
<div class="search-popup">
	<button class="close-search style-two"><span class="flaticon-multiply"></span></button>
	<button class="close-search"><span class="flaticon-up-arrow-1"></span></button>
	<form method="post" action="https://expert-themes.com/html/meto/blog.html">
		<div class="form-group">
			<input type="search" name="search-field" value="" placeholder="Search Here" required="">
			<button type="submit"><i class="fa fa-search"></i></button>
		</div>
	</form>
</div>
<!-- End Header Search -->

<!--Scroll to top-->
<div class="scroll-to-top scroll-to-target" data-target="html"><span class="fa fa-arrow-up"></span></div>
@if(Auth::check())
<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
    @csrf
</form>
@endif
@include('layouts.frontend.includes.foot')
</body>

<!-- Design and developed by datatech bd ltd -->
</html>
