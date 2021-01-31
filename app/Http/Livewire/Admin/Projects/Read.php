<?php

namespace App\Http\Livewire\Admin\Projects;

use App\Models\projects;
use Illuminate\Database\Eloquent\Builder;
use Livewire\Component;
use Livewire\WithPagination;

class Read extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $search;

    protected $queryString = ['search'];

    protected $listeners = ['projectsDeleted'];

    public function projectsDeleted(){
        // Nothing ..
    }

    public function render()
    {
        $data = projects::query();

        if(config('easy_panel.crud.projects.search')){
            $array = (array) config('easy_panel.crud.projects.search');
            $data->where(function (Builder $query) use ($array){
                foreach ($array as $item) {
                    if(!is_array($item)) {
                        $query->orWhere($item, 'like', '%' . $this->search . '%');
                    } else {
                        $query->orWhereHas(array_key_first($item), function (Builder $query) use ($item) {
                            $query->where($item[array_key_first($item)], 'like', '%' . $this->search . '%');
                        });
                    }
                }
            });
        }

        $data = $data->latest('id')->paginate(config('easy_panel.pagination_count', 15));

        return view('livewire.admin.projects.read', [
            'projectss' => $data
        ])->layout('admin::layouts.app');
    }
}
