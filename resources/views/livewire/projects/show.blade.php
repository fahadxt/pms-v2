<div class="w-full px-2 mb-4">

    <div class="ui tiny statistics justify-content-center">
        @livewire('tasks.part.statistics' , ['task' => $data])
    </div>

    {{-- @dump($data->stages()->first()->users) --}}

    <div class="bg-white shadow-lg overflow-hidden flex-1 flex flex-col
          rounded-md font-semibold mt-15  text-lg">
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
                {{-- @forelse ($data->users as $user)
                <div class="w-full md:w-6/12 lg:w-3/12 lg:mb-0 mb-12 px-4">
                        <div class="px-6">
                            <img src="{{ asset( $user->profile_photo_url ) }}" class="rounded-full max-w-full mx-auto" style="max-width:120px">
                            <div class="pt-6 text-center">
                                <h5 class="text-xl font-bold">{{$user->name}}</h5>
                            </div>
                        </div>
                </div>
                @empty
                    <h1> No Users  </h1>
                @endforelse --}}
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
                <x-btn class="text-white bg-red-600  hover:bg-red-700" wire:click="toggleConfirmationModal">
                    {{ __('Remove') }}
                </x-btn>

                <x-jet-dialog-modal wire:model="confirmationModal" maxWidth="2xl">

                    <x-slot name="title"></x-slot>

                    <x-slot name="content">
                        <div class="text-center">
                            <span class="material-icons border-4 rounded-full p-4 text-red-500 font-bold border-red-500 text-4xl block relative m-auto w-24 h-24">
                                <i class="fas fa-trash"></i>
                            </span>
                        </div>

                        <div class="text-center py-6 text-2xl text-gray-700">
                            {{__('Are you sure ?')}}
                        </div>

                        <div class="text-center font-light text-gray-700 mb-8">
                            {{__('Do you really want to delete these record? This process cannot be undone.')}}
                        </div>
                    </x-slot>

                    <x-slot name="footer">

                        <div class="flex">
                            <x-btn class="text-black bg-white" wire:click="$toggle('confirmationModal')" wire:loading.attr="disabled">
                                {{__('Nevermind')}}
                            </x-btn>


                            <x-btn class="text-white bg-red-600  hover:bg-red-700 " wire:click="remove({{$data->id}})" wire:loading.attr="disabled">
                                {{__('Yes')}}
                            </x-btn>
                        </div>


                    </x-slot>
                </x-jet-dialog-modal>
            </div>
        </div>
    </div>
</div>
