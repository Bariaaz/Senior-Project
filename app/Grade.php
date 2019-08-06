<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Grade extends Model
{
    protected $fillable=[
        'student_id','exam_id',
        'grade','year_id','created_at','updated_at'
    ];
    public function student(){
        return $this->belongsTo('App\Student');
    }
    public function exam(){
        return $this->belongsTo('App\Exam');
    }
    public function year(){
        return $this->belongsTo('App\Year');
    }
}
