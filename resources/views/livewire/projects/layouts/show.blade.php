<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight ">
                {{ $data->name }}
            </h2>

            @livewire('tasks.form' , [
                'project' => $data ,
                'data' => null ,
                'type' => 'New task',
                'btn_name' => 'New task',
                'btn_color' => 'blue'
            ])

        </div>
    </x-slot>


    <div class="lg:flex lg:items-start color-primary">

        {{-- small screen --}}
        <div
            class="flex w-full justify-between items-center border-bottom rounded border-grey-dark lg:hidden sticky pin">
            <ul
                class="flex  justify-start px-3 py-3  lg:bg-transparent  hover:border-blue appearance-none focus:outline-none">
                <li class="py-2 md:my-0 hover:bg-blue-lightest lg:hover:bg-transparent">
                    <a href="{{ route('projects.show', [ 'id' =>  $data->id]) }}"
                        class="block pl-4 pr-4 align-middle text-grey-darker no-underline hover:text-blue border-l-4 border-transparent lg:border-blue lg:hover:border-blue-500 {{  ( Request::routeIs('projects.show') ) ? "span-active" : "" }}">
                        <span class="pb-1 md:pb-0 text-sm">{{ __('Project information') }}</span>
                    </a>
                </li>
                <li class="py-2 md:my-0 hover:bg-blue-lightest lg:hover:bg-transparent">
                    <a href="{{ route('tasks.index', [ 'projectsid' =>  $data->id]) }}"
                        class="block pl-4 pr-4 align-middle text-grey-darker no-underline hover:text-blue border-l-4 border-transparent lg:hover:border-grey-light {{  ( Request::routeIs('tasks.index') ) ? "span-active" : "" }}">
                        <span class="pb-1 md:pb-0 text-sm ">{{ __('Tasks') }}</span>
                    </a>
                </li>
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

        {{-- large --}}
        @livewire('projects.partials.sidebar' , ['project' => $data , 'data' => null , 'type' => 'New task'])


    <div class="container w-full flex flex-wrap mx-auto px-2 pt-8 lg:pt-16">

        <div class="w-full lg:w-4/5 p-8 mt-6 lg:mt-0 leading-normal">
            {{ $slot }}
        </div>

    </div>
    </div>

    @stack('scripts')
</x-app-layout>
