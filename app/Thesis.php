<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Thesis extends Model
{
    protected $fillable = [
        'title', 'content', 'user_id', 'category_id', 'description'
    ];



    public function category(){

        return $this->belongsTo('App\Category');
    }
    

    public function user(){

        return $this->belongsTo('App\User');
    }

    public function assignments(){

        return $this->hasMany('App\Assignment');
    }


    public function discusions(){

        return $this->hasMany('App\Discusion');
    }

    //------------------------------

    public function scopeFilterByCategories($builder){

        if (request()->query('category')){
    
            $category = Category::where('id', request()->query('category'))->first();
    
            if($category){
    
                return $builder->where('category_id', $category->id);
            }
    
            return $builder;

            }
    
        return $builder;
    }
    
  //-----------------------------------  
    
    public function isLocked() {

        return $this->description == 'lock'; 
    }

    public function isUnlocked() {

        return $this->description == 'unlocked'; 
    }

}
