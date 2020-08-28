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
<body class="antialiased font-poppins text-gray-800 h-full">
<div id="app" class="flex flex-col h-full max-h-full">
    <x-navbar></x-navbar>
    <div class="flex flex-1 max-w-full max-h-full">
        <x-sidebar></x-sidebar>
        <div class="p-6 flex-1 max-w-full overflow-x-hidden md:overflow-x-auto" id="main">
            @yield('content')
        </div>
    </div>
</div>
<script>
    function getMainMargin () {
      const navbar = document.getElementById("navbar");
      const sidebar = document.getElementById("sidebar");
      document.getElementById("main").style.marginTop = navbar.offsetHeight + "px";
      document.getElementById("main").style.marginLeft = sidebar.offsetWidth + "px";
      sidebar.style.paddingTop = navbar.offsetHeight + "px";
    }
    window.onload = getMainMargin;
    window.onresize = getMainMargin;
</script>
</body>
</html>
