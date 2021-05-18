<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory;

    protected $fillable = [
        'message',
        'id_room',
        'type'
    ];

    const TypeMessage = 1;
    const TypeConnect = 2;
    const TypeDisconnect = 3;

    const StatusNormal = 1;
    const StatusDeletedForMe = 2;
    const StatusDeletedForBoth = 3;

    public function room(){
        $this->belongsTo('App\Models\Room');
    }

    public function user(){
        $this->belongsTo('App\Models\User');
    }
}
