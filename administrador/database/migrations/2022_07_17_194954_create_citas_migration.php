<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCitasMigration extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('citas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('tipo_usuario_cita', 10);
            $table->integer('id_empresa')->nullable();
            $table->string('cc_rprt_legal', 20)->nullable();
            $table->string('cc_interesado', 20)->nullable();
            $table->string('nombre_interesado', 100)->nullable();
            $table->date('fecha_cita');
            $table->time('hora_cita', 0);
            $table->string('area', 50);
            $table->string('estado_cita', 10);
            $table->string('color', 20);
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
        Schema::dropIfExists('citas');
    }
}
