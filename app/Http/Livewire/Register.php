<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Route;

class Register extends Component
{
    public $form = [
        'name' => '',
        'email' => '',
        'password' => '',
        'password_confirmation' => '',
    ];

    protected $rules = [
        'form.email' => 'required|email',
        'form.name' => 'required',
        'form.password' => 'required|confirmed',
        'form.password_confirmation' => 'required',
    ];
    protected $messages = [
        'form.name.required' => 'The Name field is required.',
        'form.email.required' => 'The Email field is required.',
        'form.email.email' => 'Please enter a valid Email address.',
        'form.password.required' => 'The Password field is required.',
        'form.password.confirmed' => 'The Password confirmation does not match.',
        'form.password_confirmation.required' => 'The Password confirmation field is required.',
    ];

    public function submit()
    {
        $this->validate($this->rules);

        User::create([
            'name' => $this->form['name'],
            'email' => $this->form['email'],
            'password' => Hash::make($this->form['password']),
            'password_confirmation' => $this->form['password_confirmation'],
        ]);

        return Redirect::route('login');
    }

    public function render()
    {
        return view('livewire.register');
    }
}
