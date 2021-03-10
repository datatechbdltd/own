@extends('layouts.frontend2.app')
@push('title') Lead collection @endpush
@section('content')

    <!-- page-title area start -->
    <div class="page-title-area">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-sm-6">
                    <h3 class="title">Lead collection </h3>
                </div>
                <div class="col-sm-6 text-center align-self-center">
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Lead collection</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- page-title area end -->

    <div id="message-section" class="subscribe-area bg-gray common-pd-subscribe text-center text-sm-left">
        <div class="container">
            <div class="row justify-content-center">
                @if(Auth::check())
                <!-- Form Form -->
                <div class="form-column col-lg-12 col-md-12 col-sm-12">
                    <div class="inner-column">
                        <!-- Sec Title -->
                        <div class="sec-title">
                            <div class="title">Hello {{ auth()->user()->name }} !</div>
                            <h2>Ready to Collect?</h2>
                        </div>
                        <!-- Default Form -->
                        <div class="row">
                            <div class="col-lg-12 align-self-center">
                                <form class="sen-form" action="{{ route('frontend.storeLead') }}" method="POST">
                                    @csrf
                                    <div class="row">
                                        <div class="col-lg-6 col-md-6 col-sm-12">
                                            <div class="form-group fieldset">
                                                <input  class="full-width has-padding has-border"  type="text" name="name" value="{{ old('name') }}" placeholder="Name">
                                            </div>
                                            <div class="form-group fieldset">
                                                <input  class="full-width has-padding has-border"  type="text" name="email" value="{{ old('email') }}" placeholder="Email">
                                                @error('email')
                                                <div class="text-danger"><b>{{ $message }}</b></div>
                                                @enderror
                                            </div>
                                            <div class="form-group fieldset">
                                                <input  class="full-width has-padding has-border"  type="text" name="phone" value="{{ old('phone') }}" placeholder="Phone">
                                                @error('phone')
                                                <div class="text-danger"><b>{{ $message }}</b></div>
                                                @enderror
                                            </div>
                                            <div class="form-group fieldset">
                                                <input  class="full-width has-padding has-border"  type="text" name="company_name" value="{{ old('company_name') }}" placeholder="Company name">
                                            </div>
                                            <div class="form-group fieldset">
                                                <input  class="full-width has-padding has-border"  type="text" name="profession" value="{{ old('profession') }}" placeholder="Profession">
                                            </div>
                                            <div class="form-group fieldset">
                                                <input  class="full-width has-padding has-border"  type="text" name="address" value="{{ old('address') }}" placeholder="Address">
                                            </div>
                                            <div class="form-group fieldset">
                                                <input  class="full-width has-padding has-border"  type="text" name="company_website" value="{{ old('company_website') }}" placeholder="Company website">
                                            </div>
                                            <div class="form-group fieldset">
                                                <input  class="full-width has-padding has-border"  type="text" name="company_facebook_page" value="{{ old('company_facebook_page') }}" placeholder="Company facebook page">
                                            </div>
                                            <div class="form-group fieldset">
                                                <textarea  rows="5"  class="full-width col-12"  name="description" placeholder="Description">{{ old('description') }}</textarea>
                                            </div>
                                            <div class="form-group fieldset">
                                                <button  class="full-width has-padding has-border"  type="submit"><span class="txt">Submit now</span></button>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-12">
                                            <div class="form-group fieldset row">
                                                <select class="full-width has-padding has-border col-12" name="service_id" id="">
                                                    <option value="" selected>Chose profession</option>
                                                    @foreach($lead_services as $service)
                                                    <option value="{{ $service->id }}">{{ $service->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group fieldset row">
                                                <select  class="full-width has-padding has-border col-12"  name="district_id" id="">
                                                    <option value="" selected>Chose district</option>
                                                    @foreach($lead_districts as $district)
                                                    <option value="{{ $district->id }}">{{ $district->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group fieldset row">
                                                <select  class="full-width has-padding has-border col-12"  name="thana_id" id="">
                                                    <option value="" selected>Chose Thana</option>
                                                    @foreach($lead_thanas as $thana)
                                                    <option value="{{ $thana->id }}">{{ $thana->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group fieldset row">
                                                <level><b>Marital status</b></level>
                                                <select  class="full-width has-padding has-border col-12"  name="is_married" id="">
                                                    <option value="" selected>Is married</option>
                                                    <option value="Yas" selected>Yes</option>
                                                    <option value="No" selected>No</option>
                                                </select>
                                            </div>

                                            <div class="form-group fieldset">
                                                <level><b>Birth date</b></level>
                                                <input  class="full-width has-padding has-border col-12"  class="form-control" type="date" value="" id="date_of_birth" name="date_of_birth">
                                            </div>
                                            <div class="form-group fieldset">
                                                <button  class="full-width has-padding has-border col-12"  type="reset" class="theme-btn btn-style-four"><span class="txt">Reset all</span></button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>

                            @if(get_static_option('is_bulk_import_from_website') == 'yes')
                            <hr>
                            <div class="row">
                                <div class="col-lg-12 align-self-center">
                                    <form action="{{ route('frontend.importLead') }}" method="POST" enctype="multipart/form-data" class="row">
                                        @csrf
                                        <div class="form-group fieldset col-12">
                                            <level><b class="text-danger">Chose import file (.xlsx)</b> <i><a href="{{ url('/'. get_static_option('sample_leads')) }}">Sample file</a></i></level>
                                            <br>
                                            <input  class="full-width has-padding has-border col-12" type="file" accept=".xlsx" name="file">
                                            @error('file')
                                            <div class="text-danger"><b>{{ $message }}</b></div>
                                            @enderror
                                        </div>
                                        <div class="form-group fieldset  col-12">
                                            <button  class="full-width has-padding has-border"  type="submit"><span class="txt">Import now</span></button>
                                        </div>
                                    </form>
                                </div>

                            </div>

                            @endif
                            <hr>
                        </div>
                    </div>
                </div>
                <!-- Info Column -->
                <div class="info-column col-lg-12 col-md-12 col-sm-12">
                    <div class="inner-column">
                        <!-- Sec Title -->
                        <div class="sec-title">
                            <div class="title">Your collection summery</div>
                            <h2>{{ auth()->user()->name }}</h2>
                        </div>

                        <!-- Info List -->
                      <div class="row">
                          <div class="col-lg-6 col-md-6 col-sm-12">
                              <ul class="info-list">
                                  <li>
                                      <span class="icon"></span>
                                      <strong>Today\'s leads</strong>
                                      {{ $leads->where('created_at', '>=', \Carbon\Carbon::today())->count() }}
                                  </li>
                                  <li>
                                      <span class="icon"></span>
                                      <strong>Last 7 days</strong>
                                      {{ $leads->where('created_at', '>=', \Carbon\Carbon::today()->subDays(7))->count() }}
                                  </li>
                              </ul>
                          </div>
                          <div class="col-lg-6 col-md-6 col-sm-12">
                              <ul class="info-list">
                                  <li>
                                      <span class="icon"></span>
                                      <strong>Rating</strong>
                                      {{ $leads->where('category_id', 1)->count() }}/{{ $leads->count() }}
                                  </li>
                                  <li>
                                      <span class="icon"></span>
                                      <strong>Total Leads</strong>
                                      {{ $leads->count() }}
                                  </li>
                              </ul>
                          </div>
                      </div>
                    </div>
                </div>
                @else
                    <div class="col-lg-6 align-self-center">
                        <div class="title">Hello data collector !</div>
                            <h2>Interested to earn money ?</h2>
                    </div>
                    <div class="col-lg-6 align-self-center">
                        <form class="sen-form"  action="{{ route('login') }}" method="POST">
                            @csrf
                            <div class="form-group fieldset">
                                <input  class="full-width has-padding has-border"  type="text" name="email" value="{{ old('email') }}" placeholder="Email" required>
                            </div>
                            <div class="form-group fieldset">
                                <input  class="full-width has-padding has-border"  type="text" name="password" value="{{ old('password') }}" placeholder="Password" required>
                            </div>
                            <div class=" fieldset">
                                <button  class="full-width has-padding"  type="submit">Login now</button>
                            </div>
                        </form>
                    </div>
                    <div class="col-lg-8 col-md-6 col-sm-12 align-self-center">
                        <div class="default-form contact-form">
                            <div class="title">Register !</div>
                            <form class="sen-form"   action="{{ route('register') }}" method="POST">
                                @csrf
                                <div class="form-group fieldset">
                                    <input class="full-width has-padding has-border" type="text" name="name" value="{{ old('name') }}" placeholder="Name">
                                </div>
                                <div class="form-group fieldset">
                                    <input class="full-width has-padding has-border" type="text" name="phone" value="{{ old('phone') }}" placeholder="Phone">
                                </div>
                                <div class="form-group fieldset">
                                    <input class="full-width has-padding has-border" type="text" name="email" value="{{ old('email') }}" placeholder="Email">
                                </div>
                                <div class="form-group fieldset">
                                    <input class="full-width has-padding has-border" type="text" name="password" value="{{ old('password') }}" placeholder="Password">
                                </div>
                                <div class="form-group fieldset">
                                    <input class="full-width has-padding has-border" type="text" name="password_confirmation" value="{{ old('password_confirmation') }}" placeholder="Confirm Password">
                                </div>
                                <div class="form-group fieldset">
                                    <button class="full-width has-padding" type="submit" class="theme-btn btn-style-four"><span class="txt">Register and earn</span></button>
                                </div>
                            </form>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>

@endsection
