<?php

namespace App\Http\Livewire\Projects;

use App\Models\User;
use Livewire\Component;

class Filter extends Component
{
    public $filter_search , $filter_description , $filter_users;


    public function updatedFilterSearch($value)
    {
        $this->emit('updatedFilterSearch', $value);
    }

    // public function filter()
    // {
    //     dd('filter');
    //     $validatedData = $this->validate();
    // }


    public function render()
    {
        // dd('sdf');
        return view('livewire.projects.filter', [
            'usersData' => User::all(),
        ]);
    }
}
