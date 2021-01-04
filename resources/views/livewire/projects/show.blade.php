<div class="w-full px-2 mb-4">

    <div class="ui tiny statistics justify-content-center">
        @livewire('tasks.part.statistics' , ['task' => $data])
    </div>

    <h4 class="ui horizontal divider header divider-style mt-10">
        <div class="circle-icon">
            <i class="fas fa-file-alt"></i>
        </div>
        <div>{{__('description')}}</div>
      </h4>

    <div class="flex flex-wrap mt-5 text-center justify-content-center">
        <p class=""> {{$data->description}} </p>
    </div>

    <h4 class="ui horizontal divider header divider-style mt-10" >
        <div class="circle-icon">
            <i class="fas fa-users"></i>
        </div>
        <div>{{__('Users')}}</div>
      </h4>


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