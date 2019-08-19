<?php

namespace LU;

use Illuminate\Database\Eloquent\Model;

class Grade extends Model
{
    protected $fillable=[
        'student_id','exam_id',
        'grade','year_id','created_at','updated_at'
    ];
    public function student(){
        return $this->belongsTo('LU\Student');
    }
    public function exam(){
        return $this->belongsTo('LU\Exam');
    }
    public function year(){
        return $this->belongsTo('LU\Year');
    }
}
