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

    'stripe' => [
        ''
    ],

    'paypal' => [
        'client_id' => 'AX6SH5krb1ErMx3fzbeLcOL2V977LLHLGTs4L1VVfINtGI20psEBTHoyNOVgIWdiLH0If2OKrPwGnhaa',
        'secret' => 'EJDYDqsIK4d2nb1EhZ-m0cYhBo2GWI0uF65p75TZTVq5_vAui-CnNTqMjB6Z4BgjrJKQ9qbdpqR7ICja'
    ]

];
