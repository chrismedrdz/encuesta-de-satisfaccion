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
        'name', 'email', 'password', 'rols_id',
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

    public function schools() {
        return $this->belongsToMany('App\Models\School', 'user_has_school', 'user_id', 'school_id');
    }

    public function rol() {
        return $this->hasOne('App\Rol', 'id', 'rols_id');
    }

    /**
     * Get the user that created the user.
     */
    public function creado_por() {
        //return $this->belongsTo('App\User', 'created_by', 'id')->withTrashed();
        return $this->belongsTo('App\User', 'created_by', 'id');
    }

    /**
     * Get the last user that updated the user.
     */
    public function actualizado_por() {
        //return $this->belongsTo('App\User', 'updated_by', 'id')->withTrashed();
        return $this->belongsTo('App\User', 'updated_by', 'id');
    }

}
