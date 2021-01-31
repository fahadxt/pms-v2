<?php

namespace App\Http\Livewire\AdminPanel\Departments;

use Livewire\Component;

class Index extends Component
{
    public $page_name = 'departments Panel';

    public function render()
    {
        return view('livewire.admin-panel.departments.index')
        ->layout('livewire.admin-panel.layouts.index', [
            'page_name' => isset($this->page_name) ? $this->page_name : null,
        ])->slot('slot');
    }
}
