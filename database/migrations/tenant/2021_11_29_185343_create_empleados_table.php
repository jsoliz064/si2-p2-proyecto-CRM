<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmpleadosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('empleados', function (Blueprint $table) {
            $table->id();
            $table->string('ci');
            $table->string('telefono')->nullable();
            $table->char('sexo')->nullable();
            //$table->unsignedBigInteger('id_empresa');
            $table->unsignedBigInteger('id_user');
            $table->foreign('id_user')->references('id')->on('users')->ondelete('cascade')->onupdate('cascade');
            //$table->foreign('id_empresa')->references('id')->on('empresas')->ondelete('cascade')->onupdate('cascade');
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
        Schema::dropIfExists('empleados');
    }
}
