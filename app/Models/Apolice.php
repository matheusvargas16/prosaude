<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Apolice extends Model
{
    use HasFactory;

    // Definindo os campos que podem ser preenchidos
    protected $fillable = [
        'user_id',   // ID do usuário que comprou o plano
        'plano_id',  // ID do plano comprado
        'status',    // Status da apólice (pendente, ativa, cancelada)
        'inicio',    // Data de início da apólice
        'fim',       // Data de término da apólice (se aplicável)
    ];

    // Relacionamento com o usuário
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Relacionamento com o plano
    public function plano()
    {
        return $this->belongsTo(Plano::class);
    }

    // Caso você queira personalizar o nome da tabela no banco, faça isso:
    // protected $table = 'apolices';
}
