<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoomController;
use App\Http\Livewire\JoinSection;
use App\Http\Livewire\Chat;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Route::get('/', function () {
//    return view('rooms.join-room');
//});

Route::get('/', JoinSection::class)->name('join-room');
Route::get('/chat/{room}', [RoomController::class, 'room'])->middleware(['auth','isUser'])->name('chat');


Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
