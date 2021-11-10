<?php

namespace App\Http\Livewire\Dashboard\Admin;

use App\Models\CourseTeacher;
use App\Models\Schedule;
use Livewire\Component;

class AdminSchedule extends Component
{
    public Schedule $Schedule;
    public $courses;

    public $newSchedule = false;

    protected array $rules = [
        'Schedule.course_teacher_id' => 'required',
        'Schedule.day' => 'required',
        'Schedule.time' => 'required',

    ];

    public function createSchedule(): void
    {
        $this->validate();


        Schedule::create([
            'course_teacher_id' => $this->Schedule->course_teacher_id,
            'day' => $this->Schedule->day,
            'time' => $this->Schedule->time,

        ]);


        session()->flash('success', 'Schedule Created');
        $this->dispatchBrowserEvent('close-modal');
        $this->dispatchBrowserEvent('show-alert');
    }

    public function alterSchedule()
    {
        $this->validate();

        Schedule::where('id', $this->Schedule->id)
            ->update([
                'course_teacher_id' => $this->Schedule->course_teacher_id,
                'day' => $this->Schedule->day,
                'time' => $this->Schedule->time,
            ]);

        session()->flash('success', 'Schedule Updated');
        $this->dispatchBrowserEvent('close-modal');
        $this->dispatchBrowserEvent('show-alert');

    }

    public function addSchedule(): void
    {
        $this->Schedule = new Schedule;


        $this->newSchedule = true;

        $this->dispatchBrowserEvent('show-modal');
    }

    public function editSchedule(Schedule $selected): void
    {
        $this->Schedule = $selected;
        $this->newSchedule = false;
        $this->dispatchBrowserEvent('show-modal');
    }


    public function updated(): void
    {
        $this->validate();
    }

    public function mount()
    {
        $this->Schedule = new Schedule;

    }


    public function render()
    {
        return view('livewire.dashboard.admin.admin-schedule', [
            'Schedules' => Schedule::with('courseTeacher')->get(),
            'offeredCourses' => CourseTeacher::with('teacher', 'course')->get(),
        ])->extends('layouts.admin');
    }
}
