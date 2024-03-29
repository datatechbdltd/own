<div class="sen-user-modal signin-modal">
    <!-- this is the entire modal form, including the background -->
    <div class="sen-user-modal-container">
        <!-- this is the container wrapper -->
        <ul class="sen-switcher">
            <li><a href="#0">Sign in</a></li>
            <li><a href="#0">Sign up</a></li>
        </ul>

        <div id="sen-login">
            <!-- log in form -->
            <form class="sen-form" method="post" action=" {{ route('login') }} ">
                @csrf
                <p class="fieldset">
                    <label class="image-replace sen-email" for="signin-email">E-mail</label>
                    <input class="full-width has-padding has-border signin-email" id="signin-email" name="email"
                        type="email" placeholder="E-mail" required>
                    @error('email')
                        <span class="sen-error-message"> {{ $message }}</span>
                    @enderror
                </p>

                <p class="fieldset">
                    <label class="image-replace sen-password" for="signin-password">Password</label>
                    <input class="full-width has-padding has-border signin-password" id="signin-password"
                        name="password" type="text" placeholder="Password" required>
                    <a href="#0" class="hide-password">Hide</a>
                    @error('password')
                        <span class="sen-error-message"> {{ $message }}</span>
                    @enderror
                </p>

                <p class="fieldset">
                    <input type="checkbox" id="remember-me" checked>
                    <label for="remember-me">Remember me</label>
                </p>

                <p class="fieldset">
                    <input class="full-width signin-btn" type="button" id="signin-button" value="Login">
                </p>
            </form>

            <p class="sen-form-bottom-message"><a href="#0">Forgot your password?</a></p>
            <!-- <a href="#0" class="sen-close-form">Close</a> -->
        </div>
        <!-- sen-login -->

        <div id="sen-signup">
            <!-- sign up form -->
            <form class="sen-form">
                <p class="fieldset">
                    <label class="image-replace sen-username" for="signup-username">Username</label>
                    <input class="full-width has-padding has-border" id="signup-username" type="text"
                        placeholder="Username">
                    <span class="sen-error-message">Error message here!</span>
                </p>

                <p class="fieldset">
                    <label class="image-replace sen-email" for="signup-email">E-mail</label>
                    <input class="full-width has-padding has-border" id="signup-email" type="email"
                        placeholder="E-mail">
                    <span class="sen-error-message">Error message here!</span>
                </p>

                <p class="fieldset">
                    <label class="image-replace sen-password" for="signup-password">Password</label>
                    <input class="full-width has-padding has-border" id="signup-password" type="text"
                        placeholder="Password">
                    <a href="#0" class="hide-password">Hide</a>
                    <span class="sen-error-message">Error message here!</span>
                </p>

                <p class="fieldset">
                    <input type="checkbox" id="accept-terms">
                    <label for="accept-terms">I agree to the <a href="#0">Terms</a></label>
                </p>

                <p class="fieldset">
                    <input class="full-width has-padding" type="submit" value="Create account">
                </p>
            </form>

            <!-- <a href="#0" class="sen-close-form">Close</a> -->
        </div>
        <!-- sen-signup -->

        <div id="sen-reset-password">
            <!-- reset password form -->
            <p class="sen-form-message">Lost your password? Please enter your email address. You will receive a link to
                create a new password.</p>

            <form class="sen-form">
                <p class="fieldset">
                    <label class="image-replace sen-email" for="reset-email">E-mail</label>
                    <input class="full-width has-padding has-border" id="reset-email" type="email" placeholder="E-mail">
                    <span class="sen-error-message">Error message here!</span>
                </p>

                <p class="fieldset">
                    <input class="full-width has-padding" type="submit" value="Reset password">
                </p>
            </form>

            <p class="sen-form-bottom-message"><a href="#0">Back to log-in</a></p>
        </div>
        <!-- sen-reset-password -->
        <a href="#0" class="sen-close-form">Close</a>
    </div>
    <!-- sen-user-modal-container -->
</div>

<!-- signin modal -->
<div class="modal fade" id="signin-modal" tabindex="-1" role="dialog"
    aria-hidden="true" style="margin-top:150px">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <form class="sen-form" method="" id="send-message-form">
                    <p class="fieldset">
                        <label class="image-replace sen-email" for="signin-email">E-mail</label>
                        <input class="full-width has-padding has-border signin-email" type="email" id="signin-email" name="email"
                            placeholder="Email" required>
                    </p>
                    <p class="fieldset">
                        <label class="image-replace" for="signin-password">Password</label>
                        <input class="full-width has-padding has-border signin-password" id="signin-password" type="password" name="password"
                            placeholder="Password" required>
                    </p>
                    <p class="fieldset signin-btn">
                        <a href="javascript:0" class="btn btn-basic" tabindex="0">Login</a>
                    </p>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- signup modal -->
<div class="modal fade" id="signup-modal" tabindex="-1" role="dialog"
    aria-hidden="true" style="margin-top:150px">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <form class="sen-form">
                    <p class="fieldset">
                        <label class="image-replace" for="name">Name</label>
                        <input class="full-width has-padding has-border signup-name" type="text" name="name"
                            placeholder="Name" required>
                    </p>
                    <p class="fieldset">
                        <label class="image-replace sen-email" for="email">E-mail</label>
                        <input class="full-width has-padding has-border signup-email" type="email" name="email"
                            placeholder="Email" required>
                    </p>
                    <p class="fieldset">
                        <label class="image-replace sen-phone" for="phone">Phone</label>
                        <input class="full-width has-padding has-border signup-phone" type="tel" name="phone"
                            placeholder="0171....." required>
                    </p>
                    <p class="fieldset">
                        <label class="image-replace sen-password" for="password">E-mail</label>
                        <input class="full-width has-padding has-border signup-password" type="password" name="password"
                            placeholder="Password" required>
                    </p>
                    <p class="fieldset signup-btn">
                            <a href="javascript:0" class="btn btn-basic" tabindex="0">Register</a>
                    </p>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Order modal -->
<div class="modal fade" id="order-modal" tabindex="-1" role="dialog"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <form class="sen-form" method="post" id="send-message-form"
                    action=" {{ route('frontend.contactUsStore') }}">
                    @csrf
                    <p class="fieldset">
                        <label class="image-replace" for="name">Name</label>
                        <input class="full-width has-padding has-border" type="text" name="name"
                            value="{{ old('name') }}" placeholder="Name" required>
                    </p>
                    <p class="fieldset">
                        <label class="image-replace sen-email" for="email">E-mail</label>
                        <input class="full-width has-padding has-border" type="email" name="email"
                            value="{{ old('email') }}" placeholder="Email" required>
                    </p>
                    <p class="fieldset">
                    <p class="fieldset">
                        <label class="image-replace sen-phone" for="email">Phone</label>
                        <input class="full-width has-padding has-border" type="text" name="phone"
                            value="{{ old('phone') }}" placeholder="Phone" required>
                    </p>
                    <p class="fieldset">
                        <label class="image-replace" for="message">Message</label>
                        <textarea class="full-width has-padding has-border message-area col-12" rows="7" name="message"
                            id="" placeholder="I need a website for my company ...."
                            required>{{ old('message') }}</textarea>
                    </p>

                    <p class="fieldset">
                        <input class="full-width has-padding" type="submit" value="Send Message">
                    </p>
                </form>
            </div>
        </div>
    </div>
</div>
