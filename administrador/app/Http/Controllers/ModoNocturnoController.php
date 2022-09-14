<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\UsuariosModel;

class ModoNocturnoController extends Controller
{
    public function update($id, Request $request) {

		$validar = UsuariosModel::where("id", $id)->get();
		/*echo '<pre>'; print_r($validar[0]["modo"]); echo '</pre>';
		return;*/
		if (!empty($validar)) {
			if ($validar[0]["modo"] == "Nocturno") {
				$modo = "Diurno";
				$actualizar = array('modo' => $modo);
				$usuario = UsuariosModel::where("id", $validar[0]["id"])->update($actualizar);
				return "diurno";
			}elseif ($validar[0]["modo"] == "Diurno") {
				$modo = "Nocturno";
				$actualizar = array('modo' => $modo);
				$usuario = UsuariosModel::where("id", $validar[0]["id"])->update($actualizar);
				return "nocturno";
			}else{
				$modo = "";
				$actualizar = array('modo' => $modo);
				$usuario = UsuariosModel::where("id", $validar[0]["id"])->update($actualizar);
				return "vacio";
			}

		}else{
			return redirect("/inicio")->with("no-editar", "");
		}
		
	}
}
