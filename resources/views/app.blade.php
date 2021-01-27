<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <!-- Primary Meta Tags -->
        <title>CODHackz - Best Warzone Boosting Services 24/7 Support</title>
        <meta name="title" content="CODHackz - Best Warzone Boosting Services 24/7 Support">
        <meta name="description" content="Quick, safe, and affordable Call of Duty Warzone boosting services for levels, kill death ratios, and Wins. 100% satisfaction or money-back guaranteed.">

        <!-- Open Graph / Facebook -->
        <meta property="og:type" content="website">
        <meta property="og:url" content="https://codhackingservices.com/">
        <meta property="og:title" content="CODHackz - Best Warzone Boosting Services 24/7 Support">
        <meta property="og:description" content="Quick, safe, and affordable Call of Duty Warzone boosting services for levels, kill death ratios, and Wins. 100% satisfaction or money-back guaranteed.">
        <meta property="og:image" content="https://codhackingservices.com/images/seo.jpg">

        <!-- Twitter -->
        <meta property="twitter:card" content="summary_large_image">
        <meta property="twitter:url" content="https://codhackingservices.com/">
        <meta property="twitter:title" content="CODHackz - Best Warzone Boosting Services 24/7 Support">
        <meta property="twitter:description" content="Quick, safe, and affordable Call of Duty Warzone boosting services for levels, kill death ratios, and Wins. 100% satisfaction or money-back guaranteed.">
        <meta property="twitter:image" content="https://codhackingservices.com/images/seo.jpg">
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
        <script src="https://cdn.onesignal.com/sdks/OneSignalSDK.js" async=""></script>
        <script>
            window.OneSignal = window.OneSignal || [];
            OneSignal.push(function() {
                OneSignal.init({
                    appId: "1e2169ae-d90c-4520-bb55-18451f7bf630",
                    autoRegister: true,
                    notifyButton: {
                        enable: false,
                    },
                });
            });
        </script>
    </head>
    <body class="font-sans antialiased">
        @inertia
        <div style="display: none">
            <h1>CODHackz</h1>
        </div>
    </body>
    <!--Start of Tawk.to Script-->
    <script type="text/javascript">
        var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
        (function(){
        var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
        s1.async=true;
        s1.src='https://embed.tawk.to/6010bf56a9a34e36b970b75a/default';
        s1.charset='UTF-8';
        s1.setAttribute('crossorigin','*');
        s0.parentNode.insertBefore(s1,s0);
        })();
        </script>
        <!--End of Tawk.to Script-->
</html>
