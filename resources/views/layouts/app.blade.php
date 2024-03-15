<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Contact Management System') }}</title>

    {{-- Volt CSS --}}
    <link type="text/css" href="{{ asset('theme/volt.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/admin/custom.css') }}">

    {{-- Datatable --}}
    <link rel="stylesheet" href="{{ asset('vendor/bootstrap-datatables/bootstrap-datatable.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/bootstrap-select/bootstrap-select.min.css') }}">

    {{-- Bootstrap icons --}}
    <link type="text/css" href="{{ asset('vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">



</head>

<body>

    @include('sweetalert::alert')

    @include('layouts.partials.sidebar')

    <main class="content">

        @include('layouts.partials.navbar')

        {{-- page content --}}
        {{ $slot }}

        {{-- footer --}}
        @include('layouts.partials.footer')

    </main>

    {{-- JQuery --}}
    <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>

    {{-- Data Tables --}}
    <script src="{{ asset('vendor/bootstrap-datatables/jquery.datatables.min.js') }}"></script>
    <script src="{{ asset('vendor/bootstrap-datatables/bootstrap-datatables.min.js') }}"></script>


    <script src="{{ asset('vendor/sweetalert/sweetalert.all.js') }}"></script>

    {{-- Core --}}
    <script script src="{{ asset('vendor/@popperjs/popper.min.js') }}"></script>
    <script src="{{ asset('vendor/bootstrap/bootstrap.min.js') }}"></script>

    {{-- Smooth scroll --}}
    <script src="{{ asset('vendor/smooth-scroll/smooth-scroll.min.js') }}"></script>

    {{-- Volt JS --}}
    <script src="{{ asset('theme/volt.js') }}"></script>
    <script src="{{ asset('js/custom.js') }}"></script>

    @stack('scripts')


</body>

</html>
