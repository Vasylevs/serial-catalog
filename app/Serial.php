<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Serial extends Model
{
    protected $fillable = ['title','short_desc','all_desc','director','actors','date_start','img'];

    public function season(){
        return $this->hasMany('App\Season');
    }
}
