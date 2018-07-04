<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Season extends Model
{
    public function serie(){
        return $this->hasMany('App\Serie');
    }
}
