<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNoticiasMigration extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('noticias', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('categoria');
            $table->text('portada_noticia');
            $table->string('titulo', 200);
            $table->text('descripcion_noticia');
            $table->text('p_claves_noticia');
            $table->text('ruta_noticia');
            $table->text('contenido_noticia');
            $table->integer('vistas_noticia')->nullable();
            $table->timestamp('fecha_noticia')->nullable();
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
        Schema::dropIfExists('noticias');
    }
}
