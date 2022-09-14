<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PaginaWebModel;

class PaginaWebController extends Controller
{
	/*===============================================================
	=            Mostrar todos los registros en la tabla            =
	===============================================================*/

	public function index(){
    	$paginaweb = PaginaWebModel::all();

    	return view("paginas.pagina_web.general", array("paginaweb" => $paginaweb));
    }

	/*=====  End of Mostrar todos los registros en la tabla  ======*/

	/*===========================================
	=            Actualizar registro            =
	===========================================*/

	public function update($id, Request $request){
		/*----------  Obtener los datos del request  ----------*/
		$datos = array(
            "escenario" => $request->input("escenario"),
            "dominio" => $request->input("dominio"),
			"servidor" => $request->input("servidor"),
            "titulo_pestana" => $request->input("titulo_pestana"),
			"titulo_pagina" => $request->input("titulo_pagina"),
            "titulo_navegacion" => $request->input("titulo_navegacion"),
            "descripcion" => $request->input("descripcion"),
            "palabras_claves" => $request->input("palabras_claves"),
            "redes_sociales"=>$request->input("redes_sociales"),
            "direccion"=>$request->input("direccion"),
            "telefono"=>$request->input("telefono"),
            "celular"=>$request->input("celular"),
            "email"=>$request->input("email"),
            "logo_pestana_actual"=>$request->input("logo_pestana_actual"),
            "logo_navegacion_actual"=>$request->input("logo_navegacion_actual")
        );
		/*echo '<pre>'; print_r($datos["redes_sociales"]); echo '</pre>';
		return;*/
		/*----------  Recoge imágenes logos  ----------*/
		$logo_pestana = array("logo_pestana_temporal"=>$request->file("pestana"));
		$logo_navegacion = array("logo_navegacion_temporal"=>$request->file("nav"));

		/*----------  Recoge imágenes carrusel  ----------*/
		$indice = array('indice' => $request->input("indice"));

		/**
		 *
		 * Se hace una ciclo 'for' para la declaración y asignación de las diferentes define_syslog_variables
		 * debido a que el carrusel es una estructura dinamica.
		 *
		 */

		/*----------  Verificar validación  ----------*/
		if (!empty($datos)) {
			$validar = \Validator::make($datos, [
				"dominio" => 'required|regex:/^[-\\_\\:\\.\\0-9a-z]+$/i',
                "servidor" => 'required|regex:/^[-\\_\\:\\.\\@\\0-9a-z]+$/i',
                "titulo_pestana" => 'required|regex:/^[-\\_\\:\\.\\0-9a-zA-ZñÑáéíóúÁÉÍÓÚ ]+$/i',
                "titulo_pagina" => 'required|regex:/^[-\\_\\:\\.\\0-9a-zA-ZñÑáéíóúÁÉÍÓÚ ]+$/i',
                "titulo_navegacion" => 'required|regex:/^[-\\_\\:\\.\\0-9a-zA-ZñÑáéíóúÁÉÍÓÚ ]+$/i',
                "descripcion" => 'required|regex:/^[=\\&\\$\\;\\-\\_\\*\\"\\<\\>\\?\\¿\\!\\¡\\:\\,\\.\\0-9a-zA-ZñÑáéíóúÁÉÍÓÚ ]+$/i',
                "palabras_claves" => 'required|regex:/^[,\\0-9a-zA-ZñÑáéíóúÁÉÍÓÚ ]+$/i',
                "redes_sociales" => 'required',
                "direccion" => 'required|regex:/^[+\\#\\;\\-\\_\\*\\"\\:\\,\\.\\@\\0-9a-zA-ZñÑáéíóúÁÉÍÓÚ ]+$/i',
                "telefono" => 'required|regex:/^[+\\0-9 ]+$/i',
                "celular" => 'required|regex:/^[+\\0-9 ]+$/i',
                "email" => 'required|regex:/^[-\\_\\.\\@\\0-9a-zA-Z]+$/i',
                "logo_pestana_actual" => 'required',
                "logo_navegacion_actual" => 'required'
			]);

			/*==================================================================
			=            Sección de validación de imagenes de logos            =
			==================================================================*/

			/*----------  Validar logo navegación  ----------*/
			if($logo_navegacion["logo_navegacion_temporal"] != ""){
                $validarLogo_navegacion = \Validator::make($logo_navegacion, [
                "logo_navegacion_temporal" => 'required|image|mimes:jpg,jpeg,png|max:2000000']);

                if($validarLogo_navegacion->fails()){
                    return redirect("/pagina_web/general?ver=logos")->with("no-validacion-imagen", "");
                }
            }

            /*----------  Validar logo pestaña  ----------*/
            if($logo_pestana["logo_pestana_temporal"] != ""){
                $validarLogo_pestana = \Validator::make($logo_pestana, [
                "logo_pestana_temporal" => 'required|image|mimes:jpg,jpeg,png|max:2000000']);

                if($validarLogo_pestana->fails()){
                    return redirect("/pagina_web/general?ver=logos")->with("no-validacion-imagen", "");
                }
            }

			/*=====  End of Sección de validación de imagenes de logos  ======*/







			if ($validar->fails()) {
				return redirect("/pagina_web/general?ver=ninguna")->with("no-validacion", "");
			}else{
				/*==================================================================
				=            Eliminar y subir logos nuevos al servidor            =
				==================================================================*/

				//subir al servidor las imagenes
				if($logo_pestana["logo_pestana_temporal"] != ""){
					//unlink($datos["logo_pestana_actual"]);
					$aleatorio = mt_rand(1000, 9999);
					$ruta_logo_pestana = "vistas/images/pagina_web/".$aleatorio.".".$logo_pestana["logo_pestana_temporal"]->guessExtension();
					if ($datos["escenario"] == "prueba") {
                        move_uploaded_file($logo_pestana["logo_pestana_temporal"], $ruta_logo_pestana);
                    } else {
                        /*----------  Redimensionar imagen de logo pestaña  ----------*/
                        list($ancho, $alto) = getimagesize($logo_pestana["logo_pestana_temporal"]);
                        $nuevoAncho = 50;
                        $nuevoAlto = 50;
                        if($logo_pestana["logo_pestana_temporal"]->guessExtension() == "jpeg"){
                            $origen = imagecreatefromjpeg($logo_pestana["logo_pestana_temporal"]);
                            $destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);
                            imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);
                            imagejpeg($destino, $ruta_logo_pestana);
                        }
                        if($logo_pestana["logo_pestana_temporal"]->guessExtension() == "png"){
                            $origen = imagecreatefrompng($logo_pestana["logo_pestana_temporal"]);
                            $destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);
                            imagealphablending($destino, FALSE);
                            imagesavealpha($destino, TRUE);
                            imagecopyresampled($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);
                            imagepng($destino, $ruta_logo_pestana);
                        }
                    }
				}else{

                    $ruta_logo_pestana = $datos["logo_pestana_actual"];
                }

