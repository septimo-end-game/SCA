<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
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
        'name','a_paterno','a_materno','email','matricula',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];


//Query Scopes declarados para filtar los registros y facilitar el uso de eloquent
    public function scopeElementos($query)
    {
        return $query->where('rol', 'elementos');
    }

    public function scopeEmpleados($query)
    {
        return $query->where('rol', 'empleados');
    }

    public function scopeAdministradores($query)
    {
        return $query->where('rol', 'Administrador');
    }
//Scope para buscar
    public function scopeMatricula($query,  $matricula)
    {
       if (trim($matricula) != "") {
           $query->where('matricula', "LIKE", "%$matricula%");
       }
       
       
    }

}
