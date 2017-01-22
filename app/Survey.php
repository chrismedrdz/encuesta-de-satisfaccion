<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Survey extends Model
{
    protected $fillable = [
        'id', 'name', 'sections_ids',
    ];

    /*
    public function section()
    {
        return $this->hasOne('App\Section', 'id', 'sections_ids');
    }
    */

    public function user() {
    	return $this->belongsTo('App\User');
    }
}
