<?php

namespace App\Http\Livewire\Tasks;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\projects;
use App\Models\tasks;
use App\Models\statuses;

class Index extends Component
{
    protected $listeners = [
        'taskCreated' => 'handleCreated',
        'taskUpdated' => 'handleUpdated',
    ];
    use WithPagination;

    public $projectsid , $assigned_to;

    public function mount($projectsid)
    {
        $this->projectsid = $projectsid;
    }


    public function render()
    {
        $project = projects::find($this->projectsid);
        $taskable_type = get_class($project);
        $taskable_id = $this->projectsid;
        $user_id = auth()->user()->id;
        if(auth()->user()->hasRole('admin'))
        {
            $task = tasks::where('taskable_type',$taskable_type)->where('taskable_id', $taskable_id);
        }else{
            $task = tasks::where('taskable_type',$taskable_type)->where('taskable_id', $taskable_id)->where('assigned_to',$user_id);
        }
        $task = $task->latest()->paginate(18);
        return view('livewire.tasks.index',[
            'tasks' => $task,
            'data' =>$project
        ])->layout('livewire.projects.layouts.show',[
            'tasks' => $task,
            'data' =>$project
        ])->slot('slot');
    }



    public function handleCreated($data)
    {
        session()->flash('message', 'تم الإنشاء بنجاح 👍');
    }
    public function handleUpdated($data)
    {
        session()->flash('message', 'تم التعديل بنجاح 👍');
    }
}
