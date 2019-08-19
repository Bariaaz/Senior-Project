<?php

namespace LU;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $fillable=[
        'course_code', 'description', 'semester_id'
    ];

    public function semester(){
        return $this->belongsTo('LU\Semester');
    }

    public function languages(){
        return $this->belongsToMany('LU\Language')->withPivot('id');
    }

    public function major(){
        return $this->belongsTo('LU\Major');
    }
}
