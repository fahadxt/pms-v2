<div class="flex flex-wrap">
    <div class="statistic m-4">
        <div class="label">
            {{__('Tasks completed')}}
        </div>

        <div class="value">
            {{ $task_completed }} <span>{{__('From')}}</span> {{$task_count }}
        </div>
    </div>
    <div class="statistic m-4">
        <div class="label">
            {{__('Status')}}
        </div>

        <div class="value">
            <span class="status" style="background-color:{{$task->status->color}}">{{__($task->status->name)}}</span>
        </div>
    </div>
    <div class="statistic m-4">
        <div class="label">
            {{__('Total of users')}}
        </div>

        <div class="value">
            {{ $task_users   }}
        </div>
    </div>
</div>