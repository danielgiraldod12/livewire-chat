<?php

namespace App\Http\Livewire;

use App\Models\Message;
use Livewire\Component;

class SendMessage extends Component
{
    public $inputMessage;

    public function render()
    {
        return view('livewire.send-message');
    }

    public function sendMessage(){
        dd($this->inputMessage);
    }
}
