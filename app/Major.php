<?php

namespace LU;

use Illuminate\Database\Eloquent\Model;

class Major extends Model
{
    protected $fillable=[
        'name', 'display_name',
    ];

    public function students(){
        return $this->hasMany('LU\Student');
    }

    public function instructors(){
        return $this->hasMany('LU\Instructor');
    }

    public function courses(){
        return $this->hasMany('LU\Course');
    }



}
