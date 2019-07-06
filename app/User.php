<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;
    //const STUDENT = 'Student';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username', 'email', 'password','fileNumber','phone_Number',
        'role_id','is_active'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
         'password','remember_token',
    ];


    public function student(){
        return $this->hasOne('App\Student');
    }

    public function instructor(){
        return $this->hasOne('App\Instructor');
    }

    public function role(){
        return $this->belongsTo('App\Role');
    }

    public function isAdmin(){
        return $this->is_active && $this->role->name == "Administrator";
    }

    public function isInstructor(){
        return $this->is_active && $this->role->name == "Instructor";
    }   

    public function isStudent(){
        return $this->is_active && $this->role->name == "Student";
    }
}