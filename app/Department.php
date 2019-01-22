<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    public  function voting(){
        return $this->hasMany('App\Voting');
    }

    public  function nominees(){
        return $this->hasMany('App\Department');
    }

    public  function users(){
        return $this->hasMany('App\User');
    }

    public  function token(){
        return $this->hasMany('App\NomineeToken');
    }
}
