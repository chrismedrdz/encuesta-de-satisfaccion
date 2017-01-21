<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rol extends Model
{
    protected $fillable = [
        'id', 'name',
    ];

    
    public function user() {
    	return $this->belongsTo('App\User');
    }
    

    /*public function user() {
    	return $this->hasOne('App\User');
    }
    */
}
