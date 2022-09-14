<?php

namespace Tests\Feature;

use App\PagosModel;
use App\PagosGeneradosModel;
use App\PagosParametrosModel;
use App\UsuariosModel;
use App\EmpresasModel;
use App\PaginaWebModel;
use App\RepresentanteEmpresaModel;
use App\RolesModel;
use App\User;
use App\SectorEmpresaModel;
use App\MunicipiosModel;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\UploadedFile;
use Tests\TestCase;

class PagosTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */

    /** @test */
    public function listar_recibos_de_pago(){
        PaginaWebModel::factory()->create();
        PagosModel::factory()->count(100)->create();
        EmpresasModel::factory()->count(100)->create();
        RepresentanteEmpresaModel::factory()->count(100)->create();

        $response = $this->get('/pagos/general');

        $response -> assertOk();

        $pagos = PagosModel::all();

        $response->assertViewIs("paginas.pagos.general");
        $response->assertViewHas("pagos", $pagos);
    }

    /** @test */
    public function generar_recibo_de_pago_individual(){
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

        $empresa = EmpresasModel::first();

        PagosParametrosModel::factory()->create();
        $response = $this->post('/pagos/ingresar', [
            'id_empresa' => $empresa->id_empresa,
            'valor_mes' => '80000',
            'mes' => 'agosto',
            'fecha_limite' => '2022-08-30'
        ]);

        $this->assertCount(1, PagosModel::all());

        $response->assertRedirect('/pagos/ingresar');

        $response->assertSessionHas('ok-crear');
    }

    /** @test */
    public function generar_recibos_de_pago(){
        PaginaWebModel::factory()->create();
        PagosParametrosModel::factory()->create();
        EmpresasModel::factory()->count(100)->create();
        RepresentanteEmpresaModel::factory()->count(100)->create();
        RolesModel::factory()->count(7)->create();
        $response = $this->post('/usuarios/agregarUser', [
            'num_documento' => '123456789',
            'email' => 'carmengomez@gmail.com',
            'nombre' => 'Carmen Helena Gomez Berrio',
            'id_rol' => '1',
        ]);

        $response -> assertOk();

        $usuario = UsuariosModel::first();

        $response = $this->post('/pagos/general', [
            'usuario' => $usuario->email,
            'password' => '123456789',
        ]);

        $response->assertRedirect('/pagos/general');

        $this->assertNotEmpty(PagosModel::all());
        $response->assertSessionHas('ok-crear');
    }

    /** @test */
    public function actualizar_recibo_de_pago(){
        $user = User::factory()->create([
            'password' => bcrypt($password = 'laravel'),
        ]);
        $this->withSession(['_token'=>'token']);

        $response = $this->post(route('login'), [
            '_token' => 'token',
            'email' => $user->email,
            'password' => $password,
        ]);
        //dump($response);
        $response->assertRedirect('/');
        $this->assertAuthenticatedAs($user);
        /***************************************** */
        $pago = PagosModel::factory()->create();
        $response = $this->put("/pagos/general/".$pago->id, [
            "accion" => "pagar"
        ]);

        $this->assertCount(1, PagosModel::all());

        $pago = $pago->fresh();

        $pago = PagosModel::first();
        $this->assertEquals($pago->estado, "pagado");
    }

    /** @test */
    public function eliminar_recibo_de_pago(){
        $pago = PagosModel::factory()->create();
        $this->delete("/pagos/general/".$pago->id);

        $this->assertCount(0, PagosModel::all());
    }

    /** @test */
    public function eliminar_recibo_de_pago_de_listado(){
        PagosModel::factory()->count(100)->create();
        $this->delete("/pagos/general/4");

        $this->assertCount(99, PagosModel::all());
    }
}
