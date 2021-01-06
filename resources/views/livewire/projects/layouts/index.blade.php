<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight ">
                {{ __('Projects') }}
            </h2>

            @livewire('projects.create', [ 
                'data' => null , 
                'btn_name' => 'New',
                'btn_color' => 'blue',
            ])

        </div>
    </x-slot>


    <div class="lg:flex lg:items-start color-primary">
        <div class="w-full lg:w-1/5 lg:px-6 text-xl text-grey-darkest leading-normal pt-8 lg:pt-16 pl-8 bg-gradient-to-b from-gray-100 to-white transition-all duration-300 h-96">

            <div
                class="flex w-full justify-between items-center border-bottom rounded border-grey-dark lg:hidden sticky pin">
                <ul
                    class="flex  justify-start px-3 py-3  lg:bg-transparent  hover:border-blue appearance-none focus:outline-none">
                    <li class="py-2 md:my-0 hover:bg-blue-lightest lg:hover:bg-transparent">
                        <a href="#"
                            class="block pl-4 pr-4 align-middle text-grey-darker no-underline hover:text-blue border-l-4 border-transparent lg:hover:border-grey-light">
                            <span class="pb-1 md:pb-0 text-sm">{{ __('Chat') }}</span>
                        </a>
                    </li>
                    <li class="py-2 md:my-0 hover:bg-blue-lightest lg:hover:bg-transparent">
                        <a href="#"
                            class="block pl-4 pr-4 align-middle text-grey-darker no-underline hover:text-blue border-l-4 border-transparent lg:hover:border-grey-light">
                            <span class="pb-1 md:pb-0 text-sm">{{ __('Files') }}</span>
                        </a>
                    </li>
                </ul>

            </div>

            {{-- small screen --}}
            <div class="w-full sticky pin hidden h-64 lg:h-auto overflow-x-hidden overflow-y-auto lg:overflow-y-hidden lg:block mt-0 border border-grey-light lg:border-transparent bg-white shadow lg:shadow-none lg:bg-transparent z-10"
                style="top:5em;" id="menu-content">
                <ul class="list-reset">
                    <li class="py-2 md:my-0 hover:bg-blue-lightest lg:hover:bg-transparent">
                        <a href="#"
                            class="block pl-4 pr-4 align-middle text-grey-darker no-underline hover:text-blue border-l-4 border-transparent lg:hover:border-grey-light">
                            <span class="pb-1 md:pb-0 text-sm">{{ __('Chat') }}</span>
                        </a>
                    </li>
                    <li class="py-2 md:my-0 hover:bg-blue-lightest lg:hover:bg-transparent">
                        <a href="#"
                            class="block pl-4 pr-4 align-middle text-grey-darker no-underline hover:text-blue border-l-4 border-transparent lg:hover:border-grey-light">
                            <span class="pb-1 md:pb-0 text-sm">{{ __('Files') }}</span>
                        </a>
                    </li>

                </ul>
            </div>
        </div>

        <div class="container w-full flex flex-wrap mx-auto px-2 pt-8 lg:pt-16">

            <div class="w-full lg:w-4/5 p-8 mt-6 lg:mt-0 leading-normal">
                {{ $slot }}
            </div>

        </div>
    </div>

    @stack('scripts')
</x-app-layout>