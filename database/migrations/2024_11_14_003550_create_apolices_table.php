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
        Schema::create('apolices', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('usuario_id')->unsigned();  // Ajusta para o tipo correto
            $table->foreign('usuario_id')->references('id')->on('users')->onDelete('cascade');  // Chave estrangeira para a tabela 'users'
            $table->foreignId('plano_id')->constrained()->onDelete('cascade');
            $table->enum('status', ['pendente', 'ativa', 'cancelada', 'expirada']);
            $table->decimal('valor', 8, 2);
            $table->text('descricao')->nullable();
            $table->boolean('alteracao')->default(false);
            $table->date('datainicio');
            $table->date('datafim');
            $table->timestamps();
        });
    }



    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('apolices');
    }
};
