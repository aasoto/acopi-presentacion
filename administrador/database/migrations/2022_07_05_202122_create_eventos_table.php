<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('eventos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('nombre');
            $table->text('tematica');
            $table->text('ponentes');
            $table->text('patrocinadores');
            $table->integer('num_participantes');
            $table->date('fecha_inicio');
            $table->time('hora_inicio', 0);
            $table->date('fecha_final');
            $table->time('hora_final', 0);
            $table->string('backgroundColor', 20);
            $table->string('borderColor', 20);
            $table->string('allDay', 20);
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
        Schema::dropIfExists('eventos');
    }
}
