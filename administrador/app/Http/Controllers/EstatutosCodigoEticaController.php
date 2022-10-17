<?php

namespace App\Http\Controllers;

use App\PaginaWebModel;
use Illuminate\Http\Request;

class EstatutosCodigoEticaController extends Controller
{
    public function index()
    {
        $pagina_web = PaginaWebModel::all();
        return view("paginas.pagina_web.info.estatutos", array("pagina_web" => $pagina_web));
    }

    public function update($id, Request $request)
    {

    	$datos = array(
    		'estatutos_doc' => $request->file("estatutos_doc"),
    		'watch_estatutos_doc' => $request->boolean("watch_estatutos_doc"),
            'actual_estatutos_doc' => $request->input("actual_estatutos_doc"),
    		'estatutos_text' => $request->input("estatutos_text"),
            'codigo_etica_doc' => $request->file("codigo_etica_doc"),
    		'watch_codigo_etica_doc' => $request->boolean("watch_codigo_etica_doc"),
            'actual_codigo_etica_doc' => $request->input("actual_codigo_etica_doc"),
    		'codigo_etica_text' => $request->input("codigo_etica_text")
		);

        //dd($datos);
    	if(!empty($datos)){
    		$validar = \Validator::make($datos,[
                "watch_estatutos_doc" => "required|boolean",
    			"estatutos_text" => "nullable|string",
                "watch_codigo_etica_doc" => "required|boolean",
                "codigo_etica_text" => "nullable|string"
    		]);
    		if($validar->fails()){
    			return redirect("/pagina_web/info/estatutos")->with("no-validacion", "");
    		}else{

                if (!empty($datos["estatutos_doc"])) {
                    if ($datos["estatutos_doc"]->guessExtension() == "pdf") {
                        $nombre_estatutos_doc = "documento_estatutos_acopi_cesar";
                        $ruta_estatutos_doc = "vistas/documentos/estatutos/".$nombre_estatutos_doc.".".$datos["estatutos_doc"]->guessExtension();
                        move_uploaded_file($datos["estatutos_doc"], $ruta_estatutos_doc);
                    } else {
                        return redirect("/pagina_web/info/estatutos")->with("no-pdf", "");
                    }
                } else {
                    $ruta_estatutos_doc = $datos['actual_estatutos_doc'];
                }

                if (!empty($datos["codigo_etica_doc"])) {
                    if ($datos["codigo_etica_doc"]->guessExtension() == "pdf") {
                        $nombre_codigo_etica_doc = "documento_codigo_etica_acopi_cesar";
                        $ruta_codigo_etica_doc = "vistas/documentos/codigo_etica/".$nombre_codigo_etica_doc.".".$datos["codigo_etica_doc"]->guessExtension();
                        move_uploaded_file($datos["codigo_etica_doc"], $ruta_codigo_etica_doc);
                    } else {
                        return redirect("/pagina_web/info/estatutos")->with("no-pdf", "");
                    }
                } else {
                    $ruta_codigo_etica_doc = $datos['actual_codigo_etica_doc'];
                }

                // Mover todos los ficheros temporales de blog al destino final
                /**
                 *
                 * en el substr el #19 son el número de caracteres que le restan a la ruta $origen para que pueda ajustarse a la ruta del $fichero.
                 *
                 */

                $origen = glob('vistas/images/temp/*');

                foreach($origen as $fichero){
                    copy($fichero, "vistas/images/pagina_web/estatutos_codigo_etica/".substr($fichero, 19));
                    unlink($fichero);
                }

                $paginaweb = PaginaWebModel::all();

    			$actualizar = array(
                    'estatutos_doc' => $ruta_estatutos_doc,
                    'watch_estatutos_doc' => $datos['watch_estatutos_doc'],
    				'estatutos_text' => str_replace('src="'.$paginaweb[0]["servidor"].'vistas/images/temp', 'src="'.$paginaweb[0]["servidor"].'vistas/images/pagina_web/estatutos_codigo_etica', $datos["estatutos_text"]),
                    'codigo_etica_doc' => $ruta_codigo_etica_doc,
                    'watch_codigo_etica_doc' => $datos['watch_codigo_etica_doc'],
    				'codigo_etica_text' => str_replace('src="'.$paginaweb[0]["servidor"].'vistas/images/temp', 'src="'.$paginaweb[0]["servidor"].'vistas/images/pagina_web/estatutos_codigo_etica', $datos["codigo_etica_text"])
    			);
    			$paginaweb = PaginaWebModel::where("id", $id)->update($actualizar);
    			return redirect("/pagina_web/info/estatutos")->with("ok-editar", "");
    		}
    	}else{
    		return redirect("/pagina_web/info/estatutos")->with("error", "");
    	}
    }
}
