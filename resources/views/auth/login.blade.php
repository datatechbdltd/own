@extends('layouts.auth.app')
@push('title')

@endpush
@push('meta-description')

@endpush
@push('meta-image')

@endpush
@push('style')

@endpush

@section('content')
<div class="auth-box login-box">
    <!-- Start row -->
    <div class="row no-gutters align-items-center justify-content-center">
        <!-- Start col -->
        <div class="col-md-6 col-lg-5">
            <div class="auth-box-left">
                <div class="card">
                    <div class="card-body">
                        <h4>Your comminuty awaits.</h4>
                        <div class="auth-box-icon">
                            <img src="assets/panel/horizontal/images/authentication/auth-box-icon.svg" class="img-fluid" alt="auth-box-icon">
                        </div>
                        <div class="auth-box-logo">
                            <img src="{{ asset(get_static_option('website_logo')) }}" class="img-fluid " alt="logo">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Start end -->
        <!-- Start col -->
        <div class="col-md-6 col-lg-5">
            <!-- Start Auth Box -->
            <div class="auth-box-right">
                <div class="card">
                    <div class="card-body">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            <h4 class="text-primary mb-4">{{ __('Log in !') }}</h4>
                            <div class="form-group">
                                <input type="email" class="form-control" id="email" name="email" placeholder="{{ __('Enter email here') }}" required>
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control" id="password" name="password" placeholder="{{ __('Enter password here') }}" required>
                            </div>
                            <div class="form-row mb-3">
                                <div class="col-sm-6">
                                    <div class="custom-control custom-checkbox">
                                      <input type="checkbox" class="custom-control-input" id="rememberme" name="remember">
                                      <label class="custom-control-label font-14" for="rememberme">{{ __('Remember Me') }}</label>
                                    </div>
                                </div>
                                @if (Route::has('password.request'))
                                <div class="col-sm-6">
                                  <div class="forgot-psw">
                                    <a id="forgot-psw" href="{{url('/template/panel-horizontal/user-forgotpsw')}}" class="font-14">{{ __('Forgot Password?') }}</a>
                                  </div>
                                </div>
                                @endif
                            </div>
                          <button type="submit" class="btn btn-success btn-lg btn-block font-18">{{ __('Log in Now') }}</button>
                        </form>
                        <div class="login-or">
                            <h6 class="text-muted">{{ __('OR') }}</h6>
                        </div>
                        <div class="social-login text-center">
                            <button type="submit" class="btn btn-primary-rgba btn-lg btn-block font-18"><i class="mdi mdi-facebook mr-2"></i>{{ __('Log in with Facebook') }}</button>
                            <button type="submit" class="btn btn-danger-rgba btn-lg btn-block font-18"><i class="mdi mdi-google mr-2"></i>{{ __('Log in with Google') }}</button>
                        </div>
                        <p class="mb-0 mt-3"> {{ __('Don\'t have a account?') }} <a href="{{ url('/template/panel-horizontal/user-register') }}">{{ __('Sign up') }}</a></p>
                    </div>
                </div>
            </div>
            <!-- End Auth Box -->
        </div>
        <!-- End col -->
    </div>
    <!-- End row -->
</div>
@endsection
@push('script')

@endpush
