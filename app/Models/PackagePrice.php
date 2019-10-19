<?php

namespace App\Models;

use App\Models\Student;
use Illuminate\Database\Eloquent\Model;

class PackagePrice extends Model
{
    public $timestamps = false;
    protected $guarded = [];
    protected $table='package_prices';

    public function student()
    {
        return $this->belongsTo(Student::class);
    }
}
