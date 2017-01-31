<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $fillable = [
        'id', 'description','options','required','rule_id','question_type','init_hidden',
    ];

    public function type() {
        return $this->hasOne('App\QuestionType', 'id', 'question_type');
    }

    public function rule() {
        return $this->hasOne('App\QuestionRule', 'id', 'rule_id');
    }
}
