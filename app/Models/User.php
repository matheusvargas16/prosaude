<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;


class User extends Authenticatable
{
    use Notifiable;

    use HasRoles;

    protected $fillable = [
        'name',
        'email',
        'password',
        'cpf',
        'datanascimento',
        'telefone',
        'endereco',
        'historicomedico',
        // Adicione outros campos aqui
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function apolice()
    {
        return $this->hasMany(Apolice::class);
    }


    public function isAdmin()
    {
        return $this->role === 'admin';
    }

}

