<form method="POST" enctype="multipart/form-data" autocomplete="off">
    <div class="flex flex-wrap -mx-3 mb-6">
        <div class="w-full md:w-1/4 px-3 mb-6 md:mb-0">
            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2 text-right" for="name">
                {{__('projects.name')}}
            </label>
            <input
                class="appearance-none block w-full py-3 px-4 mb-3 leading-tight focus:outline-none bg-white border border-gray-300 focus:border-gray-400 rounded"
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
                <select name="assigned_to[]" multiple id="assigned_to" class="ui fluid multiple selection dropdown search appearance-none block w-full py-3 px-4 mb-3 leading-tight focus:outline-none bg-white border border-gray-300 focus:border-gray-400 rounded"
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
                class="appearance-none block w-full py-3 px-4 mb-3 leading-tight focus:outline-none bg-white border border-gray-300 focus:border-gray-400 rounded"
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
                <select name="status_id" class="ui fluid selection dropdown search appearance-none block w-full py-3 px-4 mb-3 leading-tight focus:outline-none bg-white border border-gray-300 focus:border-gray-400 rounded" wire:model.lazy='status_id'>
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
                class="appearance-none block w-full py-3 px-4 mb-3 leading-tight focus:outline-none bg-white border border-gray-300 focus:border-gray-400 rounded"
                wire:model.lazy='description'>
            </textarea>

            @error('description') 
                    <p class="text-red-500 text-xs text-right mt-2">
                        {{ $message }}
                    </p> 
            @enderror

        </div>
    </div>
</form>