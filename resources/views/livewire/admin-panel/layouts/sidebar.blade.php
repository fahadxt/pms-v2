<div
    class="w-full lg:w-2/12 md:w-1/12  text-xl leading-normal pt-8 lg:pt-16  bg-gradient-to-b from-gray-100 to-white transition-all duration-300 min-h-screen hidden lg:block ">
    {{-- {{  ( Request::routeIs($item['route_name']) ) ? "text-blue-500 rounded bg-white shadow-lg" : "text-blue-400" }} --}}

    <div class="relative flex flex-col items-start justify-center w-full py-6">
        @foreach ($items as $Key => $item)
            <a href="{{ route($item['route_name'], isset($item['parameters']) ? [$item['parameters'] =>  $project->id] : '' ) }}" class="relative w-full flex items-center px-6 py-3 text-sm font-medium leading-5 text-gray-900 transition duration-150 ease-in-out group hover:text-gray-900  focus:outline-none focus:text-gray-900   {{  ( Request::routeIs($item['route_name']) ) ? "bg-gray-50 border-t border-b border-gray-200 border-opacity-100" : "hover:bg-gray-50" }}">
                    <span class="bg-blue-100 p-1 rounded-full w-8 h-8 text-center">{!! $item['icon'] !!}</span>
                    <span class="mx-2  truncate md:inline-block ">{{ __($item['name']) }}</span>
                    <span class="absolute left-0 block w-1 transition-all duration-300 ease-out rounded-full  group-hover:top-0  group-hover:h-full {{  ( Request::routeIs($item['route_name']) ) ? "top-0 h-full bg-blue-500" : "top-1/2 h-0 bg-gray-300" }}  "></span>
            </a>
        @endforeach
    </div>

</div>
