<?php

namespace App\Http\Livewire\Projects;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\projects;
use App\Models\statuses;

use App\User;


class Create extends Component
{
    use WithPagination;

    public  $name , $description , $users , $data , $status = 1 , $type;


    public function mount($data , $type)
    {
        $this->type = $type;
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



    public function store()
    {
        $this->validate([
            'name' => 'required|min:3|max:255',
            'description' => 'required',
            'users' => 'required_without_all',
        ]);


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
            $this->emit('projectUpdaeted' , $createdData);
            // session()->flash('message', 'تم التعديل بنجاح 👍 ');
            // redirect()->route('projects.show',['id' => $this->data->id]); 
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
