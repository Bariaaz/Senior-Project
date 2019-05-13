<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Session extends Model
{
    protected $fillable=[
        'day_of_week', 'starting_time', 'ending_time',
        'note','group_id', 'session_date'
    ];

    public function group(){
        return $this->belongsTo('App\Group');
    }
    
    public function attendances(){
        return $this->hasMany('App\Attendance');
    }
    
}
