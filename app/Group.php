<?php

namespace LU;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    protected $fillable=[
        'name', 'course_language_id',
        'year_id'
    ];
    public function course_language(){
        return $this->belongsTo('LU\CourseLanguage');
    }

    public function students(){
        return $this->belongsToMany('LU\Student')->withPivot(['is_active','start_date','leave_date']);    
    }

    public function instructors(){
        return $this->belongsToMany('LU\Instructor')->withPivot(['is_active','start_date','leave_date']);
    }

    public function sessions(){
        return $this->hasMany('LU\Session');
    }

    public function scheduals(){
        return $this->belongsToMany('LU\Schedual');
    }

    public function year(){
        return $this->belongsTo('LU\Year');
    }
}
