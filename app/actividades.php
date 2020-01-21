<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class actividades extends Model
{
    protected $fillable = ['nombre','id_objetivo'];
    public function objetivos()
    {
    	return $this->hasMany('App\objetivos');
    }
}
