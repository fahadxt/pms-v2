<?php

namespace App\Http\Livewire\Projects;

use Livewire\Component;
use App\Models\projects;
use App\Models\tasks;
use App\Models\User;

class Show extends Component
{

    protected $listeners = [
        'projectUpdaeted' => 'handleUpdated',
    ];

    public  $data;
    public $confirmationModal = false;
    
    public function toggleConfirmationModal() {
        $this->confirmationModal = true;
    }

    public function mount(projects $id)
    {
        $this->data = $id;
    }

    public function remove($id)
    {
        $project = projects::find($id);
        $project->delete();
        session()->flash('success', __('Record deleted successfully') . ' 👍 ' );
        return redirect()->route('projects.index'); 
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

    public function handleUpdated($data)
    {
        $this->dispatchBrowserEvent('sweet-alert-success', ['msg' => __('Record has been modified successfully') . ' 👍 ' ]);
        $this->emit('statisticsUpdate', $data);
    }
    
}
