<?php

namespace Tests\Feature;

use App\PaginaWebModel;
use App\MesesModel;
use App\IndicadoresModel;
use App\PagosModel;
use App\EmpresasModel;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class IndicadoresTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */

    /** @test */
    public function mostrar_indicadores_empresas(){
        PaginaWebModel::factory()->create();
        MesesModel::factory()->count(12)->create();
        IndicadoresModel::factory()->count(12)->create();
        $response = $this->get('/indicadores/empresas');
        $response -> assertOk();
        $indicadores = IndicadoresModel::all();
        $response->assertViewIs("paginas.indicadores.empresas");
        $response->assertViewHas("indicadores", $indicadores);
    }

    /** @test */
    public function mostrar_indicadores_pagos(){
        PaginaWebModel::factory()->create();
        MesesModel::factory()->count(12)->create();
        IndicadoresModel::factory()->count(12)->create();
        $response = $this->get('/indicadores/recibos');
        $response -> assertOk();
        $indicadores = IndicadoresModel::all();
        $response->assertViewIs("paginas.indicadores.recibos");
        $response->assertViewHas("indicadores", $indicadores);
    }

    /** @test */
    public function ingresar_indicadores(){
        MesesModel::factory()->count(12)->create();
        EmpresasModel::factory()->count(100)->create();
        PagosModel::factory()->count(300)->create();

        $response = $this->post('/indicadores/recibos');

        $this->assertCount(1, IndicadoresModel::all());
    }

    /** @test */
    public function actualizar_indicadores(){
        MesesModel::factory()->count(12)->create();
        EmpresasModel::factory()->count(100)->create();
        PagosModel::factory()->count(300)->create();

        $response = $this->post('/indicadores/recibos');

        $this->assertCount(1, IndicadoresModel::all());

        $indicadores = IndicadoresModel::first();

        $empresas_activas = $indicadores->empresas_activas;
        $empresas_inactivas = $indicadores->empresas_inactivas;

        for ($i=1; $i <= 100; $i++) {
            $this->delete("/empresas/general/".$i);
        }
        for ($i=1; $i <= 300; $i++) {
            $this->delete("/pagos/general/".$i);
        }
        EmpresasModel::factory(100)->create();
        PagosModel::factory(300)->create();

        $response = $this->put("/indicadores/recibos/".$indicadores->id);

        $this->assertCount(1, IndicadoresModel::all());

        $indicadores = $indicadores->fresh();
        $indicadores = IndicadoresModel::first();

        $this->assertNotEquals($indicadores->empresas_activas, $empresas_activas);
        $this->assertNotEquals($indicadores->empresas_inactivas, $empresas_inactivas);
    }
}
