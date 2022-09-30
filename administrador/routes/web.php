<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use App\Http\Controllers\ProyectosController;

Route::get('/', function () {
    return view('plantilla');
});

//Route::view('/', 'paginas.inicio');
Route::view('/pagina_web/inicio', 'paginas.pagina_web.inicio');
Route::view('/afiliados/inicio', 'paginas.afiliados.inicio');
Route::view('/documentos/inicio', 'paginas.documentos.inicio');

/*==================================================
=            Rutas de módulo página web            =
==================================================*/

/*Route::view('/pagina_web/carrusel', 'paginas.pagina_web.carrusel');
Route::view('/pagina_web/entrevistas', 'paginas.pagina_web.entrevistas');
Route::view('/pagina_web/eventos', 'paginas.pagina_web.eventos');
Route::view('/pagina_web/footer', 'paginas.pagina_web.footer');
Route::view('/pagina_web/interesados', 'paginas.pagina_web.interesados');
Route::view('/pagina_web/noticias', 'paginas.pagina_web.noticias');
Route::view('/pagina_web/info/contacto', 'paginas.pagina_web.info.contacto');
Route::view('/pagina_web/info/estatutos', 'paginas.pagina_web.info.estatutos');
Route::view('/pagina_web/info/gremio', 'paginas.pagina_web.info.gremio');
Route::view('/pagina_web/info/productos', 'paginas.pagina_web.info.productos');
Route::view('/pagina_web/info/redes', 'paginas.pagina_web.info.redes');*/

/*=====  End of Rutas de módulo página web  ======*/


/*=================================================
=            Rutas de módulo afiliados            =
=================================================*/

/*Route::view('/afiliados/agregar', 'paginas.afiliados.agregar');
Route::view('/afiliados/consultar', 'paginas.afiliados.consultar');
Route::view('/afiliados/modificar', 'paginas.afiliados.modificar');
Route::view('/afiliados/eliminar', 'paginas.afiliados.eliminar');*/

/*=====  End of Rutas de módulo afiliados  ======*/


/*========================================
=            Rutas metodo GET            =
========================================*/

/*Route::get('/pagina_web/carrusel', 'PaginaWebController@traerCarrusel');
Route::get('/pagina_web/entrevistas', 'PaginaWebController@traerPaginaWeb');
Route::get('/pagina_web/noticias', 'NoticiasController@traerNoticias'); */

/*=====  End of Rutas metodo GET  ======*/


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

/*=================================================================
=            Rutas que incluyen todos los metodos HTML            =
=================================================================*/
/*----------  Modo Nocturno  ----------*/
Route::resource('/modoNocturno', 'ModoNocturnoController');

/*----------  Página general  ----------*/
//Route::resource('/pagina_web/inicio', 'PaginaWebController');
Route::resource('/pagina_web/general', 'PaginaWebController');
Route::resource('/pagina_web/datosg', 'PaginaWebController');
Route::resource('/pagina_web/carrusel', 'PaginaWebController');
Route::resource('/pagina_web/logos', 'PaginaWebController');
Route::resource('/pagina_web/footer', 'PaginaWebController');

Route::resource('/pagina_web/aliados', 'AliadosController');
Route::resource('/pagina_web/ingresarCarrusel', 'CarruselController');
Route::resource('/pagina_web/ordenarCarrusel', 'OrdenarCarruselController');
Route::resource('/pagina_web/eliminarCarrusel', 'EliminarCarruselController');
Route::resource('/pagina_web/entrevistas', 'EntrevistasController');
Route::resource('/pagina_web/noticias', 'NoticiasController');
Route::resource('/pagina_web/consultarNoticia', 'ConsultarNoticiaController');
Route::resource('/pagina_web/eventos', 'PaginaWebController');
Route::resource('/pagina_web/interesados', 'InteresadoController');
Route::resource('/pagina_web/info/contacto', 'PaginaWebController');
Route::resource('/pagina_web/info/estatutos', 'PaginaWebController');
Route::resource('/pagina_web/info/gremio', 'PaginaWebController');
Route::resource('/pagina_web/info/productos', 'ProductosController');
Route::resource('/pagina_web/info/redes', 'PaginaWebController');

/*----------  Usuarios  ----------*/
Route::resource('/usuarios/consultarUser', 'UsuariosController');
Route::resource('/usuarios/agregarUser', 'UsuariosController');
Route::resource('/usuarios/perfil', 'PerfilController');
Route::resource('/', 'PerfilController');

/*----------  Afiliados  ----------*/
Route::resource('/afiliados/general', 'AfiliadosController');
Route::resource('/afiliados/empresas', 'EmpresasController');
Route::resource('/afiliados/ingresarAfiliado', 'AfiliadosController');
Route::resource('/afiliados/exportar', 'ExportarController');
Route::resource('/afiliados/consultarEmpresas', 'EmpresasController');
Route::resource('/afiliados/exportarEmpresas', 'ExportarController');
Route::resource('/afiliados/afiliadosEmpleados', 'EmpresasController');
Route::resource('/afiliados/birthday', 'EmpresasController');
Route::resource('/afiliados/empresasInactivas', 'ReactivarEmpresaController');
Route::resource('/afiliados/reactivarEmpresa', 'ReactivarEmpresaController');
Route::resource('/afiliados/municipios', 'MunicipiosController');
Route::resource('/afiliados/sectorempresas', 'SectorEmpresaController');
Route::resource('/afiliados/afiliadosEmpleadosEmpresa', 'EmpresasController');

/*----------  Pagos  ----------*/
Route::resource('/pagos/general', 'PagosController');
Route::resource('/pagos/parametros', 'ParametrosPagosController');
Route::resource('/pagos/ingresar', 'PagosController');

/*----------  Eventos  ----------*/
Route::resource('/eventos/general', 'EventosController');

/*----------  Citas  ----------*/
Route::resource('/citas/general', 'CitasController');

/*----------  Empleados y pasantes  ----------*/
Route::resource('/empleados/general', 'EmpleadosController');
Route::resource('/empleados/exportar', 'ExportarController');

/*----------  Documentos  ----------*/
Route::resource('/documentos/empresas', 'DocumentosController');
Route::resource('/documentos/empleados', 'DocumentosController');

/*----------  Indicadores  ----------*/
Route::resource('/indicadores/inicio', 'IndicadoresController');
Route::resource('/indicadores/empresas', 'IndicadoresController');
Route::resource('/indicadores/recibos', 'IndicadoresController');

/*----------- Proyectos -----------*/
Route::resource('proyectos', ProyectosController::class);

/*=====  End of Rutas que incluyen todos los metodos HTML  ======*/
