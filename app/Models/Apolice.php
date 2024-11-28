<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Apolice extends Model
{
    use HasFactory;

    // Definindo os campos que podem ser preenchidos
    protected $fillable = [
        'usuario_id',
        'plano_id',
        'preco',
        'status',
        'datainicio',
        'datafim',
        'endereco', 
        'cidade',   
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
