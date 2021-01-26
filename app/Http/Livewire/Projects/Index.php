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

    
    // public filters variable 
    public $filter_search , $filter_due_on, $filter_username, $filter_statuses;
    
    
    protected $listeners = [
        'projectCreate' => 'handleCreated',
        'updatedFilters' => 'updatedFilters',
        'restFilters' => 'restFilters',
    ];


    // render projects component
    public function render()
    {
        $name_max = 18 ;
        $description_max = 100 ;
        $user_id = auth()->user()->id;
        

        $projects = projects::orderBy('created_at', 'desc');
        $projects = $this->applyFilters($projects);
        $projects = $projects->paginate(18);

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


    // function to filter collocton of projects
    public function applyFilters($projects)
    {
        if ($this->filter_due_on) {
            $from = date('Y-m-d', strtotime($this->filter_due_on[0]) );
            
            if(count($this->filter_due_on) > 1){
                $to = date('Y-m-d', strtotime($this->filter_due_on[1]) );
                $projects->whereBetween('project_due_on' , [ $from , $to ] );        
            }
            else{
                $projects->whereDate('project_due_on' , '=',  $from  );        
            }

        }

        
        if ($this->filter_search) {
            $projects->where('name', 'like' , '%' . $this->filter_search . '%');
        }

        // if the user not leader or admin get only project attached to this user  
        if(auth()->user()->hasRole('user'))
        {
            $user_id = auth()->user()->id;
            $projects->whereHas('users', function ($query) use($user_id) {
                $query->where('user_id', $user_id);
            });
        }


        if ($this->filter_username) {
            $username = $this->filter_username;
            $projects->whereHas('users', function ($query) use($username) {
                $query->where('name', 'like' , '%' . $username . '%')
                ->orWhere('email', 'like' , '%' . $username . '%');
            });
        }

        if ($this->filter_statuses) {
            $filter_statuses = $this->filter_statuses;
            $projects->whereHas('status', function ($query) use($filter_statuses) {
                $query->whereIn('id',  $filter_statuses );
            });
        }

        return $projects;
    }

    // function to rest filters and get all projects
    public function restFilters()
    {
        $this->filter_search = null;
        $this->filter_username = null;
        $this->filter_due_on = null;
        $this->updatedFilters = null;
        $this->filter_statuses = null;

        $this->emit('restFiltersOnFilter');
    }


    // listener to change public variable and render this component    
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


    // listener to dispaly sweet alert success after success store a new project 
    // and call restFilters function to clear all filters to be sour there is no filters to show all projects
    public function handleCreated($data)
    {
        $this->restFilters();
        $this->dispatchBrowserEvent('sweet-alert-success', ['msg' => __('Record created successfully') . ' 👍 ' ]);
    }

}
