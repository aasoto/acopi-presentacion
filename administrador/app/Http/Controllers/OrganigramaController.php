<?php

namespace App\Http\Controllers;

use App\PaginaWebModel;
use Illuminate\Http\Request;

class OrganigramaController extends Controller
{
    public function index()
    {
        $pagina_web = PaginaWebModel::all();
        return view('/paginas/pagina_web/info/organigrama', array("pagina_web" => $pagina_web));
    }

    public function update($id, Request $request){
        $datos = array(
            'organigrama' => $request->file("organigrama"),
            'organigrama_actual' => $request->input('organigrama_actual')
		);
        //dd($datos['organigrama']);
    	if(!empty($datos)){
    		$validar = \Validator::make($datos,[
    			"organigrama" => "required|image|mimes:jpg,jpeg,png|max:2000000"
    		]);
    		if($validar->fails()){
    			return redirect("/pagina_web/info/organigrama")->with("no-validacion", "");
    		}else{
                $filename = time().'.'.$datos['organigrama']->extension();
                $datos['organigrama']->move(public_path('vistas/images/organigrama'), $filename);
                unlink($datos['organigrama_actual']);
    			$actualizar = array(
    				'organigrama' => 'vistas/images/organigrama/'.$filename
    			);
    			$paginaweb = PaginaWebModel::where("id", $id)->update($actualizar);
    			return redirect("/pagina_web/info/organigrama")->with("ok-editar", "");
    		}
    	}else{
    		return redirect("/pagina_web/info/organigrama")->with("error", "");
    	}
    }
}
