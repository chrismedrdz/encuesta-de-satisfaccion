<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    protected $fillable = [
        'id', 'name', 'questions_ids','description','comments_required'
    ];

    /*
    public function survey() {
    	return $this->belongsTo('App\Survey');
    }
    */

    public function question()
    {
        return $this->hasOne('App\Question', 'id', 'questions_ids');
    }

}
