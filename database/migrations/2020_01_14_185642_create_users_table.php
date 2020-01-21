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
            
            $table->bigIncrements('id');
            $table->string('nombre');
            $table->string('apellidos');
            $table->string('direccion');
            $table->string('cedula')->unique();;
            $table->string('estado');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->date('fecha_nacimiento');
            $table->string('password');
            $table->string('foto')->default('img/default-user.png');
            $table->rememberToken();
            $table->unsignedBigInteger('id_titulo');
            $table->foreign('id_titulo')->references('id')->on('titulos');
            $table->unsignedBigInteger('id_parroquia');
            $table->foreign('id_parroquia')->references('id')->on('parroquias');
            $table->unsignedBigInteger('id_rol');
            $table->foreign('id_rol')->references('id')->on('rols');
            $table->unsignedBigInteger('id_escuela');
            $table->foreign('id_escuela')->references('id')->on('escuelas');
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
