<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Result extends Model
{
    public function nominees(){
        return $this->belongsTo('App\Nominee');
    }
}
