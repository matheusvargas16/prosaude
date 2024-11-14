<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('suporte', function (Blueprint $table) {
            $table->id('id_ticket');            // id do ticket (chave primária personalizada)
            $table->enum('status', ['aberto', 'em andamento', 'fechado']); // Status do ticket de suporte
            $table->timestamp('datacriacao')->useCurrent(); // Data de criação do ticket
            $table->text('descricao');          // Descrição do ticket
            $table->timestamps();              // Campos created_at e updated_at
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('suporte');
    }
};
