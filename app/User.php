<?php

namespace App;

use Illuminate\Notifications\Notifiable;
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
        'name', 'email', 'password', 'code', 'rols_id',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function info() {
        return $this->hasOne('App\UserInfo', 'user_id', 'id');
    }

    public function rol() {
        return $this->hasOne('App\Rol', 'id', 'rols_id');
    }

    public function school()
    {
        return $this->hasOne('App\School', 'id', 'school_id');
    }

    public function sector()
    {
        return $this->hasOne('App\Sector', 'id', 'sectors_id');
    }

    public function survey()
    {
        return $this->hasOne('App\Survey', 'id', 'survey_id');
    }

}
