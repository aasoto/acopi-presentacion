<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmpresasMigration extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('empresas', function (Blueprint $table) {
            $table->bigIncrements('id_empresa');
            $table->text('nit_empresa');
            $table->text('razon_social');
            $table->text('cc_rprt_legal')->nullable();
            $table->integer('num_empleados');
            $table->text('direccion_empresa');
            $table->text('telefono_empresa');
            $table->text('fax_empresa')->nullable();
            $table->text('celular_empresa')->nullable();
            $table->text('email_empresa');
            $table->integer('id_sector_empresa');
            $table->text('productos_empresa')->nullable();
            $table->text('ciudad_empresa');
            $table->text('estado_afiliacion_empresa')->nullable();
            $table->integer('numero_pagos_atrasados')->nullable();
            $table->date('fecha_afiliacion_empresa')->nullable();
            $table->text('carta_bienvenida')->nullable();
            $table->text('acta_compromiso')->nullable();
            $table->text('estudio_afiliacion')->nullable();
            $table->text('rut')->nullable();
            $table->text('camara_comercio')->nullable();
            $table->text('fechas_birthday')->nullable();
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
        Schema::dropIfExists('empresas');
    }
}
