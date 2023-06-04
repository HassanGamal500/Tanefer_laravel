@component('mail::message',['appUrl' => $url,  'appName' => config('app.name')])
# Hi,

You Can check your package customization from the following link

@component('mail::button', ['url' => $url])
Custom Package Details
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
