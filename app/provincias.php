<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class provincias extends Model
{
    protected $fillable = ['name','id_pais'];
    public function pais()
    {
    	return $this->belongsTo('App\pais');
    }
}
