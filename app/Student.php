<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $fillable=[
        'language', 'Arabic_fullname', 'Foreign_fullname',
        'academic_year', 'note', 'has_L3_Course', 'branch',
        'major_id'
    ];
    
    
    public function user(){
        return $this->belongsTo('App\User');
    }

    public function major(){
        return $this->belongsTo('App\Major');
    }



}
