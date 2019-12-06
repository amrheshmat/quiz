<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Quiz extends Model
{
    //
     public function category(){
        return $this->belongTo('App\Category');
    }
      public function question(){
        return $this->hasMany('App\Questions');
    }
}
