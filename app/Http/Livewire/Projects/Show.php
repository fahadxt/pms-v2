<?php

namespace App\Http\Livewire\Projects;

use Livewire\Component;
use App\Models\projects;
use App\Models\tasks;
use App\User;

class Show extends Component
{

    protected $listeners = [
        'projectUpdaeted' => 'handleUpdated',
    ];

    public function handleUpdated($data)
    {
        $this->dispatchBrowserEvent('sweet-alert-success', ['msg' => 'تم التعديل بنجاح 👍 ']);
    }


    public  $data;

    public function mount(projects $id)
    {
        $this->data = $id;
        $this->emit('postAdded');
    }

    public function delete($id)
    {
        $project = projects::find($this->data->id);
        $project->delete();
        session()->flash('message', 'تم الحذف بنجاح 👍 ');
        redirect()->route('projects.index'); 
    }
    
    public function deattach($id)
    {
        $project = projects::find($this->data->id);
        $project->users()->detach($id);
        $this->emit('projectUpdaeted' , $project);
        redirect()->route('projects.show',['id' => $this->data->id]); 
    }

    public function render()
    {
        return view('livewire.projects.show', [
            'data' => projects::find($this->data->id),
            'tasks' => tasks::latest(),
            'usersData' => User::all(),
        ])->layout('livewire.projects.layouts.show', [
            'data' => projects::find($this->data->id),
        ])->slot('slot');
    }

    
}
