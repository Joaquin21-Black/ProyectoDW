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
        Schema::create('stock_cd', function (Blueprint $table) {
            $table->id();
            $table->string('scd_cantidad');
            $table->string('scd_lote');
            $table->unsignedBigInteger('scd_id_medicamento');
            $table->unsignedBigInteger('scd_centro_dist');
            $table->foreign('scd_id_medicamento')->references('id')->on('medicamento')->onDelete('cascade');
            $table->foreign('scd_centro_dist')->references('id')->on('centro_distribucion')->onDelete('cascade');
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
