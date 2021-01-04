<div class="flex flex-wrap">

    @foreach ($data as $key => $value)
    <div class="w-full sm:w-1/1 md:w-1/2 lg:w-1/3 xl:w-1/3 2xl:w-1/4  p-3 ">
        <div class="bg-white overflow-hidden flex-1 flex flex-col cursor-pointer 
        hover:shadow-sm group block rounded-md border border-gray-200"
            wire:click="show({{ $value->id }})">


            <div class="flex justify-between p-3 bg-gradient-to-br from-blue-300 to-blue-500 text-white ">
                <span  class="inline-block align-middle">{{$value->name}}</span >
                <span  class="inline-block align-middle">{{$value->created_at->format('Y-M-d')}}</span >
            </div>

            <div class="p-4 flex-1 flex flex-col ">
                <div class="mb-4 text-grey-darker text-sm flex-1 text-right">
                    <p>{{$value->name}}</p>
                </div>
                <div
                    class="border-t border-grey-light pt-2 text-xs text-grey hover:text-red uppercase no-underline tracking-wide text-right">
                    Twitter
                </div>
            </div>
        </div>
    </div>
    @endforeach

    {{-- <section class="px-4 sm:px-6 lg:px-4 xl:px-6 pt-4 pb-4 sm:pb-6 lg:pb-4 xl:pb-6 space-y-4">
    <ul class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-1 xl:grid-cols-2 gap-4">
        @foreach ($data as $key => $value)
        <li x-for="item in items">
            <a :href="item.url"
                class="hover:bg-light-blue-500 hover:border-transparent hover:shadow-lg group block rounded-lg p-4 border border-gray-200">
                <dl class="grid sm:block lg:grid xl:block grid-cols-2 grid-rows-2 items-center">
                    <div>
                        <dt class="sr-only">Title</dt>
                        <dd class="group-hover:text-white leading-6 font-medium text-black">
                            {item.title}
                        </dd>
                    </div>
                    <div>
                        <dt class="sr-only">Category</dt>
                        <dd class="group-hover:text-light-blue-200 text-sm font-medium sm:mb-4 lg:mb-0 xl:mb-4">
                            {item.category}
                        </dd>
                    </div>
                    <div class="col-start-2 row-start-1 row-end-3">
                        <dt class="sr-only">Users</dt>
                        <dd class="flex justify-end sm:justify-start lg:justify-end xl:justify-start -space-x-2">
                            <img x-for="user in item.users" :src="user.avatar" :alt="user.name" width="48" height="48"
                                class="w-7 h-7 rounded-full bg-gray-100 border-2 border-white" />
                        </dd>
                    </div>
                </dl>
            </a>
        </li>
        @endforeach
        <li class="hover:shadow-lg flex rounded-lg">
            <a href="/new"
                class="hover:border-transparent hover:shadow-xs w-full flex items-center justify-center rounded-lg border-2 border-dashed border-gray-200 text-sm font-medium py-4">
                New Project
            </a>
        </li>
    </ul>
</section> --}}

    {{$data->links('pagination-links')}}
</div>