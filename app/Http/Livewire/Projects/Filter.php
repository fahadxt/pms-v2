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

        $this->emit('updatedFilters', $this->updatedFilters);
    }


    public function restFilters()
    {
        $this->filter_search = null;
        $this->filter_username = null;
        $this->filter_due_on = null;
        $this->filter_statuses = null;
    }


    public function render()
    {
        return view('livewire.projects.filter', [
            'statuses' => statuses::all(),
        ]);
    }
}
