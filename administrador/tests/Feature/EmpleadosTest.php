<?php

namespace Tests\Feature;

use App\EmpleadosModel;
use App\TipoDocumentoModel;
use App\GeneroModel;
use App\RolesModel;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\UploadedFile;
use Tests\TestCase;

class EmpleadosTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */

    /** @test */
    public function listar_empleados_EmpleadosTest(){
        //prêt
        EmpleadosModel::factory()->count(3)->create();
        GeneroModel::factory()->count(2)->create();
        TipoDocumentoModel::factory()->create();
        RolesModel::factory()->count(3)->create();
        $response = $this->get('/empleados/general');

        $response -> assertOk();

        $generos = GeneroModel::all();
        $this->assertCount(2, GeneroModel::all());
        $tipos_documentos = TipoDocumentoModel::all();
        $this->assertCount(1, TipoDocumentoModel::all());
        $roles = RolesModel::all();
        $this->assertCount(3, RolesModel::all());

        $response->assertViewIs("paginas.empleados.general");
        $response->assertViewHas("generos", $generos);
        $response->assertViewHas("tipos_documentos", $tipos_documentos);
        $response->assertViewHas("roles", $roles);
    }

    /** @test */
    public function ingresar_empleado_EmpleadosTest(){
        $tipo_documento = TipoDocumentoModel::factory()->create();
        RolesModel::factory()->count(3)->create();
        $rol = RolesModel::first();
        $response = $this->post('/empleados/general', [
            'escenario' => 'prueba',
            'tipo_documento' => $tipo_documento->codigo_doc,
            'num_documento' => '123456789',
            'primer_nombre' => 'Mario',
            'segundo_nombre' => 'Jose',
            'primer_apellido' => 'De las casas',
            'segundo_apellido' => 'e Iturbide',
            'genero' => 'M',
            'fecha_nacimiento' => '1990-02-04',
            'email' => 'macasasitu@gmail.com',
            'id_rol' => $rol->id,
            'estado' => 'Empleado',
            'foto' => UploadedFile::fake()->image('fotoEmpleado.jpg', 500, 500)->size(500),
            'hoja_de_vida' => UploadedFile::fake()->create('hojaDeVida.pdf'),
            'cedula' => UploadedFile::fake()->image('cedula.jpg', 500, 500)->size(500),
        ]);

        $response->assertRedirect('/empleados/general');

        $this->assertCount(1, EmpleadosModel::all());
        $response->assertSessionHas('ok-crear');
    }

    /** @test */
    public function mostrar_un_empleado(){
        //prêt
        EmpleadosModel::factory()->count(3)->create();
        $empleado = EmpleadosModel::first();
        GeneroModel::factory()->count(2)->create();
        TipoDocumentoModel::factory()->create();
        RolesModel::factory()->count(3)->create();

        $response = $this->get('/empleados/general/'.$empleado->id);

        $response -> assertOk();

        $empleado = EmpleadosModel::where("id", $empleado->id)->get();
        $empleados = EmpleadosModel::all();
        $generos = GeneroModel::all();
        $tipos_documentos = TipoDocumentoModel::all();
        $roles = RolesModel::all();

        $pdf = strpos($empleado[0]["cedula"], "pdf");
            if ($pdf !== false) {
                $tipo_cedula = "pdf";
            } else {
                $tipo_cedula = "imagen";
            }

        $response->assertViewIs("paginas.empleados.general");
        $response->assertViewHas(array("empleado"), $empleado);
        $response->assertViewHas(array("empleados"), $empleados);
        $response->assertViewHas(array("roles"), $roles);
        $response->assertViewHas(array("generos"), $generos);
        $response->assertViewHas(array("tipos_documentos"), $tipos_documentos);
        $response->assertViewHas(array("tipo_cedula"), $tipo_cedula);
    }

    /** @test */
    public function actualizar_empleado(){
        //prêt
        $tipo_documento = TipoDocumentoModel::factory()->create();
        $genero = GeneroModel::factory()->create();
        $rol = RolesModel::factory()->create();

        $response = $this->post('/empleados/general', [
            'escenario' => 'prueba',
            'tipo_documento' => $tipo_documento->codigo_doc,
            'num_documento' => '123456789',
            'primer_nombre' => 'Mario',
            'segundo_nombre' => 'Jose',
            'primer_apellido' => 'De las casas',
            'segundo_apellido' => 'e Iturbide',
            'genero' => 'M',
            'fecha_nacimiento' => '1990-02-04',
            'email' => 'macasasitu@gmail.com',
            'id_rol' => $rol->id,
            'estado' => 'Empleado',
            'foto' => UploadedFile::fake()->image('fotoEmpleado.jpg', 500, 500)->size(500),
            'hoja_de_vida' => UploadedFile::fake()->create('hojaDeVida.pdf'),
            'cedula' => UploadedFile::fake()->image('cedula.jpg', 500, 500)->size(500),
        ]);

        $empleado = EmpleadosModel::first();

        $response = $this->put("/empleados/general/".$empleado->id, [
            'escenario' => 'prueba',
            'tipo_documento' => $tipo_documento->codigo_doc,
            'num_documento' => $empleado->num_documento,
            'primer_nombre' => 'Ernesto',
            'segundo_nombre' => $empleado->segundo_nombre,
            'primer_apellido' => 'Martinez',
            'segundo_apellido' => $empleado->segundo_apellido,
            'genero' => $genero->codigo_genero,
            'fecha_nacimiento' => '1990-09-15',
            'email' => $empleado->email,
            'id_rol' => $rol->id,
            'estado' => $empleado->estado,
            'foto_actual' => $empleado->foto,
            'foto' => UploadedFile::fake()->image('fotoEmpleado.jpg', 500, 500)->size(500),
            'hoja_de_vida_actual' => $empleado->hoja_de_vida,
            'hoja_de_vida' => UploadedFile::fake()->create('hojaDeVida.pdf'),
            'cedula_actual' => $empleado->cedula,
            'cedula' => UploadedFile::fake()->image('cedula.jpg', 500, 500)->size(500),
        ]);

        $this->assertCount(1, EmpleadosModel::all());

        $empleado = $empleado->fresh();

        $empleado = EmpleadosModel::first();
        $this->assertEquals($empleado->tipo_documento, $tipo_documento->codigo_doc);
        $this->assertEquals($empleado->primer_nombre, 'Ernesto');
        $this->assertEquals($empleado->primer_apellido, 'Martinez');
        $this->assertEquals($empleado->sexo, $genero->codigo_genero);
        $this->assertEquals($empleado->fecha_nacimiento, '1990-09-15');
        $this->assertEquals($empleado->id_rol, $rol->id);
        $response->assertRedirect('/empleados/general');
        $response->assertSessionHas('ok-editar');
    }

    /** @test */
    public function eliminar_empleado_de_listado(){
        //prêt
        EmpleadosModel::factory()->count(3)->create();
        $this->delete("/empleados/general/1");
        $this->assertCount(2, EmpleadosModel::all());
    }

    /** @test */
    public function eliminar_empleado_unico(){
        //prêt
        $empleado = EmpleadosModel::factory()->create();
        $this->delete("/empleados/general/".$empleado->id);

        $this->assertCount(0, EmpleadosModel::all());
    }
}
