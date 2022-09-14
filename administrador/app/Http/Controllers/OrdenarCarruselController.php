<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PaginaWebModel;
use App\CategoriasModel;

class OrdenarCarruselController extends Controller
{
    public function index(){
        $paginaweb = PaginaWebModel::all();
        $categorias = CategoriasModel::all();
        return view("paginas.pagina_web.ordenarCarrusel", array("paginaweb" => $paginaweb, "categorias" => $categorias));
    }

    public function update($id, Request $request) {
        $indice = array('indice' => $request->input("indice"));
        for ($i=0; $i <= $indice['indice']; $i++) {
            ${"categoria_".$i} = array('categoria_'.$i => $request->input("categoria-".$i));
            ${"titulo_".$i} = array('titulo_'.$i => $request->input("titulo-".$i));
            ${"texto_".$i} = array('texto_'.$i => $request->input("texto-".$i));
            ${"boton_1_Color_".$i} = array('boton_1_color'.$i => $request->input("boton-1-color-".$i));
            ${"boton_1_Texto_".$i} = array('boton_1_texto'.$i => $request->input("boton-1-texto-".$i));
            ${"url_Boton_1_".$i} = array('url_Boton_1_'.$i => $request->input("url-boton-1-".$i));
            ${"boton_2_Color_".$i} = array('boton_2_color'.$i => $request->input("boton-2-color-".$i));
            ${"boton_2_Texto_".$i} = array('boton_2_texto'.$i => $request->input("boton-2-texto-".$i));
            ${"url_Boton_2_".$i} = array('url_Boton_2_'.$i => $request->input("url-boton-2-".$i));
            ${"foto_Delante_Actual_".$i} = array('foto_Delante_'.$i => $request->input("foto-delante-actual-".$i));
            ${"fondo_Actual_".$i} = array('fondo_'.$i => $request->input("fondo-actual-".$i));
        }
        $limite_carrusel = $indice["indice"] - 1;
        $carrusel = "[{";
        for ($i=0; $i < $indice['indice']; $i++) {
            ${"validar_Categoria_".$i} = \Validator::make(${"categoria_".$i}, [ "categoria_".$i => 'required|regex:/^[,\\0-9a-zA-ZñÑáéíóúÁÉÍÓÚ ]+$/i']);
            ${"validar_Titulo_".$i} = \Validator::make(${"titulo_".$i}, ["titulo_".$i => 'required|regex:/^[=\\&\\$\\;\\-\\_\\*\\"\\<\\>\\?\\¿\\!\\¡\\:\\,\\.\\0-9a-zA-ZñÑáéíóúÁÉÍÓÚ ]+$/i']);
            ${"validar_Texto_".$i} = \Validator::make(${"texto_".$i}, ["texto_".$i => 'required|regex:/^[=\\&\\$\\;\\-\\_\\*\\"\\<\\>\\?\\¿\\!\\¡\\:\\,\\.\\0-9a-zA-ZñÑáéíóúÁÉÍÓÚ ]+$/i']);
            if (${"validar_Categoria_".$i}->fails() || ${"validar_Titulo_".$i}->fails() || ${"validar_Texto_".$i}->fails()) {
                return redirect("/pagina_web/ordenarCarrusel")->with("no-validacion", "");
            }
            if (!empty(${"boton_1_Color_".$i}["boton_1_color".$i])) {
                ${"validar_Boton_1_Color_".$i} = \Validator::make(${"boton_1_Color_".$i}, [ "boton_1_color".$i => 'required|regex:/^[-\\a-zA-Z]+$/i']);
                if (${"validar_Boton_1_Color_".$i}->fails()) {
                    return redirect("/pagina_web/ordenarCarrusel")->with("no-validacion", "");
                }
            }
            if (!empty(${"boton_1_Texto_".$i}["boton_1_texto".$i])) {
                ${"validar_Boton_1_Texto_".$i} = \Validator::make(${"boton_1_Texto_".$i}, [ "boton_1_texto".$i => 'required|regex:/^[=\\&\\$\\;\\-\\_\\*\\"\\<\\>\\?\\¿\\!\\¡\\:\\,\\.\\0-9a-zA-ZñÑáéíóúÁÉÍÓÚ ]+$/i']);
                if (${"validar_Boton_1_Texto_".$i}->fails()) {
                    return redirect("/pagina_web/ordenarCarrusel")->with("no-validacion", "");
                }
            }
            if (!empty(${"url_Boton_1_".$i}["url_Boton_1_".$i])) {
                ${"validar_Url_Boton_1_Actual_".$i} = \Validator::make(${"url_Boton_1_".$i}, [ "url_Boton_1_".$i => 'required|regex:/^[=\\&\\$\\-\\_\\?\\!\\:\\.\\0-9a-zA-Z]+$/i']);
                if (${"validar_Url_Boton_1_Actual_".$i}->fails()) {
                    return redirect("/pagina_web/ordenarCarrusel")->with("no-validacion", "");
                }
            }
            if (!empty(${"boton_2_Color_".$i}["boton_2_color".$i])) {
                ${"validar_Boton_2_Color_".$i} = \Validator::make(${"boton_2_Color_".$i}, [ "boton_2_color".$i => 'required|regex:/^[-\\a-zA-Z]+$/i']);
                if (${"validar_Boton_2_Color_".$i}->fails()) {
                    return redirect("/pagina_web/ordenarCarrusel")->with("no-validacion", "");
                }
            }
            if (!empty(${"boton_2_Texto_".$i}["boton_2_texto".$i])) {
                ${"validar_Boton_2_Texto_".$i} = \Validator::make(${"boton_2_Texto_".$i}, [ "boton_2_texto".$i => 'required|regex:/^[=\\&\\$\\;\\-\\_\\*\\"\\<\\>\\?\\¿\\!\\¡\\:\\,\\.\\0-9a-zA-ZñÑáéíóúÁÉÍÓÚ ]+$/i']);
                if (${"validar_Boton_2_Texto_".$i}->fails()) {
                    return redirect("/pagina_web/ordenarCarrusel")->with("no-validacion", "");
                }
            }
            if (!empty(${"url_Boton_2_".$i}["url_Boton_2_".$i])) {
                ${"validar_Url_Boton_2_Actual_".$i} = \Validator::make(${"url_Boton_2_".$i}, [ "url_Boton_2_".$i => 'required|regex:/^[=\\&\\$\\-\\_\\?\\!\\:\\.\\0-9a-zA-Z]+$/i']);
                if (${"validar_Url_Boton_2_Actual_".$i}->fails()) {
                    return redirect("/pagina_web/ordenarCarrusel")->with("no-validacion", "");
                }
            }
            if (!empty(${"foto_Delante_Actual".$i}["foto_Delante_".$i])) {
                ${"validar_Foto_Delante_Actual_".$i} = \Validator::make(${"foto_Delante_Actual_".$i}, [ "foto_Delante_".$i => 'required|regex:/^[=\\&\\$\\-\\_\\?\\!\\:\\.\\0-9a-zA-Z]+$/i']);
                if (${"validar_Foto_Delante_Actual_".$i}->fails()) {
                    return redirect("/pagina_web/ordenarCarrusel")->with("no-validacion", "");
                }
            }
            if (!empty(${"fondo_Actual_".$i}["fondo_".$i])) {
                ${"validar_Fondo_Actual_".$i} = \Validator::make(${"fondo_Actual_".$i}, [ "fondo_".$i => 'required|regex:/^[=\\&\\$\\-\\_\\?\\!\\:\\.\\0-9a-zA-Z]+$/i']);
                if (${"validar_Fondo_Actual_".$i}->fails()) {
                    return redirect("/pagina_web/ordenarCarrusel")->with("no-validacion", "");
                }
            }
            if($i == $limite_carrusel){
                $carrusel = $carrusel."\n\t".'"categoria": "'.${'categoria_'.$i}['categoria_'.$i].'",'."\n\t".'"titulo": "'.${'titulo_'.$i}['titulo_'.$i].'",'."\n\t".'"texto": "'.${'texto_'.$i}['texto_'.$i].'",'."\n\t".'"boton-1-color": "'.${"boton_1_Color_".$i}["boton_1_color".$i].'",'."\n\t".'"boton-1-texto": "'.${"boton_1_Texto_".$i}["boton_1_texto".$i].'",'."\n\t".'"url-boton-1": "'.${"url_Boton_1_".$i}["url_Boton_1_".$i].'",'."\n\t".'"boton-2-color": "'.${"boton_2_Color_".$i}["boton_2_color".$i].'",'."\n\t".'"boton-2-texto": "'.${"boton_2_Texto_".$i}["boton_2_texto".$i].'",'."\n\t".'"url-boton-2": "'.${"url_Boton_2_".$i}["url_Boton_2_".$i].'",'."\n\t".'"foto-delante": "'.${"foto_Delante_Actual_".$i}["foto_Delante_".$i].'",'."\n\t".'"fondo": "'.${"fondo_Actual_".$i}["fondo_".$i].'"'."\n".'}]';
            }else{
                $carrusel = $carrusel."\n\t".'"categoria": "'.${'categoria_'.$i}['categoria_'.$i].'",'."\n\t".'"titulo": "'.${'titulo_'.$i}['titulo_'.$i].'",'."\n\t".'"texto": "'.${'texto_'.$i}['texto_'.$i].'",'."\n\t".'"boton-1-color": "'.${"boton_1_Color_".$i}["boton_1_color".$i].'",'."\n\t".'"boton-1-texto": "'.${"boton_1_Texto_".$i}["boton_1_texto".$i].'",'."\n\t".'"url-boton-1": "'.${"url_Boton_1_".$i}["url_Boton_1_".$i].'",'."\n\t".'"boton-2-color": "'.${"boton_2_Color_".$i}["boton_2_color".$i].'",'."\n\t".'"boton-2-texto": "'.${"boton_2_Texto_".$i}["boton_2_texto".$i].'",'."\n\t".'"url-boton-2": "'.${"url_Boton_2_".$i}["url_Boton_2_".$i].'",'."\n\t".'"foto-delante": "'.${"foto_Delante_Actual_".$i}["foto_Delante_".$i].'",'."\n\t".'"fondo": "'.${"fondo_Actual_".$i}["fondo_".$i].'"'."\n".'},{';
            }
        }
        $actualizar = array('carrusel' => $carrusel);
        $paginaweb = PaginaWebModel::where("id", $id)->update($actualizar);
        return redirect("/pagina_web/ordenarCarrusel")->with("ok-editar","");
    }
}
