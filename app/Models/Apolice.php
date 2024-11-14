<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Apolice extends Model
{
    use HasFactory;

    // Definindo os campos que podem ser preenchidos
    protected $fillable = [
        'usuario_id',   // ID do usuário que comprou o plano
        'plano_id',  // ID do plano comprado
        'preco',
        'status',    // Status da apólice (pendente, ativa, cancelada)
        'datainicio',    // Data de início da apólice
        'datafim',       // Data de término da apólice (se aplicável)
    ];

    public function usuario()
    {
        return $this->belongsTo(User::class, 'usuario_id');
    }

    // Relacionamento com o usuário
    // No modelo Apolice
    // No modelo Apolice
    public function plano()
    {
        return $this->belongsTo(Plano::class, 'plano_id'); // Ajuste conforme o nome da chave estrangeira
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }


    // Caso você queira personalizar o nome da tabela no banco, faça isso:
    // protected $table = 'apolices';
}
