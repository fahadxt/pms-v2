<?php

namespace App\Http\Livewire\Projects;

use App\Models\User;
use Livewire\Component;
use App\Models\statuses;

class Filter extends Component
{
    public $filter_search, $filter_username, $filter_due_on, $filter_statuses, $updatedFilters = [];

    protected $listeners = [
        'restFiltersOnFilter' => 'restFilters',
    ];

    // public function updatedFilterSearch($value)
    // {
    //     $this->updatedFilters();
    // }

    // public function updatedFilterDueOn($value)
    // {
    //     $this->updatedFilters();
    // }

    public function updatedFilters()
    {

        if($this->filter_search){
            $this->updatedFilters ['filter_search'] =  $this->filter_search ;
        }
        if($this->filter_username){
            $this->updatedFilters ['filter_username'] =  $this->filter_username ;
        }
        if($this->filter_statuses){
            $this->updatedFilters ['filter_statuses'] =  $this->filter_statuses ;
        }
        if($this->filter_due_on){
            $this->updatedFilters ['filter_due_on'] = explode(" to ", $this->filter_due_on) ;
        }

        // dd($this->updatedFilters);
        $this->emit('updatedFilters', $this->updatedFilters);
    }

    // public function filter()
    // {
    //     dd('filter');
    //     $validatedData = $this->validate();
    // }

    public function restFilters()
    {
        $this->filter_search = null;
        $this->filter_username = null;
        $this->filter_due_on = null;
    }

    public function render()
    {
        // dd('sdf');
        return view('livewire.projects.filter', [
            'statuses' => statuses::all(),
        ]);
    }
}
