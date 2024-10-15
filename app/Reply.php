<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reply extends Model
{
    protected $fillable = [
        'content', 'discusion_id', 'user_id' 
    ];


    public function user(){

        return $this->belongsTo('App\User');
    }

    public function discusion(){

        return $this->belongsTo('App\Discusion');
    }
}
