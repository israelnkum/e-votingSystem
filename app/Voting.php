<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Voting extends Model
{
    public function  nominees(){
        return $this->hasMany('App\Nominees');
    }

    public function  department(){
        return $this->belongsTo('App\Department');
    }

    public  function users(){
        return $this->hasMany('App\User');
    }

    public  function token(){
        return $this->hasMany('App\NomineeToken');
    }

    public function eligible(){
        return $this->hasMany('App\Eligible');
    }

}
