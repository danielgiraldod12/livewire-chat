<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;

    protected $fillable = [
      'room_code'
    ];

    /**
     * Relacion 1 a muchos
     */

    public function users(){
        $this->hasMany('App\Models\User');
    }

    public function messages(){
        $this->hasMany('App\Models\Message');
    }
}
