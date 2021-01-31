<?php

namespace App\Http\Livewire\AdminPanel;

use Livewire\Component;

class Index extends Component
{
    // public $page_name = 'Admin Panel';

    public function render()
    {
        return view('livewire.admin-panel.index', [
            'page_name' => isset($this->page_name) ? $this->page_name : null,
        ])
        ->layout('livewire.admin-panel.layouts.index', [
            'page_name' => isset($this->page_name) ? $this->page_name : null,
        ])->slot('slot');
    }
}
