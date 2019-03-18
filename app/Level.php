<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Level extends Model
{
    public function nominees(){
        return $this->hasMany('App\Nominees');
    }
    public function users(){
        return $this->hasMany('App\User');
    }
}
