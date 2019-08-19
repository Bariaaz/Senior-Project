<?php

namespace LU;

use Illuminate\Database\Eloquent\Model;

class Instructor extends Model
{
    protected $fillable=[
        'fullname','major_id'

    ];


    public function user(){
        return $this->belongsTo('LU\User');
    }

    public function major(){
        return $this->belongsTo('LU\Major');
    }
   
    public function courses(){
        return $this->belongsToMany('LU\CourseLanguage')->withPivot('year_id');
    }

    public function groups(){
        return $this->belongsToMany('LU\Group')->withPivot(['is_active', 'start_date', 'leave_date']);
    }
}
