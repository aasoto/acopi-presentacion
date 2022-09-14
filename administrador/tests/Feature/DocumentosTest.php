<?php

namespace Tests\Feature;

use App\EmpresasModel;
use App\RepresentanteEmpresaModel;
use App\EmpleadosModel;
use App\PaginaWebModel;
use App\RolesModel;
use App\TipoDocumentoModel;
use App\SectorEmpresaModel;
use App\MunicipiosModel;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\UploadedFile;
use Tests\TestCase;

class DocumentosTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */

    /** @test */
    public function listar_empresas(){
        PaginaWebModel::factory()->create();
        EmpresasModel::factory()->count(100)->create();
        RepresentanteEmpresaModel::factory()->count(100)->create();

        $response = $this->get('/documentos/empresas');

        $response -> assertOk();

        $pagina_web = PaginaWebModel::first();

        $response->assertViewIs("paginas.documentos.empresas");
        $response->assertViewHas("servidor", $pagina_web["servidor"]);
    }

    /** @test */
    public function listar_empleados(){
        PaginaWebModel::factory()->create();
        EmpleadosModel::factory()->count(20)->create();
        RolesModel::factory()->count(7)->create();

        $response = $this->get('/documentos/empleados');

        $response -> assertOk();

        $pagina_web = PaginaWebModel::first();

        $response->assertViewIs("paginas.documentos.empleados");
        $response->assertViewHas("servidor", $pagina_web["servidor"]);
    }

    /** @test */
    public function mostrar_documentos_empresa(){
        PaginaWebModel::factory()->create();
        $response = $this->post('/afiliados/general', [
            'escenario' => 'prueba',
            'tipo_documento' => 'cedula',
            'numero_documento' => '123456789',
            'primer_nombre' => 'Marciana',
            'segundo_nombre' => 'María',
            'primer_apellido' => 'Lopez',
            'segundo_apellido' => 'Mejía',
            'sexo' => 'f',
            'fecha_nacimiento' => '1990-03-01',
            'correo_electronico' => 'mlopez@gmail.com',
            'telefono' => '5843295',
            'foto' => UploadedFile::fake()->image('fotoPrueba.png', 500, 500)->size(500),
            'archivo_documento' => UploadedFile::fake()->image('documentoPrueba.jpg', 500, 500)->size(500),
        ]);

        $response->assertRedirect('/afiliados/general');

        $this->assertCount(1, RepresentanteEmpresaModel::all());

        $sector = SectorEmpresaModel::factory()->create();
        $municipio = MunicipiosModel::factory()->create();
        $response = $this->post('/afiliados/empresas', [
            'accion' => 'agregarEmpresaAfiliado',
            'nit' => '548329453-4',
            'razon_social' => 'Ferretería La Palmas',
            'num_empleados' => '10',
            'direccion' => 'Cra 7 No. 16-45',
            'telefono' => '5843295',
            'fax' => '5843295',
            'celular' => '3205483592',
            'correo_electronico' => 'ferrepalmas@gmail.com',
            'sector_empresa' => $sector->id,
            'productos' => 'ladrillos,varillas,cementos,pintura,grevilla,herramientas de construccion',
            'ciudad' => $municipio->abreviatura,
            'fecha_afiliacion' => '2022-01-01',
            'carta_bienvenida' => UploadedFile::fake()->create('carta_bienvenida.pdf'),
            'acta_compromiso' => UploadedFile::fake()->create('acta_compromiso.pdf'),
            'estudio_afiliacion' => UploadedFile::fake()->create('estudio_afiliacion.pdf'),
            'rut' => UploadedFile::fake()->create('rut.pdf'),
            'camara_comercio' => UploadedFile::fake()->create('camara_comercio.pdf'),
            'fechas_birthday' => UploadedFile::fake()->create('fechas_birthday.pdf'),
        ]);

        $response->assertRedirect('/afiliados/ingresarAfiliado');

        $afiliado = RepresentanteEmpresaModel::first();
        $empresa = EmpresasModel::first();

        $response = $this->put("/afiliados/consultarEmpresas/".$empresa->id_empresa, [
            'cedula' => $afiliado->cc_rprt_legal,
            'nit' => $empresa->nit_empresa,
            'razon_social' => $empresa->razon_social,
            'num_empleados' => $empresa->num_empleados,
            'direccion' => $empresa->direccion_empresa,
            'telefono' => $empresa->telefono_empresa,
            'fax' => $empresa->fax_empresa,
            'celular' => $empresa->celular_empresa,
            'correo_electronico' => $empresa->email_empresa,
            'sector_empresa' => $empresa->id_sector_empresa,
            'productos' => "ladrillos,varillas,cementos,pintura,grevilla,herramientas de construccion",
            'ciudad' => $empresa->ciudad_empresa,
            'fecha_afiliacion' => $empresa->fecha_afiliacion_empresa,
            'carta_bienvenida_actual' => $empresa->carta_bienvenida,
            'carta_bienvenida' => '',
            'acta_compromiso_actual' => $empresa->acta_compromiso,
            'carta_compromiso' => '',
            'estudio_afiliacion_actual' => $empresa->estudio_afiliacion,
            'estudio_afiliacion' => '',
            'rut_actual' => $empresa->rut,
            'rut' => '',
            'camara_comercio_actual' => $empresa->camara_comercio,
            'camara_comercio' => '',
            'fechas_birthday_actual' => $empresa->fechas_birthday,
            'fechas_birthday' => '',
        ]);

        $this->assertCount(1, EmpresasModel::all());

        $empresa = $empresa->fresh();

        $empresa = EmpresasModel::first();

        $response = $this->get('/documentos/empresas/'.$empresa->id_empresa);

        $response -> assertOk();

        $representante_empresa = RepresentanteEmpresaModel::first();
        $pagina_web = PaginaWebModel::first();
        $pdf = strpos($representante_empresa["foto_cedula_rprt"], "pdf");
        if ($pdf !== false) {
            $tipo_cedula = "pdf";
        } else {
            $tipo_cedula = "imagen";
        }

        $response->assertViewIs("paginas.documentos.empresas");
        $response->assertViewHas(array("empresa"), $empresa);
        $response->assertViewHas(array("representante_empresa"), $representante_empresa);
        $response->assertViewHas(array("servidor"), $pagina_web["servidor"]);
        $response->assertViewHas(array("tipo_cedula"), $tipo_cedula);
    }

    /** @test */
    public function mostrar_documentos_empleado(){
        PaginaWebModel::factory()->create();
        $empleado = EmpleadosModel::factory()->create();

        $empleado = EmpleadosModel::first();
        $response = $this->get('/documentos/empleados/'.$empleado->num_documento);

        $response -> assertOk();

        $pdf = strpos($empleado["cedula"], "pdf");
        if ($pdf !== false) {
            $tipo_cedula = "pdf";
        } else {
            $tipo_cedula = "imagen";
        }

        $pagina_web = PaginaWebModel::first();

        $response->assertViewIs("paginas.documentos.empleados");
        $response->assertViewHas(array("empleado"), $empleado);
        $response->assertViewHas(array("servidor"), $pagina_web["servidor"]);
        $response->assertViewHas(array("tipo_cedula"), $tipo_cedula);
    }
}
