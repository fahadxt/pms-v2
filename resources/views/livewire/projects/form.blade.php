<form method="POST" enctype="multipart/form-data" class="w-full ui large form project" wire:submit.prevent='store' autocomplete="off">
    <div class="flex flex-wrap -mx-3 mb-6 text-gray-700">
        <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
            <label class="block uppercase tracking-wide  text-xs font-bold mb-2 text-right" for="name">
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

        <div class="w-full md:w-1/3 px-3">
            <label class="block uppercase tracking-wide text-xs font-bold mb-2 text-right" for="users">
                {{__('projects.Joint users')}}
            </label>
            <div wire:ignore>
                <select name="users[]" multiple id="users" class="ui fluid multiple selection dropdown search appearance-none block w-full py-3 px-4 mb-3 leading-tight focus:outline-none bg-white border border-gray-300 focus:border-gray-400 rounded"
                    wire:model.lazy='users'>
                    <option value="" disabled selected></option>
                    @foreach($usersData as $user)
                    <option value="{{$user->id}}">{{$user->name}}</option>
                    @endForeach
                </select>
            </div>
            @error('users') 
                    <p class="text-red-500 text-xs text-right mt-2">
                        {{ $message }}
                    </p> 
            @enderror
        </div>

        <div class="w-full md:w-1/3 px-3">
            <label class="block uppercase tracking-wide text-xs font-bold mb-2 text-right" for="project_due_on">
                {{__('Due on')}}
            </label>
            <input
                class="appearance-none block w-full py-3 px-4 mb-3 leading-tight focus:outline-none bg-white border border-gray-300 focus:border-gray-400 rounded"
                type="text" id="project_due_on" name="project_due_on" wire:model.lazy='project_due_on'>
                @error('project_due_on') 
                    <p class="text-red-500 text-xs text-right mt-2">
                        {{ $message }}
                    </p> 
                @enderror
                <script>
                    $(document).ready(function() {
                        $("#project_due_on").flatpickr({
                            enableTime: false,
                            dateFormat: "Y-m-d",
                            minDate: "today"
                        });
                    });
                </script>

        </div>

        @if($data)
        <div class="w-full px-3">
            <label class="block uppercase tracking-wide text-xs font-bold mb-2 text-right" for="status">
                {{__('Status')}}
            </label>
            <div wire:ignore>
                <select name="status" class="ui fluid selection dropdown search appearance-none block w-full py-3 px-4 mb-3 leading-tight focus:outline-none bg-white border border-gray-300 focus:border-gray-400 rounded" wire:model.lazy='status'>
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
            <label class="block uppercase tracking-wide text-xs font-bold mb-2 text-right" for="description">
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

    <div class="flex flex-wrap -mx-3">
        <div class="w-full px-3">
            <button class="component border border-transparent rounded font-semibold tracking-wide text-sm px-5 py-2 focus:outline-none focus:shadow-outline bg-green-500 text-gray-100 hover:bg-green-600 hover:text-gray-200" wire:dirty.attr="disabled">
                {{__('Save')}}
                <i class="fas fa-check"></i>
            </button>
        </div>
    </div>

</form>

@push('scripts')
<script>
    $(document).ready(function() {
        $('#users').dropdown({ 
            fullTextSearch: true,
            clearable: true,
            detachable: false,
        });
        $('#users').on('change', function (e) {
            var userss = $(this).val();
            this.set('users', userss);
        });
    });


</script>
@endpush 