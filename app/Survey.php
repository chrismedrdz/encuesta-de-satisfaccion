<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Survey extends Authenticatable {
    /*
    public function section()
    {
        return $this->hasOne('App\Section', 'id', 'sections_ids');
    }
    */

    protected $fillable = [
        'id','name', 'code', 'sections_id', 'rols_id',
    ];

    protected $hidden = [
        'remember_token',
    ];

    public function user() {
    	return $this->belongsTo('App\User');
    }
}
