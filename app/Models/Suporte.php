<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Suporte extends Model
{
    use HasFactory;

    protected $primaryKey = 'id'; // Certifique-se de que o nome do campo da chave primária está correto

    protected $table = 'suporte'; // Nome da tabela

    protected $fillable = ['titulo', 'mensagem', 'status', 'user_id']; // Campos preenchíveis

    // Relacionamento com o usuário
    public function user()
    {
        return $this->belongsTo(User::class); // Relação com o modelo User
    }
}

