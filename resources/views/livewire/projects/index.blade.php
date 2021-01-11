<div>
    
    <div class="flex flex-wrap">
    @forelse ($projects as $key => $value)
    <div class="w-full sm:w-1/1 md:w-1/2 lg:w-1/3 xl:w-1/3 2xl:w-1/4  p-3 flex flex-col">
        <div class="bg-white shadow-sm overflow-hidden flex-1 flex flex-col cursor-pointer 
        hover:shadow-lg group block rounded-md font-semibold transform hover:scale-105 motion-reduce:transform-none"
            wire:click="show({{ $value->id }})">


            <div class="flex justify-between p-3 bg-gradient-to-br from-blue-400 to-blue-500 text-white ">
                <span class="inline-block align-middle">{{$value->name}}</span>
                <span class="inline-block align-middle">
                    {{$value->tasks->count()}}
                    <i class="fas fa-tasks"></i>
                </span>
            </div>

            <div class="p-4 flex-1 flex flex-col ">
                <div class="flex relative">
                    <div class="circle-icon-2">
                        <i class="fas fa-file-alt"></i>
                    </div>

                    <div class="absolute inset-y-0.5 right-6 after-icon ">
                        {{__('description')}}
                    </div>
                </div>

                <div class="flex flex-wrap mt-5 text-right pr-5 text-gray-500 ">
                    <p class=""> {{$value->description}} </p>
                </div>


            </div>
            <div class="flex justify-between p-3 footer-shadow pt-2 text-grey">

                <span class="inline-block align-middle ">
                    <div class="flex">
                        @foreach ($value->users as $key => $user)
                        <img class="w-8 h-8 rounded-full border-2 border-white {{$key > 0 ? '-mr-3' : ''}}"
                            src="{{ asset( $user->profile_photo_url ) }}" alt="">
                        @if (($key+1) == 2)
                        @break
                        @endif
                        @endforeach
                        @if ($value->users->count() > 2)
                        <span
                            class="flex items-center justify-center font-semibold text-gray-600 text-xs w-8 h-8 rounded-full bg-gray-200 border-2 border-white -mr-3">+{{$value->users->count() -2 }}</span>
                        @endif
                    </div>
                </span>

                <span class="inline-block align-middle text-gray-400 font-light" dir="ltr">
                    <i class="far fa-calendar-alt"></i>
                    {{$value->created_at->format('Y-M-d')}}
                </span>
            </div>
        </div>
    </div>
    @empty
    <h1>No Data</h1>
    @endforelse

    {{$projects->links('pagination-links')}}


</div>

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