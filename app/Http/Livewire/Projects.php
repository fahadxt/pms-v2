<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\projects as projectsModels;

class Projects extends Component
{

    use WithPagination;
    
    public  $name , $description;


    private function resetInputFields(){
        $this->name = '';
        $this->description = '';
    }


    

    public function addProject()
    {
        // dd($this->description);
        $this->validate([
            'name' => 'required',
            'description' => 'required',
        ]);

        // projectsModels::create($validatedDate);

        
        $createdData = projectsModels::create([
            'name' => $this->name,
            'description' => $this->description,
            'owner_id' => auth()->user()->id
        ]);
        
        $this->resetInputFields();

        session()->flash('message', 'تم الإنشاء بنجاح 👍 ');
    }

    // public function remove($data_id)
    // {
    //     $data = projectsModels::find($data_id);
    //     $data->delete();
    //     $this->data->prepend($createdData);
    //     session()->flash('message', 'Post remove it Successfully.');
    // }
    public function render()
    {
        return view('livewire.projects.index', [
            'data' => projectsModels::latest()->paginate(15)
        ])->layout('layouts.app')
        ->slot('body');
    }
}
