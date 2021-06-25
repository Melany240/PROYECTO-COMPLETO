<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;


    public $table = 'users';
    protected $primaryKey='clie_id';
    public $timestamps=false;


    

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'clie_telefono',
        'clie_correo',
        'clie_cedula',
        'clie_genero',
        'clie_direccion',
        'clie_tipo',
        'clie_estadocivil',
        'clie_usuario',
        'clie_fenac'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'name' =>'string',
        'email'=>'string',
        'password'=>'string',
        'clie_telefono'=>'string',
        'clie_correo'=>'string',
        'clie_cedula'=>'string',
        'clie_genero'=>'string',
        'clie_direccion'=>'string',
        'clie_tipo'=>'string',
        'clie_estadocivil'=>'string',
        'clie_usuario'=>'string',
        'clie_fenac'=>'date'
    ];
}