<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'api_token', 'type'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function profile()
    {
        try {
            if (empty($this->fk_id)) {
                return $this->hasOne('App\Models\Student', 'id', 'fk_id');
            }
            
            switch ($this->type) {
                case 1:
                    return [];
                case 2:
                    return $this->hasOne('App\Models\Tutor', 'id', 'fk_id');
                case 3:
                    return $this->hasOne('App\Models\Student', 'id', 'fk_id');
            }
        } catch (ModelNotFoundException $e) {
            return 'Exception';
        }

    }
}
