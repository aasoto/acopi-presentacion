<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaginaWebMigration extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pagina_web', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('dominio');
            $table->text('servidor');
            $table->text('titulo_pestana');
            $table->text('titulo_pagina');
            $table->text('logo_navegacion');
            $table->text('logo_pestana');
            $table->text('titulo_navegacion');
            $table->text('descripcion');
            $table->text('palabras_claves');
            $table->text('carrusel');
            $table->text('proyectos');
            $table->text('noticias_intro');
            $table->text('aliados');
            $table->text('videos');
            $table->text('productos');
            $table->text('redes_sociales');
            $table->text('contacto');
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
        Schema::dropIfExists('pagina_web');
    }
}
