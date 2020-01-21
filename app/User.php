<?php

namespace App;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nombre','apellidos','direccion','cedula','estado','email','fecha_nacimiento','password','id_titulo','id_parroquia','id_rol','id_escuela'
    ];

    public function titulos()
    {
        return $this->belongsTo('App\titulos');
    }
    public function parroquias()
    {
        return $this->belongsTo('App\parroquias');
    }
    public function rols()
    {
        return $this->belongsTo('App\rols');
    }
     public function escuelas()
    {
        return $this->belongsTo('App\escuelas');
    }

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

}
