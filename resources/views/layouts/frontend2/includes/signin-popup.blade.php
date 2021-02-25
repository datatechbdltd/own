<div class="sen-user-modal">
    <!-- this is the entire modal form, including the background -->
    <div class="sen-user-modal-container">
        <!-- this is the container wrapper -->
        <ul class="sen-switcher">
            <li><a href="#0">Sign in</a></li>
            <li><a href="#0">Sign up</a></li>
        </ul>

        <div id="sen-login">
            <!-- log in form -->
            <form class="sen-form">
                <p class="fieldset">
                    <label class="image-replace sen-email" for="signin-email">E-mail</label>
                    <input class="full-width has-padding has-border" id="signin-email" type="email" placeholder="E-mail">
                    <span class="sen-error-message">Error message here!</span>
                </p>

                <p class="fieldset">
                    <label class="image-replace sen-password" for="signin-password">Password</label>
                    <input class="full-width has-padding has-border" id="signin-password" type="text" placeholder="Password">
                    <a href="#0" class="hide-password">Hide</a>
                    <span class="sen-error-message">Error message here!</span>
                </p>

                <p class="fieldset">
                    <input type="checkbox" id="remember-me" checked>
                    <label for="remember-me">Remember me</label>
                </p>

                <p class="fieldset">
                    <input class="full-width" type="submit" value="Login">
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
                    <input class="full-width has-padding has-border" id="signup-username" type="text" placeholder="Username">
                    <span class="sen-error-message">Error message here!</span>
                </p>

                <p class="fieldset">
                    <label class="image-replace sen-email" for="signup-email">E-mail</label>
                    <input class="full-width has-padding has-border" id="signup-email" type="email" placeholder="E-mail">
                    <span class="sen-error-message">Error message here!</span>
                </p>

                <p class="fieldset">
                    <label class="image-replace sen-password" for="signup-password">Password</label>
                    <input class="full-width has-padding has-border" id="signup-password" type="text" placeholder="Password">
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
            <p class="sen-form-message">Lost your password? Please enter your email address. You will receive a link to create a new password.</p>

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
