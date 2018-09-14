<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->integer('Id_Usuario');
            $table->increments('id');
            $table->string('Nome_Usuario');
            $table->integer('Ramal_Usuario');
            $table->string('Cargo_Usuario');
            $table->string('Usuario_Usuario')->unique();
            $table->string('Senha_Usuario');
            $table->integer('Ativo_Usuario');
            $table->string('name');
            $table->string('email');
            $table->string('password');
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
