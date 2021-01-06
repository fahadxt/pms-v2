<?php

namespace App\Http\Livewire\Modal;

use Livewire\Component;

class Confirmation extends Component
{

    
    public  $data, $btn_name, $btn_color, $emit_name;

    public function mount($data, $btn_name, $btn_color,  $emit_name)
    {
        $this->btn_name = $btn_name;
        $this->btn_color = $btn_color;
        $this->emit_name = $emit_name;
        $this->data = null;
    }


    public function render()
    {
        return view('livewire.modal.confirmation');
    }
}
