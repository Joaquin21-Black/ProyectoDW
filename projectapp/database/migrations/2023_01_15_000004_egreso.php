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
        Schema::create('egreso', function (Blueprint $table) {
            $table->id();
            $table->string('egre_fecha');
            $table->unsignedBigInteger('egre_centro_dist');
            $table->string('det_tra_lote');
            $table->unsignedBigInteger('egre_farmacia_id');
            $table->foreign('egre_centro_dist')->references('id')->on('centro_distribucion')->onDelete('cascade');
            $table->foreign('egre_farmacia_id')->references('id')->on('farmacia')->onDelete('cascade');
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
