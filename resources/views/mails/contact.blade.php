@component('mail::message')
Welcome To LearnCode	

Username : {{$user}}.

Email : {{$email}}

Supject : {{$subject}}

Message :: {{$message}}


Thanks,<br>
{{ config('app.name') }}
@endcomponent
