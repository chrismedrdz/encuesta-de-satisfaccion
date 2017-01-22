<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class QuestionType extends Model
{
	protected $table = 'questions_type';
    protected $fillable = [
        'id', 'name','high_rank','na_active',
    ];

    public function question() {
        return $this->belongsTo('App\Question');
    }
}
