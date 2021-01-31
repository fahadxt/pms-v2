<?php

namespace App\Http\Livewire\AdminPanel\Layouts;

use Livewire\Component;

class Sidebar extends Component
{
    public $items = [
        [
            'name' => 'Home',
            'icon' => '<i class="fas fa-info"></i>',
            'route_name' => 'admin-panel.index',
        ],
        [
            'name' => 'Departments',
            'icon' => '<i class="fas fa-info"></i>',
            'route_name' => 'admin-panel.departments.index',
        ],
        [
            'name' => 'Units',
            'icon' => '<i class="fas fa-info"></i>',
            'route_name' => 'admin-panel.units.index',
        ],
        [
            'name' => 'Teams',
            'icon' => '<i class="fas fa-info"></i>',
            'route_name' => 'admin-panel.teams.index',
        ],
        [
            'name' => 'Users',
            'icon' => '<i class="fas fa-info"></i>',
            'route_name' => 'admin-panel.users.index',
        ],
    ];

    public function render()
    {
        return view('livewire.admin-panel.layouts.sidebar');
    }
}
