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
        Schema::create('traspaso', function (Blueprint $table) {
            $table->id();
            $table->string('tras_estado');
            $table->unsignedBigInteger('tras_cd_origen');
            $table->unsignedBigInteger('tras_cd_destino');
            $table->foreign('tras_cd_origen')->references('id')->on('centro_distribucion')->onDelete('cascade');
            $table->foreign('tras_cd_destino')->references('id')->on('centro_distribucion')->onDelete('cascade');
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
