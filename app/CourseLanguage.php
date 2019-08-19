<?php

namespace LU;

use Illuminate\Database\Eloquent\Model;

class CourseLanguage extends Model
{
    protected $table='course_language';
    protected $fillable=[
        'course_id', 'language_id'
    ];
    
    public function course(){
        return $this->belongsTo('LU\Course');
    }

    public function language(){
        return $this->belongsTo('LU\Language');
    }
     public function students(){
         return $this->belongsToMany('LU\Student');
     }

     public function instructors(){
         return $this->belongsToMany('LU\Instructor');
     }

     public function groups(){
         return $this->hasMany('LU\Group');
     }

     public function exams(){
        return $this->hasMany('LU\Exam');
    }
}
