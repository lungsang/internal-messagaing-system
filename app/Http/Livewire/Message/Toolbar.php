<?php

namespace App\Http\Livewire\Message;

use Livewire\Component;

class Toolbar extends Component
{   
    public array $selected = [];
    public array $ids = [];
    protected $listeners = ['messagesSelected'];

    public function getSelectedCountProperty()
    {
        return count($this->selected);
    }
    
    public function selectAll()
    {
        $this->selected = $this->ids;
        $this->emitUp('messageSelected',$this->selected);
    }

    public function selectNone()
    {
        $this->selected = [];
        $this->emitUp('messageSelected', $this->selected);
    }

    public function messagesSelected($selected)
    {
        $this->selected = $selected;
    }

    public function render()
    {
        return view('livewire.message.toolbar');
    }
}
