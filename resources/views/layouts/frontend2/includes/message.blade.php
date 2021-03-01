<div id="message-section" class="subscribe-area bg-gray common-pd-subscribe text-center text-sm-left">
    <div class="container">
        <div class="row">
            <div class="col-lg-5 align-self-center">
                <h3 class="title"><i class="fa fa-comment-o"></i>Message us</h3>
            </div>
            <div class="col-lg-12 align-self-center">
                <form class="sen-form"  method="post" id="send-message-form" action=" {{ route('frontend.contactUsStore') }}">
                    @csrf
                    <p class="fieldset">
                        <label class="image-replace" for="name">Name</label>
                        <input class="full-width has-padding has-border" type="text" name="name" value="{{ old('name') }}" placeholder="Name" required>
                    </p>
                    <p class="fieldset">
                        <label class="image-replace sen-email" for="email">E-mail</label>
                        <input class="full-width has-padding has-border" type="email" name="email" value="{{ old('email') }}" placeholder="Email" required>
                    </p>
                    <p class="fieldset">
                    <p class="fieldset">
                        <label class="image-replace sen-phone" for="email">Phone</label>
                        <input class="full-width has-padding has-border" type="text" name="phone" value="{{ old('phone') }}" placeholder="Phone" required>
                    </p>
                    <p class="fieldset">
                        <label class="image-replace" for="message">Message</label>
                        <textarea class="message-body" name="message" placeholder="I need a website for my company ...." required>{{ old('message') }}</textarea>
                    </p>

                    <p class="fieldset">
                        <input class="full-width has-padding" type="submit" value="Send Message">
                    </p>
                </form>
            </div>
        </div>
    </div>
</div>
