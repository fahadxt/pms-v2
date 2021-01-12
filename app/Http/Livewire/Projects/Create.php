<?php

namespace App\Http\Livewire\Projects;

use App\Models\User;
use Livewire\Component;
use App\Models\projects;

use App\Models\statuses;
use Livewire\WithPagination;


class Create extends Component
{
    use WithPagination;

    public  $name , $description , $users , $data , $status = 1 , $btn_name, $btn_color, $project_due_on;


    public function mount($data , $btn_name, $btn_color)
    {
        $this->btn_name = $btn_name;
        $this->btn_color = $btn_color;
        $this->data = null;

        if($data){
            $this->data = $data;
            $this->name = $this->data->name;
            $this->description = $this->data->description;
            $this->status = $this->data->status_id;
            $this->project_due_on = $this->data->project_due_on;
            $this->project_due_on = $this->project_due_on->format('Y-m-d');
            $this->users = $this->data->users()->get()->pluck('id')->toArray();
        }
    }

    private function resetInput(){
        $this->name = null;
        $this->description = null;
        $this->users = null;
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
            $this->dispatchBrowserEvent('close-modal');
            $this->emit('statisticsUpdate', $updaetedData);
            $this->emit('projectUpdaeted' , $updaetedData);
            $this->emit('refreshStatistics');
            
            // $this->emit('statisticsUpdate', $createdData);
            

        } else {
            $createdData = projects::create($data);
            $createdData->users()->sync($this->users);
            $this->dispatchBrowserEvent('close-modal');
            $this->resetInput();
            $this->dispatchBrowserEvent('dropdown-restore');
            $this->emit('projectCreate' , $createdData);
        }
    }

    public function render()
    {
        return view('livewire.projects.create', [
            'usersData' => User::all(),
            'statuses' => statuses::all()

        ]);
    }
}
