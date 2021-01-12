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
    public $filter_search , $filter_due_on, $filter_username, $filter_statuses;
    
    protected $listeners = [
        'projectCreate' => 'handleCreated',
        'updatedFilters' => 'updatedFilters',
        'restFilters' => 'restFilters',
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


        if(auth()->user()->hasRole('user'))
        {
            $projects = $projects->whereHas('users', function ($query) use($user_id) {
                $query->where('user_id', $user_id);
            });
        }

        if ($this->filter_search) {
            $projects = $projects->where('name', 'like' , '%' . $this->filter_search . '%')
            ->orWhere('description', 'like' , '%' . $this->filter_search . '%');
        }

        if ($this->filter_username) {
            $username = $this->filter_username;
            $projects = $projects->whereHas('users', function ($query) use($username) {
                // $query->where('user_id', 1);
                $query->where('name', 'like' , '%' . $username . '%')
                ->orWhere('email', 'like' , '%' . $username . '%');
            });
        }

        if ($this->filter_statuses) {
            $filter_statuses = $this->filter_statuses;
            $projects = $projects->whereHas('status', function ($query) use($filter_statuses) {
                $query->whereIn('id',  $filter_statuses );
            });
        }

        if ($this->filter_due_on) {
            
            $from = date('Y-m-d', strtotime($this->filter_due_on[0]) );
            if(count($this->filter_due_on) > 1){
                $to = date('Y-m-d', strtotime($this->filter_due_on[1]) );
                $projects = $projects->whereBetween('project_due_on' , [ $from , $to ] );        
            }
            else{
                $projects = $projects->whereDate('project_due_on' , '=',  $from  );        
            }

        }


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


    public function applySearchFilter($coll_projects)
    {
        if(auth()->user()->hasRole('user'))
        {
            $projects = $projects->whereHas('users', function ($query) use($user_id) {
                $query->where('user_id', $user_id);
            });
        }

        if ($this->filter_search) {
            $projects = $projects->where('name', 'like' , '%' . $this->filter_search . '%')
            ->orWhere('description', 'like' , '%' . $this->filter_search . '%');
        }

        if ($this->filter_due_on) {
            
            $from = date('Y-m-d', strtotime($this->filter_due_on[0]) );
            if(count($this->filter_due_on) > 1){
                $to = date('Y-m-d', strtotime($this->filter_due_on[1]) );
                $projects = $projects->whereBetween('project_due_on' , [ $from , $to ] );        
            }
            else{
                $projects = $projects->whereDate('project_due_on' , '=',  $from  );        
            }

        }

        return $projects;
    }


    public function show($id)
    {
        return redirect()->route('projects.show', ['id' => $id]);
    }


    public function restFilters()
    {
        $this->filter_search = null;
        $this->filter_username = null;
        $this->filter_due_on = null;

        $this->emit('restFiltersOnFilter');
    }

    public function handleCreated($data)
    {
        $this->dispatchBrowserEvent('sweet-alert-success', ['msg' => 'تم الإنشاء بنجاح 👍 ']);
    }

    public function updatedFilters($updatedFilters)
    {
        if(!empty($updatedFilters)){

            if(isset($updatedFilters['filter_search'])){
                $this->filter_search = $updatedFilters['filter_search'];
            }

            if(isset($updatedFilters['filter_username'])){
                $this->filter_username = $updatedFilters['filter_username'];
            }
            if(isset($updatedFilters['filter_statuses'])){
                $this->filter_statuses = $updatedFilters['filter_statuses'];
            }
            
            if(isset($updatedFilters['filter_due_on'])){
                $this->filter_due_on = $updatedFilters['filter_due_on'];
            }
        }else{
            $this->restFilters();
        }
        
        $this->render();
    }
    // public function updatedFilterDueOn($filter_due_on)
    // {
    //     $this->filter_due_on = $filter_due_on;
    //     $this->render();
    // }
    // public function cleareFilterDueOn($filter_due_on)
    // {
    //     $this->filter_due_on = $filter_due_on;
    //     $this->render();
    // }
    

}
