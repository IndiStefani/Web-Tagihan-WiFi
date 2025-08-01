<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('img/apple-icon.png') }}">
    <link rel="icon" type="image/png" href="{{ asset('img/favicon.ico') }}">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />
    <!-- CSS Files -->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/light-bootstrap-dashboard.css?v=2.0.0') }} " rel="stylesheet" />
    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link href="{{ asset('css/demo.css') }}" rel="stylesheet" />

</head>

<body>
    <div class="wrapper @if (!auth()->check() || request()->route()->getName() == '') wrapper-full-page @endif">

        @if (auth()->check() && request()->route()->getName() != '')
            @include('layouts.navbars.sidebar')
            @include('pages.sidebarstyle')
        @endif

        <div class="@if (auth()->check() && request()->route()->getName() != '') main-panel @endif">
            @include('layouts.navbars.navbar')
            @yield('content')
            @include('layouts.footer.nav')
        </div>
    </div>
</body>

<!--   Core JS Files   -->
<script src="{{ asset('js/core/jquery.3.2.1.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('js/core/popper.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('js/core/bootstrap.min.js') }}" type="text/javascript"></script>

<script src="{{ asset('js/plugins/jquery.sharrre.js') }}"></script>
<!--  Plugin for Switches, full documentation here: http://www.jque.re/plugins/version3/bootstrap.switch/ -->
<script src="{{ asset('js/plugins/bootstrap-switch.js') }}"></script>
<!--  Google Maps Plugin    -->
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
<!--  Chartist Plugin  -->
<script src="{{ asset('js/plugins/chartist.min.js') }}"></script>
<!--  Notifications Plugin    -->
<script src="{{ asset('js/plugins/bootstrap-notify.js') }}"></script>
<!-- Control Center for Light Bootstrap Dashboard: scripts for the example pages etc -->
<script src="{{ asset('js/light-bootstrap-dashboard.js?v=2.0.0') }}" type="text/javascript"></script>
{{-- sweetalert --}}
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<!-- Light Bootstrap Dashboard DEMO methods, don't include it in your project! -->
<script src="{{ asset('js/demo.js') }}"></script>
@stack('js')

</html>
