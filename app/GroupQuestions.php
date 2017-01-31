<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class GroupQuestions extends Model {
    //use SoftDeletes;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'group_questions';

    protected $fillable = [
        'id', 'name', 'description', 'panel_title',
    ];

    public function questions() {
        return $this->belongsToMany('App\Question', 'group_has_question', 'group_id', 'question_id');
    }
}
