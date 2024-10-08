<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Mailgun, Postmark, AWS and more. This file provides the de facto
    | location for this type of information, allowing packages to have
    | a conventional file to locate the various service credentials.
    |
    */

    'mailgun' => [
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
        'endpoint' => env('MAILGUN_ENDPOINT', 'api.mailgun.net'),
    ],

    'postmark' => [
        'token' => env('POSTMARK_TOKEN'),
    ],

    'ses' => [
        'key' => env('AWS_ACCESS_KEY_ID'),
        'secret' => env('AWS_SECRET_ACCESS_KEY'),
        'region' => env('AWS_DEFAULT_REGION', 'us-east-1'),
    ],

    'payfort' => [
        'access_code' => env('AWS_PAYMENT_ACCESS_CODE'),
        'merchant_identifier' => env('AWS_PAYMENT_MERCHANT_IDENTIFIER'),
        'redirect_url' => env('AWS_REDIRECT_URL','https://checkout.payfort.com/FortAPI/paymentPage'),
        // 'sha_phrase'   => env('AWS_SHA_PHRASE')
        'sha_request_phrase' => env('AWS_SHA_REQUEST_PHRASE'),
        'sha_response_phrase' => env('AWS_SHA_RESPONSE_PHRASE'),
    ]

];
