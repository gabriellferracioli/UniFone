<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLigacoesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ligacoes', function (Blueprint $table) {
            $table->increments('Id_Ligacao');
            $table->integer('Id_Cliente');
            $table->integer('Id_Usuario');
            $table->string('Assunto_Ligacao');
            $table->string('Urgencia_Ligacao');
            $table->string('Observacoes_Ligacao');
            $table->integer('IligacaoMov_Ligacao');
            $table->integer('Ativo_Ligacao');
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
        Schema::dropIfExists('ligacoes');
    }
}
