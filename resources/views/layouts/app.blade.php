<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', __('Project Mangment')) }}</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">
    <link href="https://fonts.googleapis.com/css2?family=Almarai:wght@300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>

    <!-- Styles -->
    {{-- <link rel="stylesheet" type="text/css" href="{{ asset('css/semantic.min.css') }}"> --}}
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/main/app.css') }}">
    

    
    {{-- include jQuery library --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>  

    @livewireStyles
</head>

<body class="language-php h-full w-full font-sans text-gray-900 antialiased">

        @livewire('navigation-dropdown')

        <!-- Page Heading -->
        @if(isset($header))            
        <header class="bg-white shadow relative">
            <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                {{ $header }}
            </div>
        </header>
        @endif

        <!-- Page Content -->
        <main>
            {{ $slot }}
        </main>

    @yield('script')

    <script src="{{ asset('js/sweetalert2/sweetalert2.all.min.js') }}"></script>
    {{-- <script src="{{ asset('js/semantic.min.js') }}"></script> --}}
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/main.js') }}"></script>
    
    @livewireScripts
    @stack('scripts')
    @stack('modals')
    {{-- <script src="https://cdn.jsdelivr.net/gh/livewire/turbolinks@v0.1.x/dist/livewire-turbolinks.js" data-turbolinks-eval="false" data-turbo-eval="false"></script> --}}
    {{-- <script src="{{ asset('js/turbolinks.js') }}"></script> --}}

    @if(session()->has('success'))
        <script>
            Swal.fire({
                    position: 'top-center',
                    icon: 'success',
                    title: '{{session()->get('success')}}',
                    showConfirmButton: false,
                    timer: 2000
                })
        </script>
    @endif
    @php
        session()->forget('success')
    @endphp
</body>

</html>