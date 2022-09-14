<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmpleadosMigration extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('empleados', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('tipo_documento', 5);
            $table->string('num_documento', 30);
            $table->string('primer_nombre', 50);
            $table->string('segundo_nombre', 50)->nullable();
            $table->string('primer_apellido', 50);
            $table->string('segundo_apellido', 50);
            $table->string('sexo', 10);
            $table->date('fecha_nacimiento');
            $table->string('email', 200);
            $table->integer('id_rol');
            $table->string('estado', 20);
            $table->integer('id_usuario')->nullable();
            $table->text('foto')->nullable();
            $table->text('hoja_de_vida')->nullable();
            $table->text('cedula')->nullable();
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
        Schema::dropIfExists('empleados');
    }
}
