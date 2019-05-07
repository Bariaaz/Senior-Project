<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CourseLanguage extends Model
{
    protected $table='course_language';
    protected $fillable=[
        'course_id', 'language_id'
    ];
    
    public function course(){
        return $this->belongsTo('App\Course');
    }

    public function language(){
        return $this->belongsTo('App\Language');
    }
     public function students(){
         return $this->belongsToMany('App\Student');
     }

     public function instructors(){
         return $this->belongsToMany('App\Instructor');
     }

     public function groups(){
         return $this->hasMany('App\Group');
     }

     public function exams(){
        return $this->hasMany('App\Exam');
    }
}
