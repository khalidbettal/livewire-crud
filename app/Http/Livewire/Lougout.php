<?php

namespace App\Http\Livewire;

use Auth;
use Livewire\Component;

class Lougout extends Component
{
    public function logout()
    {
        Auth::logout();
        return redirect(route('login'));
    }
    public function render()
    {
        return view('livewire.lougout');
    }
}
