<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserSurvey extends Model
{
    protected $table="users_survey";
    protected $fillable=['name', 'lastname1', 'lastname2', 'school_id', 'sector_id','student_name', 'student_lastname1', 'student_lastname2', 'student_grupo','survey_answered'];

    public function user() {
        return $this->belongsTo('App\User');
    }
}