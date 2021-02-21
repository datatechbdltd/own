<h1>Campaign report: </h1>

<h2>SMS report</h2>

@foreach($sms_responses as $sms_response)
    <h3>{{ $sms_response }}</h3><br>
@endforeach

<h2>Email report</h2>
@foreach($email_responses as $email_response)
    <h3>{{ $email_response}}</h3><br>
@endforeach
