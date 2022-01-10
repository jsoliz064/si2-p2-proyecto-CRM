<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCitasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('citas', function (Blueprint $table) {
            $table->id();
            $table->string('asunto');
            $table->string('descripcion');          
            $table->date('fecha')->nullable();
            $table->time('horaInicio')->nullable(); 
            $table->time('horaFin')->nullable(); 
          
            $table->unsignedBigInteger('idCliente');
            $table->unsignedBigInteger('idUsuario');
            $table->timestamps();
            $table->foreign('idCliente')->references('id')->on('clientes')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('idUsuario')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('citas');
    }
}
