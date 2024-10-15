<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Discusion extends Model
{
    protected $fillable = [
        'subject', 'info', 'user_id', 'thesis_id', 'password'
    ];

    protected $hidden = [
        'password', 
    ];

    public function thesis(){
        
        return $this->belongsTo('App\Thesis');
    }

    public function user(){
        
        return $this->belongsTo('App\User');
    }

    public function replies(){

        return $this->hasMany('App\Reply');
    }

}
