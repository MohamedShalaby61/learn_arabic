<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
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
    public function country()
    {
        return $this->belongsTo(\App\Models\Country::class);
    }

    public function favorites()
    {
        return $this->hasManyThrough('App\Models\Tutor', 'App\Models\FavoriteTutor', 'student_id', 'id', 'id', 'tutor_id')->select(['tutors.id', 'tutors.name', 'tutors.title', 'tutors.image', 'tutors.rating', 'tutors.online']);
    }

    public function getImageAttribute($value)
    {
        if ($value && strpos($value, 'http') !== 0) {
            return url('uploads/' . $value);
        }

        return $value;
    }
    
    public function getInterestsAttribute($value)
    {
        if ($value) {
            return explode(',', $value);
        }

        return [];
    }
}
