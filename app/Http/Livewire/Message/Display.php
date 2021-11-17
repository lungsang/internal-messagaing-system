<?php

namespace App\Http\Livewire\Message;

use Cmgmyr\Messenger\Models\Thread;
use Cmgmyr\Messenger\Models\Message;
use Livewire\Component;

class Display extends Component
{   
    public $messages;
    
    public function render()
    {   
        return view('livewire.message.display');
    }
}
