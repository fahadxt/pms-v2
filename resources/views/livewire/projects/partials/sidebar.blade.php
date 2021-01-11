<div
    class="w-full lg:w-2/12 md:w-1/12 lg:px-6 text-xl leading-normal pt-8 lg:pt-16 pl-8 bg-gradient-to-b from-gray-100 to-white transition-all duration-300 min-h-screen hidden lg:block ">
    <div class="flex justify-center ">
        <nav id="nav" class="w-full relative">
            <ul class="relative" x-data="{ selected: 0 }">

                @foreach ($items as $Key => $item)
                    <li> 
                        <a href="{{ route($item['route_name'], [ $item['parameters'] =>  $project->id]) }}" class="py-4 px-3 my-5 w-full flex items-center focus:outline-none focus-visible:underline hover:text-sm {{  ( Request::routeIs($item['route_name']) ) ? "text-blue-500 rounded bg-white shadow-lg" : "text-blue-400" }}">
                            <span class="bg-blue-100 p-1 rounded-full w-8 h-8 text-center">{!! $item['icon'] !!}</span>
                            <span class="mx-2  font-medium transition-all ease-out transition-medium">{{ __($item['name']) }}</span>
                        </a>

                    </li>
                @endforeach
    
            </ul>
        </nav>
    </div>
</div>