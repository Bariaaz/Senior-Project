<?php

namespace LU;

use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    protected $fillable=[
        'student_id', 'session_id','attended_int',
        'note'
    ];

    public function student(){
        return $this->belongsTo('LU\Student');
    }

    public function session(){
        return $this->belongsTo('LU\Session');
    }
}
