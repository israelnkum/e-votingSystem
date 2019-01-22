<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NomineeToken extends Model
{
    public  function department(){
        return $this->belongsTo('App\Department');
    }

    public  function voting(){
        return $this->belongsTo('App\Voting');
    }
}
