<?php

namespace Tests\Feature;

use App\PaginaWebModel;
use App\NoticiasModel;
use App\CategoriasModel;
use App\InteresadoModel;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\UploadedFile;
use Tests\TestCase;

class PaginaWebTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */

    /** @test */
    public function mostrar_informacion_pagina_web(){
        PaginaWebModel::factory()->create();

        $response = $this->get('/pagina_web/datosg');

        $response -> assertOk();

        $paginaweb = PaginaWebModel::all();

        $response->assertViewIs("paginas.pagina_web.general");
        $response->assertViewHas("paginaweb", $paginaweb);
    }

    /** @test */
    public function actualizar_informacion_pagina_web(){
        $pagina_web = PaginaWebModel::factory()->create();

        $response = $this->put("/pagina_web/datosg/".$pagina_web->id, [
            "escenario" => "prueba",
            "dominio" => $pagina_web->dominio,
            "servidor" => $pagina_web->servidor,
            "titulo_pestana" => "ACOPI - Capitulo Cesar",
            "titulo_pagina" => "ACOPI Capitulo Cesar",
            "logo_pestana_actual" => $pagina_web->logo_pestana,
            "logo_navegacion_actual" => $pagina_web->logo_navegacion,
            "nav" => UploadedFile::fake()->image('logoNavegacion.png', 500, 500)->size(500),
            "pestana" => UploadedFile::fake()->image('logoPestana.png', 500, 500)->size(500),
            "titulo_navegacion" => $pagina_web->titulo_navegacion,
            "descripcion" => "La Asociación Colombiana de las Micro, Pequeñas y Medianas Empresas es una organización de alcance nacional fundada en la ciudad de Bogotá, el 24 de agosto de 1952.",
            "palabras_claves" => "acopi,cesar,acopicesar,valledupar,agremiacion,agremiados,microempresarios,pymes,colombia,citas",
            "redes_sociales" => $pagina_web->redes_sociales,
            "direccion" => "Cra 85 No. 34-23",
            "telefono" => "3549560",
            "celular" => "3045495497",
            "email" => "info@acopi.org"
        ]);

        $this->assertCount(1, PaginaWebModel::all());

        $pagina_web = $pagina_web->fresh();

        $pagina_web = PaginaWebModel::first();

        $this->assertEquals($pagina_web->titulo_pestana, 'ACOPI - Capitulo Cesar');
        $this->assertEquals($pagina_web->titulo_pagina, 'ACOPI Capitulo Cesar');
        $this->assertEquals($pagina_web->descripcion, 'La Asociación Colombiana de las Micro, Pequeñas y Medianas Empresas es una organización de alcance nacional fundada en la ciudad de Bogotá, el 24 de agosto de 1952.');
        $this->assertEquals($pagina_web->palabras_claves, '["acopi","cesar","acopicesar","valledupar","agremiacion","agremiados","microempresarios","pymes","colombia","citas"]');
        $this->assertEquals($pagina_web->contacto, '["Cra 85 No. 34-23","3549560","3045495497","info@acopi.org"]');
        $response->assertRedirect('/pagina_web/general?ver=ninguna');
        $response->assertSessionHas('ok-editar');
    }

    /** @test */
    public function ingresar_nuevo_item_carrusel(){
        $pagina_web = PaginaWebModel::factory()->create();
        $quitar = array("-");
        $poner = array("_");
        $carrusel = str_replace($quitar, $poner, $pagina_web->carrusel);
        $carrusel = json_decode($carrusel, false);
        $total_items = count($carrusel);
        $datos = array(
            'escenario' => "prueba",
            'indice' => $total_items-1
        );
        for ($i=0; $i < $total_items; $i++) {
            $datos += ["categoria-".$i => $carrusel[$i]->categoria];
            $datos += ["titulo-".$i => $carrusel[$i]->titulo];
            $datos += ["texto-".$i => $carrusel[$i]->texto];
            $datos += ["boton-1-color-".$i => $carrusel[$i]->boton_1_color];
            $datos += ["boton-1-texto-".$i => $carrusel[$i]->boton_1_texto];
            $datos += ["url-boton-1".$i => $carrusel[$i]->url_boton_1];
            $datos += ["boton-2-color-".$i => $carrusel[$i]->boton_2_color];
            $datos += ["boton-2-texto-".$i => $carrusel[$i]->boton_2_texto];
            $datos += ["url-boton-2".$i => $carrusel[$i]->url_boton_2];
            $datos += ["foto-delante-actual".$i => $carrusel[$i]->foto_delante];
            $datos += ["fondo-actual".$i => $carrusel[$i]->fondo];
            $datos += ["foto-delante-".$i => ""];
            $datos += ["fondo-".$i => ""];
        }
        $datos += ["categoria-".$total_items => "noticias"];
        $datos += ["titulo-".$total_items => "La Universidad Nacional de Colombia nuestro nuevo aliado"];
        $datos += ["texto-".$total_items => "El pasado mes de julio se firmó convenio con la Universidad Nacional para la incorporación de pasantes en nuestra oficinas."];
        $datos += ["boton-1-color-".$total_items => "bg-primary"];
        $datos += ["boton-1-texto-".$total_items => "Leer más"];
        $datos += ["url-boton-1".$total_items => "www.google.com"];
        $datos += ["boton-2-color-".$total_items => ""];
        $datos += ["boton-2-texto-".$total_items => ""];
        $datos += ["url-boton-2".$total_items => ""];
        $datos += ["foto-delante-actual".$total_items => ""];
        $datos += ["fondo-actual".$total_items => ""];
        $datos += ["foto-delante-".$total_items => UploadedFile::fake()->image('fotoDelante.png', 500, 500)->size(500)];
        $datos += ["fondo-".$total_items => UploadedFile::fake()->image('fotoFondo.png', 500, 500)->size(500)];

        $response = $this->put("/pagina_web/ingresarCarrusel/".$pagina_web->id, $datos);

        $pagina_web = $pagina_web->fresh();

        $pagina_web = PaginaWebModel::first();

        $quitar = array("-");
        $poner = array("_");
        $carrusel = str_replace($quitar, $poner, $pagina_web["carrusel"]);
        $carrusel = json_decode($carrusel, false);

        $this->assertEquals($carrusel[$total_items]->categoria, 'noticias');
        $this->assertEquals($carrusel[$total_items]->titulo, 'La Universidad Nacional de Colombia nuestro nuevo aliado');
        $this->assertEquals($carrusel[$total_items]->texto, 'El pasado mes de julio se firmó convenio con la Universidad Nacional para la incorporación de pasantes en nuestra oficinas.');
        $this->assertEquals($carrusel[$total_items]->boton_1_color, 'bg_primary');
        $this->assertEquals($carrusel[$total_items]->boton_1_texto, 'Leer más');
        $response->assertRedirect('/pagina_web/ingresarCarrusel');
        $response->assertSessionHas('ok-editar');
    }

    /** @test */
    public function ingresar_noticia(){
        PaginaWebModel::factory()->create();
        $response = $this->post('/pagina_web/noticias', [
            'escenario' => 'prueba',
            'titulo' => 'Aumento en la cuota de sostenimiento',
            'categoria' => '2',
            'descripcion' => 'Luego de una reunión de la junta directiva se comunican las decisiones tomadas.',
            'palabras_claves' => 'cuota,acopi,cesar,pymes',
            'ruta' => 'aumento-cuota-sostenimiento',
            'contenido_noticia' => '<div>Este jueves 2 y el viernes 3 de diciembre la empresa de energía eléctrica Afinia adelantará el plan de mejoras y adecuaciones eléctricas para optimizar progresivamente su servicio en Valledupar y en municipios del Cesar.</div><div><br></div><div style="text-align: justify; "><img src="http://localhost/acopi/administrador/public/vistas/images/noticias/contenido/a0f3601dc682036423013a5d965db9aa.jpg" style="width: 25%; float: right;" class="note-float-right">En ese sentido, en el municipio de San Diego, el personal capacitado de Afinia instalará estructuras, redes y elementos de protección, los cuales harán parte del nuevo circuito San Diego 2. La actividad se llevará a cabo desde las 7:30 a.m. hasta las 4:30 p.m., y durante su desarrollo será suspendido el servicio de energía en el municipio y sectores aledaños.</div><div style="text-align: justify; "><br></div><div style="text-align: justify;">Del mismo modo, en Valledupar la empresa realizará trabajos en el circuito Valledupar 4 desde las 5:30 a.m. hasta las 7:30 a.m., durante la jornada habrá suspensión en el fluido eléctrico en los barrios: 9 de Abril, Las Acacias, Altos de La Nevada, Bello Horizonte, Campo Romero, El Limonar, Futuro de Los Niños, Urbanización Ciudad Tayrona, Villa Algenia, Villa Andrés, Villa Consuelo, Los Guasimales, Brisas de La Popa, Francisco Javier, Altos de Pimienta, Urbanización Bella Vista, Urbanización Ana María y el Conjunto Cerrado Alta Vista.</div><div style="text-align: justify;"><br></div><div style="text-align: justify; ">Asimismo, el viernes 3 de diciembre no habrá servicio de energía desde las 7:45 a.m. hasta las 4:30 de la tarde para los habitantes del barrio San Fernando de Valledupar, en el sector comprendido entre las carreras 6 y 6B, desde la calle 45 hasta la calle 47, ya que en el marco de la construcción del nuevo circuito Salguero 5 en Valledupar instalarán nuevos postes y redes.</div>',
            'portada_noticia' => UploadedFile::fake()->image('fotoPrueba.png', 500, 500)->size(500),
        ]);

        $response->assertRedirect('/pagina_web/noticias');

        $this->assertCount(1, NoticiasModel::all());

        $response->assertSessionHas('ok-crear');
    }

    /** @test */
    public function consultar_categorias_noticias(){
        CategoriasModel::factory()->count(3)->create();
        NoticiasModel::factory()->count(3)->create();

        $response = $this->get('/pagina_web/consultarNoticia');

        $response -> assertOk();

        $categorias = CategoriasModel::all();

        $response->assertViewIs("paginas.pagina_web.consultarNoticia");
        $response->assertViewHas("categorias", $categorias);
    }

    /** @test */
    public function mostrar_una_noticia(){
        $noticia = NoticiasModel::factory()->create();
        CategoriasModel::factory()->count(3)->create();
        $response = $this->get('/pagina_web/consultarNoticia/'.$noticia->id);
        NoticiasModel::factory()->count(2)->create();

        $response -> assertOk();

        $noticia = NoticiasModel::first();
        $noticias = NoticiasModel::all();
        $categorias = CategoriasModel::all();

        $response->assertViewIs("paginas.pagina_web.consultarNoticia");
        $response->assertViewHas(array("noticia"), $noticia);
        $response->assertViewHas(array("noticias"), $noticias);
        $response->assertViewHas(array("categorias"), $categorias);
    }

    /** @test */
    public function actualizar_noticia(){
        PaginaWebModel::factory()->create();
        $noticia = NoticiasModel::factory()->create();
        $response = $this->put("/pagina_web/consultarNoticia/".$noticia->id, [
            "escenario" => "prueba",
            "titulo" => "Renovación de registro en Camara de Comercio",
            "categoria" => $noticia->categoria,
            "descripcion" => "Antes del primero de octubre todos los afiliados deberán presentar el documento actualizado",
            "palabras_claves" => "actualizacion,acopi,camaradecomercio,valledupar,cesar",
            "ruta" => $noticia->ruta_noticia,
            "contenido_noticia" => $noticia->contenido_noticia,
            "portada_noticia" => UploadedFile::fake()->image('portadaNoticia.png', 500, 500)->size(500),
            "portada_noticia_actual" => $noticia->portada_noticia
        ]);

        $this->assertCount(1, NoticiasModel::all());

        $noticia = $noticia->fresh();

        $noticia = NoticiasModel::first();

        $this->assertEquals($noticia->titulo, 'Renovación de registro en Camara de Comercio');
        $this->assertEquals($noticia->descripcion_noticia, 'Antes del primero de octubre todos los afiliados deberán presentar el documento actualizado');
        $this->assertEquals($noticia->p_claves_noticia, '["actualizacion","acopi","camaradecomercio","valledupar","cesar"]');
        $response->assertRedirect('/pagina_web/consultarNoticia');
        $response->assertSessionHas('ok-editar');
    }

    /** @test */
    public function eliminar_noticia_de_listado(){
        NoticiasModel::factory()->count(3)->create();
        $response = $this->delete("/pagina_web/consultarNoticia/1");
        $this->assertCount(2, NoticiasModel::all());
    }

    /** @test */
    public function eliminar_noticia_unica(){
        $noticia = NoticiasModel::factory()->create();
        $response = $this->delete("/pagina_web/consultarNoticia/".$noticia->id);

        $this->assertCount(0, NoticiasModel::all());
    }

    /** @test */
    public function listar_interesados(){
        InteresadoModel::factory()->count(10)->create();
        $response = $this->get('/pagina_web/interesados');

        $response -> assertOk();

        $response->assertViewIs("paginas.pagina_web.interesados");

    }

    /** @test */
    public function mostrar_un_interesado(){
        $interesado = InteresadoModel::factory()->create();
        InteresadoModel::factory()->count(4)->create();
        $response = $this->get('/pagina_web/interesados/'.$interesado->id);
        $response -> assertOk();
        $interesado = InteresadoModel::where("id", $interesado->id)->get();
        $interesados = InteresadoModel::all();
        $response->assertViewIs("paginas.pagina_web.interesados");
        $response->assertViewHas(array("interesado"), $interesado);
        $response->assertViewHas(array("interesados"), $interesados);
    }

    /** @test */
    public function actualizar_estado_interesado(){
        $interesado = InteresadoModel::factory()->create();
        InteresadoModel::factory()->count(4)->create();
        $response = $this->put('/pagina_web/interesados/'.$interesado->id);
        $this->assertCount(5, InteresadoModel::all());
        $interesado = $interesado->fresh();
        $interesado = InteresadoModel::first();
        $this->assertEquals($interesado->estado_interesado, 'contactado');
    }

    /** @test */
    public function eliminar_interesado_de_listado(){
        InteresadoModel::factory()->count(3)->create();
        $response = $this->delete("/pagina_web/interesados/2");
        $this->assertCount(2, InteresadoModel::all());
    }

    /** @test */
    public function ingresar_nuevo_aliado(){
        $pagina_web = PaginaWebModel::factory()->create();
        $aliados = json_decode($pagina_web->aliados, false);
        $total_items = count($aliados);
        $datos = array("indice" => $total_items-1);
        for ($i=0; $i < $total_items; $i++) {
            $datos += ['nombre-'.$i => $aliados[$i]->nombre];
            $datos += ['link-'.$i => $aliados[$i]->link];
            $datos += ['logo_actual-'.$i => $aliados[$i]->logo];
            $datos += ['logo-'.$i => ""];
        }
        $datos += ['nombre-'.$total_items => "Universidad Nacional de Colombia"];
        $datos += ['link-'.$total_items => "www.unal.edu.co"];
        $datos += ['logo_actual-'.$total_items => "http://localhost/acopi/administrador/public/"];
        $datos += ['logo-'.$total_items => UploadedFile::fake()->image('logoAliado.png', 500, 500)->size(500)];

        $response = $this->put("/pagina_web/aliados/".$pagina_web->id, $datos);

        $pagina_web = $pagina_web->fresh();

        $pagina_web = PaginaWebModel::first();

        $pagina_web = json_decode($pagina_web["aliados"], false);

        $this->assertEquals($pagina_web[$total_items]->nombre, 'Universidad Nacional de Colombia');
        $this->assertEquals($pagina_web[$total_items]->link, 'www.unal.edu.co');
        $response->assertRedirect('/pagina_web/aliados');
        $response->assertSessionHas('ok-editar');

    }

    /** @test */
    public function ingresar_producto(){
        $pagina_web = PaginaWebModel::factory()->create();
        $productos = json_decode($pagina_web->productos, false);
        $total_items = count($productos);
        $datos = array(
            "eliminar" => "no",
            "indice" => $total_items-1
        );
        for ($i=0; $i < $total_items; $i++) {
            $datos += ['numero-'.$i => $productos[$i]->num];
            $datos += ['nombre-'.$i => $productos[$i]->nombre];
            $datos += ['descripcion-'.$i => $productos[$i]->descripcion];
        }
        $datos += ['numero-'.$total_items => $total_items];
        $datos += ['nombre-'.$total_items => "Asesoría en implmentación de software."];
        $datos += ['descripcion-'.$total_items => "Asesoramiento en la implementación de productos de software."];

        $response = $this->put("/pagina_web/info/productos/".$pagina_web->id, $datos);

        $pagina_web = $pagina_web->fresh();

        $pagina_web = PaginaWebModel::first();

        $productos = json_decode($pagina_web["productos"], false);

        $this->assertEquals($productos[$total_items]->num, $total_items);
        $this->assertEquals($productos[$total_items]->nombre, 'Asesoría en implmentación de software.');
        $this->assertEquals($productos[$total_items]->descripcion, 'Asesoramiento en la implementación de productos de software.');
        $response->assertRedirect('/pagina_web/info/productos');
        $response->assertSessionHas('ok-editar');

    }
}
