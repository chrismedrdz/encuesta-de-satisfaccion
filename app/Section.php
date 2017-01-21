<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    protected $fillable = [
        'id', 'name', 'questions_ids','description'
    ];

    public function question()
    {
        return $this->hasOne('App\Question', 'id', 'questions_ids','comments_required');
    }

}
