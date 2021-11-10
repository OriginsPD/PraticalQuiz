<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * App\Models\Course
 *
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\CourseTeacher[] $courseTeacher
 * @property-read int|null $course_teacher_count
 * @property-read \App\Models\Student $student
 * @method static \Illuminate\Database\Eloquent\Builder|Course newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Course newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Course query()
 * @mixin \Eloquent
 */
class Course extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'course_nm',

    ];

    public function student(): HasMany
    {
        return $this->hasMany(Student::class,'course_id');
    }

    public function courseTeacher(): HasMany
    {
        return $this->hasMany(CourseTeacher::class,'teacher_id')->with('schedule');
    }
}
