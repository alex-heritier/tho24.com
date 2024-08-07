<!DOCTYPE html>
<html 
    @hasSection('x-custom-tag')
    x-custom-tag="@yield('x-custom-tag')"
    @endif
    lang="{{ App::currentLocale() }}"
    x-page-id="{{ request()->route()->getName() ?? str_replace('//', '/', array_reduce(config('app.available_locales'), fn($sum, $loc) => str_replace("/$loc", "/", $sum), '/'.request()->path() ) ) }}">
<head>
    <title>@yield('title', Str::ucfirst(config('app.name')) . ' | Find Your Next Job')</title>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <meta name="description" content="@yield('meta-description', 'An online network of service providers, tho24.com brings customers and businesses together.')">

    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-435BPF426T">
    </script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'G-435BPF426T');
    </script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.13.0/dist/cdn.min.js"></script>

    <link rel="icon" href="/favicon.ico">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">

    @vite(['resources/js/app.js', 'resources/scss/main.scss'])
</head>

<body>
    @yield('content')

    @yield('style')
    @yield('script')
</body>

</html>