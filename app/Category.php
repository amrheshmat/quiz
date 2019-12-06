<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //
    public function quiz(){
        return $this->hasMany('App\Quiz');
    }
}
