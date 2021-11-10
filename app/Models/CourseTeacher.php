<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * App\Models\CourseTeacher
 *
 * @property-read \App\Models\Course $course
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Schedule[] $schedule
 * @property-read int|null $schedule_count
 * @property-read \App\Models\Teacher $teacher
 * @method static \Illuminate\Database\Eloquent\Builder|CourseTeacher newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CourseTeacher newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CourseTeacher query()
 * @mixin \Eloquent
 */
class CourseTeacher extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'id',
        'teacher_id',
        'course_id',
    ];

    public function teacher(): BelongsTo
    {
        return $this->belongsTo(Teacher::class,'teacher_id');
    }

    public function course(): BelongsTo
    {
        return $this->belongsTo(Course::class,'course_id');
    }

    public function schedule(): HasMany
    {
        return $this->hasMany(Schedule::class);
    }
}
