<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $fillable=[
        'course_code', 'description', 'semester_id'
    ];

    public function semester(){
        return $this->belongsTo('App\Semester');
    }

    public function languages(){
        return $this->belongsToMany('App\Language')->withPivot('id');
    }

    public function major(){
        return $this->belongsTo('App\Major');
    }
}
