<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CourseLessonComment extends Model
{
    protected $guarded = [];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function user()
    {
        return $this->belongsTo(\App\Models\User::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function courseLesson()
    {
        return $this->belongsTo(\App\Models\CourseLesson::class);
    }
}
