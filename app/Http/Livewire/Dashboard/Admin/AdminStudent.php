<?php

namespace App\Http\Livewire\Dashboard\Admin;

use App\Models\Course;
use App\Models\Student;
use App\Models\User;
use Illuminate\Support\Str;
use Livewire\Component;

class AdminStudent extends Component
{
    public Student $Student;
    public User $user;
    public $courses;
    public $password;

    public $newStudent = false;

    protected array $rules = [
        'Student.name' => 'required|min:3',
        'Student.dob' => 'required|before:today|after:12/31/1985',
        'Student.gender' => 'required',
        'Student.class' => 'required',
        'courses' => 'required',
        'user.email' => 'required|email',
        'password' => 'required|min:4',
    ];

    public function createStudent(): void
    {
        $this->validate();


        $id = User::create([
            'username' => $this->Student->name,
            'email' => $this->user->email,
            'password' => $this->password,
            'usertype' => 3
        ])->id;

        Student::create([
            'id' => $id,
            'user_id' => $id,
            'name' => $this->Student->name,
            'gender' => $this->Student->gender,
            'dob' => $this->Student->dob,
            'class' => $this->Student->class,
            'course_id' => $this->courses
        ]);


        session()->flash('success', 'Student Created');
        $this->dispatchBrowserEvent('close-modal');
        $this->dispatchBrowserEvent('show-alert');
    }

    public function alterStudent()
    {
        $this->validate([
            'Student.name' => 'required|min:3',
            'Student.dob' => 'required|before:today|after:12/31/1985',
            'Student.gender' => 'required',
            'courses' => 'required',
        ]);

        User::where('id', $this->Student->user_id)
            ->update([
                'username' => $this->Student->name,
            ]);

        Student::where('id', $this->Student->id)
            ->update([
                'name' => $this->Student->name,
                'gender' => $this->Student->gender,
                'dob' => $this->Student->dob,
                'class' => $this->Student->class,
                'course_id' => $this->courses,
            ]);

        session()->flash('success', 'Student Updated');
        $this->dispatchBrowserEvent('close-modal');
        $this->dispatchBrowserEvent('show-alert');

    }

    public function addStudent(): void
    {
        $this->Student = new Student;
        $this->user = new User;

        $this->newStudent = true;
        $this->password = Str::random(10);
        $this->dispatchBrowserEvent('show-modal');
    }

    public function editStudent(Student $selected): void
    {
        $this->Student = $selected;
        $this->newStudent = false;
        $this->dispatchBrowserEvent('show-modal');
    }


    public function updated(): void
    {
        $this->validate();
    }

    public function mount()
    {
        $this->Student = new Student;
        $this->user = new User;
    }

    public function render()
    {
        return view('livewire.dashboard.admin.admin-student', [
            'Students' => Student::with('user', 'course')->get(),
            'offeredCourses' => Course::all()
        ])
            ->extends('layouts.admin');
    }
}
