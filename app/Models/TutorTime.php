<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TutorTime extends Model
{
    protected $guarded = [];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function bookedUser()
    {
        return $this->belongsTo(\App\Models\User::class, 'booked_user_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function tutor()
    {
        return $this->belongsTo(\App\Models\Tutor::class);
    }
}
