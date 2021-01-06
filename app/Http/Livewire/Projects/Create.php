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

    public  $name , $description , $users , $data , $status = 1 , $btn_name, $btn_color;


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
    ];

    public function store()
    {
        $this->validate();

        $data = [
            'name' => $this->name,
            'description' => $this->description,
            'status_id' => $this->status,
            'owner_id' => auth()->user()->id
        ];
        if($this->data) {
            $createdData = projects::find($this->data->id);
            $createdData->update($data);
            $createdData->users()->sync($this->users);
            $this->dispatchBrowserEvent('close-modal');
            $this->emit('statisticsUpdate', $createdData);
            $this->emit('projectUpdaeted' , $createdData);
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
