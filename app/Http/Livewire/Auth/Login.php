<?php

namespace App\Http\Livewire\Auth;

use App\Models\User;
use Livewire\Component;

class Login extends Component
{
    public User $user;
    public $password;

    protected array $rules = [
        'user.email' => 'required|email',
        'password' => 'required|min:4',
    ];

    public function authUser()
    {
        $this->validate();


        if(auth()->attempt([
            'email' => $this->user->email,
            'password' => $this->password])){

            if(auth()->user()->usertype === 1 ){
                return redirect()->route('admin.dashboard');
            }
            if(auth()->user()->usertype === 2 ){
                return redirect()->route('admin.dashboard');
            }
            if(auth()->user()->usertype === 3 ){
                return redirect()->route('admin.dashboard');
            }

        }

        $this->addError('user.email',trans('auth.failed'));
    }

    public function updated(): void
    {
        $this->validate([
            'user.email' => 'email',
            'password' => 'min:4'
        ]);
    }

    public function mount(): void
    {
        $this->user = new User;
    }

    public function render()
    {
        return view('livewire.auth.login');
    }
}
