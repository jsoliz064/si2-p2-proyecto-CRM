<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePagosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pagos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_pedido')->nullable();
            $table->foreign('id_pedido')->references('id')->on('pedidos')->onDelete('set null')->onUpdate('cascade');
            $table->unsignedBigInteger('id_tipopago')->nullable();
            $table->foreign('id_tipopago')->references('id')->on('tipo_de_pagos')->onDelete('set null')->onUpdate('cascade');
            $table->string('url')->nullable();
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
        Schema::dropIfExists('pagos');
    }
}
