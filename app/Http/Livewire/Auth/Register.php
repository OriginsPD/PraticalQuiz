<?php

namespace App\Http\Livewire\Auth;

use App\Models\User;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Livewire\Component;

class Register extends Component
{

    public User $user;
    public $password;
    public $password_confirmation;

    protected array $rules = [
        'user.username' => 'required|min:3',
        'user.dob' => 'required|before:today|after:12/31/1985',
        'user.gender' => 'required',
        'user.email' => 'required|email',
        'password' => 'required|min:4|confirmed',
    ];

    public function createStudent()
    {
        $this->validate();
    }

    public function updated()
    {
        $this->validate([
            'user.username' => 'required|min:3',
            'user.dob' => 'required|before:today|after:12/31/1985',
            'user.gender' => 'required',
            'user.email' => 'required|email',
            'password' => 'required|min:4|confirmed',
        ]);
    }

    public function mount(): void
    {
        $this->user = new User;
    }

    public function render(): Factory|View|Application
    {
        return view('livewire.auth.register');
    }
}
