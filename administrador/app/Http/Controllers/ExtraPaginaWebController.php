<?php

namespace App\Http\Controllers;

use App\PaginaWebModel;
use Illuminate\Http\Request;

class ExtraPaginaWebController extends Controller
{
    public function index()
    {
        $pagina_web = PaginaWebModel::all();
        //dd($pagina_web);
        return view("paginas.pagina_web.info.extra", array("pagina_web" => $pagina_web));
    }

    public function update($id, Request $request){

    	$datos = array(
    		'quienes_somos' => $request->input("quienes_somos"),
		 	'mision' => $request->input("mision"),
		 	'vision' => $request->input("vision"),
            'historia' => $request->input("historia"),
		 	'actualidad' => $request->input("actualidad"),
		 	'proyeccion' => $request->input("proyeccion")
		);

    	if(!empty($datos)){

    		$validar = \Validator::make($datos,[
    			"quienes_somos" => "nullable|string",
                "mision" => "nullable|string",
                "vision" => "nullable|string",
                "historia" => "nullable|string",
    			"actualidad" => 'nullable|string',
    			"proyeccion" => 'nullable|string'
    		]);



    		if($validar->fails()){

    			return redirect("/pagina_web/info/extra")->with("no-validacion", "");

    		}else{

                $origen = glob('vistas/images/temp/*');

                foreach($origen as $fichero){
                    copy($fichero, "vistas/images/pagina_web/extras/".substr($fichero, 19));
                    unlink($fichero);
                }

                $pagina_web = PaginaWebModel::all();

    			$actualizar = array(
    				'quienes_somos' => str_replace('src="'.$pagina_web[0]["servidor"].'vistas/images/temp', 'src="'.$pagina_web[0]["servidor"].'vistas/images/pagina_web/extras', $datos["quienes_somos"]),
                    'mision' => str_replace('src="'.$pagina_web[0]["servidor"].'vistas/images/temp', 'src="'.$pagina_web[0]["servidor"].'vistas/images/pagina_web/extras', $datos["mision"]),
                    'vision' => str_replace('src="'.$pagina_web[0]["servidor"].'vistas/images/temp', 'src="'.$pagina_web[0]["servidor"].'vistas/images/pagina_web/extras', $datos["vision"]),
                    'historia' => str_replace('src="'.$pagina_web[0]["servidor"].'vistas/images/temp', 'src="'.$pagina_web[0]["servidor"].'vistas/images/pagina_web/extras', $datos["historia"]),
    				'actualidad' => str_replace('src="'.$pagina_web[0]["servidor"].'vistas/images/temp', 'src="'.$pagina_web[0]["servidor"].'vistas/images/pagina_web/extras', $datos["actualidad"]),
    				'proyeccion' => str_replace('src="'.$pagina_web[0]["servidor"].'vistas/images/temp', 'src="'.$pagina_web[0]["servidor"].'vistas/images/pagina_web/extras', $datos["proyeccion"])
    			);

    			$paginaweb = PaginaWebModel::where("id", $id)->update($actualizar);

    			return redirect("/pagina_web/info/extra")->with("ok-editar", "");
    		}

    	}else{

    		return redirect("/pagina_web/info/extra")->with("error", "");
    	}

    }
}
