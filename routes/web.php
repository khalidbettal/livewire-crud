<?php

use App\Models\comment;
use Illuminate\Support\Facades\Route;
// use Livewire\Livewire;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
    
//     return view('welcome');
// });

Route::get('/', \App\Http\Livewire\Home::class)->name('home')->middleware('auth');
Route::get('/register', \App\Http\Livewire\Register::class)->middleware('guest');
Route::get('/login', \App\Http\Livewire\Login::class)->name('login')->middleware('guest');