				if($logo_navegacion["logo_navegacion_temporal"] != ""){
					//unlink($datos["logo_navegacion_actual"]);
					$aleatorio = mt_rand(1000, 9999);
					$ruta_logo_navegacion = "vistas/images/pagina_web/".$aleatorio.".".$logo_navegacion["logo_navegacion_temporal"]->guessExtension();
					if ($datos["escenario"] == "prueba") {
                        move_uploaded_file($logo_navegacion["logo_navegacion_temporal"], $ruta_logo_navegacion);
                    } else {
                        /*----------  Redimensionar imagen de logo navegación  ----------*/
                        list($ancho, $alto) = getimagesize($logo_navegacion["logo_navegacion_temporal"]);
                        $nuevoAncho = 270;
                        $nuevoAlto = 100;
                        if($logo_navegacion["logo_navegacion_temporal"]->guessExtension() == "jpeg"){
                            $origen = imagecreatefromjpeg($logo_navegacion["logo_navegacion_temporal"]);
                            $destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);
                            imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);
                            imagejpeg($destino, $ruta_logo_navegacion);
                        }
                        if($logo_navegacion["logo_navegacion_temporal"]->guessExtension() == "png"){
                            $origen = imagecreatefrompng($logo_navegacion["logo_navegacion_temporal"]);
                            $destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);
                            imagealphablending($destino, FALSE);
                            imagesavealpha($destino, TRUE);
                            imagecopyresampled($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);
                            imagepng($destino, $ruta_logo_navegacion);
                        }
                    }
				}else{

                    $ruta_logo_navegacion = $datos["logo_navegacion_actual"];
                }

				/*=====  End of Eliminar y subir logos nuevos al servidor  ======*/




				//$paginaweb = PaginaWebModel::all();
				$contacto = $datos["direccion"].'^'.$datos["telefono"].'^'.$datos["celular"].'^'.$datos["email"];
				//echo '<pre>'; print_r($contacto); echo '</pre>';

				/**
				 *
				 * En esta sección se colocan despues de la validación los datos nuevos en un array
				 * para mandarlos a la base de datos
				 *
				 */

                $actualizar = array(
                    "dominio"=> $datos["dominio"],
                    "servidor"=> $datos["servidor"],
                    "titulo_pestana" => $datos["titulo_pestana"],
                    "titulo_pagina" => $datos["titulo_pagina"],
                    "titulo_navegacion" => $datos["titulo_navegacion"],
                    "descripcion" => $datos["descripcion"],
                    "palabras_claves" => json_encode(explode(",", $datos["palabras_claves"])),
                    "redes_sociales" => $datos["redes_sociales"],
                    "contacto" => json_encode(explode("^", $contacto)),
                    "logo_navegacion" => $ruta_logo_navegacion,
                    "logo_pestana" => $ruta_logo_pestana
                );

                $paginaweb = PaginaWebModel::where("id", $id)->update($actualizar);
                return redirect("/pagina_web/general?ver=ninguna")->with("ok-editar","");
			}
		}else{
			return redirect("/pagina_web/general?ver=ninguna")->with("error","");
		}

	}

	/*=====  End of Actualizar registro  ======*/


}


