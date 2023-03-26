<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
    <meta name="description" content="@yield('meta-description', 'An online network of businesses, we faciliate business networking and customer-business interaction.')">

    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-435BPF426T">
    </script>
    <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'G-435BPF426T');
    </script>

    <title>{{ Str::ucfirst(config('app.name')) }} | @yield('title', 'Business network')</title>

    <link rel="icon" href="/favicon.ico">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">

    @vite(['resources/css/style.css'])
</head>
<body>
    <div class="__content">
        @yield('content')
    </div>

    @yield('style')
    @yield('script')
</body>
</html>