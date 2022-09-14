<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePagosMigration extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pagos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('codigo_recibo')->nullable();
            $table->integer('id_empresa');
            $table->integer('valor_deuda');
            $table->integer('valor_mes');
            $table->integer('valor_recibo');
            $table->string('mes_recibo', 10);
            $table->string('year_recibo', 10);
            $table->date('fecha_limite');
            $table->string('estado', 10);
            $table->integer('id_reporta')->nullable();
            $table->timestamp('fecha_reporte')->nullable();
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
        Schema::dropIfExists('pagos');
    }
}
