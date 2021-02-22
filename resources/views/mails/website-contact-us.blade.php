<h3 style="color:blue "><b>Thank you for contact us.</b></h3>
<h3 style="color:green">Your request is now in processing. As soon as possible we will come back to you. </h3>
<hr>
<h6>Message: </h6>
<br>
{{ $contact->message }}
<br>
<h3><a href="{{ url('/') }}"><img src="{{ asset(get_static_option('website_logo') ?? get_static_option('no_image')) }}" width="250" height="70" /> </a></h3>
