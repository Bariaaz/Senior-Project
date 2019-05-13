<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    protected $fillable=[
        'student_id', 'session_id','attended_int',
        'note'
    ];

    public function student(){
        return $this->belongsTo('App\Student');
    }

    public function session(){
        return $this->belongsTo('App\Session');
    }
}
