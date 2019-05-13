<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    protected $fillable=[
        'name', 'course_language_id',
        'day_of_week', 'starting_time',
        'ending_time'
    ];
    public function course_language(){
        return $this->belongsTo('App\CourseLanguage');
    }

    public function students(){
        return $this->belongsToMany('App\Student')->withPivot(['is_active','start_date','leave_date']);    
    }

    public function instructors(){
        return $this->belongsToMany('App\Instructor')->withPivot(['is_active','start_date','leave_date']);
    }

    public function sessions(){
        return $this->hasMany('App\Session');
    }
}
