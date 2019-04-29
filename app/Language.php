<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Language extends Model
{
    protected $fillable=[
        'name'
    ];

    public function courses(){
        return $this->belongsToMany('App\Course')->withPivot('id');
    }
    
    public function students(){
        return $this->hasMany('App\Student');
    }
}
