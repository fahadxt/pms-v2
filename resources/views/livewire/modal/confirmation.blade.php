<div x-data="{isOpen:false}" x-on:close-modal.window="isOpen = false">
    <div>
        <button @click="isOpen = true" class="modal-button bg-{{$btn_color}}-500 p-3 rounded-lg text-white hover:bg-{{$btn_color}}-500">
            {{ __($btn_name) }}
        </button>
    </div>

    <div x-show.transition.opacity="isOpen" x-cloak
        class="fixed top-0 left-0 w-full h-full flex items-center shadow-lg overflow-y-auto z-20">
            <div class="container mx-auto rounded-lg overflow-y-auto z-20">
                <div class="bg-white rounded lg:mx-96 overflow-hidden px-10 py-10">
                    <div class="text-center">
                        <span
                        class="material-icons border-4 rounded-full p-4 text-red-500 font-bold border-red-500 text-4xl block relative m-auto w-24 h-24">
                        <i class="fas fa-trash"></i>
                    </span>
                </div>
                <div class="text-center py-6 text-2xl text-gray-700">{{__('Are you sure ?')}}</div>
                <div class="text-center font-light text-gray-700 mb-8">
                    {{__('Do you really want to delete these record? This process cannot be undone.')}}
                </div>
                <div class="flex justify-center">
                    <button class="bg-red-500 text-gray-200 rounded hover:bg-red-400 px-6 py-2 focus:outline-none mx-1" wire:click="$emit({{$emit_name}})">{{__('Yes')}}</button>
                    <button @click="isOpen = false" class="bg-gray-300 text-gray-900 rounded hover:bg-gray-200 px-6 py-2 focus:outline-none mx-1">{{__('Cancel')}}</button>
                    </div>
                </div>
            </div>


        <div class="fixed top-0 left-0 w-full h-full flex items-center shadow-lg overflow-y-auto z-10"
            style="background-color:rgba(0, 0, 0, .5)" @click="isOpen = false">
        </div>
    </div>
</div>

