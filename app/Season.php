<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Season extends Model
{
    protected $fillable = ['title','serial_id','short_desc','date_start','img'];

    public function serie(){
        return $this->hasMany('App\Serie');
    }

    public function serial(){
        return $this->hasOne('App\Serial');
    }
}
