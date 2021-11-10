<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * App\Models\Schedule
 *
 * @property-read \App\Models\CourseTeacher $courseTeacher
 * @method static \Illuminate\Database\Eloquent\Builder|Schedule newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Schedule newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Schedule query()
 * @mixin \Eloquent
 */
class Schedule extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'course_teacher_id',
        'start_time',
        'end_time',
    ];

    protected $casts = [
        'start_time' => 'datetime',
        'end_time' => 'datetime'
    ];

    public function courseTeacher(): BelongsTo
    {
        return $this->belongsTo(CourseTeacher::class)->with('course','teacher');
    }

}
