<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class proyectos extends Model
{
     protected $fillable = ['nombre','avance','fechaInicio','fechafinal','id_tipo','id_solicitud','id_unesco','id_universidad','id_usuario'];
    public function tipos()
    {
    	return $this->hasMany('App\tipos');
    }
    public function solicituds()
    {
    	return $this->hasMany('App\solicituds');
    }
     public function unescos()
    {
    	return $this->hasMany('App\unescos');
    }
     public function universidads()
    {
    	return $this->hasMany('App\universidads');
    }
     public function users()
    {
    	return $this->hasMany('App\users');
    }
}
