<?php
return [

    /*
     *
     * Sabre Integration configuration file
     *
     * */

    'version'           => env('SABRE_VERSION'),
    'domain'            => env('SABRE_DOMAIN'),

    'client_id'         => env('SABRE_VERSION').':'.env('SABRE_CLIENT_ID').':'.env('SABRE_PCC').':'.env('SABRE_DOMAIN'),
    'user_name'         => env('SABRE_CLIENT_ID'),
    'client_secret'     => env('SABRE_CLIENT_SECRET'),
    'pseudo_city_code'  => env('SABRE_PCC'),
    'rest_url'          => env('REST_URL'),
    'soap_url'          => env('SOAP_URL'),
    'soap_content_type' => 'text/xml',
    'airline_logo_url'  => 'http://pics.avs.io/170/65/',
    //'airline_logo_small_url' => public_path('images/airlinesSM/')



];
