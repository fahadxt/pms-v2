<?php

namespace App\Http\Livewire\Admin\Projects;

use App\Models\projects;
use Livewire\Component;
use Livewire\WithFileUploads;

class Create extends Component
{
    use WithFileUploads;

    public $title;
    public $content;
    public $image;
    
    protected $rules = [
        'title' => 'required',
        'content' => 'required|min:30',        
    ];

    public function updated($input)
    {
        $this->validateOnly($input);
    }

    public function create()
    {
        $this->validate();

        $this->dispatchBrowserEvent('show-message', ['type' => 'success', 'message' => 'projects was created.']);
        
        if($this->getPropertyValue('image') and is_object($this->image)) {
            $this->image = $this->getPropertyValue('image')->store('images/articles');
        }

        projects::create([
            'title' => $this->title,
            'content' => $this->content,
            'image' => $this->image,
            'user_id' => auth()->user()->id,
        ]);

        $this->reset();
    }

    public function render()
    {
        return view('livewire.admin.projects.create')
            ->layout('admin::layouts.app');
    }
}
