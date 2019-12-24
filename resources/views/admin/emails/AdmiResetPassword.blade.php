@component('mail::message')
#Reset Count
Welecome {{ $data['data']->name }}

The body of your message.

@component('mail::button', ['url' => aurl('reset/password/'.$data['token']) ])
Click Here To Reset Your Password
@endcomponent

Or
<a href="{{aurl('reset/password/'.$data['token']) }}" >{{aurl('reset/password/'.$data['token']) }}</a>

<br>

Thanks,<br>
{{ config('app.name') }}
@endcomponent
