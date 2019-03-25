<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'department_id','voting_id','role','name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public  function voting(){
        return $this->belongsTo('App\Voting');
    }

    public function department(){
        return $this->belongsTo('App\Department');
    }

    public  function level(){
        return $this->belongsTo('App\Level');
    }

    public function eligible(){
        return $this->hasMany('App\Eligible');
    }
}
