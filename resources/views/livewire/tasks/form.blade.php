<div x-data="{isOpen:false}" x-on:close-modal.window="isOpen = false">
    <div>
        <button @click="isOpen = true" class="modal-button bg-blue-500 p-3 rounded-lg text-white hover:bg-blue-500">
            {{ __($type) }}
        </button>
    </div>

    <div x-show.transition.opacity="isOpen" x-cloak
        class="fixed top-0 left-0 w-full h-full flex items-center shadow-lg overflow-y-auto z-20">

        <div class="container mx-auto lg:px-32 rounded-lg overflow-y-auto z-20">
            <div class="bg-white rounded">
                <div class="flex justify-end pl-4 pt-4">
                    <button @click="isOpen = false" class="text-3xl leading-none hover:text-gray-300">X</button>
                </div>
                <div class="modal-body px-8 py-8">
                    <form method="POST" enctype="multipart/form-data" class="w-full ui large form project" wire:submit.prevent='store'>
                        <div class="flex flex-wrap -mx-3 mb-6">
                            <div class="w-full md:w-1/4 px-3 mb-6 md:mb-0">
                                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2 text-right" for="name">
                                    {{__('projects.name')}}
                                </label>
                                <input
                                    class="appearance-none block w-full bg-gray-200 text-gray-700 border border-red-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
                                    type="text" id="name" name="name" wire:model.lazy='name'>
                                    @error('name') 
                                        <p class="text-red-500 text-xs text-right mt-2">
                                            {{ $message }}
                                        </p> 
                                    @enderror
                            </div>

                            <div class="w-full md:w-1/4 px-3">
                                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2 text-right" for="assigned_to">
                                    {{__('Assigned To')}}
                                </label>
                                <div wire:ignore>
                                    <select name="assigned_to[]" multiple id="assigned_to" class="ui fluid multiple selection dropdown search "
                                        wire:model.lazy='users'>
                                        <option value="" disabled selected></option>
                                        @foreach($usersData as $user)
                                        <option value="{{$user->id}}">{{$user->name}}</option>
                                        @endForeach
                                    </select>
                                </div>
                                @error('assigned_to') 
                                        <p class="text-red-500 text-xs text-right mt-2">
                                            {{ $message }}
                                        </p> 
                                @enderror
                            </div>

                            <div class="w-full md:w-1/4 px-3">
                                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2 text-right" for="due_on">
                                    {{__('Due on')}}
                                </label>
                                <input
                                    class="appearance-none block w-full bg-gray-200 text-gray-700 border border-red-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
                                    type="text" id="due_on" name="due_on" wire:model.lazy='due_on'>
                                    @error('due_on') 
                                        <p class="text-red-500 text-xs text-right mt-2">
                                            {{ $message }}
                                        </p> 
                                    @enderror

                            </div>

                            @if($data)
                            <div class="w-full md:w-1/4 px-3">
                                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2 text-right" for="status_id">
                                    {{__('Status')}}
                                </label>
                                <div wire:ignore>
                                    <select name="status_id" class="ui fluid selection dropdown search " wire:model.lazy='status_id'>
                                        <option value="" disabled selected></option>
                                        @foreach($statuses as $status)
                                        <option value="{{$status->id}}">{{__($status->name)}}</option>
                                        @endForeach
                                    </select>
                                </div>
                                @error('status') 
                                        <p class="text-red-500 text-xs text-right mt-2">
                                            {{ $message }}
                                        </p> 
                                @enderror
                            </div>
                            @endif
                        </div>

                        <div class="flex flex-wrap -mx-3 mb-6">
                            <div class="w-full px-3">
                                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2 text-right" for="description">
                                    {{__('projects.description')}}
                                </label>

                                <textarea 
                                    name="description" id="description" cols="50" rows="9"
                                    class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                                    wire:model.lazy='description'>
                                </textarea>

                                @error('description') 
                                        <p class="text-red-500 text-xs text-right mt-2">
                                            {{ $message }}
                                        </p> 
                                @enderror

                            </div>
                        </div>

                        <div class="flex flex-wrap -mx-3">
                            <div class="w-full px-3">
                                <button type="submit" class="ui positive right labeled icon button" wire:dirty.attr="disabled">
                                    حفظ
                                    <i class="checkmark icon"></i>
                                </button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>

        </div>

        <div class="fixed top-0 left-0 w-full h-full flex items-center shadow-lg overflow-y-auto z-10"
            style="background-color:rgba(0, 0, 0, .5)" @click="isOpen = false">
        </div>
    </div>
</div>

@push('scripts')
<script>
    $(document).ready(function() {
        $('#assigned_to').dropdown();
        $('#assigned_to').on('change', function (e) {
            @this.set('assigned_to', e.target.value);
        });
    });
</script>
@endpush