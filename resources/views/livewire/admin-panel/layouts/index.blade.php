<x-admin-panel-layout>
    {{-- <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight ">
                {{  $page_name   }}
            </h2>


        </div>
    </x-slot> --}}


    <div class="lg:flex lg:items-start color-primary">

    {{-- sidebar --}}
    @livewire('admin-panel.layouts.sidebar')


    <div class="container w-full flex flex-wrap mx-auto px-2 pt-8 lg:pt-16">

        <div class="w-full lg:w-4/5 p-8 mt-6 lg:mt-0 leading-normal">
            {{ $slot }}
        </div>

    </div>
    </div>

    @stack('scripts')
</x-admin-panel-layout>
