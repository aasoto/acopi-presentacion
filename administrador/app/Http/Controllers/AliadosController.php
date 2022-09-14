<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PaginaWebModel;

class AliadosController extends Controller
{
	/*===================================================
	=            Mostrar todos los registros            =
	===================================================*/

	public function index(){
    	$paginaweb = PaginaWebModel::all();
    	return view("paginas.pagina_web.aliados", array("paginaweb" => $paginaweb));
    }

	/*=====  End of Mostrar todos los registros  ======*/

	/*==========================================
	=            Actualizar aliados            =
	==========================================*/

	public function update($id, Request $request) {
		/*----------  Se recibe el valor de la variable Eliminar  ----------*/
		$eliminar = array('eliminar' => $request->input("eliminar"));

		/*----------  Se evalua el valor de la variable para ver si la actualización fue un eliminar  ----------*/
		if ($eliminar['eliminar'] == "si") {
			$aliados = array('listaAliados' => $request->input("listaAliados"));
			$actualizar = array('aliados' => $aliados['listaAliados']);
			$paginaweb = PaginaWebModel::where("id", $id)->update($actualizar);
			return redirect("/pagina_web/aliados")->with("ok-editar", "");
		}


		/*----------  se recoje el número todas de productos mostrados  ----------*/
		$indice = array('indice' => $request->input("indice"));
		/*echo '<pre>'; print_r($indice); echo '</pre>';
		return;*/

		/*----------  se alza bandera para permitir borrar archivos  ----------*/
		$bandera = true;

		/*----------  Se recogen variables del nuevo aliado  ----------*/
		$nombre_Nuevo = array('nombre-nuevo' => $request->input("nombre-".($indice['indice'] + 1)));
		$link_Nuevo = array('link-nuevo' => $request->input("link-".($indice['indice'] + 1)));
		$logo_actual_Nuevo = array('logo-actual-nuevo' => $request->input("logo_actual-".($indice['indice'] + 1)));
		$logo_temporal_Nuevo = array('logo-temporal-nuevo' => $request->file("logo-".($indice['indice'] + 1)));

		/*----------  se progunta si todos los datos de la card agregar están completos  ----------*/
		if (!empty($nombre_Nuevo["nombre-nuevo"]) && !empty($link_Nuevo["link-nuevo"]) && !empty($logo_actual_Nuevo["logo-actual-nuevo"]) && !empty($logo_temporal_Nuevo["logo-temporal-nuevo"])) {
			$indice['indice'] = $indice['indice'] + 1; /*se incrementa la variable indice para agregar el nuevo indice*/
			$bandera = false; /*se baja bandera que permite borrar archivos*/
		}

		/*----------  se obtienen los datos a actualizar del formulario  ----------*/
		for ($i=0; $i <= $indice['indice']; $i++) {
			${"nombre_".$i} = array('nombre-'.$i => $request->input("nombre-".$i));
			${"link_".$i} = array('link-'.$i => $request->input("link-".$i));
			${"logo_actual_".$i} = array('logo-actual-'.$i => $request->input("logo_actual-".$i));
			${"logo_temporal_".$i} = array('logo-temporal-'.$i => $request->file("logo-".$i));
		}

        /*for ($i=0; $i <= $indice['indice']; $i++) {
			print_r("nombre-".$i.": ".${"nombre_".$i}["nombre-".$i]);
			print_r("link-".$i.": ".${"link_".$i}["link-".$i]);
			print_r("logo_actual-".$i.": ".${"logo_actual_".$i}["logo-actual-".$i]);
			print_r("logo-".$i.": ".${"logo_temporal_".$i}["logo-temporal-".$i]);
		}
        return;*/

		/*----------  se valida que todos lo campos estén llenos y sin caracteres no validos  ----------*/
		for ($i=0; $i <= $indice['indice']; $i++) {
			if (!empty(${"nombre_".$i}["nombre-".$i])) {
				${"validarNombre_".$i} = \Validator::make(${"nombre_".$i}, [
				"nombre-".$i => 'required|regex:/^[-\\_\\:\\.\\0-9a-zA-ZñÑáéíóúÁÉÍÓÚ ]+$/i']);
			}
			if (!empty(${"link_".$i}["link-".$i])) {
				${"validarLink_".$i} = \Validator::make(${"link_".$i}, [
				"link-".$i => 'required|regex:/^[-\\_\\:\\.\\0-9a-z]+$/i']);
			}
			if (!empty(${"logo_actual_".$i}["logo-actual-".$i])) {
				${"validarLogo_actual_".$i} = \Validator::make(${"logo_actual_".$i}, [
				"logo-actual-".$i => 'required|regex:/^[-\\_\\:\\.\\0-9a-z]+$/i']);
			}
			if (!empty(${"logo_temporal_".$i}["logo-temporal-".$i])) {
				${"validarLogo_temporal_".$i} = \Validator::make(${"logo_temporal_".$i}, [
				"logo-temporal-".$i => 'required|image|mimes:jpg,jpeg,png|max:2000000']);
			}
		}

		/*----------  se evalua si se encontró algún campo no valido  ----------*/
		$aliados = "[{"; /*inicialización de la variable productos (dato JSON)*/
		for ($i=0; $i <= $indice['indice']; $i++) {
			if (${"validarNombre_".$i}->fails()) {
				return redirect("/pagina_web/aliados")->with("no-validacion", "");
			}elseif (${"validarLink_".$i}->fails()) {
				return redirect("/pagina_web/aliados")->with("no-validacion", "");
			}elseif (${"validarLogo_actual_".$i}->fails()) {
				return redirect("/pagina_web/aliados")->with("no-validacion", "");
			}
			if (${"logo_temporal_".$i}["logo-temporal-".$i] != "") {
				if (${"validarLogo_temporal_".$i}->fails()) {
					return redirect("/pagina_web/aliados")->with("no-validacion", "");
				} else {
					/*----------  se pregunta si la bandera está alzada para borrar archivos  ----------*/
					if ($bandera) {
						unlink(${"logo_actual_".$i}["logo-actual-".$i]);
					}
					$aleatorio = mt_rand(1000, 9999);
					${"ruta_logo".$i} = "vistas/images/pagina_web/aliados/".$aleatorio.".".${"logo_temporal_".$i}["logo-temporal-".$i]->guessExtension();
					move_uploaded_file(${"logo_temporal_".$i}["logo-temporal-".$i], ${"ruta_logo".$i});
				}
			} else {
				${"ruta_logo".$i} = ${"logo_actual_".$i}["logo-actual-".$i];
			}

			/*----------  se llena el nuevo dato JSON de productos  ----------*/
			if ($i == $indice["indice"]) {
				$aliados = $aliados."\n\t".'"nombre": "'.${"nombre_".$i}["nombre-".$i].'", '."\n\t".'"logo": "'.${"ruta_logo".$i}.'", '."\n\t".'"link": "'.${"link_".$i}["link-".$i].'"'."\n".'}]';
			} else {
				$aliados = $aliados."\n\t".'"nombre": "'.${"nombre_".$i}["nombre-".$i].'", '."\n\t".'"logo": "'.${"ruta_logo".$i}.'", '."\n\t".'"link": "'.${"link_".$i}["link-".$i].'"'."\n".'},{';
			}

		}

		/*----------  la variable productos se mete en un array para ser mandada al modelo y ser actualizada  ----------*/
		$actualizar = array('aliados' => $aliados);
		$paginaweb = PaginaWebModel::where("id", $id)->update($actualizar);
		return redirect("/pagina_web/aliados")->with("ok-editar", "");

	}

	/*=====  End of Actualizar aliados  ======*/



}
