<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PaginaWebModel;
use App\CategoriasModel;

class CarruselController extends Controller
{
    public function index(){
    	$paginaweb = PaginaWebModel::all();
    	$categorias = CategoriasModel::all();

    	return view("paginas.pagina_web.ingresarCarrusel", array("paginaweb" => $paginaweb, "categorias" => $categorias));
    }

    /*======================================================
    =            Agregar nuevo item al carrusel            =
    ======================================================*/

    /**
     * Como el carrusel es un dato JSON dentro de la tabla de página, agregar un nuevo dato
     * se hace por medio de una actualización en el mismo campo.
     *
     */


    public function update($id, Request $request) {

        $eliminar = array('eliminar' => $request->input("eliminar"));
        $carrusel = array('listaCarrusel' => $request->input("listaCarrusel"));
        $imagenExterna = array('imagenExterna' => $request->input("imagenExterna"));

        /*echo '<pre>'; print_r($eliminar["eliminar"]); echo '</pre>';
        echo '<pre>'; print_r($carrusel['listaCarrusel']); echo '</pre>';
        return; */

        /*----------  Se evalua el valor de la variable para ver si la actualización fue un eliminar  ----------*/
        if ($eliminar['eliminar'] == "si") {
            $carrusel = array('listaCarrusel' => $request->input("listaCarrusel"));
            $actualizar = array('carrusel' => $carrusel['listaCarrusel']);
            $paginaweb = PaginaWebModel::where("id", $id)->update($actualizar);
            return redirect("/pagina_web/ingresarCarrusel")->with("ok-editar", "");
        }

        $indice = array('indice' => $request->input("indice"));
        /*echo '<pre>'; print_r($indice['indice']); echo '</pre>';
        return;*/
        $escenario = array('escenario' => $request->input("escenario"));

        $categoria_Nuevo = array('categoria' => $request->input("categoria-".($indice['indice']+1)));
        $titulo_Nuevo = array('titulo' => $request->input("titulo-".($indice['indice']+1)));
        $texto_Nuevo = array('texto' => $request->input("texto-".($indice['indice']+1)));
        $boton_1_Nuevo = array('boton_1' => $request->input("boton-1-".($indice['indice']+1)));
        $url_Boton_1_Nuevo = array('url_Boton_1' => $request->input("url-boton-1-".($indice['indice']+1)));
        $boton_2_Nuevo = array('boton_2_Nuevo' => $request->input("boton-2-".($indice['indice']+1)));
        $url_Boton_2_Nuevo = array('url_Boton_2' => $request->input("url-boton-2-".($indice['indice']+1)));
        $foto_Delante_Nuevo = array('foto_Delante' => $request->input("foto-delante-".($indice['indice']+1)));
        $fondo_Nuevo = array('fondo' => $request->file("fondo-".($indice['indice']+1)));



        if (!empty($categoria_Nuevo["categoria"]) && !empty($titulo_Nuevo["titulo"]) && !empty($texto_Nuevo["texto"]) && !empty($fondo_Nuevo["fondo"])) {
            $indice['indice'] = $indice['indice'] + 1; /*se incrementa la variable indice para agregar el nuevo indice*/
        }elseif ($imagenExterna['imagenExterna']=="si") {
            $indice['indice'] = $indice['indice'] + 1;
        }


        for ($i=0; $i <= $indice['indice']; $i++) {

            if (($imagenExterna['imagenExterna']=="si") && ($i == $indice['indice'])) {
                ${"categoria_".$i} = array('categoria_'.$i => "undefined");
                ${"titulo_".$i} = array('titulo_'.$i => "undefined");
                ${"texto_".$i} = array('texto_'.$i => "undefined");
            }else{
                ${"categoria_".$i} = array('categoria_'.$i => $request->input("categoria-".$i));
                ${"titulo_".$i} = array('titulo_'.$i => $request->input("titulo-".$i));
                ${"texto_".$i} = array('texto_'.$i => $request->input("texto-".$i));
            }

            ${"boton_1_Color_".$i} = array('boton_1_color'.$i => $request->input("boton-1-color-".$i));
            ${"boton_1_Texto_".$i} = array('boton_1_texto'.$i => $request->input("boton-1-texto-".$i));
            ${"url_Boton_1_".$i} = array('url_Boton_1_'.$i => $request->input("url-boton-1-".$i));
            ${"boton_2_Color_".$i} = array('boton_2_color'.$i => $request->input("boton-2-color-".$i));
            ${"boton_2_Texto_".$i} = array('boton_2_texto'.$i => $request->input("boton-2-texto-".$i));
            ${"url_Boton_2_".$i} = array('url_Boton_2_'.$i => $request->input("url-boton-2-".$i));
            ${"foto_Delante_Actual_".$i} = array('foto_Delante_'.$i => $request->input("foto-delante-actual-".$i));
            ${"fondo_Actual_".$i} = array('fondo_'.$i => $request->input("fondo-actual-".$i));

            /*----------  Imagenes temporales  ----------*/
            ${"foto_Delante_Temporal_".$i} = array('foto_Delante_'.$i => $request->file("foto-delante-".$i));
            ${"fondo_Temporal_".$i} = array('fondo_'.$i => $request->file("fondo-".$i));

        }

        $carrusel = "[{";

        for ($i=0; $i <= $indice['indice']; $i++) {
            ${"validar_Categoria_".$i} = \Validator::make(${"categoria_".$i}, [ "categoria_".$i => 'required|regex:/^[,\\0-9a-zA-ZñÑáéíóúÁÉÍÓÚ ]+$/i']);
            ${"validar_Titulo_".$i} = \Validator::make(${"titulo_".$i}, ["titulo_".$i => 'required|regex:/^[=\\&\\$\\;\\-\\_\\*\\"\\<\\>\\?\\¿\\!\\¡\\:\\,\\.\\0-9a-zA-ZñÑáéíóúÁÉÍÓÚ ]+$/i']);
            ${"validar_Texto_".$i} = \Validator::make(${"texto_".$i}, ["texto_".$i => 'required|regex:/^[=\\&\\$\\;\\-\\_\\*\\"\\<\\>\\?\\¿\\!\\¡\\:\\,\\.\\0-9a-zA-ZñÑáéíóúÁÉÍÓÚ ]+$/i']);

            if (${"validar_Categoria_".$i}->fails() || ${"validar_Titulo_".$i}->fails() || ${"validar_Texto_".$i}->fails()) {
                return redirect("/pagina_web/ingresarCarrusel")->with("no-validacion", "");
            }


            if (!empty(${"boton_1_Color_".$i}["boton_1_color".$i])) {
                ${"validar_Boton_1_Color_".$i} = \Validator::make(${"boton_1_Color_".$i}, [ "boton_1_color".$i => 'required|regex:/^[-\\a-zA-Z]+$/i']);
                if (${"validar_Boton_1_Color_".$i}->fails()) {
                    return redirect("/pagina_web/ingresarCarrusel")->with("no-validacion", "");
                }
            }
            if (!empty(${"boton_1_Texto_".$i}["boton_1_texto".$i])) {
                ${"validar_Boton_1_Texto_".$i} = \Validator::make(${"boton_1_Texto_".$i}, [ "boton_1_texto".$i => 'required|regex:/^[=\\&\\$\\;\\-\\_\\*\\"\\<\\>\\?\\¿\\!\\¡\\:\\,\\.\\0-9a-zA-ZñÑáéíóúÁÉÍÓÚ ]+$/i']);
                if (${"validar_Boton_1_Texto_".$i}->fails()) {
                    return redirect("/pagina_web/ingresarCarrusel")->with("no-validacion", "");
                }
            }
            if (!empty(${"url_Boton_1_".$i}["url_Boton_1_".$i])) {
                ${"validar_Url_Boton_1_Actual_".$i} = \Validator::make(${"url_Boton_1_".$i}, [ "url_Boton_1_".$i => 'required|regex:/^[=\\&\\$\\-\\_\\?\\!\\:\\.\\0-9a-zA-Z]+$/i']);
                if (${"validar_Url_Boton_1_Actual_".$i}->fails()) {
                    return redirect("/pagina_web/ingresarCarrusel")->with("no-validacion", "");
                }
            }
            if (!empty(${"boton_2_Color_".$i}["boton_2_color".$i])) {
                ${"validar_Boton_2_Color_".$i} = \Validator::make(${"boton_2_Color_".$i}, [ "boton_2_color".$i => 'required|regex:/^[-\\a-zA-Z]+$/i']);
                if (${"validar_Boton_2_Color_".$i}->fails()) {
                    return redirect("/pagina_web/ingresarCarrusel")->with("no-validacion", "");
                }
            }
            if (!empty(${"boton_2_Texto_".$i}["boton_2_texto".$i])) {
                ${"validar_Boton_2_Texto_".$i} = \Validator::make(${"boton_2_Texto_".$i}, [ "boton_2_texto".$i => 'required|regex:/^[=\\&\\$\\;\\-\\_\\*\\"\\<\\>\\?\\¿\\!\\¡\\:\\,\\.\\0-9a-zA-ZñÑáéíóúÁÉÍÓÚ ]+$/i']);
                if (${"validar_Boton_2_Texto_".$i}->fails()) {
                    return redirect("/pagina_web/ingresarCarrusel")->with("no-validacion", "");
                }
            }
            if (!empty(${"url_Boton_2_".$i}["url_Boton_2_".$i])) {
                ${"validar_Url_Boton_2_Actual_".$i} = \Validator::make(${"url_Boton_2_".$i}, [ "url_Boton_2_".$i => 'required|regex:/^[=\\&\\$\\-\\_\\?\\!\\:\\.\\0-9a-zA-Z]+$/i']);
                if (${"validar_Url_Boton_2_Actual_".$i}->fails()) {
                    return redirect("/pagina_web/ingresarCarrusel")->with("no-validacion", "");
                }
            }
            if (!empty(${"foto_Delante_Actual".$i}["foto_Delante_".$i])) {
                ${"validar_Foto_Delante_Actual_".$i} = \Validator::make(${"foto_Delante_Actual_".$i}, [ "foto_Delante_".$i => 'required|regex:/^[=\\&\\$\\-\\_\\?\\!\\:\\.\\0-9a-zA-Z]+$/i']);
                if (${"validar_Foto_Delante_Actual_".$i}->fails()) {
                    return redirect("/pagina_web/ingresarCarrusel")->with("no-validacion", "");
                }
            }
            if (!empty(${"fondo_Actual_".$i}["fondo_".$i])) {
                ${"validar_Fondo_Actual_".$i} = \Validator::make(${"fondo_Actual_".$i}, [ "fondo_".$i => 'required|regex:/^[=\\&\\$\\-\\_\\?\\!\\:\\.\\0-9a-zA-Z]+$/i']);
                if (${"validar_Fondo_Actual_".$i}->fails()) {
                    return redirect("/pagina_web/ingresarCarrusel")->with("no-validacion", "");
                }
            }

            if (!empty(${"foto_Delante_Temporal_".$i}["foto_Delante_".$i])) {
                ${"validar_Foto_Delante_Temporal_".$i} = \Validator::make(${"foto_Delante_Temporal_".$i}, [ "foto_Delante_".$i => 'required|image|mimes:jpg,jpeg,png|max:2000000']);
                if (${"validar_Foto_Delante_Temporal_".$i}->fails()) {
                    return redirect("/pagina_web/ingresarCarrusel")->with("no-validacion", "");
                } else {


                    $aleatorio = mt_rand(10000, 99999);
                    ${"ruta_Foto_Delante_".$i} = "vistas/images/pagina_web/carrusel/".$aleatorio.".".${"foto_Delante_Temporal_".$i}["foto_Delante_".$i]->guessExtension();

                    if ($escenario["escenario"] == "prueba") {
                        move_uploaded_file(${"foto_Delante_Temporal_".$i}["foto_Delante_".$i], ${"ruta_Foto_Delante_".$i});
                    }

                    if ($escenario["escenario"] == "sistema") {
                        if (!empty(${"foto_Delante_Actual_".$i}["foto_Delante_".$i])) {
                            unlink(${"foto_Delante_Actual_".$i}["foto_Delante_".$i]);
                        }

                        /*----------  Redimensionar imagen  ----------*/
                        list($ancho, $alto) = getimagesize(${"foto_Delante_Temporal_".$i}["foto_Delante_".$i]);
                        $nuevoAncho = 600;
                        $nuevoAlto = 500;

                        if((${"foto_Delante_Temporal_".$i}["foto_Delante_".$i]->guessExtension() == "jpeg") || (${"foto_Delante_Temporal_".$i}["foto_Delante_".$i]->guessExtension() == "jpg")){

                            $origen = imagecreatefromjpeg(${"".$i}["".$i]);
                            $destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);
                            imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);
                            imagejpeg($destino, ${"ruta_Foto_Delante_".$i});

                        }

                        if(${"foto_Delante_Temporal_".$i}["foto_Delante_".$i]->guessExtension() == "png"){

                            $origen = imagecreatefrompng(${"foto_Delante_Temporal_".$i}["foto_Delante_".$i]);
                            $destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);
                            imagealphablending($destino, FALSE);
                            imagesavealpha($destino, TRUE);
                            imagecopyresampled($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);
                            imagepng($destino, ${"ruta_Foto_Delante_".$i});

                        }
                    }

                }
            } else {
                ${"ruta_Foto_Delante_".$i} = ${"foto_Delante_Actual_".$i}["foto_Delante_".$i];
            }
            if (!empty(${"fondo_Temporal_".$i}["fondo_".$i])) {
                ${"validar_Fondo_Temporal_".$i} = \Validator::make(${"fondo_Temporal_".$i}, [ "fondo_".$i => 'required|image|mimes:jpg,jpeg,png|max:2000000']);
                if (${"validar_Fondo_Temporal_".$i}->fails()) {
                    return redirect("/pagina_web/ingresarCarrusel")->with("no-validacion", "");
                } else {

                    $aleatorio = mt_rand(10000, 99999);
                    ${"ruta_Fondo_".$i} = "vistas/images/pagina_web/carrusel/".$aleatorio.".".${"fondo_Temporal_".$i}["fondo_".$i]->guessExtension();

                    if ($escenario["escenario"] == "prueba") {
                        move_uploaded_file(${"fondo_Temporal_".$i}["fondo_".$i], ${"ruta_Fondo_".$i});
                    }

                    if ($escenario["escenario"] == "sistema") {
                        if (!empty(${"fondo_Actual_".$i}["fondo_".$i])) {
                            unlink(${"fondo_Actual_".$i}["fondo_".$i]);
                        }

                        /*----------  Redimensionar imagen  ----------*/
                        list($ancho, $alto) = getimagesize(${"fondo_Temporal_".$i}["fondo_".$i]);
                        $nuevoAncho = 2000;
                        $nuevoAlto = 1333;

                        if((${"fondo_Temporal_".$i}["fondo_".$i]->guessExtension() == "jpeg") || (${"fondo_Temporal_".$i}["fondo_".$i]->guessExtension() == "jpg")){

                            $origen = imagecreatefromjpeg(${"fondo_Temporal_".$i}["fondo_".$i]);
                            $destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);
                            imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);
                            imagejpeg($destino, ${"ruta_Fondo_".$i});

                        }

                        if(${"fondo_Temporal_".$i}["fondo_".$i]->guessExtension() == "png"){

                            $origen = imagecreatefrompng(${"fondo_Temporal_".$i}["fondo_".$i]);
                            $destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);
                            imagealphablending($destino, FALSE);
                            imagesavealpha($destino, TRUE);
                            imagecopyresampled($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);
                            imagepng($destino, ${"ruta_Fondo_".$i});

                        }
                    }

                }
            } else {
                ${"ruta_Fondo_".$i} = ${"fondo_Actual_".$i}["fondo_".$i];
            }

            if($i == $indice["indice"]){
                $carrusel = $carrusel."\n\t".'"categoria": "'.${'categoria_'.$i}['categoria_'.$i].'",'."\n\t".'"titulo": "'.${'titulo_'.$i}['titulo_'.$i].'",'."\n\t".'"texto": "'.${'texto_'.$i}['texto_'.$i].'",'."\n\t".'"boton-1-color": "'.${"boton_1_Color_".$i}["boton_1_color".$i].'",'."\n\t".'"boton-1-texto": "'.${"boton_1_Texto_".$i}["boton_1_texto".$i].'",'."\n\t".'"url-boton-1": "'.${"url_Boton_1_".$i}["url_Boton_1_".$i].'",'."\n\t".'"boton-2-color": "'.${"boton_2_Color_".$i}["boton_2_color".$i].'",'."\n\t".'"boton-2-texto": "'.${"boton_2_Texto_".$i}["boton_2_texto".$i].'",'."\n\t".'"url-boton-2": "'.${"url_Boton_2_".$i}["url_Boton_2_".$i].'",'."\n\t".'"foto-delante": "'.${"ruta_Foto_Delante_".$i}.'",'."\n\t".'"fondo": "'.${"ruta_Fondo_".$i}.'"'."\n".'}]';
            }else{
                $carrusel = $carrusel."\n\t".'"categoria": "'.${'categoria_'.$i}['categoria_'.$i].'",'."\n\t".'"titulo": "'.${'titulo_'.$i}['titulo_'.$i].'",'."\n\t".'"texto": "'.${'texto_'.$i}['texto_'.$i].'",'."\n\t".'"boton-1-color": "'.${"boton_1_Color_".$i}["boton_1_color".$i].'",'."\n\t".'"boton-1-texto": "'.${"boton_1_Texto_".$i}["boton_1_texto".$i].'",'."\n\t".'"url-boton-1": "'.${"url_Boton_1_".$i}["url_Boton_1_".$i].'",'."\n\t".'"boton-2-color": "'.${"boton_2_Color_".$i}["boton_2_color".$i].'",'."\n\t".'"boton-2-texto": "'.${"boton_2_Texto_".$i}["boton_2_texto".$i].'",'."\n\t".'"url-boton-2": "'.${"url_Boton_2_".$i}["url_Boton_2_".$i].'",'."\n\t".'"foto-delante": "'.${"ruta_Foto_Delante_".$i}.'",'."\n\t".'"fondo": "'.${"ruta_Fondo_".$i}.'"'."\n".'},{';
            }


        }

        $actualizar = array('carrusel' => $carrusel);
        $paginaweb = PaginaWebModel::where("id", $id)->update($actualizar);
        return redirect("/pagina_web/ingresarCarrusel")->with("ok-editar","");


    }

    /*=====  End of Agregar nuevo item al carrusel  ======*/

}
