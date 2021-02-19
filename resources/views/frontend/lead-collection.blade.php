@extends('layouts.frontend.app')

@section('content')
    <!--Page Title-->
    <section class="page-title">
        <div class="pattern-layer-one" style="background-image: url({{ asset('assets/frontend/images/background/pattern-14.png') }})"></div>
        <div class="pattern-layer-two" style="background-image: url({{ asset('assets/frontend/images/background/pattern-15.png') }})"></div>
        <div class="auto-container">
            <h2>Lead Collection</h2>
            <ul class="page-breadcrumb">
                <li><a href="{{ url('/') }}">home</a></li>
                @if(auth()->check())
                <li>{{ auth()->user()->name }}</li>
                @else
                    <li>Lead collection</li>
                @endif
            </ul>
        </div>
    </section>



    <!--End Page Title-->
    <section class="contact-page-section">
        <div class="auto-container">
            <div class="row clearfix">
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
                        <div class="default-form contact-form">
                            <form novalidate="novalidate" action="{{ route('frontend.storeLead') }}" method="POST">
                                @csrf
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <input type="text" name="name" value="{{ old('name') }}" placeholder="Name">
                                        </div>
                                        <div class="form-group">
                                            <input type="text" name="email" value="{{ old('email') }}" placeholder="Email">
                                            @error('email')
                                            <div class="text-danger"><b>{{ $message }}</b></div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <input type="text" name="phone" value="{{ old('phone') }}" placeholder="Phone">
                                            @error('phone')
                                            <div class="text-danger"><b>{{ $message }}</b></div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <input type="text" name="company_name" value="{{ old('company_name') }}" placeholder="Company name">
                                        </div>
                                        <div class="form-group">
                                            <input type="text" name="profession" value="{{ old('profession') }}" placeholder="Profession">
                                        </div>
                                        <div class="form-group">
                                            <input type="text" name="address" value="{{ old('address') }}" placeholder="Address">
                                        </div>
                                        <div class="form-group">
                                            <input type="text" name="company_website" value="{{ old('company_website') }}" placeholder="Company website">
                                        </div>
                                        <div class="form-group">
                                            <input type="text" name="company_facebook_page" value="{{ old('company_facebook_page') }}" placeholder="Company facebook page">
                                        </div>
                                        <div class="form-group">
                                            <textarea name="description" placeholder="Description">{{ old('description') }}</textarea>
                                        </div>
                                        <div class="form-group">
                                            <button type="submit" class="theme-btn btn-style-three"><span class="txt">Submit now</span></button>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <select name="service_id" id="">
                                                <option value="" selected>Chose profession</option>
                                                @foreach($lead_services as $service)
                                                <option value="{{ $service->id }}">{{ $service->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <select name="district_id" id="">
                                                <option value="" selected>Chose district</option>
                                                @foreach($lead_districts as $district)
                                                <option value="{{ $district->id }}">{{ $district->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <select name="thana_id" id="">
                                                <option value="" selected>Chose Thana</option>
                                                @foreach($lead_thanas as $thana)
                                                <option value="{{ $thana->id }}">{{ $thana->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <level><b>Marital status</b></level>
                                            <select name="is_married" id="">
                                                <option value="" selected>Is married</option>
                                                <option value="Yas" selected>Yes</option>
                                                <option value="No" selected>No</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <level><b>Birth date</b></level>
                                            <input class="form-control" type="date" value="" id="date_of_birth" name="date_of_birth">
                                        </div>
                                        <div class="form-group">
                                            <button type="reset" class="theme-btn btn-style-four"><span class="txt">Reset all</span></button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                            <hr>
                            <form action="{{ route('frontend.importLead') }}" method="POST" enctype="multipart/form-data" class="row">
                                @csrf
                                <div class="form-group col">
                                    <level><b class="text-danger">Chose import file (.xlsx)</b> <i><a href="{{ url('/'. get_static_option('sample_leads')) }}">Sample file</a></i></level>
                                    <br>
                                    <input type="file" accept=".xlsx" name="file">
                                    @error('file')
                                    <div class="text-danger"><b>{{ $message }}</b></div>
                                    @enderror
                                </div>
                                <div class="form-group col">
                                    <button type="submit" class="theme-btn btn-style-four"><span class="txt">Import now</span></button>
                                </div>
                            </form>
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
                                      <strong>Today's leads</strong>
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
                        <div class="form-column col-lg-12 col-md-12 col-sm-12">
                            <div class="inner-column">
                                <!-- Sec Title -->
                                <div class="sec-title">
                                    <div class="title">Hello data collector !</div>
                                    <h2>Interested to earn money ?</h2>
                                </div>
                                <!-- Default Form -->
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <div class="default-form contact-form">
                                            <form novalidate="novalidate" action="{{ route('login') }}" method="POST">
                                                @csrf
                                                <div class="form-group">
                                                    <input type="text" name="email" value="{{ old('email') }}" placeholder="Email" required>
                                                </div>
                                                <div class="form-group">
                                                    <input type="text" name="password" value="{{ old('password') }}" placeholder="Password" required>
                                                </div>
                                                <div class="form-group">
                                                    <button type="submit" class="theme-btn btn-style-three"><span class="txt">Login now</span></button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <div class="default-form contact-form">
                                            <form novalidate="novalidate" action="{{ route('register') }}" method="POST">
                                                @csrf
                                                <div class="form-group">
                                                    <input type="text" name="name" value="{{ old('name') }}" placeholder="Name">
                                                </div>
                                                <div class="form-group">
                                                    <input type="text" name="phone" value="{{ old('phone') }}" placeholder="Phone">
                                                </div>
                                                <div class="form-group">
                                                    <input type="text" name="email" value="{{ old('email') }}" placeholder="Email">
                                                </div>
                                                <div class="form-group">
                                                    <input type="text" name="password" value="{{ old('password') }}" placeholder="Password">
                                                </div>
                                                <div class="form-group">
                                                    <input type="text" name="password_confirmation" value="{{ old('password_confirmation') }}" placeholder="Confirm Password">
                                                </div>
                                                <div class="form-group">
                                                    <button type="submit" class="theme-btn btn-style-four"><span class="txt">Register and earn</span></button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                @endif
            </div>
        </div>
    </section>
    <br>
    <br>
    <br>
<!-- Contact Info Section -->
@include('frontend.includes.contact')
<!-- End Contact Info Section -->
@endsection
