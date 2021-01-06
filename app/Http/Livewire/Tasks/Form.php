<?php

namespace App\Http\Livewire\Tasks;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\projects;
use App\Models\tasks;
use App\Models\statuses;


class Form extends Component
{

    // protected $listeners = [
    //     'taskID' => 'taskData',
    // ];

    use WithPagination;

    public  $name , $description , $assigned_to='' , $due_on , $status_id = 1 , $project , $users, $data , $type;
    
    public function mount( $project ,$data , $type)
    {
        $this->type = $type;
        $this->project = $project;
        $this->data = null;

        if($data){
            $this->data = $data;
            $this->name = $this->data->name;
            $this->description = $this->data->description;
            $this->assigned_to = $this->data->assigned_to;
            $this->due_on = $this->data->due_on;
            $this->status_id = $this->data->status_id;
            $this->users = $this->project->users()->get()->pluck('id')->toArray();
        }

    }



    private function resetInput(){
        $this->name = null;
        $this->description = null;
        $this->assigned_to = '';
        $this->due_on = null;
    }

    public function store()
    {
        $this->validate([
            'name' => 'required|min:3|max:255',
            'description' => 'required',
            'assigned_to' => 'required',
            'due_on' => 'required',
        ]);


        $data = [
            'name' => $this->name,
            'description' => $this->description,
            'assigned_to' => $this->assigned_to,
            'due_on' => $this->due_on,
            'status_id' => $this->status_id,

            'created_by' => auth()->user()->id,
            'taskable_type' => get_class($this->project),
            'taskable_id' => $this->project->id,
        ];

        if($this->data) {
            $updatedData = tasks::find($this->data->id);
            $updatedData->update($data);
            // $this->emit('taskUpdated' , $updatedData);

            session()->flash('message', 'تم التعديل بنجاح 👍 ');
            redirect()->route('tasks.show',['projectsid' => $this->project->id , 'id' => $this->data->id]); 


        }else{
            $createdData = tasks::create($data);
            $this->emit('taskCreated' , $createdData);
            $this->emit('statisticsUpdate', $this->project);

            $this->dispatchBrowserEvent('close-modal');
            $this->resetInput();
            $this->dispatchBrowserEvent('dropdown-restore');
            $this->dispatchBrowserEvent('sweet-alert-success', ['msg' => 'تم الإنشاء بنجاح 👍 ']);

        }
    }

    public function render()
    {
        return view('livewire.tasks.form', [
            'usersData' => $this->project->users,
            'statuses' => statuses::all()
        ]);
    }
}
