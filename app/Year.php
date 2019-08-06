<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Year extends Model
{
    protected $fillable=[
        'year','current_year'
    ];

    public function groups(){
        return $this->hasMany('App\Group');
    }

    public function grades(){
        return $this->hasMany('App\Grades');
    }
}
