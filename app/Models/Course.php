<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Course extends Model
{
    use SoftDeletes;
    protected $guarded = [];

    public function tutors()
    {
        return $this->hasManyThrough('App\Models\Tutor', 'App\Models\CourseTutor', 'course_id', 'id', 'id', 'tutor_id');
    }

    public function lessons()
    {
        return $this->hasMany('App\Models\CourseLesson');
    }

    public function getImageAttribute($value)
    {
        if ($value && strpos($value, 'http') !== 0) {
            return url('images/' . $value);
        }

        return $value;
    }
    
    public function getTitleAttribute($value)
    {
        if (app()->getLocale() == 'ar') {
           return $this->title_ar;
        }
        
        return $value;
    }
    
    public function getDescriptionAttribute($value)
    {
        if (app()->getLocale() == 'ar') {
           return $this->description_ar;
        }
        
        return $value;
    }
    
    public function getSuitableForAttribute($value)
    {
        if (app()->getLocale() == 'ar') {
           return $this->suitable_for_ar;
        }
        
        return $value;
    }
}
