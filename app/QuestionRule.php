<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class QuestionRule extends Model
{
    protected $table = 'rules';
    protected $fillable = [
        'id', 'action',
    ];

    public function question() {
        return $this->belongsTo('App\Question');
    }
}
