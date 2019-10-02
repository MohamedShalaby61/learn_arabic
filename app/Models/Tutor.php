<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tutor extends Model
{
    protected $guarded = [];

    public function getLevelsAttribute($value = '')
    {
        if ($value) {
            return explode(',', $value);
        }

        return [];
    }

    public function getCertificatesAttribute($value = '')
    {
        if ($value) {
            return explode(',', $value);
        }

        return [];
    }

    public function getSpeaksAttribute($value = '')
    {
        if ($value) {
            return explode(',', $value);
        }

        return [];
    }
    
    public function getEnjoysDiscussingAttribute($value = '')
    {
        if ($value) {
            return explode(',', $value);
        }

        return [];
    }

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

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function lessonsType()
    {
        return $this->belongsTo(\App\Models\LessonsType::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function tutoringPersonality()
    {
        return $this->belongsTo(\App\Models\TutoringPersonality::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function accent()
    {
        return $this->belongsTo(\App\Models\Accent::class);
    }

    public function specialities()
    {
        return $this->hasManyThrough(\App\Models\Speciality::class, \App\Models\TutorSpeciality::class, 'tutor_id', 'id', 'id', 'speciality_id');
    }

    public function getImageAttribute($value)
    {
        if ($value && strpos($value, 'http') !== 0) {
            return url('uploads/' . $value);
        }

        return $value;
    }

    public function getRatingAttribute($value)
    {
        if (!$value) {
            return 0;
        }

        return $value;
    }
}
