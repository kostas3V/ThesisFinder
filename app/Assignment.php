<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Assignment extends Model
{
    protected $fillable = [
        'thesis_id', 'user_id', 'flag',
    ];

    public function user(){

        return $this->belongsTo('App\User', 'user_id');  
    }

    public function thesis(){

        return $this->belongsTo('App\Thesis');  
    }
//--------------------------------------------

    public function isFlaged(){

        return $this->flag == '1';
    }


    public function isRequested(){

        return $this->flag == '0';
    }
}
