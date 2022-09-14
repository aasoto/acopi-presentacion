<?php

namespace Tests\Feature;

use App\RepresentanteEmpresaModel;
use App\EmpresasModel;
use App\PaginaWebModel;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\UploadedFile;
use Tests\TestCase;

class AfiliadosTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */

    /** @test */
    public function listar_afiliados(){
        //prêt
        PaginaWebModel::factory()->create();
        RepresentanteEmpresaModel::factory()->count(3)->create();
        EmpresasModel::factory()->count(3)->create();
        $response = $this->get('/afiliados/general');

        $response -> assertOk();

        $afiliados = RepresentanteEmpresaModel::all();
        $this->assertCount(3, RepresentanteEmpresaModel::all());

        $response->assertViewIs("paginas.afiliados.general");
        $response->assertViewHas("afiliados", $afiliados);
    }

    /** @test */
    public function insertar_afiliado(){
        //prêt
        $response = $this->post('/afiliados/general', [
            'escenario' => 'prueba',
            'tipo_documento' => 'cedula',
            'numero_documento' => '1065831073',
            'primer_nombre' => 'Andres',
            'segundo_nombre' => 'Alfredo',
            'primer_apellido' => 'Soto',
            'segundo_apellido' => 'Suarez',
            'sexo' => 'm',
            'fecha_nacimiento' => '1997-02-13',
            'correo_electronico' => 'aasoto@gmail.com',
            'telefono' => '5726106',
            'foto' => UploadedFile::fake()->image('fotoPrueba.png', 500, 500)->size(500),
            'archivo_documento' => UploadedFile::fake()->image('documentoPrueba.jpg', 500, 500)->size(500),
        ]);

        $response->assertRedirect('/afiliados/general');
        //$response->assertStatus(302);

        $this->assertCount(1, RepresentanteEmpresaModel::all());
    }

    /** @test */
    public function listar_un_afiliado(){
        //prêt
        $afiliado = RepresentanteEmpresaModel::factory()->create();
        PaginaWebModel::factory()->create();
        $response = $this->get('/afiliados/general/'.$afiliado->id);

        $response -> assertOk();

        $afiliado = RepresentanteEmpresaModel::first();

        $response->assertViewIs("paginas.afiliados.general");
        $response->assertViewHas(array("afiliado"), $afiliado);

    }

    /** @test */
    public function actualizar_afiliado(){
        //prêt
        $afiliado = RepresentanteEmpresaModel::factory()->create();
        $response = $this->put("/afiliados/general/".$afiliado->id, [
            'tipo_documento' => $afiliado->tipo_documento_rprt,
            'numero_documento' => '123456789',
            'primer_nombre' => 'Augusto',
            'segundo_nombre' => 'Cesar',
            'primer_apellido' => $afiliado->primer_apellido,
            'segundo_apellido' => $afiliado->segundo_apellido,
            'fecha_nacimiento' => $afiliado->fecha_nacimiento,
            'sexo' => 'm',
            'correo_electronico' => 'cesaraugusto@gmail.com',
            'telefono' => $afiliado->telefono_rprt,
            'foto_actual' => $afiliado->foto_rprt,
            'archivo_documento_actual' => $afiliado->foto_cedula_rprt
        ]);

        $this->assertCount(1, RepresentanteEmpresaModel::all());

        $afiliado = $afiliado->fresh();

        $afiliado = RepresentanteEmpresaModel::first();
        $this->assertEquals($afiliado->cc_rprt_legal, '123456789');
        $this->assertEquals($afiliado->primer_nombre, 'Augusto');
        $this->assertEquals($afiliado->segundo_nombre, 'Cesar');
        $this->assertEquals($afiliado->sexo_rprt, 'm');
        $this->assertEquals($afiliado->email_rprt, 'cesaraugusto@gmail.com');
        $response->assertRedirect('/afiliados/general');
        $response->assertSessionHas('ok-editar');
    }

    /** @test */
    public function eliminar_afiliado_de_listado(){
        //prêt
        RepresentanteEmpresaModel::factory()->count(3)->create();
        $this->delete("/afiliados/general/1");
        $this->assertCount(2, RepresentanteEmpresaModel::all());
    }

    /** @test */
    public function eliminar_afiliado_unico(){
        //prêt
        $afiliado = RepresentanteEmpresaModel::factory()->create();
        $this->delete("/afiliados/general/".$afiliado->id);

        $this->assertCount(0, RepresentanteEmpresaModel::all());
    }
}
