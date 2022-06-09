<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Mailgun, SparkPost and others. This file provides a sane default
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

    'sparkpost' => [
        'secret' => env('SPARKPOST_SECRET'),
    ],

    'google' => [
        'client_id' => '182574825873-lhn0s7143iro1krrq4upjcm7f1mn0hik.apps.googleusercontent.com',
        'client_secret' => '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',
        'redirect' => 'http://127.0.0.1:8000/callback/google',
    ], 

    'facebook' => [
        'client_id' => '340688474857617',
        'client_secret' => 'f198ea634f918cb736642dea380c06f6',
        'redirect' => 'http://127.0.0.1:8000/callback/facebook',
    ], 

];
