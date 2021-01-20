<div class="flex flex-wrap text-center">
    <div class="w-full sm:w-1/1 md:w-1/2 lg:w-1/3 xl:w-1/3 2xl:w-1/4  p-3 flex flex-col">
        <div class="flex-1 flex flex-col statistic">
            <div class="label">
                {{__('Tasks completed')}}
            </div>

            <div class="value">
                {{ $task_completed }} <span>{{__('From')}}</span> {{$task_count }}
            </div>
        </div>
    </div>

    <div class="w-full sm:w-1/1 md:w-1/2 lg:w-1/3 xl:w-1/3 2xl:w-1/4  p-3 flex flex-col">
        <div class="flex-1 flex flex-col statistic">
            <div class="label">
                {{__('Status')}}
            </div>

            <div class="value">
                <span class="status" style="background-color:{{$task->status->color}}">{{__($task->status->name)}}</span>
            </div>
        </div>
    </div>

    <div class="w-full sm:w-1/1 md:w-1/2 lg:w-1/3 xl:w-1/3 2xl:w-1/4  p-3 flex flex-col">
        <div class="flex-1 flex flex-col statistic">
            <div class="label">
                {{__('Total of users')}}
            </div>

            <div class="value">
                {{ $task_users   }}
            </div>
        </div>
    </div>
</div>