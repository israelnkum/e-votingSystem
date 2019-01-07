<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Nominee extends Model
{

    public function position(){
        return $this->belongsTo('App\Position');
    }

    public function level(){
        return $this->belongsTo('App\Level');
    }

    public function department(){
        return $this->belongsTo('App\Department');
    }



    public function voting(){
        return $this->belongsTo('App\Voting');
    }
}
