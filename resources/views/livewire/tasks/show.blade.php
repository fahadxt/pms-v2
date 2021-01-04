<div>
    @include('layouts.alerts')
    @livewire('tasks.form' , ['project' => $projects ,'data' => $data])

    <div class="ui segment">
        <div class="ui small breadcrumb">
            <a href="{{route('projects.index')}}"class="section">{{__('Projects')}}</a>
            <i class="left chevron icon divider"></i>
            <a href="{{route('projects.show', [ 'id' => $projects->id ])}}" class="section">{{$projects->name}}</a>
            <i class="left chevron icon divider"></i>
            <div class="active section">{{$data->name}}</div>
        </div>
    </div>

    <div class="ui card show">
        <div class="header">
            <div class="right">
                {{__('Task')}} : {{$data->name}}
            </div>
            {{-- wire:click="$emit('taskID', {{$data->id}})" --}}
            <div class="left">
                <div id="open-task" class="pointer" >
                    {{__('Edit')}}
                </div>
                <div class="pointer" wire:click='delete({{$data->id}})'>
                    {{__('Remove')}}
                </div>
            </div>
        </div>
        <div class="ui large form">
            <div class="ui equal width aligned padded grid">
                <div class="doubling one column row border-bottom">
                    <div class="column">
                        <div class="">
                            {{__('Status')}} : <span class="status"
                                style="background-color:{{$data->status->color}}">{{__($data->status->name)}}</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="ui equal width aligned padded grid">
                <div class="doubling one column row">
                    <div class="column">
                        <div class="input-show"> {{$data->description}} </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
