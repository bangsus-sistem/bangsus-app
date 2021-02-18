<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Bangsus App</title>
    <link rel="stylesheet" href="/css/app.css?version={{ $version['bangsus_app'] }}">
</head>
<body>
    <div id="app">
        <app
            bangsus-app-version="{{ $version['bangsus_app'] }}"
            laravel-version="{{ $version['laravel'] }}"
            php-version="{{ $version['php'] }}"
        />
    </div>
    <script src="/js/app.js?version={{ $version['bangsus_app'] }}" defer></script>
</body>
</html>