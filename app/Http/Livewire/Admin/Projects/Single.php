<?php

namespace App\Http\Livewire\Admin\Projects;

use App\Models\projects;
use Livewire\Component;

class Single extends Component
{

    public $projects;

    public function mount(projects $projects){
        $this->projects = $projects;
    }

    public function delete()
    {
        $this->projects->delete();
        $this->dispatchBrowserEvent('show-message', ['type' => 'error', 'message' => 'projects was deleted.']);
        $this->emit('projectsDeleted');
    }

    public function render()
    {
        return view('livewire.admin.projects.single')
            ->layout('admin::layouts.app');
    }
}
