<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class cantons extends Model
{
    protected $fillable = ['name','id_provincia'];
    public function provincias()
    {
    	return $this->belongsTo('App\provincias');
    }
}
