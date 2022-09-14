<?php

namespace Tests\Feature;

use App\EventosModel;
use App\NoticiasModel;
use App\PaginaWebModel;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\UploadedFile;
use Tests\TestCase;

class EventosTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */

    /** @test */
    public function listar_eventos(){
        EventosModel::factory()->count(3)->create();

        $response = $this->get('/eventos/general');

        $response -> assertOk();

        $eventos = EventosModel::all();

        $response->assertViewIs("paginas.eventos.general");
        $response->assertViewHas("eventos", $eventos);
    }

    /** @test */
    public function insertar_evento(){
        $pagina_web = PaginaWebModel::factory()->create();
        $noticia = NoticiasModel::factory()->create();
        $this->assertCount(1, PaginaWebModel::all());
        $this->assertCount(1, NoticiasModel::all());
        $response = $this->post('/eventos/general', [
        'tipo_evento' => 'evento',
        'escenario' => 'prueba',
        'nombre' => 'Prueba 1',
        'portada_evento' => UploadedFile::fake()->image('imagenPrueba.jpg', 500, 500)->size(500),
        'descripcion' => 'Mauris lobortis magna erat varius enim vestibulum aliquam consequat mauris dliquam ligula faucibus imperdiet tortor.',
        'palabras_claves' => 'acopi,cesar,microempresarios,valledupar',
        'ruta' => 'prueba-1-acopi',
        'contenido_noticia' => 'Mauris lobortis magna erat varius enim vestibulum aliquam consequat mauris dliquam ligula faucibus imperdiet tortor.',
        'ponentes' => 'Andrés Soto',
        'patrocinadores' => 'Julio Herrera',
        'num_participantes' => '15',
        'allDay' => 'false',
        'fecha-inicio' => '2022-07-20',
        'hora-inicio' => '08:00',
        'fecha-final' => '2022-07-20',
        'hora-final' => '10:00',
        'color' => '#39cccc',
        ]);

        $response->assertRedirect('/eventos/general');
        //$response->assertStatus(302);

        $this->assertCount(1, EventosModel::all());
    }

    /** @test */
    public function insertar_actividad(){
        $response = $this->post('/eventos/general', [
        'tipo_evento' => 'actividad',
        'nombre' => 'Prueba 1',
        'tematica' => 'Mauris lobortis magna erat varius enim vestibulum aliquam consequat mauris dliquam ligula faucibus imperdiet tortor. ',
        'ponentes' => 'Andrés Soto',
        'patrocinadores' => 'Julio Herrera',
        'num_participantes' => '15',
        'fecha-inicio' => '2022-07-20',
        'hora-inicio' => '08:00:00',
        'fecha-final' => '2022-07-20',
        'hora-final' => '10:00:00',
        'actividad-color' => '#ABC845',
        'allDay' => 'false',
        ]);

        $response->assertRedirect('/eventos/general');
        //$response->assertStatus(302);

        $this->assertCount(1, EventosModel::all());
        $evento = EventosModel::first();
        $this->assertEquals($evento->nombre, 'Prueba 1');
    }

    /** @test */
    public function listar_un_evento(){
        $evento = EventosModel::factory()->create();

        $response = $this->get('/eventos/general/'.$evento->id);

        $response -> assertOk();

        $evento = EventosModel::first();

        $response->assertViewIs("paginas.eventos.general");
        //$response->assertRedirect("/pagina_web/entrevistas/".$entrevista->id);
        //$response->assertViewHas("evento", $evento);

    }

    /** @test */
    public function actualizar_evento(){
        $evento = EventosModel::factory()->create();
        $response = $this->put("/eventos/general/".$evento->id, [
            'editar-nombre' => 'Prueba 1 actualizada',
            'editar-tematica' => $evento->tematica,
            'editar-ponentes' => $evento->ponentes,
            'editar-patrocinadores' => $evento->patrocinadores,
            'editar-num_participantes' => '15',
            'editar-fecha-inicio' => '2022-07-20',
            'editar-hora-inicio' => '08:00:00',
            'editar-fecha-final' => '2022-07-20',
            'editar-hora-final' => '10:00:00',
            'editar-color' => $evento->backgroundColor,
            'editar-allDay' => $evento->allDay
        ]);

        $this->assertCount(1, EventosModel::all());

        $evento = $evento->fresh();

        $evento = EventosModel::first();
        $this->assertEquals($evento->nombre, 'Prueba 1 actualizada');
        $this->assertEquals($evento->num_participantes, '15');
        $this->assertEquals($evento->fecha_inicio, '2022-07-20');
        $response->assertRedirect('/eventos/general');
        $response->assertSessionHas('ok-actualizar');
    }

    /** @test */
    public function eliminar_evento_de_listado(){
        $evento = EventosModel::factory()->count(3)->create();
        $response = $this->delete("/eventos/general/1");
        $this->assertCount(2, EventosModel::all());
    }

    /** @test */
    public function eliminar_evento_unico(){
        $evento = EventosModel::factory()->create();
        $response = $this->delete("/eventos/general/".$evento->id);

        $this->assertCount(0, EventosModel::all());
    }
}
