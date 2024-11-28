<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddEnderecoECidadeToApolicesTable extends Migration
{
    /**
     * Execute as migrações.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('apolices', function (Blueprint $table) {
            $table->string('endereco')->nullable();
            $table->string('cidade')->nullable();
        });
    }

    /**
     * Reverter as migrações.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('apolices', function (Blueprint $table) {
            $table->dropColumn(['endereco', 'cidade']);
        });
    }
}
