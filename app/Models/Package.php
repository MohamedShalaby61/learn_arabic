<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    public $timestamps = false;
    protected $guarded = [];
    
    public function getNameAttribute($value)
    {
        if (app()->getLocale() == 'ar') {
           return $this->name_ar; 
        }
        
        return $value;
    }
    
    public function getNoteAttribute($value)
    {
        if (app()->getLocale() == 'ar') {
           return $this->note_ar; 
        }
        
        return $value;
    }
}
