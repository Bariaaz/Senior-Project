<?php

namespace LU;

use Illuminate\Database\Eloquent\Model;

class Language extends Model
{
    protected $fillable=[
        'name'
    ];

    public function courses(){
        return $this->belongsToMany('LU\Course')->withPivot('id');
    }
    
    public function students(){
        return $this->hasMany('LU\Student');
    }
}
