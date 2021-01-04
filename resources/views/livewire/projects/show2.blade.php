<x-slot name="header">
    <div class="flex justify-between">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight ">
            {{ $data->name }}
        </h2>
        
        @livewire('tasks.form' , ['project' => $data , 'data' => null , 'type' => 'new'])

    </div>
</x-slot>


<div class="container m-auto p-8 text-grey-darkest mt-20">
    <div class="flex flex-wrap -mx-2 mb-8">

        <div class="w-full md:w-1/2 lg:w-1/4 px-2 mb-4">
           <div class="text-sm text-grey-dark flex items-center justify-center">
            <div class="ui card show">
                <div class="header">
                    <div class="right">
                        {{__('Project')}} : {{$data->name}}
                    </div>
                </div>
                <div class="ui large form">
                    <div class="ui equal width aligned padded grid">
                        <div class="doubling one column row border-bottom">
                            <div class="column flex-space">
                                <div class="">
                                    {{__('Status')}}             
                                    <i class="left chevron icon divider color-h"></i>
                                    <span class="status"
                                        style="background-color:{{$data->status->color}}">{{__($data->status->name)}}</span>
                                </div>
                                <div class="">
                                    {{__('Tasks completed')}} 
                                    <i class="left chevron icon divider color-h"></i>
                                    <span class="">{{__($data->tasks->where('status_id', 4)->count())}} من {{__($data->tasks->count())}}</span>             
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="ui equal width aligned padded grid">
                        <div class="doubling one column row">
                            <div class="column">
                                <div class="">
                                    {{__('description')}}             
                                    <i class="left chevron icon divider color-h"></i>
                                </div>
                                <div class="input-show"> {{$data->description}} </div>
                            </div>
                        </div>
                    </div>
                    <div class="ui equal width aligned padded grid footer">
                        <div class="doubling one column row">
                            <div class="column flex-space" >
        
                                <div class="">
                                    {{__('Users')}}             
                                    <i class="left chevron icon divider color-h"></i>
                                </div>
        
                                <div class="users">
                                    @foreach ($data->users as $key => $value)
                                    <div class="ui inline header2 dropdown">
                                        <div class="text ">
                                            <img class="ui huge circular image" src="{{ asset( $value->profile_photo_url ) }}">
                    
                                        </div>
                                        <div class="menu menu2">
                                            <div class="item">
                                                {{$value->name}}
                                            </div>
                                            <div class="item" wire:click='deattach({{$value->id}})'>
                                                إزالة
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
           </div>
        </div>

        <div class="w-full lg:w-3/4 px-2">
           <div class=" px-9 text-sm text-grey-dark flex items-center justify-center">
                @livewire('tasks.index' , ['project' => $data])
           </div>
        </div>
     </div>
  
</div>

{{-- <div class="mt-6">
    <div class="ui card show">
        <div class="header">
            <div class="right">
                {{__('Project')}} : {{$data->name}}
            </div>
            @if(auth()->user()->hasRole(['admin']))
            <div class="left">

                

                <div id="open-project" class="pointer">
                    {{__('Edit')}}
                </div>

                <div class="pointer" wire:click='delete({{$data->id}})'>
                    {{__('Remove')}}
                </div>
                <div id="open-task" class="pointer" wire:click="$emit('taskID', {{null}})">
                    {{__('New Task')}}
                </div>
            </div>
            @endif
        </div>
        <div class="ui large form">
            <div class="ui equal width aligned padded grid">
                <div class="doubling one column row border-bottom">
                    <div class="column flex-space">
                        <div class="">
                            {{__('Status')}}             
                            <i class="left chevron icon divider color-h"></i>
                            <span class="status"
                                style="background-color:{{$data->status->color}}">{{__($data->status->name)}}</span>
                        </div>
                        <div class="">
                            {{__('Tasks completed')}} 
                            <i class="left chevron icon divider color-h"></i>
                            <span class="">{{__($data->tasks->where('status_id', 4)->count())}} من {{__($data->tasks->count())}}</span>             
                        </div>
                    </div>
                </div>
            </div>
            <div class="ui equal width aligned padded grid">
                <div class="doubling one column row">
                    <div class="column">
                        <div class="">
                            {{__('description')}}             
                            <i class="left chevron icon divider color-h"></i>
                        </div>
                        <div class="input-show"> {{$data->description}} </div>
                    </div>
                </div>
            </div>
            <div class="ui equal width aligned padded grid footer">
                <div class="doubling one column row">
                    <div class="column flex-space" >

                        <div class="">
                            {{__('Joint users')}}             
                            <i class="left chevron icon divider color-h"></i>
                        </div>

                        <div class="users">
                            @foreach ($data->users as $key => $value)
                            <div class="ui inline header2 dropdown">
                                <div class="text ">
                                    <img class="ui huge circular image" src="{{ asset('storage/'. $value->avatar ) }}">
            
                                </div>
                                <div class="menu menu2">
                                    <div class="item">
                                        {{$value->name}}
                                    </div>
                                    <div class="item" wire:click='deattach({{$value->id}})'>
                                        إزالة
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <h4 class="ui horizontal divider header divider-style">
        <div class="circle-icon"><i class="fas fa-tasks"></i></div>
        <div>{{__('Tasks')}}</div>
        <div><i class="down chevron icon divider color-h"></i></div>
    </h4>


    @livewire('tasks.index' , ['project' => $data])

</div> --}}
