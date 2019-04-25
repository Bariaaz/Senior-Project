<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Major extends Model
{
    protected $fillable=[
        'name', 'display_name',
    ];

    public function students(){
        return $this->hasMany('App\Student');
    }

    public function instructors(){
        return $this->hasMany('App\Instructor');
    }



}
