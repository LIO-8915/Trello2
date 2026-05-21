<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime'
    ];
    protected $primaryKey = 'id_usuario';

    public function tableros()
    {
        return $this->belongsToMany(Tablero::class, 'tablero_usuario', 'id_usuario', 'id_tablero')
                    ->withPivot('rol')
                    ->withTimestamps();
    }

    public function espacios()
    {
        // Relación Muchos a Muchos con Espacios
        return $this->belongsToMany(Espacio::class, 'espacio_usuario', 'id_usuario', 'id_espacio');
    }

    public function comentarios()
    {
        return $this->hasMany(Comentario::class, 'user_id', 'id_usuario');
    }
}
