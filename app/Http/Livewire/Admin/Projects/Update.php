<?php

namespace App\Http\Livewire\Admin\Projects;

use App\Models\projects;
use Livewire\Component;
use Livewire\WithFileUploads;

class Update extends Component
{
    use WithFileUploads;

    public $projects;

    public $title;
    public $content;
    public $image;
    
    protected $rules = [
        'title' => 'required',
        'content' => 'required|min:30',        
    ];

    public function mount(projects $projects){
        $this->projects = $projects;
        $this->title = $this->projects->title;
        $this->content = $this->projects->content;
        $this->image = $this->projects->image;        
    }

    public function updated($input)
    {
        $this->validateOnly($input);
    }

    public function update()
    {
        $this->validate();

        $this->dispatchBrowserEvent('show-message', ['type' => 'success', 'message' => 'projects was updated.']);
        
        if($this->getPropertyValue('image') and is_object($this->image)) {
            $this->image = $this->getPropertyValue('image')->store('images/articles');
        }

        $this->projects->update([
            'title' => $this->title,
            'content' => $this->content,
            'image' => $this->image,
            'user_id' => auth()->user()->id,
        ]);
    }

    public function render()
    {
        return view('livewire.admin.projects.update', [
            'projects' => $this->projects
        ])->layout('admin::layouts.app');
    }
}
