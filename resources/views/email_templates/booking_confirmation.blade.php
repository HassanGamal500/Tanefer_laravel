@component('mail::message',['appUrl' => config('app.url'),  'appName' => config('app.name')])
# Hi {{ $username }}

Your booking is confirmed with total Price: {{ $totalPrice }}
<br>
You can check Your booking details from the following link

@component('mail::button', ['url' => $url])
    Booking Details
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
