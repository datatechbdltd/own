@section('title')
Theta - Knob Chart
@endsection
@extends('templates.panel.vertical.layout.main')
@section('style')

@endsection
@section('rightbar-content')
<!-- Start Breadcrumbbar -->
<div class="breadcrumbbar">
    <div class="row align-items-center">
        <div class="col-md-8 col-lg-8">
            <h4 class="page-title">Knob Chart</h4>
            <div class="breadcrumb-list">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{url('/template/panel-vertical/')}}">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">Charts</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Knob Chart</li>
                </ol>
            </div>
        </div>
        <div class="col-md-4 col-lg-4">
            <div class="widgetbar">
                <button class="btn btn-primary">Add Widget</button>
            </div>
        </div>
    </div>
</div>
<!-- End Breadcrumbbar -->
<!-- Start Contentbar -->
<div class="contentbar">
    <!-- Start row -->
    <div class="row">
        <div class="col-md-6 col-lg-4">
            <div class="card m-b-30">
                <div class="card-header">
                    <h5 class="card-title">Disable display input</h5>
                </div>
                <div class="card-body text-center">
                    <input class="knob" data-width="150" data-height="150" data-displayInput=false data-bgColor="rgba(255,255,255,0.05)" data-fgcolor="#944dff" value="35">
                </div>
            </div>
        </div>
        <!-- End col -->
        <!-- Start col -->
        <div class="col-md-6 col-lg-4">
            <div class="card m-b-30">
                <div class="card-header">
                    <h5 class="card-title">'cursor' mode</h5>
                </div>
                <div class="card-body text-center">
                    <input class="knob" data-width="150" data-height="150" data-cursor=true data-bgColor="rgba(255,255,255,0.05)" data-fgColor="#ffe411" data-thickness=.3 value="29">
                </div>
            </div>
        </div>
        <!-- End col -->
        <!-- Start col -->
        <div class="col-md-6 col-lg-4">
            <div class="card m-b-30">
                <div class="card-header">
                    <h5 class="card-title">Display previous value</h5>
                </div>
                <div class="card-body text-center">
                    <input class="knob" data-width="150" data-height="150" data-min="-100" data-displayPrevious=true data-bgColor="rgba(255,255,255,0.05)" data-fgcolor="#08d26f" value="44">
                </div>
            </div>
        </div>
        <!-- End col -->
        <!-- Start col -->
        <div class="col-md-6 col-lg-4">
            <div class="card m-b-30">
                <div class="card-header">
                    <h5 class="card-title">Angle offset</h5>
                </div>
                <div class="card-body text-center">
                    <input class="knob" data-width="150" data-height="150" data-angleOffset=90 data-linecap=round data-bgColor="rgba(255,255,255,0.05)" data-fgcolor="#fc4f68" value="35">
                </div>
            </div>
        </div>
        <!-- End col -->
        <!-- Start col -->
        <div class="col-md-6 col-lg-4">
            <div class="card m-b-30">
                <div class="card-header">
                    <h5 class="card-title">Angle offset and arc</h5>
                </div>
                <div class="card-body text-center">
                    <input class="knob" data-width="150" data-height="150" data-angleOffset=-125 data-angleArc=250 data-bgColor="rgba(255,255,255,0.05)" data-fgColor="#81cef6" data-rotation="anticlockwise" value="35">
                </div>
            </div>
        </div>
        <!-- End col -->
        <!-- Start col -->
        <div class="col-md-6 col-lg-4">
            <div class="card m-b-30">
                <div class="card-header">
                    <h5 class="card-title">4-digit, step 0.1</h5>
                </div>
                <div class="card-body text-center">
                    <input class="knob" data-width="150" data-height="150" data-min="-10000" data-displayPrevious=true data-max="10000" data-step=".1" data-bgColor="rgba(255,255,255,0.05)" data-fgcolor="#bcc4dc" value="0">
                </div>
            </div>
        </div>
        <!-- End col -->
        <!-- Start col -->
        <div class="col-md-6 col-lg-4">
            <div class="card m-b-30">
                <div class="card-header">
                    <h5 class="card-title">Overloaded 'draw' method</h5>
                </div>
                <div class="card-body text-center">
                    <input class="knob" data-width="150" data-height="150" data-displayPrevious=true data-bgColor="rgba(255,255,255,0.05)" data-fgColor="#944dff" data-skin="tron" data-cursor=true value="75" data-thickness=".2">
                </div>
            </div>
        </div>
        <!-- End col -->
        <!-- Start col -->
        <div class="col-md-6 col-lg-4">
            <div class="card m-b-30">
                <div class="card-header">
                    <h5 class="card-title">Read Only</h5>
                </div>
                <div class="card-body text-center">
                    <input class="knob" data-width="150" data-height="150" data-bgColor="rgba(255,255,255,0.05)" data-fgColor="#944dff" data-thickness=".1" readonly value="22">
                </div>
            </div>
        </div>
        <!-- End col -->
        <!-- Start col -->
        <div class="col-md-12 col-lg-4">
            <div class="card m-b-30">
                <div class="card-header">
                    <h5 class="card-title">Superpose (clock)</h5>
                </div>
                <div class="card-body text-center">
                    <div class="knob-superpose">
                        <div class="knob-hour">
                            <input class="knob hour" data-min="0" data-max="24" data-bgColor="rgba(255,255,255,0.05)" data-fgColor="#944dff" data-displayInput=false data-width="150" data-height="150" data-thickness=".3">
                        </div>
                        <div class="knob-minute">
                            <input class="knob minute" data-min="0" data-max="60" data-bgColor="rgba(255,255,255,0.05)" data-fgColor="#ffe411" data-displayInput=false data-width="90" data-height="90" data-thickness=".4">
                        </div>
                        <div class="knob-second">
                            <input class="knob second" data-min="0" data-max="60" data-bgColor="rgba(255,255,255,0.05)" data-fgColor="#08d26f" data-displayInput=false data-width="40" data-height="40" data-thickness=".4">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End col -->
    </div>
    <!-- End row -->
</div>
<!-- End Contentbar -->
@endsection
@section('script')
<!-- Knob Chart js -->
<script src="{{ asset('assets/panel/vertical/plugins/jquery-knob/excanvas.js') }}"></script>
<script src="{{ asset('assets/panel/vertical/plugins/jquery-knob/jquery.knob.min.js') }}"></script>
<script src="{{ asset('assets/panel/vertical/js/custom/custom-chart-knob.js') }}"></script>
@endsection
