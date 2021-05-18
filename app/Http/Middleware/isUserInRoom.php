<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class isUserInRoom
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $room = $request->route()->parameters()['room']->id;
        $user = Auth::user()->id_room;
        if($user == $room){
            return $next($request);
        }
        return redirect()->route('join-room');
    }
}
