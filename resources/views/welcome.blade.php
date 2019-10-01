<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>Portfolio</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600|Poppins:400,500,700" rel="stylesheet">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
    </head>
    <body>
        <noscript>
            <h1 style="text-align: center;color:red;">We're sorry but this website doesn't work properly without JavaScript enabled. Please enable it to continue.</h1>
        </noscript>
        <div id="app"> <router-view></router-view> </div>
        <script src="/js/app.js"></script>
    </body>
</html>
