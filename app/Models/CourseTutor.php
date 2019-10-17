<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CourseTutor extends Model
{
    protected $fillable = ['course_id','tutor_id'];
    public $timestamps = false;
}
