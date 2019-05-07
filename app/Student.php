<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $fillable=[
        'language_id', 'Arabic_fullname', 'Foreign_fullname',
        'academic_year', 'note', 'has_L3_Course', 'branch',
        'major_id'
    ];
    
    
    public function user(){
        return $this->belongsTo('App\User');
    }

    public function major(){
        return $this->belongsTo('App\Major');
    }

    public function language(){
        return $this->belongsTo('App\Language');
    }

    public function courses(){
        return $this->belongsToMany('App\CourseLanguage');
    }

    public function groups(){
        return $this->belongsToMany('App\Group')->withPivot(['is_active','leave_date','start_date']);
    }



}