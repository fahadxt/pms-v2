<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    {{-- CSRF Token --}}
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'بوابة إدارة المشاريع') }}</title>

    {{-- Fonts --}}
    <link href="https://fonts.googleapis.com/css2?family=Almarai:wght@300;400;700;800&display=swap" rel="stylesheet">


    {{-- Styles --}}
    <link href="{{ mix('css/app.css') }}" type="text/css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/semantic.min.css') }}">
    <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet" />

    <link href="https://unpkg.com/filepond/dist/filepond.css" rel="stylesheet">
    <link href="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.css"
        rel="stylesheet">

    {{-- <script src="{{ asset('js/amcharts4/core.js')}}"></script>
    <script src="{{ asset('js/amcharts4/charts.js')}}"></script>
    <script src="{{ asset('js/amcharts4/themes/animated.js')}}"></script> --}}

    <script src="{{ asset('js/turbolinks.js') }}"></script>
    <script src="{{ asset('js/head.js') }}"></script>

    @livewireStyles


    {{-- include jQuery library --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

    {{-- flatpickr --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    @yield('stylesheet')
</head>

<body>

    <div id="app">
        <main class="ui container py-4">
            {{menu('main', 'layouts.nav')}}
            {{-- @yield('content') --}}
            {{ $slot }}
        </main>
    </div>


    @yield('script');


    <script src="{{ asset('js/semantic.min.js') }}"></script>
    <script src="{{ asset('js/app.js') }}"></script>


    <!-- include FilePond library -->
    <script src="https://unpkg.com/filepond/dist/filepond.min.js"></script>

    <!-- include FilePond plugins -->
    <script src="https://unpkg.com/filepond-plugin-file-encode/dist/filepond-plugin-file-encode.js"></script>
    <script src="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.min.js"></script>


    <!-- include FilePond jQuery adapter -->
    <script src="https://unpkg.com/jquery-filepond/filepond.jquery.js"></script>
    

    @livewireScripts
    @stack('scripts')
    <script src="https://cdn.jsdelivr.net/gh/livewire/turbolinks@v0.1.x/dist/livewire-turbolinks.js" data-turbolinks-eval="false"></script>

</body>

</html>