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
    		'historia' => $request->input("historia"),
		 	'actualidad' => $request->input("actualidad"),
		 	'proyeccion' => $request->input("proyeccion")
		);

    	if(!empty($datos)){

    		$validar = \Validator::make($datos,[
    			"historia"=> "nullable|string",
    			"actualidad" => 'nullable|string',
    			"proyeccion" => 'nullable|string'
    		]);



    		if($validar->fails()){

    			return redirect("/pagina_web/info/extra")->with("no-validacion", "");

    		}else{

    			$actualizar = array(
    				'historia' => $datos["historia"],
    				'actualidad' => $datos["actualidad"],
    				'proyeccion' => $datos["proyeccion"]
    			);

    			$paginaweb = PaginaWebModel::where("id", $id)->update($actualizar);

    			return redirect("/pagina_web/info/extra")->with("ok-editar", "");
    		}

    	}else{

    		return redirect("/pagina_web/info/extra")->with("error", "");
    	}

    }
}
