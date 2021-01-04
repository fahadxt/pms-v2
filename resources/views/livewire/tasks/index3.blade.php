<div>

    <div class="ui equal width aligned padded grid">

        <div class="doubling one column row">
            @foreach ($tasks as $key => $value)
                <div class="column">
                    <a class="href" href="{{route('tasks.show',['projectsid' => $data->id , 'id' => $value->id])}}">

                        <div class="ui card web">
                            <div class="header3">
                                <p class="text-xs text-gray-700 flex flex-col">
                                    <span class="text-xs">{{ (strlen(strip_tags($value->name)) >= 40) ? mb_substr(($value->name),0,40,'UTF-8').'...' : strip_tags($value->name) }}</span>
                                    <span class="w-10 border-t-4 mb-2" style="border-color: {{$value->status->color}} ;"></span> 
                                    <span class="text-xs mb-1">{{__('Due on')}}</span>
                                    <span class="text-sm primary font-medium" dir="ltr" >{{$value->created_at->format('d - M - Y')}}</span>
                                </p> 
                                <div class="text ">
                                    <img class="ui mini circular image" src="{{ asset('storage/'. $value->assignedTo->avatar ) }}">
                                </div>
                            </div>
                            
                            <hr>

                            <div class="content">
                                <div class="description">
                                    {{ (strlen(strip_tags($value->description)) >= 90) ? mb_substr(($value->description),0,90,'UTF-8').'...' : strip_tags($value->description) }}
                                </div>
                            </div>

                            <hr>

                            <div class="footer">
                                <div class="right">
                                    {{__('Status')}} : <span class="status"
                                    style="background-color:{{$value->status->color}}">{{__($value->status->name)}}</span>
                                </div>
                            </div>
                        </div>



                    </a>
                </div>
            @endforeach
        </div>

    </div>

    {{$tasks->links('pagination-links')}}


</div>