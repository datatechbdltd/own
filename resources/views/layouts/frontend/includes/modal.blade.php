
<!-- Order modal -->
<div class="modal fade" id="order-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <div class="default-form contact-form">
                    <form method="post" id="send-message-form" action=" {{ route('frontend.contactUsStore') }} ">
                        @csrf
                        <div class="form-group">
                            <input type="text" name="name" value="{{ old('name') }}" placeholder="Name" required>
                        </div>

                        <div class="form-group">
                            <input type="email" name="email" value="{{ old('email') }}" placeholder="Email" required>
                        </div>

                        <div class="form-group">
                            <input type="text" name="phone" value="{{ old('phone') }}" placeholder="Phone" required>
                        </div>

                        <div class="form-group">
                            <textarea name="message" id="message-body" placeholder="I need a website for my company ...." required>{{ old('message') }}</textarea>
                        </div>

                        <div class="form-group text-center">
                            <button type="submit" class="theme-btn btn-style-four"><span class="txt">Send Message</span></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Login modal -->
<div class="modal fade" id="login-modal" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <div class="default-form contact-form">
                    <form method="post" action=" {{ route('login') }} ">
                        @csrf
                        <div class="form-group">
                            <input type="email" name="email" value="{{ old('email') }}" placeholder="Email" required>
                            @error('email')
                            <div class="alert alert-danger" role="alert">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <input type="text" name="password" placeholder="Password" required>
                        </div>
                        <div class="form-group text-center">
                            <button type="submit" class="theme-btn btn-style-four"><span class="txt">Login</span></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Register modal -->
<div class="modal fade" id="register-modal" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-body">
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
                        <div class="form-group text-center">
                            <button type="submit" class="theme-btn btn-style-four"><span class="txt">Register and earn</span></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
