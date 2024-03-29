<!DOCTYPE html>
<html lang="en">
    <head>
        @include('layouts.backend.includes.head')
    </head>
    <body class="vertical-layout">
        <!-- Start Infobar Notifications Sidebar -->
        @include('layouts.backend.includes.infobar')
        <div class="infobar-notifications-sidebar-overlay"></div>
        <!-- End Infobar Notifications Sidebar -->
        <!-- Start Infobar Setting Sidebar -->
        @include('layouts.backend.includes.setting-bar')
        <div class="infobar-settings-sidebar-overlay"></div>
        <!-- End Infobar Setting Sidebar -->
        <!-- Start Containerbar -->
        <div id="containerbar">
            <!-- Start Leftbar -->
            @include('layouts.backend.includes.leftbar')
            <!-- End Leftbar -->
            <!-- Start Rightbar -->
            @include('layouts.backend.includes.rightbar')
            <div class="rightbar">
                <!-- Start Topbar Mobile -->
            @include('layouts.backend.includes.topbar-mobile')
                <!-- End Topbar Mobile -->
                <!-- Start Topbar -->
            @include('layouts.backend.includes.topbar')
                <!-- End Topbar -->
                @yield('content')
                <!-- Start Footerbar -->
            @include('layouts.backend.includes.footer')
                <!-- End Footerbar -->
            </div>
            <!-- End Rightbar -->
        </div>
        <!-- End Containerbar -->
        @if(Auth::check())
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        @endif
        <!-- Start JS -->
        @include('layouts.backend.includes.foot')
    <!-- End JS -->
    </body>
</html>
