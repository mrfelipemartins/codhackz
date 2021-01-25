<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>
        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.gstatic.com">

        <link href="https://fonts.googleapis.com/css2?family=Roboto+Mono:wght@100;400;500;700&family=Roboto+Slab:wght@100;400;700&display=swap" rel="stylesheet">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">

        <!-- Scripts -->
        @routes
        <script src="https://js.stripe.com/v3/"></script>
        <script src="https://www.paypal.com/sdk/js?client-id={{config('services.paypal.client_id')}}&disable-funding=credit,card&currency=GBP"></script>
        <script src="{{ mix('js/app.js') }}" defer></script>
        <script src="https://kit.fontawesome.com/6ee8fbe20c.js" crossorigin="anonymous"></script>
    </head>
    <body class="font-sans antialiased">
        @inertia
    </body>
</html>
