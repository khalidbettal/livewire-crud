<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class Login extends Component
{
    public $email;
    public $password;

    public function submit()
    {
        $this->validate([
            'email' => ['required', 'email'],
            'password' => 'required',
        ]);

        if (Auth::attempt(['email' => $this->email, 'password' => $this->password])) {
            return redirect()->route('home');
        }

        $this->addError('email', 'Invalid credentials. Please try again.');
    }

    public function render()
    {
        return view('livewire.login');
    }
}

