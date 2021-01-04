<?php

namespace App\Http\Livewire\Tasks\Part;

use App\Models\tasks;
use Livewire\Component;
use App\Models\projects;

class Statistics extends Component
{

    protected $listeners = ['statisticsUpdate' => 'handleStatistics'];
    
    public function handleStatistics($project)
    {
        $project = projects::find($project['id']);
        $this->task_completed = $project->tasks->where('status_id', 4)->count();
        $this->task_count = $project->tasks->count();
    }

    public  $task, $task_completed, $task_count;

    public function mount($task)
    {
        $this->task = $task;
        $this->task_completed = $task->tasks->where('status_id', 4)->count();
        $this->task_count = $task->tasks->count();
    }

    public function render()
    {
        return view('livewire.tasks.part.statistics');
    }
}
