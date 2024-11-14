<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSuporteTable extends Migration
{
    public function up()
    {
        Schema::create('suporte', function (Blueprint $table) {
            $table->id();                               // ID do ticket
            $table->string('titulo');                    // Título do ticket
            $table->text('descricao');                   // Descrição do ticket
            $table->enum('status', ['Aberto', 'Em andamento', 'Fechado'])->default('Aberto'); // Status do ticket
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // Relacionamento com a tabela users
            $table->timestamps();                        // created_at e updated_at
        });
    }

    public function down()
    {
        Schema::dropIfExists('suporte');
    }
}
