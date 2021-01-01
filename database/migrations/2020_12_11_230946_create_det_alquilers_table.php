<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDetAlquilersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('det_alquilers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('estado');
            $table->integer('id_salon')->unsigned();
            $table->integer('id_alquiler')->unsigned();
            $table->timestamps();

            $table->foreign('id_salon')->references('id')->on('re_salons');
            $table->foreign('id_alquiler')->references('id')->on('alquilers');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('det_alquilers');
    }
}
