<?php

namespace App\Http\Livewire\Tasks;

use Livewire\Component;
use App\Models\projects;
use App\Models\tasks;


class Show extends Component
{
    protected $listeners = [
        'taskUpdated' => 'handleUpdated',
    ];

    public function handleUpdated($data)
    {
        session()->flash('message', __('Record has been modified successfully') . ' 👍 ' );
    }




    public  $data;

    public function mount(tasks $id)
    {
        $this->data = $id;
    }

    public function delete($id)
    {
        $task = tasks::find($this->data->id);
        $task->delete();
        session()->flash('message',  __('Record deleted successfully') . ' 👍 ' );
        redirect()->route('projects.show', ['id' => $this->data->taskable_id]); 
    }

    
    public function render()
    {
        $taskable_type = $this->data->taskable_type;
        $taskable_id = $this->data->taskable_id;
        $projects = $taskable_type::find($taskable_id);

        return view('livewire.tasks.show', [
            'projects' => $projects,
        ]);
    }
}
