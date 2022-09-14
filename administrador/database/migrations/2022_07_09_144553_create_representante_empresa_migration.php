<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRepresentanteEmpresaMigration extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('representante_empresa', function (Blueprint $table) {
            $table->bigIncrements('id_rprt_legal');
            $table->text('tipo_documento_rprt');
            $table->text('cc_rprt_legal');
            $table->text('primer_nombre');
            $table->text('segundo_nombre');
            $table->text('primer_apellido');
            $table->text('segundo_apellido');
            $table->date('fecha_nacimiento');
            $table->text('sexo_rprt');
            $table->text('email_rprt');
            $table->string('telefono_rprt', 20);
            $table->text('foto_rprt');
            $table->text('foto_cedula_rprt');
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
        Schema::dropIfExists('representante_empresa');
    }
}
