<?php

namespace App\Http\Livewire;

use App\Events\JoinUsers;
use App\Models\Message;
use Livewire\Component;
use App\Models\Room;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class JoinSection extends Component
{
    public $name;
    public $roomCodeJoin;
    public $roomCodeCreate;

//    protected $rules = [
//        'name' => 'required|min:4|max:15',
//        'roomCodeJoin' => 'required|min:4|max:4',
//        'roomCodeCreate' => 'required|min:4|max:4',
//    ];

    public function render()
    {
        return view('livewire.join-section')->layout('rooms.join-room');
    }

    public function joinRoom(){
        if($this->roomCodeJoin == null || $this->name == null){
            $this->emit('alertEmpty');
        }else{
            if(is_numeric($this->roomCodeJoin)){
                if(strlen($this->roomCodeJoin) != 4){
                    $this->emit('alertLenght');
                }else{
                    $room = Room::query()
                        ->where('room_code',$this->roomCodeJoin);
                    if($room->count() >= 1){
                        $room = $room->first();
                        /**
                         * Creo el usuario
                         */
                        $user = new User();
                        $user->name = $this->name;
                        $user->id_room = $room->id;
                        $user->state = User::Active;
                        $user->save();

                        /**
                         * Mensaje de que se conecto el usuario
                         */
                        $userConnected = new Message();
                        $userConnected->message = 'El usuario '. $user->name . ' se ha conectado';
                        $userConnected->id_room = $room->id;
                        $userConnected->id_user = $user->id;
                        $userConnected->status = Message::StatusNormal;
                        $userConnected->type = Message::TypeConnect;
                        $userConnected->save();

                        Auth::loginUsingId($user->id);
                        event(new JoinUsers());
                        return redirect()->route('chat', $room->id);
                    }else{
                        $this->emit('alertError');
                    }
                }
            }else{
                $this->emit('alertNum');
            }

        }
    }

    public function createRoom(){
        if($this->roomCodeCreate == null || $this->name == null){
            $this->emit('alertEmpty');
        }else{
            if(is_numeric($this->roomCodeCreate)){
                if(strlen($this->roomCodeCreate) != 4){
                    $this->emit('alertLenght');
                }else{
                    $room = new Room();
                    $room->room_code = $this->roomCodeCreate;
                    $room->save();

                    $user = new User();
                    $user->name = $this->name;
                    $user->id_room = $room->id;
                    $user->state = User::Active;
                    $user->save();
                    Auth::loginUsingId($user->id);
                    return redirect()->route('chat', $room->id);
                }
            }else{
                $this->emit('alertNum');
            }

        }
    }

}
