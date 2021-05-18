<?php

namespace App\Http\Livewire;

use App\Events\ChatEvent;
use App\Events\Disconnect;
use Livewire\Component;
use App\Models\Room;
use App\Models\User;
use Livewire\Exceptions\MissingRulesException;
use Livewire\Request;
use App\Models\Message;
use Illuminate\Support\Facades\Auth;

class Chat extends Component
{
    public $room;
    public $messages;
    public $users;
    public $inputMessage;

    protected $listeners = [
        'mensajeRecibido' => 'render',
        'usuarioConectado' => 'render',
        'usuarioDesconectado' => 'render',
        'sendMessage' => 'sendMessage'
    ];


    public function mount(Room $room){
        $this->room = $room;
    }

    public function render(){
        $messages = Message::query()->where('messages.id_room', $this->room->id)
            ->join('users', 'users.id','=','messages.id_user')
            ->select([
                'users.id as userId',
                'messages.message',
                'users.name',
                'messages.type',
                'messages.status as statusMessage'
            ])->get();

        $users = User::query()->where('id_room', $this->room->id)
            ->where('state',User::Active)
            ->orderBy('name', 'asc')
            ->get();

        $this->users = $users;
        $this->messages = $messages;

        return view('livewire.chat');
    }

    public function sendMessage($idUser){
        if($this->inputMessage == null){
            $this->emit('alerChat');
        }else{
            $user = Auth::user();
            $message = new Message();

            $message->message = $this->inputMessage;
            $message->id_room = $this->room->id;
            $message->id_user = $idUser;
            $message->type = Message::TypeMessage;
            $message->status = Message::StatusNormal;
            $message->save();

            $this->reset('inputMessage');
            event(new ChatEvent());
        }
    }

    public function DeleteMessageForMe(Message $message){
        if($message){
            $message->status = Message::StatusDeletedForMe;
            $message->save();
        }
    }

    public function DeleteMessageForBoth(Message $message){
        if($message){
            $message->status = Message::StatusDeletedForBoth;
            $message->save();

            event(new ChatEvent());
        }
    }

    public function logout(user $user){

        $userDisconnected = new Message();
        $userDisconnected->message = 'El usuario '. $user->name . ' se ha desconectado';
        $userDisconnected->id_room = $this->room->id;
        $userDisconnected->id_user = $user->id;
        $userDisconnected->type = Message::TypeDisconnect;
        $userDisconnected->save();
        Auth::logout();
        $user->state = User::Inactive;
        $user->id_room = null;
        $user->save();
        event(new Disconnect());
        return redirect()->route('join-room');
    }
}
