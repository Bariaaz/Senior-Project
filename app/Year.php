<?php

namespace LU;

use Illuminate\Database\Eloquent\Model;

class Year extends Model
{
    protected $fillable=[
        'year','current_year'
    ];

    public function groups(){
        return $this->hasMany('LU\Group');
    }

    public function grades(){
        return $this->hasMany('LU\Grades');
    }
}
