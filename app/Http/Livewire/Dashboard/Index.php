<?php

namespace App\Http\Livewire\Dashboard;

use Livewire\Component;
use App\Models\projects;
use App\Models\tasks;
use Carbon\Carbon;


class Index extends Component
{
    public function render()
    {
        $dt = (Carbon::now())->format('Y-m-d');

        $projects = projects::orderBy('id', 'desc')->get();
        $tasks = tasks::orderBy('id', 'desc')->get();
        return view('livewire.dashboard.index', [
            'projects' => $projects,
            'tasks' => $tasks,
            'dt' => $dt,
        ]);
    }
}
