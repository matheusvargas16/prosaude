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
        Schema::table('suporte', function (Blueprint $table) {
            $table->text('resolucao')->nullable();  // Campo para armazenar a resolução
        });
    }

    public function down()
    {
        Schema::table('suporte', function (Blueprint $table) {
            $table->dropColumn('resolucao');
        });
    }

};
