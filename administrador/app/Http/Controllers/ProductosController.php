<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PaginaWebModel;

class ProductosController extends Controller
{
    /*===============================================================
	=            Mostrar todos los registros en la tabla            =
	===============================================================*/

	public function index(){
    	$paginaweb = PaginaWebModel::all();

    	return view("paginas.pagina_web.info.productos", array("paginaweb" => $paginaweb));
    }

	/*=====  End of Mostrar todos los registros en la tabla  ======*/

	/*========================================================
	=            Actualizar productos y servicios            =
	========================================================*/

	public function update($id, Request $request){

		/*----------  Recibe variable eliminar y pregunta si hubo eliminación  ----------*/
		$eliminar = array('eliminar' => $request->input("eliminar"));
		if ($eliminar['eliminar'] == "si") {
			$productos = array('listaProductos' => $request->input("listaProductos"));
			$actualizar = array('productos' => $productos["listaProductos"]);
			$paginaweb = PaginaWebModel::where("id", $id)->update($actualizar);
			return redirect("/pagina_web/info/productos")->with("ok-editar", "");
		}
		if ($eliminar['eliminar'] == "no") {

			/*----------  se recoje el número todas de productos mostrados  ----------*/
			$indice = array('indice' => $request->input("indice"));
			/*echo '<pre>'; print_r($indice); echo '</pre>';
			return;*/

			/*----------  se obtenien los datos si hay un producto nuevo a agregar  ----------*/
			$nuevo_Num = array('num' => $request->input("numero-".($indice['indice'] + 1)));
			$nuevo_Nombre = array('nombre' => $request->input("nombre-".($indice['indice'] + 1)));
			$nuevo_Descripcion = array('descripcion' => $request->input("descripcion-".($indice['indice'] + 1)));

			/*----------  se pregunta si hay algun campo vacio en el formulario agregar ----------*/
			if (!empty($nuevo_Num['num']) && !empty($nuevo_Nombre['nombre']) && !empty($nuevo_Descripcion['descripcion'])) {
				$indice['indice'] = $indice['indice'] + 1; /*se incrementa la variable indice para llegar hasta el ultimo formulario*/
			}

			/*----------  se obitienen los datos a actualizar del formulario  ----------*/
			for ($i=0; $i <= $indice['indice']; $i++) {
				${"num_".$i} = array('num-'.$i => $request->input("numero-".$i));
				${"nombre_".$i} = array('nombre-'.$i => $request->input("nombre-".$i));
				${"descripcion_".$i} = array('descripcion-'.$i => $request->input("descripcion-".$i));
			}

			/*----------  se valida que todos lo campos estén llenos y sin caracteres no validos  ----------*/

			for ($i=0; $i <= $indice['indice']; $i++) {
				if (!empty(${"num_".$i}["num-".$i])) {
					${"validarNum_".$i} = \Validator::make(${"num_".$i}, [
						"num-".$i => 'required|regex:/^[-\\_\\:\\.\\0-9a-z]+$/i']);
				}
				if (!empty(${"nombre_".$i}["nombre-".$i])) {
					${"validarNombre_".$i} = \Validator::make(${"nombre_".$i}, [
						"nombre-".$i => 'required|regex:/^[-\\_\\:\\.\\0-9a-zA-ZñÑáéíóúÁÉÍÓÚ ]+$/i']);
				}
				if (!empty(${"descripcion_".$i}["descripcion-".$i])) {
					${"validarDescripcion_".$i} = \Validator::make(${"descripcion_".$i}, [
						"descripcion-".$i => 'required|regex:/^[=\\&\\$\\;\\-\\_\\*\\"\\<\\>\\?\\¿\\!\\¡\\:\\,\\.\\0-9a-zA-ZñÑáéíóúÁÉÍÓÚ ]+$/i']);
				}
			}

			/*----------  se evalua si se encontró algún campo no valido  ----------*/
			$productos = "[{"; /*inicialización de la variable productos (dato JSON)*/
			for ($i=0; $i <= $indice['indice']; $i++) {
				if (${"validarNum_".$i}->fails()) {
					return redirect("/pagina_web/info/productos")->with("no-validacion", "");
				}elseif (${"validarNombre_".$i}->fails()) {
					return redirect("/pagina_web/info/productos")->with("no-validacion", "");
				}elseif (${"validarDescripcion_".$i}->fails()) {
					return redirect("/pagina_web/info/productos")->with("no-validacion", "");
				}else{

					/*----------  se llena el nuevo dato JSON de productos  ----------*/
					if($i == $indice["indice"]) {
						$productos = $productos."\n\t".'"num": "'.${"num_".$i}["num-".$i].'", '."\n\t".'"nombre": "'.${"nombre_".$i}["nombre-".$i].'", '."\n\t".'"descripcion": "'.${"descripcion_".$i}["descripcion-".$i].'"'."\n".'}]';
					} else {
						$productos = $productos."\n\t".'"num": "'.${"num_".$i}["num-".$i].'", '."\n\t".'"nombre": "'.${"nombre_".$i}["nombre-".$i].'", '."\n\t".'"descripcion": "'.${"descripcion_".$i}["descripcion-".$i].'"'."\n".'},{';
					}

				}
			}

			/*----------  la variable productos se mete en un array para ser mandada al modelo y ser actualizada  ----------*/
			$actualizar = array('productos' => $productos);
			$paginaweb = PaginaWebModel::where("id", $id)->update($actualizar);
			return redirect("/pagina_web/info/productos")->with("ok-editar", "");
		}



	}

	/*=====  End of Actualizar productos y servicios  ======*/

}
