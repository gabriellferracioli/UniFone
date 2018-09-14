<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClientesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clientes', function (Blueprint $table) {
            $table->increments('id_Cliente');
            $table->string('CNPJ_Cliente');
            $table->string('Nome_Cliente');
            $table->string('Razaosocial_Cliente');
            $table->string('Municipio_Cliente');
            $table->string('Estado_Cliente');
            $table->string('Telefone1_Cliente');
            $table->string('Telefone2_Cliente');
            $table->integer('Ativo_Cliente');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('clientes');
    }
}
