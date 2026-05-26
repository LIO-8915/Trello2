<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * Los atributos que son asignables masivamente (Mass Assignable).
     * Es indispensable que 'name', 'email' y 'password' estén aquí
     * para que el método User::create() no los ignore.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * Los atributos que deben ocultarse para las serializaciones (como respuestas JSON).
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * El mapeo y conversión de tipos de datos de la base de datos.
     * * CRÍTICO: Se eliminó o comentó 'password' => 'hashed' para evitar 
     * que Laravel encripte automáticamente el string en texto plano.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed', 
    ];
}