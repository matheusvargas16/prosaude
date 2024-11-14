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
        Schema::table('planos', function (Blueprint $table) {
            $table->string('tipo', 50)->change();  // Altere conforme necessário
        });
    }

    public function down()
    {
        Schema::table('planos', function (Blueprint $table) {
            $table->string('tipo', 255)->change(); // O valor original ou outro tipo adequado
        });
    }

};
