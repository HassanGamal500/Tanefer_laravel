<?php
return [
    'url' => env('TBO_URL','https://api.tbotechnology.in/hotelapi_v7/hotelservice.svc'),
    'username' => env('TBO_USERNAME'),
    'password' => env('TBO_PASSWORD'),
    'content_type' => 'application/soap+xml',
    'session_time' => 23
];
