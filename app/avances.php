<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class avances extends Model
{
    protected $fillable = ['nombre','estado','porcentaje','id_actividad',];

    public function actividades()
    {
    	return $this->hasMany('App\actividades');
    }
}
