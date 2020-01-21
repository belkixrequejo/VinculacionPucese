<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProyectosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('proyectos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nombre');
            $table->string('avance');
            $table->date('fechaInicio');
            $table->date('fechafinal');
            $table->unsignedBigInteger('id_tipo');
            $table->foreign('id_tipo')->references('id')->on('tipos');
            $table->unsignedBigInteger('id_solicitud');
            $table->foreign('id_solicitud')->references('id')->on('solicituds');
            $table->unsignedBigInteger('id_unesco');
            $table->foreign('id_unesco')->references('id')->on('unescos');
            $table->unsignedBigInteger('id_universidad');
            $table->foreign('id_universidad')->references('id')->on('universidads');
            $table->unsignedBigInteger('id_usuario');
            $table->foreign('id_usuario')->references('id')->on('users');
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
        Schema::dropIfExists('proyectos');
    }
}
