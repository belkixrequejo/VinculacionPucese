<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class objetivos extends Model
{
    protected $fillable = ['nombre','ponderacion','id_proyecto'];
    public function proyectos()
    {
    	return $this->hasMany('App\proyectos');
    }
}
