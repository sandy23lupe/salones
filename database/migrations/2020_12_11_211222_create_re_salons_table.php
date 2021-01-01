<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReSalonsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('re_salons', function (Blueprint $table) {
            $table->increments('id');
            $table->string('direccion');
            $table->string('tamaño');
            $table->integer('id_tipos')->unsigned();
            $table->timestamps();

            $table->foreign('id_tipos')->references('id')->on('tipos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('re_salons');
    }
}
