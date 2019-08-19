<?php

namespace LU;

use Illuminate\Database\Eloquent\Model;

class Schedual extends Model
{
    protected $fillable=[
        'day_of_week', 'starting_time',
        'ending_time'
    ];
    
    public function groups(){
        return $this->belongsToMany('LU\Group');
    }
}
