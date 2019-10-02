Dears,<br>
You got a new contact message with the following details :<br>
Name : {{ $data['name'] }}<br>
Email : {{ $data['email'] }}<br>
@if($data['subject'])Subject : {{ $data['subject'] }}<br>@endif
Message : {!! nl2br($data['message']) !!}<br>
<br><br>
Best regards,<br>