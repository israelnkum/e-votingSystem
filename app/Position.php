<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Position extends Model
{
    public function nominees(){
        return $this->hasMany('App\Nominee');
    }
}
