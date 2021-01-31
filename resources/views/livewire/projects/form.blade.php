<form method="POST" enctype="multipart/form-data" autocomplete="off">
    <div class="flex flex-wrap -mx-3 mb-6 text-gray-700">
        <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
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

        {{-- <div class="w-full md:w-1/3 px-3">
            <label class="block uppercase tracking-wide  text-xs font-bold mb-2 text-right" for="users">
                {{__('Departments')}}
            </label>
            <select name="departments" id="departments"
                class="ui fluid  selection dropdown search appearance-none block w-full py-3 px-4 mb-3 leading-tight focus:outline-none bg-white border border-gray-300 focus:border-gray-400 rounded"
                wire:model.lazy='selectedDepartments'>
                <option value="" disabled selected></option>
                @foreach($departments as $user)
                <option value="{{$user->id}}">{{$user->display_name}}</option>
                @endForeach
            </select>
            @error('departments')
            <p class="text-red-500 text-xs text-right mt-2">
                {{ $message }}
            </p>
            @enderror
        </div>
        @if (!is_null($selectedDepartments))
        <div class="w-full md:w-1/3 px-3">
            <label class="block uppercase tracking-wide  text-xs font-bold mb-2 text-right" for="users">
                {{__('Units')}}
            </label>
            <select name="units" id="units"
                class="ui fluid  selection dropdown search appearance-none block w-full py-3 px-4 mb-3 leading-tight focus:outline-none bg-white border border-gray-300 focus:border-gray-400 rounded"
                wire:model.lazy='selectedUnits'>
                <option value="" disabled selected></option>
                @foreach($units as $key => $value)
                <option value="{{$value->id}}">{{$value->display_name}}</option>
                @endForeach
            </select>
            @error('units')
            <p class="text-red-500 text-xs text-right mt-2">
                {{ $message }}
            </p>
            @enderror
        </div>
        @endif

        @if (!is_null($selectedUnits))
        <div class="w-full md:w-1/3 px-3">
            <label class="block uppercase tracking-wide  text-xs font-bold mb-2 text-right" for="users">
                {{__('Teams')}}
            </label>
            <select name="teams" id="teams"
                class="ui fluid  selection dropdown search appearance-none block w-full py-3 px-4 mb-3 leading-tight focus:outline-none bg-white border border-gray-300 focus:border-gray-400 rounded"
                wire:model.lazy='selectedTeams'>
                <option value="" disabled selected></option>
                @foreach($teams as $key => $value)
                <option value="{{$value->id}}">{{$value->display_name}}</option>
                @endForeach
            </select>
            @error('teams')
            <p class="text-red-500 text-xs text-right mt-2">
                {{ $message }}
            </p>
            @enderror
        </div>
        @endif

        <div class="w-full md:w-1/3 px-3">
            <label class="block uppercase tracking-wide  text-xs font-bold mb-2 text-right" for="users">
                {{__('projects.Joint users')}}
            </label>
            <div wire:ignore>
            <select name="users[]" multiple id="users"
                class="ui fluid multiple selection dropdown search appearance-none block w-full py-3 px-4 mb-3 leading-tight focus:outline-none bg-white border border-gray-300 focus:border-gray-400 rounded"
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
        </div> --}}

        <div class="w-full md:w-1/2 px-3">
            <label class="block uppercase tracking-wide  text-xs font-bold mb-2 text-right" for="project_due_on">
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
            <label class="block uppercase tracking-wide  text-xs font-bold mb-2 text-right" for="status">
                {{__('Status')}}
            </label>
            <div wire:ignore>
                <select name="status"
                    class="ui fluid selection dropdown search appearance-none block w-full py-3 px-4 mb-3 leading-tight focus:outline-none bg-white border border-gray-300 focus:border-gray-400 rounded"
                    wire:model.lazy='status'>
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
            <label class="block uppercase tracking-wide  text-xs font-bold mb-2 text-right" for="description">
                {{__('projects.description')}}
            </label>

            <textarea name="description" id="description" cols="50" rows="9"
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
