<?php

namespace App\Http\Livewire\Dashboard\Admin;

use App\Models\Course;
use App\Models\CourseTeacher;
use App\Models\Teacher;
use App\Models\User;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Str;
use Livewire\Component;

class AdminTeacher extends Component
{
    public bool $newTeacher = false;

    public Teacher $teacher;
    public User $user;
    public $courses;
    public $password;

    protected array $rules = [
        'teacher.name' => 'required|min:3',
        'teacher.dob' => 'required|before:today|after:12/31/1985',
        'teacher.gender' => 'required',
        'courses' => 'required',
        'user.email' => 'required|email',
        'password' => 'required|min:4',
    ];

    public function createTeacher(): void
    {
        $this->validate();


        $id = User::create([
            'username' => $this->teacher->name,
            'email' => $this->user->email,
            'password' => $this->password,
            'usertype' => 2
        ])->id;

        Teacher::create([
            'id' => $id,
            'user_id' => $id,
            'name' => $this->teacher->name,
            'gender' => $this->teacher->gender,
            'dob' => $this->teacher->dob
        ]);

        foreach ($this->courses as $course) {
            CourseTeacher::create([
                'teacher_id' => $id,
                'course_id' => $course,
            ]);
        }

        session()->flash('success', 'Teacher Created');
        $this->dispatchBrowserEvent('close-modal');
        $this->dispatchBrowserEvent('show-alert');
    }

    public function alterTeacher()
    {
        $this->validate([
            'teacher.name' => 'required|min:3',
            'teacher.dob' => 'required|before:today|after:12/31/1985',
            'teacher.gender' => 'required',
            'courses' => 'required',
        ]);

        User::where('id', $this->teacher->user_id)
            ->update([
                'username' => $this->teacher->name,
            ]);

        Teacher::where('id', $this->teacher->id)
            ->update([
                'name' => $this->teacher->name,
                'gender' => $this->teacher->gender,
                'dob' => $this->teacher->dob
            ]);

            CourseTeacher::where('teacher_id',$this->teacher->id)->delete();
        foreach ($this->courses as $course) {
            CourseTeacher::create([
                'teacher_id' => $this->teacher->id,
                'course_id' => $course,
            ]);
        }

        session()->flash('success', 'Teacher Updated');
        $this->dispatchBrowserEvent('close-modal');
        $this->dispatchBrowserEvent('show-alert');

    }

    public function addTeacher(): void
    {
        $this->teacher = new Teacher;
        $this->user = new User;

        $this->newTeacher = true;
        $this->password = Str::random(10);
        $this->dispatchBrowserEvent('show-modal');
    }

    public function editTeacher(Teacher $selected)
    {
        $this->teacher = $selected;
        $this->newTeacher = false;
        $this->dispatchBrowserEvent('show-modal');
    }


    public function updated(): void
    {
        $this->validate();
    }

    public function mount(): void
    {
        $this->teacher = new Teacher;
        $this->user = new User;
    }

    public function render(): Factory|View|Application
    {
        return view('livewire.dashboard.admin.admin-teacher', [
            'teachers' => Teacher::with('user', 'courseTeacher')->get(),
            'offeredCourses' => Course::all()
        ])
            ->extends('layouts.admin');
    }
}
