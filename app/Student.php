<?php

namespace LU;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $fillable=[
        'language_id', 'Arabic_fullname', 'Foreign_fullname',
        'academic_year', 'note', 'has_L3_Course', 'branch',
        'major_id'
    ];
    
    
    public function user(){
        return $this->belongsTo('LU\User');
    }

    public function major(){
        return $this->belongsTo('LU\Major');
    }

    public function language(){
        return $this->belongsTo('LU\Language');
    }

    public function courses(){
        return $this->belongsToMany('LU\CourseLanguage')->withPivot('year_id');
    }

    public function groups(){
        return $this->belongsToMany('LU\Group')->withPivot(['is_active','leave_date','start_date']);
    }

    public function grades(){
        return $this->hasMany('LU\Grade');
    }

    public function attendances(){
        return $this->hasMany('LU\Attendance');
    }



}
