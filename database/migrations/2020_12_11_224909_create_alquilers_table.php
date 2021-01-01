<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAlquilersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('alquilers', function (Blueprint $table) {
            $table->increments('id');
            $table->date('fe_inicio');
            $table->date('fe_entrega');
            $table->integer('id_empleado')->unsigned();
            $table->integer('id_cliente')->unsigned();
            $table->timestamps();

            $table->foreign('id_empleado')->references('id')->on('empleados');
            $table->foreign('id_cliente')->references('id')->on('clientes');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('alquilers');
    }
}
