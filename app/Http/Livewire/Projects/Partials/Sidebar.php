<?php

namespace App\Http\Livewire\Projects\Partials;

use Livewire\Component;
use App\Models\projects;

class Sidebar extends Component
{
    public  $project;
    public  $data;
    public $selected = 0;


    public $items = [
        [
            'name' => 'Project information',
            'icon' => '<i class="fas fa-info"></i>',
            'route_name' => 'projects.show',
            'parameters' => 'id',
        ],
        [
            'name' => 'Tasks',
            'icon' => '<i class="fas fa-tasks"></i>',
            'route_name' => 'tasks.index',
            'parameters' => 'projectsid',
        ]
    ];

    public function mount($project)
    {
        $this->project = $project;
    }



    public function render()
    {
        return view('livewire.projects.partials.sidebar');
    }
}
