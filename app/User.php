<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'info', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function theses(){

        return $this->hasMany('App\Thesis', 'user_id');
    }

    public function assignments(){

        return $this->hasMany('App\Assignment');
    }

    public function discusions(){

        return $this->hasMany('App\Discusion');
    }

    public function replies(){

        return $this->hasMany('App\Reply');
    }

    //--------------------------------------------------

    public function isAdmin(){

        return $this->role == 'admin';
    }


}
