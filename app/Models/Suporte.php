<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Suporte extends Model
{
    use HasFactory;

    // Definindo os campos que podem ser preenchidos
    protected $fillable = [
        'user_id',  // ID do usuário que fez a solicitação
        'mensagem', // Mensagem do usuário
        'status',   // Status da solicitação (pendente, resolvido, etc)
    ];

    // Relacionamento com o usuário
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Caso você queira personalizar o nome da tabela no banco, faça isso:
    // protected $table = 'suportes';
}
