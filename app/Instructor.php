<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Instructor extends Model
{
    protected $fillable=[
        'fullname','major_id' 

    ];


    public function user(){
        return $this->belongsTo('App\User');
    }

    public function major(){
        return $this->belongsTo('App\Major');
    }
   
    public function courses(){
        return $this->belongsToMany('App\CourseLanguage');
    }

    public function groups(){
        return $this->belongsToMany('App\Group')->withPivot(['is_active', 'start_date', 'leave_date']);
    }
}
