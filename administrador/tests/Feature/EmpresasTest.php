<?php

namespace Tests\Feature;

use App\EmpresasModel;
use App\RepresentanteEmpresaModel;
use App\SectorEmpresaModel;
use App\PaginaWebModel;
use App\EmpleadosAfiliadosModel;
use App\PagosModel;
use App\PagosParametrosModel;
use App\MunicipiosModel;
use App\RolesModel;
use App\UsuariosModel;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\DB;
use Tests\TestCase;

class EmpresasTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */

    /** @test */
    public function listar_empleados_empresas(){
        PaginaWebModel::factory()->create();
        EmpresasModel::factory()->count(100)->create();
        EmpleadosAfiliadosModel::factory()->count(1000)->create();

        $response = $this->get('/afiliados/afiliadosEmpleados');

        $response -> assertOk();

        $empleados = EmpleadosAfiliadosModel::all();

        $response->assertViewIs("paginas.afiliados.afiliadosEmpleados");
        $response->assertViewHas("empleados", $empleados);
    }

    /** @test */
    public function listar_empresas_EmpresasTest(){
        SectorEmpresaModel::factory()->count(7)->create();
        MunicipiosModel::factory()->count(5)->create();
        RepresentanteEmpresaModel::factory()->count(100)->create();
        EmpresasModel::factory()->count(100)->create();
        PaginaWebModel::factory()->create();

        $response = $this->get('/afiliados/consultarEmpresas');

        $response -> assertOk();

        $sector_empresa = SectorEmpresaModel::all();
        $municipios = MunicipiosModel::all();
        $paginaweb = PaginaWebModel::all();

        $response->assertViewIs("paginas.afiliados.consultarEmpresas");
        $response->assertViewHas("sector_empresa", $sector_empresa);
        $response->assertViewHas("municipios", $municipios);
        $response->assertViewHas("paginaweb", $paginaweb);
    }

    /** @test */
    public function mostrar_empresas_inactivas(){
        PaginaWebModel::factory()->create();
        $sector = SectorEmpresaModel::factory()->create();
        $municipio = MunicipiosModel::factory()->create();
        for ($i=1; $i <= 100; $i++) {

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

            $response = $this->post('/afiliados/general', [
                'escenario' => 'prueba',
                'tipo_documento' => 'cedula',
                'numero_documento' => $i,
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

            $empresa = EmpresasModel::where("id_empresa", $i)->get();

            $response = $this->put("/afiliados/consultarEmpresas/".$empresa[0]->id, [
                'cedula' => $i,
                'nit' => $empresa[0]->nit_empresa,
                'razon_social' => $empresa[0]->razon_social,
                'num_empleados' => $empresa[0]->num_empleados,
                'direccion' => $empresa[0]->direccion_empresa,
                'telefono' => $empresa[0]->telefono_empresa,
                'fax' => $empresa[0]->fax_empresa,
                'celular' => $empresa[0]->celular_empresa,
                'correo_electronico' => $empresa[0]->email_empresa,
                'sector_empresa' => $empresa[0]->id_sector_empresa,
                'productos' => $empresa[0]->productos_empresa,
                'ciudad' => $empresa[0]->ciudad_empresa,
                'fecha_afiliacion' => $empresa[0]->fecha_afiliacion_empresa,
                'carta_bienvenida_actual' => $empresa[0]->carta_bienvenida,
                'carta_bienvenida' => '',
                'acta_compromiso_actual' => $empresa[0]->acta_compromiso,
                'carta_compromiso' => '',
                'estudio_afiliacion_actual' => $empresa[0]->estudio_afiliacion,
                'estudio_afiliacion' => '',
                'rut_actual' => $empresa[0]->rut,
                'rut' => '',
                'camara_comercio_actual' => $empresa[0]->camara_comercio,
                'camara_comercio' => '',
                'fechas_birthday_actual' => $empresa[0]->fechas_birthday,
                'fechas_birthday' => '',
            ]);
        }

        $this->assertCount(100, RepresentanteEmpresaModel::all());
        $this->assertCount(100, EmpresasModel::all());

        $response = $this->get('/afiliados/empresasInactivas');

        $response -> assertOk();

        $join = DB::table('representante_empresa')->join('empresas','representante_empresa.cc_rprt_legal','=','empresas.cc_rprt_legal')->select('representante_empresa.*','empresas.*')->where("estado_afiliacion_empresa", "inactiva")->get();
        $empresas = json_decode(json_encode($join),TRUE);

        $response->assertViewIs("paginas.afiliados.empresasInactivas");
        $response->assertViewHas("empresas", $empresas);

    }

    /** @test */
    public function mostrar_birthday(){
        PaginaWebModel::factory()->create();
        EmpleadosAfiliadosModel::factory()->count(1000)->create();
        $fecha = "2022-12-01";
        $response = $this->get('/afiliados/birthday/'.$fecha);

        $response -> assertOk();

        $fecha_birthday = "12-01";
        $sql = "SELECT primer_nombre, segundo_nombre, primer_apellido, segundo_apellido, cargo_empleado_afiliado, fecha_nacimiento, razon_social FROM empleados_afiliados a INNER JOIN empresas b ON a.nit_empresa_afiliado = b.nit_empresa WHERE a.fecha_nacimiento LIKE '%".$fecha_birthday."%'";
        $cumplimentados = DB::select($sql);

        $cumplimentados = json_decode(json_encode($cumplimentados),TRUE);

        $response->assertViewIs("paginas.afiliados.birthday");
        $response->assertViewHas(array("cumplimentados"), $cumplimentados);
    }

    /** @test */
    public function mostrar_informacion_empresa(){
        $empresa = EmpresasModel::factory()->create();
        EmpresasModel::factory()->count(10)->create();
        SectorEmpresaModel::factory()->create();
        MunicipiosModel::factory()->create();
        PaginaWebModel::factory()->create();

        $response = $this->get('/afiliados/consultarEmpresas/'.$empresa->id);

        $response -> assertOk();

        $empresa = EmpresasModel::where("id_empresa", $empresa->id)->get();
        $empresas = EmpresasModel::all();
        $sector_empresa = SectorEmpresaModel::all();
        $municipios = MunicipiosModel::all();

        $response->assertViewIs("paginas.afiliados.consultarEmpresas");
        $response->assertViewHas(array("empresa"), $empresa);
        $response->assertViewHas(array("empresas"), $empresas);
        $response->assertViewHas(array("sector_empresa"), $sector_empresa);
        $response->assertViewHas(array("municipios"), $municipios);
    }

    /** @test */
    public function ingresar_empresa(){
        PaginaWebModel::factory()->create();
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

        $this->assertCount(1, EmpresasModel::all());

        $response->assertSessionHas('ok-crear');
    }

    /** @test */
    public function ingresar_empleado_afiliado(){
        PaginaWebModel::factory()->create();

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

        $this->assertCount(1, EmpresasModel::all());

        $empresa = EmpresasModel::first();

        $response->assertSessionHas('ok-crear');

        $response = $this->post('/afiliados/consultarEmpresas', [
            'accion' => 'agregarEmpleadoAfiliado',
            'tipo_documento' => 'cedula',
            'numero_documento' => '123456789',
            'primer_nombre' => 'Marciana',
            'segundo_nombre' => 'María',
            'primer_apellido' => 'Lopez',
            'segundo_apellido' => 'Mejía',
            'cargo_empleado' => 'Recepcionista',
            'fecha_nacimiento' => '1990-03-01',
            'id_empresa' => $empresa->id_empresa,
            'nit_empresa' => $empresa->nit_empresa,
            'archivo_documento' => UploadedFile::fake()->image('documentoPrueba.jpg', 500, 500)->size(500),
        ]);

        $response->assertRedirect('/afiliados/consultarEmpresas');

        $this->assertCount(1, EmpleadosAfiliadosModel::all());

        $response->assertSessionHas('ok-crear-empleado');
    }

    /** @test */
    public function actualizar_empresa(){
        $empresa = EmpresasModel::factory()->create();
        $response = $this->put("/afiliados/consultarEmpresas/".$empresa->id, [
            'cedula' => '123456789',
            'nit' => $empresa->nit_empresa,
            'razon_social' => 'Ferretería La Palmas',
            'num_empleados' => $empresa->num_empleados,
            'direccion' => 'Cra 7 No. 16-45',
            'telefono' => $empresa->telefono_empresa,
            'fax' => $empresa->fax_empresa,
            'celular' => $empresa->celular_empresa,
            'correo_electronico' => $empresa->email_empresa,
            'sector_empresa' => $empresa->id_sector_empresa,
            'productos' => $empresa->productos_empresa,
            'ciudad' => 'VLL',
            'fecha_afiliacion' => '2022-01-01',
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

        $this->assertEquals($empresa->cc_rprt_legal, '123456789');
        $this->assertEquals($empresa->razon_social, 'Ferretería La Palmas');
        $this->assertEquals($empresa->direccion_empresa, 'Cra 7 No. 16-45');
        $this->assertEquals($empresa->ciudad_empresa, 'VLL');
        $this->assertEquals($empresa->fecha_afiliacion_empresa, '2022-01-01');
        $response->assertRedirect('/afiliados/consultarEmpresas');
        $response->assertSessionHas('ok-editar');
    }

    /** @test */
    public function eliminar_empresa_de_listado(){
        //prêt
        EmpresasModel::factory()->count(3)->create();
        $this->delete("/afiliados/consultarEmpresas/1");
        $this->assertCount(2, EmpresasModel::all());
    }

    /** @test */
    public function eliminar_empresa_unica(){
        //prêt
        $empresa = EmpresasModel::factory()->create();
        $this->delete("/afiliados/consultarEmpresas/".$empresa->id);

        $this->assertCount(0, EmpresasModel::all());
    }
}
