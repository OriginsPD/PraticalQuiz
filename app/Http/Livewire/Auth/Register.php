<?php

namespace App\Http\Livewire\Auth;

use App\Models\Course;
use App\Models\Student;
use App\Models\User;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Livewire\Component;

class Register extends Component
{

    public User $user;
    public  $class;
    public  $courses;
    public $password;
    public $password_confirmation;

    protected array $rules = [
        'user.username' => 'required|min:3',
        'user.dob' => 'required|before:today|after:12/31/1985',
        'user.gender' => 'required',
        'user.email' => 'required|email',
        'class' => 'required',
        'courses' => 'required',
        'password' => 'required|min:4|confirmed',
    ];

    public function createStudent()
    {
        $this->validate();

        $id = User::create([
            'username' => $this->user->username,
            'email' => $this->user->email,
            'password' => $this->password,
            'usertype' => 3
        ])->id;

        Student::create([
            'id' => $id,
            'user_id' => $id,
            'name' => $this->user->username,
            'gender' => $this->user->gender,
            'dob' => $this->user->dob,
            'class' => $this->class,
            'course_id' => $this->courses
        ]);

        if(auth()->attempt([
                'email' => $this->user->email,
                'password' => $this->password]) && auth()->user()->usertype === 3) {
                    return redirect()->route('student.dashboard');
                }

        $this->addError('user.email',trans('auth.failed'));

    }

    public function updated()
    {
        $this->validate([
            'user.username' => 'min:3',
            'user.dob' => 'before:today|after:12/31/1985',
            'user.gender' => 'required',
            'user.email' => 'email',
            'class' => 'required',
            'courses' => 'required',
            'password' => 'min:4|confirmed',
        ]);
    }

    public function mount(): void
    {
        $this->user = new User;
    }

    public function render(): Factory|View|Application
    {
        return view('livewire.auth.register',[
            'Students' => Student::with('user', 'course')->get(),
            'offeredCourses' => Course::all()
        ]);
    }
}
