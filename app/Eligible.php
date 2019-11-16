<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Eligible extends Model
{
    public function voters(){
        return $this->hasMany('App\User');
    }

    public function voting(){
        return $this->belongsTo('App\Voting');
    }
}
