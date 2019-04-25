<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Semester extends Model
{
    protected $fillable = [
        'name', 'display_name', 'is_one_year_semester','academic_year'
    ];

    public function courses(){
        return $this->hasMany('App\Course');
    }
}
