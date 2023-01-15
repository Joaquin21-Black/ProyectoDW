<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detalle_ingreso', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_medicamento');
            $table->string('det_ing_cantidad');
            $table->string('det_ing_lote');
            $table->unsignedBigInteger('det_ingreso_id');
            $table->foreign('id_medicamento')->references('id')->on('medicamento')->onDelete('cascade');
            $table->foreign('det_ingreso_id')->references('id')->on('ingreso')->onDelete('cascade');
       });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
};
