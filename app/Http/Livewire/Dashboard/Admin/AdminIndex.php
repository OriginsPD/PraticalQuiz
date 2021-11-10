<?php

namespace App\Http\Livewire\Dashboard\Admin;

use App\Models\Course;
use App\Models\Student;
use App\Models\Teacher;
use Livewire\Component;

class AdminIndex extends Component
{
    public Course $Course;

    public $newCourse = false;

    protected array $rules = [
        'Course.course_nm' => 'required|min:3|unique:courses,course_nm',
    ];

    public function createCourse(): void
    {
        $this->validate();

        Course::create([
            'course_nm' => $this->Course->course_nm,
        ]);


        session()->flash('success', 'Course Created');
        $this->dispatchBrowserEvent('close-modal');
        $this->dispatchBrowserEvent('show-alert');
    }

    public function alterCourse()
    {
        $this->validate();

        Course::where('id', $this->Course->id)
            ->update([
                'course_nm' => $this->Course->course_nm,
            ]);

        session()->flash('success', 'Course Updated');
        $this->dispatchBrowserEvent('close-modal');
        $this->dispatchBrowserEvent('show-alert');

    }

    public function addCourse(): void
    {
        $this->Course = new Course;

        $this->newCourse = true;

        $this->dispatchBrowserEvent('show-modal');
    }

    public function editCourse(Course $selected): void
    {


        $this->Course = $selected;

        $this->newCourse = false;

        $this->dispatchBrowserEvent('show-modal');
    }


    public function updated(): void
    {
        $this->validate();
    }

    public function mount()
    {
        $this->Course = new Course;

    }

    public function render()
    {
        return view('livewire.dashboard.admin.admin-index',[
            'Students' => Student::with('user', 'course')->get(),
            'teachers' => Teacher::with('user', 'courseTeacher')->get(),
            'offeredCourses' => Course::all()
        ])
            ->extends('layouts.admin');
    }
}
