<!doctype html>
<html lang="en" class="h-full">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title') | {{ config('app.name', 'Laravel') }}</title>
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <!-- Styles -->
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
</head>
<body class="antialiased font-sans text-gray-800 h-full">
<div id="app" class="flex flex-col h-full">
    <x-navbar></x-navbar>
    <div class="flex flex-1">
        <x-sidebar></x-sidebar>
        <div class="flex-1">
            @yield('content')
        </div>
    </div>
</div>
</body>
</html>
