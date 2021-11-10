<?php

namespace App\Http\Livewire\Dashboard\Student;

use App\Models\Schedule;
use App\Models\Student;
use Livewire\Component;

class StudentIndex extends Component
{
    public function render()
    {
        $courseID = Student::where('user_id',auth()->id())->get();


        return view('livewire.dashboard.student.student-index',[

            'Schedules' => Schedule::with(['courseTeacher' => function ($query) use ($courseID) {
                $query->where('course_id', $courseID[0]->course_id);
            }])->whereHas('courseTeacher', function ($query) use ($courseID) {
                $query->where('course_id', $courseID[0]->course_id);
            })
                ->get()
        ])
            ->extends('layouts.student');
    }
}
