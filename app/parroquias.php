<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class parroquias extends Model
{
    protected $fillable = ['name','id_canton'];
    public function cantons()
    {
    	return $this->belongsTo('App\cantons');
    }
}
