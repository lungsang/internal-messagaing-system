<?php

namespace App\Http\Livewire\Message;

use Livewire\Component;
use Cmgmyr\Messenger\Models\Thread;
use Cmgmyr\Messenger\Models\Message;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Cmgmyr\Messenger\Models\Participant;
use Livewire\WithPagination;

class Index extends Component
{   
    use WithPagination;
    
    protected $paginationTheme = 'bootstrap';
    public string $type;
    public array $selected = [];
    protected $listeners = ['messageSelected'];

    public function mount($type = 'inbox')
    {
        $this->type = $type;
    }
    
    public function updatedSelected()
    {
        $this->emit('messagesSelected',$this->selected);
    }

    public function messageSelected($selected)
    {
        $this->selected = $selected;
    }

    public function render()
    {   
        $messages = new Message();
        
        if($this->type === 'inbox')
        {
            $messages = Message::forUser()->latest()->paginate('4');

        }
        elseif($this->type === 'sent')
        {
            $messages = Message::sentByUser()->latest()->paginate('4');
        }
        elseif($this->type === 'trash')
        {
            $trashed = Thread::TrashForUser(Auth::id())->latest()->get();
            return view('livewire.message.index',compact('trashed'));
        }

        return view('livewire.message.index',compact('messages'));
    }
}
