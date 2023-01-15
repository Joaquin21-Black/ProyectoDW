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
        Schema::create('detalle_egreso', function (Blueprint $table) {
            $table->id();
            $table->string('det_egr_lote');
            $table->string('det_egr_cantidad');
            $table->unsignedBigInteger('id_medicamento');
            $table->unsignedBigInteger('det_egreso_id');
            $table->foreign('id_medicamento')->references('id')->on('medicamento')->onDelete('cascade');
            $table->foreign('det_egreso_id')->references('id')->on('egreso')->onDelete('cascade');
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
