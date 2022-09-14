<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PaginaWebModel;
use App\CategoriasModel;

class EliminarCarruselController extends Controller
{
    public function index(){
    	$paginaweb = PaginaWebModel::all();
    	$categorias = CategoriasModel::all();

    	return view("paginas.pagina_web.eliminarCarrusel", array("paginaweb" => $paginaweb, "categorias" => $categorias));
    }

    /*==================================================
    =            Eliminar item del carrusel            =
    ==================================================*/
    /**
     *	Como el carrusel es un dato JSON se recibe el valor de la variable guardada en un input de
     *	tipo "hidden" en el formulario blade. Y se guardan los valores por medio de la función
     *	UPDATE.
     */
    
    public function update($id, Request $request){
    	$datos = array('carrusel' => $request->input("carrusel"));
    	echo '<pre>'; print_r($datos["carrusel"]); echo '</pre>';
    	return;
    }
    
    /*=====  End of Eliminar item del carrusel  ======*/
    
}
