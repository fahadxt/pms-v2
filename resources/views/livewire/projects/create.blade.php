<div x-data="{isOpen:false}" x-on:close-modal.window="isOpen = false">
    <button @click="isOpen = true" class="modal-button bg-blue-500 p-3 rounded-lg text-white hover:bg-blue-500">
        {{ __($type) }}
    </button>

    <div x-show.transition.opacity="isOpen"
        class="fixed top-0 left-0 w-full h-full flex items-center shadow-lg overflow-y-auto z-20">

        <div class="container mx-auto lg:px-32 rounded-lg overflow-y-auto z-20">
            <div class="bg-white rounded">
                <div class="flex justify-end pl-4 pt-4">
                    <button @click="isOpen = false" class="text-3xl leading-none hover:text-gray-300">X</button>
                </div>
                <div class="modal-body px-8 py-8">
                    @include('livewire.projects.form')
                </div>
            </div>

        </div>

        <div class="fixed top-0 left-0 w-full h-full flex items-center shadow-lg overflow-y-auto z-10"
            style="background-color:rgba(0, 0, 0, .5)" @click="isOpen = false">
        </div>
    </div>
</div>