<?php

namespace Tests\Feature;

use App\UsuariosModel;
use App\RolesModel;
use App\PaginaWebModel;
use App\EmpleadosModel;
use App\TipoDocumentoModel;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Illuminate\Support\Facades\Hash;

class UsuariosTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */

    /** @test */
    public function listar_usuarios(){
        //prêt
        PaginaWebModel::factory()->create();
        UsuariosModel::factory()->count(3)->create();
        $response = $this->get('/usuarios/consultarUser');

        $response -> assertOk();

        $this->assertCount(3, UsuariosModel::all());

        $response->assertViewIs("paginas.usuarios.consultarUser");
    }

    /** @test */
    public function listar_usuarios_sin_cuenta(){
        //prêt
        PaginaWebModel::factory()->create();
        EmpleadosModel::factory()->count(3)->create();
        TipoDocumentoModel::factory()->create();
        RolesModel::factory()->count(7)->create();
        $response = $this->get('/usuarios/agregarUser');

        $response -> assertOk();

        $this->assertCount(3, EmpleadosModel::all());

        $response->assertViewIs("paginas.usuarios.agregarUser");
    }

    /** @test */
    public function listar_un_usuario(){
        //prêt
        UsuariosModel::factory()->count(10)->create();
        RolesModel::factory()->count(7)->create();
        $usuario = UsuariosModel::factory()->create();
        $response = $this->get('/usuarios/consultarUser/'.$usuario->id);

        $response -> assertOk();

        $usuarios = UsuariosModel::all();
        $roles = RolesModel::all();

        $response->assertViewIs("paginas.usuarios.consultarUser");
        $response->assertViewHas(array("usuario"), $usuario);
        $response->assertViewHas(array("usuarios"), $usuarios);
        $response->assertViewHas(array("roles"), $roles);
    }

    /** @test */
    public function insertar_usuario(){
        //prêt
        RolesModel::factory()->count(7)->create();
        UsuariosModel::factory()->count(3)->create();
        $response = $this->post('/usuarios/agregarUser', [
            'num_documento' => '123456789',
            'email' => 'carmengomez@gmail.com',
            'nombre' => 'Carmen Helena Gomez Berrio',
            'id_rol' => '1',
        ]);

        $response -> assertOk();

        $this->assertCount(4, UsuariosModel::all());
    }

    /** @test */
    public function actualizar_usuario(){
        $usuario = UsuariosModel::factory()->create();
        $password_old = $usuario->password;
        $response = $this->put('/usuarios/consultarUser/'.$usuario->id, [
            'name' => "Laura Cristina Tapias",
            'email' => "laucristitapias@gmail.com",
            'password_actual' => $usuario->password,
            'password' => '12345678',
            'rol' => $usuario->rol,
            'imagen_actual' => $usuario->foto,
            'foto' => ''
        ]);

        $this->assertCount(1, UsuariosModel::all());

        $usuario = $usuario->fresh();

        $usuario = UsuariosModel::first();
        if (Hash::check('12345678', $usuario->password)) {
            $password = true;
        } else {
            $password = false;
        }

        $this -> assertTrue($password);
        $this -> assertEquals($usuario->name, 'Laura Cristina Tapias');
        $this -> assertEquals($usuario->email, 'laucristitapias@gmail.com');
        $response->assertRedirect('/usuarios/consultarUser');
        $response->assertSessionHas('ok-editar');

    }

    /** @test */
    public function eliminar_usuario_de_listado(){
        //prêt
        UsuariosModel::factory()->count(3)->create();
        $this->delete("/usuarios/consultarUser/2");
        $this->assertCount(2, UsuariosModel::all());
    }

}
