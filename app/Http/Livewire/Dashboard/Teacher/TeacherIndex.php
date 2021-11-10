<?php

namespace App\Http\Livewire\Dashboard\Teacher;

use App\Models\Schedule;
use App\Models\Student;
use Livewire\Component;

class TeacherIndex extends Component
{
    public $Students;

    public function viewStudents($courseID)
    {
        $this->Students = Student::where('course_id', $courseID)->get();
        $this->dispatchBrowserEvent('show-modal');
    }

    public function mount()
    {
        $this->Students =  Student::with('user', 'course')->get();
    }

    public function render()
    {
        return view('livewire.dashboard.teacher.teacher-index', [
            'Schedules' => Schedule::with(['courseTeacher' => function ($query) {
                $query->where('teacher_id', auth()->id());
            }])->whereHas('courseTeacher', function ($query) {
                $query->where('teacher_id', auth()->id());
            })
                ->get()
        ])->extends('layouts.teacher');
    }
}
