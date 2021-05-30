<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Softdeletes;
//use Esolution\DBEncryption\Traits\EcryptedAttribute;

class User extends Authenticatable
{
    use HasFactory, Notifiable;
    use Softdeletes;
    //use EcryptedAttribute;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    /*protected $encryptable = [
        'email'
    ];*/

    protected $primaryKey = 'id';

    protected $fillable = [
        'name',
        'email',
        'password', 
        'celular',
        'img',
        'aceptotc_c',
        'token_login',
        "deleted_at",
        "activo",
        "id_rol", 
    ];
    /*
name
email
password
celular
img
aceptotc_c
token_login
deleted_at
activo
id_rol
    */

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
