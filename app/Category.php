<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
        'id', 'name','abrev',
    ];

    public function section() {
    	return $this->belongsTo('App\Section');
    }
}
