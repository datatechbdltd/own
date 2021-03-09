<!DOCTYPE html>
<html lang="en">


<head>
@include('layouts.frontend2.includes.head')
</head>

<body>

<!-- preloader area start -->
@include('layouts.frontend2.includes.preloader')
<!-- preloader area end -->

<!-- search Popup -->
@include('layouts.frontend2.includes.search-popup')
<!-- //. search Popup -->
<!-- Popup -->
@include('layouts.frontend2.includes.popup')
<!-- sen-user-modal -->
<!-- //.End  Signin Popup -->
<!-- navbar start -->
@include('layouts.frontend2.includes.nav')
<!-- navbar end -->
@yield('content')
<!-- subscribe area start -->
@include('layouts.frontend2.includes.message')
@include('layouts.frontend2.includes.subscrible')
<!-- subscribe area end -->
<!-- footer area start -->
@include('layouts.frontend2.includes.footer')
<!-- footer area end -->
<!-- back to top area start -->
<div class="back-to-top">
    <span class="back-top"><i class="fa fa-angle-up"></i></span>
</div>
<!-- back to top area end -->
@include('layouts.frontend2.includes.foot')
@if(Auth::check())
<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
    @csrf
</form>
@endif
</body>
</html>
