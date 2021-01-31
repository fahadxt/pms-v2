<?php

namespace App\Http\Livewire\Projects;

use App\Models\departments;
use App\Models\User;
use Livewire\Component;
use App\Models\projects;

use App\Models\statuses;
use App\Models\teams;
use App\Models\units;
use Livewire\WithPagination;


class Create extends Component
{
    use WithPagination;

    public  $name , $description , $users , $data , $status = 1 , $btn_name, $btn_color, $project_due_on;
    public $modal = false;

    public  $departments,
            $units,
            $teams,
            $usersData;

    public  $selectedDepartments = Null,
            $selectedUnits = Null,
            $selectedTeams = Null;

    public function toggleModal() {
        $this->modal = true;
    }

    public function mount($data , $btn_name, $btn_color)
    {
        $this->btn_name = $btn_name;
        $this->btn_color = $btn_color;
        $this->data = null;

        $this->departments = departments::all();
        $this->units = collect();
        $this->teams = collect();
        $this->usersData = User::all();

        if($data){
            $this->data = $data;
            $this->name = $this->data->name;
            $this->description = $this->data->description;
            $this->status = $this->data->status_id;
            $this->project_due_on = $this->data->project_due_on;
            $this->project_due_on = $this->project_due_on->format('Y-m-d');
            // $this->users = $this->data->users()->get()->pluck('id')->toArray();
        }
    }

    public function updatedSelectedDepartments($department)
    {
        $this->units = units::where('department_id', $department)->get();
        $this->usersData = User::where('department_id', $department)->get();
        $this->teams = Null;
    }
    public function updatedSelectedUnits($unit)
    {
        if(!is_null($unit)){
            $this->teams = teams::where('unit_id', $unit)->get();
            $this->usersData = User::where('unit_id', $unit)->get();
        }
    }
    private function resetInput(){
        $this->name = null;
        $this->description = null;
        $this->users = null;
        $this->project_due_on = null;
    }

    protected $rules = [
        'name'        => 'required|min:3|max:255',
        'description' => 'required',
        'users'       => 'required_without_all',
        'project_due_on'       => 'required',
    ];

    public function store()
    {
        $this->validate();

        $data = [
            'name' => $this->name,
            'description' => $this->description,
            'status_id' => $this->status,
            'project_due_on' => $this->project_due_on,
            'owner_id' => auth()->user()->id
        ];
        if($this->data) {
            $updaetedData = projects::find($this->data->id);
            $updaetedData->update($data);
            $updaetedData->users()->sync($this->users);

            $this->modal = false;
            $this->emit('statisticsUpdate', $updaetedData);
            $this->emit('projectUpdaeted' , $updaetedData);
            $this->emit('refreshStatistics');

            // $this->emit('statisticsUpdate', $createdData);


        } else {
            $createdData = projects::create($data);
            $createdData->users()->sync($this->users);
            // $this->dispatchBrowserEvent('close-modal');
            $this->modal = false;
            $this->resetInput();
            $this->dispatchBrowserEvent('dropdown-restore');
            $this->emit('projectCreate' , $createdData);
        }
    }

    public function render()
    {
        return view('livewire.projects.create', [
            'statuses' => statuses::all()

        ]);
    }
}
