<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CategoriasModel;

class CategoriasController extends Controller
{
    public function index(){
    	$categorias = CategoriasModel::all();

    	return view("paginas.pagina_web.noticias", array("categorias" => $categorias));
    }
}
