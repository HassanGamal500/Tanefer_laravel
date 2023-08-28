@component('mail::message',['appUrl' => config('app.url'),  'appName' => config('app.name')])
@slot('header')
@component('mail::header', ['url' => config('app.url')])
    <img src="https://www.tanefer.com/_nuxt/img/TaNeferLogo.4924e88.png">
@endcomponent
@endslot

# Hi {{ $username }}

Your booking is confirmed with total Price: {{ $totalPrice }}
<br>
Adventure Detils : <br>
@foreach ($adventures as $adventure)
adventure number : {{ $adventure->id }} <br>
    adventure Name : {{ $adventure->title }} <br>
    time : {{ $adventure->start_time }} - {{ $adventure->end_time }}  <br>
    adventure includes : {{ $adventure->includes }} <br>
    adventure excludes : {{ $adventure->excludes }} <br>
    adventure duration : {{ $adventure->duration_digits }} / {{ $adventure->duration_type }} <hr>

@endforeach
{{-- You can check Your booking details from the following link --}}

{{-- @component('mail::button', ['url' => $url])
    Booking Details
@endcomponent --}}

Thanks,<br>
{{ config('app.name') }}
@endcomponent
