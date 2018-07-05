<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Serie extends Model
{
    protected $fillable = ['title','season_id','short_desc','date_start','img','video'];
}
