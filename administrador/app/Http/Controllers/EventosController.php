<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\EventosModel;
use App\NoticiasModel;
use App\PaginaWebModel;

class EventosController extends Controller
{
    public function index()
    {
        $eventos = EventosModel::all();
        $total_eventos = count($eventos);

        return view("paginas.eventos.general", array("eventos" => $eventos, "total_eventos" => $total_eventos));
    }

    public function store(Request $request)
    {

        if ($request->input("tipo_evento") == "evento") {
            $datos = array(
                'escenario' => $request->input("escenario"),
                'nombre' => $request->input("nombre"),
                'portada_evento' => $request->file("portada_evento"),
                'descripcion' => $request->input("descripcion"),
                'palabras_claves' => $request->input("palabras_claves"),
                'ruta_noticia' => $request->input("ruta"),
                'contenido_noticia' => $request->input("contenido_noticia"),
                'ponentes' => $request->input("ponentes"),
                'patrocinadores' => $request->input("patrocinadores"),
                'num_participantes' => $request->input("num_participantes"),
                'allDay' => $request->input("allDay"),
                'fecha-inicio' => $request->input("fecha-inicio"),
                'hora-inicio' => $request->input("hora-inicio"),
                'fecha-final' => $request->input("fecha-final"),
                'hora-final' => $request->input("hora-final"),
                'color' => $request->input("color")
            );

            /*echo '<pre>'; print_r($datos); echo '</pre>';
            return;*/

            if (!empty($datos)) {

                $validar = \Validator::make($datos, [
                    "nombre" => "required|regex:/^[¿\\?\\¡\\!\\(\\)\\:\\,\\;\\.\\%\\#\\0-9a-zA-ZñÑáéíóúÁÉÍÓÚ ]+$/i",
                    "portada_evento" => "required|image|mimes:jpg,jpeg,png|max:2000000",
                    "descripcion" => "required|regex:/^[¿\\?\\¡\\!\\(\\)\\:\\,\\;\\.\\%\\#\\0-9a-zA-ZñÑáéíóúÁÉÍÓÚ ]+$/i",
                    "palabras_claves" => 'required|regex:/^[,\\0-9a-zA-ZñÑáéíóúÁÉÍÓÚ ]+$/i',
                    "ruta_noticia" => "required|regex:/^[-\\a-z0-9]+$/i",
                    "contenido_noticia" => 'required|regex:/^[(\\)\\=\\&\\$\\;\\-\\_\\*\\"\\<\\>\\?\\¿\\!\\¡\\:\\,\\.\\0-9a-zA-ZñÑáéíóúÁÉÍÓÚ ]+$/i',
                    "fecha-inicio" => "required|date",
                    "color" => "required|regex:/^[#\\0-9a-zA-Z]+$/i"
                ]);



                if ($validar->fails()) {
                    return redirect("/eventos/general")->with("no-validacion", "");
                } else {

                    if (!empty($datos["portada_evento"])) {
                        $aleatorio = mt_rand(10000, 99999);

                        $ruta = "vistas/images/noticias/portada/" . $aleatorio . "." . $datos["portada_evento"]->guessExtension();
                        if ($datos["escenario"] == "prueba") {
                            move_uploaded_file($datos["portada_evento"], $ruta);
                        }
                        if ($datos["escenario"] == "sistema") {
                            //Redimensionar Imágen
                            list($ancho, $alto) = getimagesize($datos["portada_evento"]);

                            $nuevoAncho = 2000;
                            $nuevoAlto = 1333;

                            if (($datos["portada_evento"]->guessExtension() == "jpeg") || ($datos["portada_evento"]->guessExtension() == "jpg")) {

                                $origen = imagecreatefromjpeg($datos["portada_evento"]);
                                $destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);
                                imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);
                                imagejpeg($destino, $ruta);
                            }

                            if ($datos["portada_evento"]->guessExtension() == "png") {

                                $origen = imagecreatefrompng($datos["portada_evento"]);
                                $destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);
                                imagealphablending($destino, FALSE);
                                imagesavealpha($destino, TRUE);
                                imagecopyresampled($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);
                                imagepng($destino, $ruta);
                            }
                        }

                    } else {

                        return redirect("/eventos/general")->with("no-validacion-2", "");
                    }

                    if (!empty($datos["ponentes"])) {
                        $validar = \Validator::make($datos, [
                            "ponentes" => "required|regex:/^[¿\\?\\¡\\!\\(\\)\\:\\,\\;\\.\\%\\#\\0-9a-zA-ZñÑáéíóúÁÉÍÓÚ ]+$/i"
                        ]);
                        if ($validar->fails()) {
                            echo '<pre>';
                            print_r("ponentes");
                            echo '</pre>';
                            return;
                            return redirect("/eventos/general")->with("no-validacion-2", "");
                        }
                    }
                    if (!empty($datos["patrocinadores"])) {
                        $validar = \Validator::make($datos, [
                            "patrocinadores" => "required|regex:/^[¿\\?\\¡\\!\\(\\)\\:\\,\\;\\.\\%\\#\\0-9a-zA-ZñÑáéíóúÁÉÍÓÚ ]+$/i"
                        ]);
                        if ($validar->fails()) {
                            echo '<pre>';
                            print_r("patrocinadores");
                            echo '</pre>';
                            return;
                            return redirect("/eventos/general")->with("no-validacion-2", "");
                        }
                    }
                    if (!empty($datos["num_participantes"])) {
                        $validar = \Validator::make($datos, [
                            "num_participantes" => "required|regex:/^[0-9]+$/i"
                        ]);
                        if ($validar->fails()) {
                            echo '<pre>';
                            print_r("num participantes");
                            echo '</pre>';
                            return;
                            return redirect("/eventos/general")->with("no-validacion-2", "");
                        }
                    }
                    if (!empty($datos["allDay"])) {
                        $validar = \Validator::make($datos, [
                            "allDay" => "required|regex:/^[a-z]+$/i"
                        ]);
                        if ($validar->fails()) {
                            echo '<pre>';
                            print_r("allday");
                            echo '</pre>';
                            return;
                            return redirect("/eventos/general")->with("no-validacion-2", "");
                        }
                    }
                    if (!empty($datos["fecha-inicio"])) {
                        $validar = \Validator::make($datos, [
                            "fecha-inicio" => "required|date"
                        ]);
                        if ($validar->fails()) {
                            echo '<pre>';
                            print_r("fecha inicio");
                            echo '</pre>';
                            return;
                            return redirect("/eventos/general")->with("no-validacion-2", "");
                        }
                    }
                    if (!empty($datos["hora-inicio"])) {
                        $validar = \Validator::make($datos, [
                            "hora-inicio" => "required|regex:/^[:\\0-9 ]+$/i"
                        ]);
                        if ($validar->fails()) {
                            echo '<pre>';
                            print_r("hora inicio");
                            echo '</pre>';
                            return;
                            return redirect("/eventos/general")->with("no-validacion-2", "");
                        }
                    }
                    if (!empty($datos["fecha-final"])) {
                        $validar = \Validator::make($datos, [
                            "fecha-final" => "required|date"
                        ]);
                        if ($validar->fails()) {
                            echo '<pre>';
                            print_r("fecha final");
                            echo '</pre>';
                            return;
                            return redirect("/eventos/general")->with("no-validacion-2", "");
                        }
                    }
                    if (!empty($datos["hora-final"])) {
                        $validar = \Validator::make($datos, [
                            "hora-final" => "required|regex:/^[:\\0-9 ]+$/i"
                        ]);
                        if ($validar->fails()) {
                            echo '<pre>';
                            print_r("hora final");
                            echo '</pre>';
                            return;
                            return redirect("/eventos/general")->with("no-validacion-2", "");
                        }
                    }

                    /**
                     *
                     * en el substr el #19 son el número de caracteres que le restan a la ruta $origen para que pueda ajustarse a la ruta del $fichero.
                     *
                     */

                    $origen = glob('vistas/images/temp/*');

                    foreach ($origen as $fichero) {

                        copy($fichero, "vistas/images/noticias/contenido/" . substr($fichero, 19));
                        unlink($fichero);
                    }

                    $paginaweb = PaginaWebModel::all();

                    $noticias = new NoticiasModel();
                    $noticias->titulo = $datos["nombre"];
                    $noticias->descripcion_noticia = $datos["descripcion"];
                    $noticias->categoria = "4";
                    $noticias->p_claves_noticia = json_encode(explode(",", $datos["palabras_claves"]));
                    $noticias->ruta_noticia = $datos["ruta_noticia"];
                    $noticias->portada_noticia = $ruta;
                    $noticias->contenido_noticia = str_replace('src="' . $paginaweb[0]["servidor"] . 'vistas/images/temp', 'src="' . $paginaweb[0]["servidor"] . 'vistas/images/noticias/contenido', $datos["contenido_noticia"]);

                    $noticias->save();

                    $evento = new EventosModel();
                    $evento->nombre = $datos["nombre"];
                    $evento->tematica = $datos["descripcion"];
                    $evento->ponentes = $datos["ponentes"];
                    $evento->patrocinadores = $datos["patrocinadores"];
                    $evento->num_participantes = $datos["num_participantes"];
                    $evento->fecha_inicio = $datos["fecha-inicio"];
                    $evento->hora_inicio = $datos["hora-inicio"];
                    $evento->fecha_final = $datos["fecha-final"];
                    $evento->hora_final = $datos["hora-final"];
                    $evento->backgroundColor = $datos["color"];
                    $evento->borderColor = $datos["color"];
                    $evento->allDay = $datos["allDay"];

                    $evento->save();

                    return redirect("/eventos/general")->with("ok-crear", "");
                }
            } else {

                return redirect("/eventos/general")->with("error", "");
            }
        }

        if ($request->input("tipo_evento") == "actividad") {
            $datos = array(
                'nombre' => $request->input("nombre"),
                'tematica' => $request->input("tematica"),
                'ponentes' => $request->input("ponentes"),
                'patrocinadores' => $request->input("patrocinadores"),
                'num_participantes' => $request->input("num_participantes"),
                'allDay' => $request->input("allDay"),
                'fecha-inicio' => $request->input("fecha-inicio"),
                'hora-inicio' => $request->input("hora-inicio"),
                'fecha-final' => $request->input("fecha-final"),
                'hora-final' => $request->input("hora-final"),
                'color' => $request->input("actividad-color")
            );

            /*echo '<pre>'; print_r($datos["hora-inicio"]); echo '</pre>';

	    			echo '<pre>'; print_r($datos["hora-final"]); echo '</pre>';
	    			return;*/

            if (!empty($datos)) {

                $validar = \Validator::make($datos, [
                    "nombre" => "required|regex:/^[¿\\?\\¡\\!\\(\\)\\:\\,\\;\\.\\%\\#\\0-9a-zA-ZñÑáéíóúÁÉÍÓÚ ]+$/i",
                    "fecha-inicio" => "required|date",
                    "color" => "required|regex:/^[#\\0-9a-zA-Z]+$/i"
                ]);



                if ($validar->fails()) {

                    return redirect("/eventos/general")->with("no-validacion", "");
                } else {

                    if (!empty($datos["tematica"])) {
                        $validar = \Validator::make($datos, [
                            "tematica" => "required|regex:/^[¿\\?\\¡\\!\\(\\)\\:\\,\\;\\.\\%\\#\\0-9a-zA-ZñÑáéíóúÁÉÍÓÚ ]+$/i"
                        ]);
                        if ($validar->fails()) {
                            return redirect("/eventos/general")->with("no-validacion-2", "");
                        }
                    }
                    if (!empty($datos["ponentes"])) {
                        $validar = \Validator::make($datos, [
                            "ponentes" => "required|regex:/^[¿\\?\\¡\\!\\(\\)\\:\\,\\;\\.\\%\\#\\0-9a-zA-ZñÑáéíóúÁÉÍÓÚ ]+$/i"
                        ]);
                        if ($validar->fails()) {
                            return redirect("/eventos/general")->with("no-validacion-2", "");
                        }
                    }
                    if (!empty($datos["patrocinadores"])) {
                        $validar = \Validator::make($datos, [
                            "patrocinadores" => "required|regex:/^[¿\\?\\¡\\!\\(\\)\\:\\,\\;\\.\\%\\#\\0-9a-zA-ZñÑáéíóúÁÉÍÓÚ ]+$/i"
                        ]);
                        if ($validar->fails()) {
                            return redirect("/eventos/general")->with("no-validacion-2", "");
                        }
                    }
                    if (!empty($datos["num_patrocinadores"])) {
                        $validar = \Validator::make($datos, [
                            "num_patrocinadores" => "required|regex:/^[0-9]+$/i"
                        ]);
                        if ($validar->fails()) {
                            return redirect("/eventos/general")->with("no-validacion-2", "");
                        }
                    }
                    if (!empty($datos["allDay"])) {
                        $validar = \Validator::make($datos, [
                            "allDay" => "required|regex:/^[a-z]+$/i"
                        ]);
                        if ($validar->fails()) {
                            return redirect("/eventos/general")->with("no-validacion-2", "");
                        }
                    }
                    if (!empty($datos["fecha-inicio"])) {
                        $validar = \Validator::make($datos, [
                            "fecha-inicio" => "required|date"
                        ]);
                        if ($validar->fails()) {
                            return redirect("/eventos/general")->with("no-validacion-2", "");
                        }
                    }
                    if (!empty($datos["hora-inicio"])) {
                        $validar = \Validator::make($datos, [
                            "hora-inicio" => "required|regex:/^[:\\0-9 ]+$/i"
                        ]);
                        if ($validar->fails()) {
                            return redirect("/eventos/general")->with("no-validacion-2", "");
                        }
                    }
                    if (!empty($datos["fecha-final"])) {
                        $validar = \Validator::make($datos, [
                            "fecha-final" => "required|date"
                        ]);
                        if ($validar->fails()) {
                            return redirect("/eventos/general")->with("no-validacion-2", "");
                        }
                    }
                    if (!empty($datos["hora-final"])) {
                        $validar = \Validator::make($datos, [
                            "hora-final" => "required|regex:/^[:\\0-9 ]+$/i"
                        ]);
                        if ($validar->fails()) {
                            return redirect("/eventos/general")->with("no-validacion-2", "");
                        }
                    }

                    $evento = new EventosModel();

                    $evento->nombre = $datos["nombre"];
                    $evento->tematica = $datos["tematica"];
                    $evento->ponentes = $datos["ponentes"];
                    $evento->patrocinadores = $datos["patrocinadores"];
                    $evento->num_participantes = $datos["num_participantes"];
                    $evento->fecha_inicio = $datos["fecha-inicio"];
                    $evento->hora_inicio = $datos["hora-inicio"];
                    $evento->fecha_final = $datos["fecha-final"];
                    $evento->hora_final = $datos["hora-final"];
                    $evento->backgroundColor = $datos["color"];
                    $evento->borderColor = $datos["color"];
                    $evento->allDay = $datos["allDay"];

                    $evento->save();

                    return redirect("/eventos/general")->with("ok-crear", "");
                }
            } else {

                return redirect("/eventos/general")->with("error", "");
            }
        }
    }

    public function show($id)
    {

        $evento = EventosModel::where("id", $id)->get();
        $eventos = EventosModel::all();
        $total_eventos = count($eventos);

        if (count($evento) != 0) {

            return view("paginas.eventos.general", array("status" => 200, "evento" => $evento, "eventos" => $eventos, "total_eventos" => $total_eventos));
        } else {

            return view("paginas.eventos.general", array("status" => 404, "eventos" => $eventos, "total_eventos" => $total_eventos));
        }
    }

    public function update($id, Request $request)
    {
        $datos = array(
            'nombre' => $request->input("editar-nombre"),
            'tematica' => $request->input("editar-tematica"),
            'ponentes' => $request->input("editar-ponentes"),
            'patrocinadores' => $request->input("editar-patrocinadores"),
            'num_participantes' => $request->input("editar-num_participantes"),
            'allDay' => $request->input("editar-allDay"),
            'fecha-inicio' => $request->input("editar-fecha-inicio"),
            'hora-inicio' => $request->input("editar-hora-inicio"),
            'fecha-final' => $request->input("editar-fecha-final"),
            'hora-final' => $request->input("editar-hora-final"),
            'color' => $request->input("editar-color")
        );

        /*echo '<pre>'; print_r($datos["hora-inicio"]); echo '</pre>';
        echo '<pre>'; print_r($datos["hora-final"]); echo '</pre>';
        return;*/

        if (!empty($datos)) {

            $validar = \Validator::make($datos, [
                "nombre" => "required|regex:/^[¿\\?\\¡\\!\\(\\)\\:\\,\\;\\.\\%\\#\\0-9a-zA-ZñÑáéíóúÁÉÍÓÚ ]+$/i",
                "fecha-inicio" => "required|date",
                "color" => "required|regex:/^[#\\0-9a-zA-Z]+$/i"
            ]);



            if ($validar->fails()) {
                return redirect("/eventos/general")->with("no-validacion", "");
            } else {

                if (!empty($datos["tematica"])) {
                    $validar = \Validator::make($datos, [
                        "tematica" => "required|regex:/^[¿\\?\\¡\\!\\(\\)\\:\\,\\;\\.\\%\\#\\0-9a-zA-ZñÑáéíóúÁÉÍÓÚ ]+$/i"
                    ]);
                    if ($validar->fails()) {
                        return redirect("/eventos/general")->with("no-validacion-2", "");
                    }
                }
                if (!empty($datos["ponentes"])) {
                    $validar = \Validator::make($datos, [
                        "ponentes" => "required|regex:/^[¿\\?\\¡\\!\\(\\)\\:\\,\\;\\.\\%\\#\\0-9a-zA-ZñÑáéíóúÁÉÍÓÚ ]+$/i"
                    ]);
                    if ($validar->fails()) {
                        return redirect("/eventos/general")->with("no-validacion-2", "");
                    }
                }
                if (!empty($datos["patrocinadores"])) {
                    $validar = \Validator::make($datos, [
                        "patrocinadores" => "required|regex:/^[¿\\?\\¡\\!\\(\\)\\:\\,\\;\\.\\%\\#\\0-9a-zA-ZñÑáéíóúÁÉÍÓÚ ]+$/i"
                    ]);
                    if ($validar->fails()) {
                        return redirect("/eventos/general")->with("no-validacion-2", "");
                    }
                }
                if (!empty($datos["num_patrocinadores"])) {
                    $validar = \Validator::make($datos, [
                        "num_patrocinadores" => "required|regex:/^[0-9]+$/i"
                    ]);
                    if ($validar->fails()) {
                        return redirect("/eventos/general")->with("no-validacion-2", "");
                    }
                }
                if (!empty($datos["allDay"])) {
                    $validar = \Validator::make($datos, [
                        "allDay" => "required"
                    ]);
                    if ($validar->fails()) {
                        return redirect("/eventos/general")->with("no-validacion-2", "");
                    }
                }
                if (!empty($datos["fecha-inicio"])) {
                    $validar = \Validator::make($datos, [
                        "fecha-inicio" => "required|date"
                    ]);
                    if ($validar->fails()) {
                        return redirect("/eventos/general")->with("no-validacion-2", "");
                    }
                }
                if (!empty($datos["hora-inicio"])) {
                    $validar = \Validator::make($datos, [
                        "hora-inicio" => "required|regex:/^[:\\0-9 ]+$/i"
                    ]);
                    if ($validar->fails()) {
                        return redirect("/eventos/general")->with("no-validacion-2", "");
                    }
                }
                if (!empty($datos["fecha-final"])) {
                    $validar = \Validator::make($datos, [
                        "fecha-final" => "required|date"
                    ]);
                    if ($validar->fails()) {
                        return redirect("/eventos/general")->with("no-validacion-2", "");
                    }
                }
                if (!empty($datos["hora-final"])) {
                    $validar = \Validator::make($datos, [
                        "hora-final" => "required|regex:/^[:\\0-9 ]+$/i"
                    ]);
                    if ($validar->fails()) {
                        return redirect("/eventos/general")->with("no-validacion-2", "");
                    }
                }

                if ($datos["allDay"] == "true") {
                    $actualizar = array(
                        'nombre' => $datos["nombre"],
                        'tematica' => $datos["tematica"],
                        'ponentes' => $datos["ponentes"],
                        'patrocinadores' => $datos["patrocinadores"],
                        'num_participantes' => $datos["num_participantes"],
                        'fecha_inicio' => $datos["fecha-inicio"],
                        'backgroundColor' => $datos["color"],
                        'borderColor' => $datos["color"],
                        'allDay' => $datos["allDay"]
                    );
                } else {
                    $actualizar = array(
                        'nombre' => $datos["nombre"],
                        'tematica' => $datos["tematica"],
                        'ponentes' => $datos["ponentes"],
                        'patrocinadores' => $datos["patrocinadores"],
                        'num_participantes' => $datos["num_participantes"],
                        'fecha_inicio' => $datos["fecha-inicio"],
                        'hora_inicio' => $datos["hora-inicio"],
                        'fecha_final' => $datos["fecha-final"],
                        'hora_final' => $datos["hora-final"],
                        'backgroundColor' => $datos["color"],
                        'borderColor' => $datos["color"],
                        'allDay' => $datos["allDay"]
                    );
                }

                $evento = EventosModel::where("id", $id)->update($actualizar);

                return redirect("/eventos/general")->with("ok-actualizar", "");
            }
        } else {

            return redirect("/eventos/general")->with("error", "");
        }
    }

    public function destroy($id, Request $request)
    {

        $validar = EventosModel::where("id", $id)->get();
        if (!empty($validar)) {
            $evento = EventosModel::where("id", $validar[0]["id"])->delete();
            return "ok";
        } else {
            return redirect("/eventos/general")->with("no-borrar", "");
        }
    }
}
