<?php

namespace App\Http\Livewire\Projects;

use App\Models\User;
use Livewire\Component;
use App\Models\projects;
use App\Models\statuses;
use Livewire\WithPagination;

class Index extends Component
{

    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $name , $description , $users;
    private $projects ;
    public $search;
    
    protected $listeners = [
        'projectCreate' => 'handleCreated',
        'updatedFilterSearch' => 'updatedFilterSearch',
    ];


    public function mount()
    {
        $this->projects = projects::orderBy('created_at', 'desc');
    }

    public function render()
    {
        $name_max = 18 ;
        $description_max = 100 ;
        $user_id = auth()->user()->id;
        

        $this->projects = projects::orderBy('created_at', 'desc');
        $projects =  $this->projects;


        $projects =  $this->applySearchFilter($projects);


        $projects = $projects->paginate(18)->appends([
            'status' => '$request->status' , 
        ]);

        $projects->getCollection()->transform(function ($row) use($name_max,$description_max){
            $row->name = (strlen(strip_tags($row->name)) >= $name_max) ? mb_substr(($row->name),0,$name_max,'UTF-8').'...' : strip_tags($row->name);
            $row->description = (strlen(strip_tags($row->description)) >= $description_max) ? mb_substr(($row->description),0,$description_max,'UTF-8').'...' : strip_tags($row->description);
            return $row;
        });

        
        $this->dispatchBrowserEvent('close-modal');
        $usersData = User::all();
        
        return view('livewire.projects.index', [
            'projects' =>  $projects,
            'usersData' =>  $usersData,
        ])
        ->layout('livewire.projects.layouts.index', [
            'usersData' =>  $usersData,
            'filter' => 'index',
        ])->slot('slot');

    }





    public function applySearchFilter($projects)
    {
        if(auth()->user()->hasRole('user'))
        {
            $projects = $projects->whereHas('users', function ($query) use($user_id) {
                $query->where('user_id', $user_id);
            });
        }

        if ($this->search) {
            $projects = $projects->where('name', 'like' , '%' . $this->search . '%')
            ->orWhere('description', 'like' , '%' . $this->search . '%');
        }

        return  $projects;
    }


    public function show($id)
    {
        return redirect()->route('projects.show', ['id' => $id]);
    }



    public function handleCreated($data)
    {
        $this->dispatchBrowserEvent('sweet-alert-success', ['msg' => 'تم الإنشاء بنجاح 👍 ']);
    }

    public function updatedFilterSearch($queryString)
    {
        $this->search = $queryString;
        $this->render();
    }
    

}
