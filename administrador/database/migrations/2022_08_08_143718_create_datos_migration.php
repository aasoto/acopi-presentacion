<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDatosMigration extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('datos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('mes')->nullable();
            $table->integer('year')->nullable();
            $table->integer('empresas_activas');
            $table->integer('empresas_inactivas');
            $table->integer('empresas_nuevas');
            $table->integer('recibos_generados');
            $table->integer('recibos_pendientes');
            $table->integer('recibos_pagos');
            $table->integer('recibos_negociados');
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
        Schema::dropIfExists('datos');
    }
}
