<div class="w-full px-2 mb-4">

    <div class="ui tiny statistics justify-content-center">
        @livewire('tasks.part.statistics' , ['task' => $data])
    </div>

    <div class="bg-white shadow-lg overflow-hidden flex-1 flex flex-col 
          block rounded-md font-semibold mt-15  text-lg">
        <div class="p-10">
            <div class="flex relative mt-5">
                <div class="circle-icon-2">
                    <i class="fas fa-file-alt"></i>
                </div>

                <div class="absolute mr-4 right-6 after-icon ">
                    {{__('description')}}
                </div>
            </div>

            <div class="flex flex-wrap mt-5 mr-10 text-right">
                <p class=""> {{$data->description}} </p>
            </div>


            <div class="flex relative mt-5">
                <div class="circle-icon-2">
                    <i class="fas fa-users"></i>
                </div>

                <div class="absolute mr-4 right-6 after-icon ">
                    {{__('Users')}}
                </div>
            </div>

            <div class="flex flex-wrap mt-5 text-center justify-content-center">
                @forelse ($data->users as $user)                
                <div class="w-full md:w-6/12 lg:w-3/12 lg:mb-0 mb-12 px-4">
                        <div class="px-6">
                            <img src="{{ asset( $user->profile_photo_url ) }}" class="rounded-full max-w-full mx-auto" style="max-width:120px">
                            <div class="pt-6 text-center">
                                <h5 class="text-xl font-bold">{{$user->name}}</h5>
                                {{-- <p class="mt-1 text-sm text-gray-500 uppercase font-semibold">Web Developer</p> --}}
                            </div>
                        </div>
                </div>
                @empty
                    <h1> No Users  </h1>
                @endforelse
            </div>
        </div>

        <div class="flex space-x-4 p-3 footer-shadow text-grey">

            <div class="mx-3">
            @livewire('projects.create', [ 
                'data' => $data , 
                'btn_name' => 'Update',
                'btn_color' => 'green',
            ])
            </div>
            
            <div class="mx-3">
            @livewire('modal.confirmation', [ 
                'data' => $data , 
                'emit_name' => '"projectRemove",'. $data->id , 
                'btn_name' => 'Remove',
                'btn_color' => 'red',
            ])
            </div>
        </div>
    </div>
</div>