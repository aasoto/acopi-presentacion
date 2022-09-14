<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmpleadosAfiliadosMigration extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('empleados_afiliados', function (Blueprint $table) {
            $table->bigIncrements('id_empleado_afiliado');
            $table->text('tipo_doc_empleado_afiliado');
            $table->text('cc_empleado_afiliado');
            $table->text('primer_nombre');
            $table->text('segundo_nombre')->nullable();
            $table->text('primer_apellido');
            $table->text('segundo_apellido');
            $table->text('cargo_empleado_afiliado');
            $table->date('fecha_nacimiento');
            $table->integer('id_empresa_afiliado');
            $table->text('nit_empresa_afiliado');
            $table->text('imagen_cedula');
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
        Schema::dropIfExists('empleados_afiliados');
    }
}
