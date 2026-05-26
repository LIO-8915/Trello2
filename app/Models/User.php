<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    // Nombre de la tabla en tu archivo SQL
    protected $table = 'users';

    // Campos que permitimos registrar masivamente (cumpliendo con tu DB)
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    // Ocultar campos sensibles al convertir a arreglos o JSON
    protected $hidden = [
        'password',
        'remember_token',
    ];

    // Casteo automático de tipos de datos de Laravel
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}