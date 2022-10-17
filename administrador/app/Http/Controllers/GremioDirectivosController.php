<?php

namespace App\Http\Controllers;

use App\PaginaWebModel;
use Illuminate\Http\Request;

class GremioDirectivosController extends Controller
{
    public function index()
    {
        $pagina_web = PaginaWebModel::all();
        return view("paginas.pagina_web.info.gremio", array("pagina_web" => $pagina_web));
    }

    public function update($id, Request $request)
    {
    	$datos = array(
    		'gremio_directivos' => $request->input("gremio_directivos")
		);
    	if(!empty($datos)){
    		$validar = \Validator::make($datos,[
    			"gremio_directivos" => "nullable|string"
    		]);
    		if($validar->fails()){
    			return redirect("/pagina_web/info/gremio_directivos")->with("no-validacion", "");
    		}else{
                // Mover todos los ficheros temporales de blog al destino final
                /**
                 *
                 * en el substr el #19 son el número de caracteres que le restan a la ruta $origen para que pueda ajustarse a la ruta del $fichero.
                 *
                 */

                $origen = glob('vistas/images/temp/*');

                foreach($origen as $fichero){
                    copy($fichero, "vistas/images/pagina_web/gremio_directivos/".substr($fichero, 19));
                    unlink($fichero);
                }

                $paginaweb = PaginaWebModel::all();

    			$actualizar = array(
    				'gremio_directivos' => str_replace('src="'.$paginaweb[0]["servidor"].'vistas/images/temp', 'src="'.$paginaweb[0]["servidor"].'vistas/images/pagina_web/gremio_directivos', $datos["gremio_directivos"])
    			);
    			$paginaweb = PaginaWebModel::where("id", $id)->update($actualizar);
    			return redirect("/pagina_web/info/gremio_directivos")->with("ok-editar", "");
    		}
    	}else{
    		return redirect("/pagina_web/info/gremio_directivos")->with("error", "");
    	}
    }
}
