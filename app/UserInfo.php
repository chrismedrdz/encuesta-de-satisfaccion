<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserInfo extends Model
{
    protected $table="users_info";
    protected $fillable=['name', 'lastname1', 'lastname2', 'school_id', 'sector_id','student_name', 'student_lastname1', 'student_lastname2', 'student_grupo'];

    public function user() {
        return $this->belongsTo('App\User');
    }
}