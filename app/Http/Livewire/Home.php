<?php

namespace App\Http\Livewire;

use Carbon\Carbon;
use App\Models\tasks;
use Livewire\Component;
use App\Models\projects;
use Livewire\WithPagination;

class Home extends Component
{
    use WithPagination;

    public function render()
    {

        $dt = (Carbon::now())->format('Y-m-d');
        $projects = projects::orderBy('id', 'desc')->get();
        $tasks = tasks::orderBy('id', 'desc')->get();

        return view('livewire.home',[
            'projects' => $projects,
            'tasks' => $tasks,
            'dt' => $dt,
        ])->layout('layouts.app')
        ->slot('body');
    }
}
