<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    protected $fillable=[
        'name', 'course_language_id',
        'year_id'
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

    public function scheduals(){
        return $this->belongsToMany('App\Schedual');
    }

    public function year(){
        return $this->belongsTo('App\Year');
    }
}
