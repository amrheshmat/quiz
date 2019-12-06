<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Questions extends Model
{
    //
     public function quiz(){
        return $this->belongTo('App\Quiz');
    }
}
