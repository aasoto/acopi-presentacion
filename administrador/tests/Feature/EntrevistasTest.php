<?php

namespace Tests\Feature;

use App\EntrevistasModel;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class EntrevistasTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic feature test example.
     *
     * @return void
     */

    /** @test */
    public function interview_can_be_registered_in_the_site_web () {
        $response = $this->post('/pagina_web/entrevistas', [
            'titulo_entrevista'        => 'Prueba 1',
            'descripcion_entrevista'   => 'Descripción de las pruebas, probando funciones del aplicativo web.',
            'video_entrevista'          => 'https://www.youtube.com/watch?v=_GwqxAi_ly0',
        ]);

        $response->assertRedirect('/pagina_web/entrevistas');
        $response->assertStatus(302);

        $this->assertCount(1, EntrevistasModel::all());

        $entrevista = EntrevistasModel::first();
        $this->assertEquals($entrevista->titulo_entrevista, 'Prueba 1');
        $this->assertEquals($entrevista->descripcion_entrevista, 'Descripción de las pruebas, probando funciones del aplicativo web.');
        $this->assertEquals($entrevista->video_entrevista, 'https://www.youtube.com/embed/_GwqxAi_ly0');

    }

    /** @test */
    public function link_incorrecto_entrevista () {
        $response = $this->post('/pagina_web/entrevistas', [
            'titulo_entrevista'        => 'Prueba 1',
            'descripcion_entrevista'   => 'Descripción de las pruebas, probando funciones del aplicativo web.',
            'video_entrevista'          => 'https://styde.net/laravel-6-doc-pruebas-primeros-pasos/',
        ]);

        $response->assertRedirect('/pagina_web/entrevistas');
        $response->assertSessionHas('link-no-valido');
        //$response->assertStatus(404);

    }

    /** @test */

    public function listado_entrevistas(){
        EntrevistasModel::factory()->count(3)->create();

        $response = $this->get('/pagina_web/entrevistas');

        $response -> assertOk();

        $entrevistas = EntrevistasModel::all();

        $response->assertViewIs("paginas.pagina_web.entrevistas");
        $response->assertViewHas("entrevistas", $entrevistas);

    }

    /** @test */
    public function listar_una_entrevista(){
        $entrevista = EntrevistasModel::factory()->create();

        $response = $this->get('/pagina_web/entrevistas/'.$entrevista->id);

        $response -> assertOk();

        $entrevista = EntrevistasModel::first();

        $response->assertViewIs("paginas.pagina_web.entrevistas");
        //$response->assertRedirect("/pagina_web/entrevistas/".$entrevista->id);
        $response->assertViewHas(array("entrevista"), $entrevista);

    }

    /** @test */
    public function actualizar_entrevista(){
        $entrevista = EntrevistasModel::factory()->create();
        $response = $this->put("/pagina_web/entrevistas/".$entrevista->id, [
            'titulo_entrevista' => 'Prueba entrevista actualizada',
            'descripcion_entrevista' => 'Descripción actualizada',
            'video_entrevista' => 'https://www.youtube.com/watch?v=-FuQMoXBFbQ'
        ]);

        $this->assertCount(1, EntrevistasModel::all());

        $entrevista = $entrevista->fresh();

        $this->assertEquals($entrevista->titulo_entrevista, 'Prueba entrevista actualizada');
        $this->assertEquals($entrevista->descripcion_entrevista, 'Descripción actualizada');
        $this->assertEquals($entrevista->video_entrevista, 'https://www.youtube.com/watch?v=-FuQMoXBFbQ');
        $response->assertRedirect('/pagina_web/entrevistas');
        $response->assertSessionHas('ok-crear');
    }

    /** @test */
    public function eliminar_entrevista_de_listado(){
        $entrevista = EntrevistasModel::factory()->count(3)->create();
        $response = $this->delete("/pagina_web/entrevistas/1");
        $this->assertCount(2, EntrevistasModel::all());
    }

    /** @test */
    public function eliminar_entrevista_unica(){
        $entrevista = EntrevistasModel::factory()->create();
        $response = $this->delete("/pagina_web/entrevistas/".$entrevista->id);

        $this->assertCount(0, EntrevistasModel::all());
    }
}
