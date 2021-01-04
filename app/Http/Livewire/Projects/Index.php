<?php

namespace App\Http\Livewire\Projects;

use App\Models\User;
use Livewire\Component;
use App\Models\projects;
use Livewire\WithPagination;

class Index extends Component
{

    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $name , $description , $users;

    protected $listeners = [
        'projectCreate' => 'handleCreated',
        'projectDelete' => 'handleDeleted',
    ];

    public function render()
    {
        $user_id = auth()->user()->id;
        

        $projects = projects::orderBy('created_at', 'desc');
        if(auth()->user()->hasRole('user'))
        {
            $projects = $projects->whereHas('users', function ($query) use($user_id) {
                $query->where('user_id', $user_id);
            });
        }


        $projects= $projects->latest()->paginate(18);
        $this->dispatchBrowserEvent('close-modal');

        return view('livewire.projects.index', [
            'data' => $projects,
            'usersData' => User::all(),
        ])->layout('livewire.projects.layouts.index', [
            'data' => $projects,
        ])->slot('slot');

    }

    public function show($id)
    {
        return redirect()->route('projects.show', ['id' => $id]);
    }



    public function handleCreated($data)
    {
        $this->dispatchBrowserEvent('sweet-alert-success', ['msg' => 'تم الإنشاء بنجاح 👍 ']);
    }
    
    public function handleDeleted($data)
    {
        session()->flash('message', 'تم الحذف بنجاح 👍 ');
    }

}
