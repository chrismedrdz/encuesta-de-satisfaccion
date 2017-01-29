<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class GroupQuestions extends Model {
    use SoftDeletes;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'group_questions';

    protected $fillable = [
        'id', 'name', 'description',
    ];

    public function questions() {
        return $this->belongsToMany('App\Models\Question', 'group_has_question', 'group_id', 'question_id');
    }
}
