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
    ];

    public function render()
    {
        $name_max = 18 ;
        $description_max = 100 ;
        $user_id = auth()->user()->id;
        

        $projects = projects::orderBy('created_at', 'desc');
        if(auth()->user()->hasRole('user'))
        {
            $projects = $projects->whereHas('users', function ($query) use($user_id) {
                $query->where('user_id', $user_id);
            });
        }


        $projects= $projects->latest()->paginate(18)->appends([
            'status' => '$request->status' , 
        ]);

        $projects->getCollection()->transform(function ($row) use($name_max,$description_max){
            $row->name = (strlen(strip_tags($row->name)) >= $name_max) ? mb_substr(($row->name),0,$name_max,'UTF-8').'...' : strip_tags($row->name);
            $row->description = (strlen(strip_tags($row->description)) >= $description_max) ? mb_substr(($row->description),0,$description_max,'UTF-8').'...' : strip_tags($row->description);
            return $row;
        });

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
    

}
