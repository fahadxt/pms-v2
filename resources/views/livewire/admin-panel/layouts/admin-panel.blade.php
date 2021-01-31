<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', __('Admin Panel')) }}</title>

    {{-- Fonts --}}
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">
    <link href="https://fonts.googleapis.com/css2?family=Almarai:wght@300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>

    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/admin-panel/css/main.css') }}">



    {{-- include jQuery library --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

    @livewireStyles
</head>

<body class="language-php h-full w-full font-sans text-gray-900 antialiased">



        @include('livewire.admin-panel.navigation-dropdown')

        @if(isset($header))
        <header class="bg-white shadow relative">
            <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                {{ $header }}
            </div>
        </header>
        @endif

        <main>
            {{ $slot }}
        </main>
    </div>

    @yield('script')

    <script src="{{ asset('js/sweetalert2/sweetalert2.all.min.js') }}"></script>
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('assets/admin-panel/js/main.js') }}"></script>

    @livewireScripts
    @stack('scripts')
    @stack('modals')

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
