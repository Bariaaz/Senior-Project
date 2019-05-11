<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Exam extends Model
{
    protected $fillable=[
        'course_language_id', 'name', 'display_name',
        'max_grade', 'exam_date','is_written_exam',
        'is_session_one'
    ];

    protected $dates = ['exam_date'];

    public function course_language(){
        return $this->belongsTo('App\CourseLanguage');
    }

    public function grades(){
        return $this->hasMany('App\Grade');
    }
}
