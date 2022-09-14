<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\EmpresasModel;
use App\RepresentanteEmpresaModel;
use App\PaginaWebModel;
use App\EmpleadosModel;
use App\GeneroModel;
use App\TipoDocumentoModel;
use App\RolesModel;

class ExportarController extends Controller
{
    public function index() {

    	$paginaweb = PaginaWebModel::all();
    	foreach ($paginaweb as $key => $web) {}
    	if (url()->current() == ($web["servidor"]."afiliados/exportar")) {
    		$afiliados = RepresentanteEmpresaModel::all();
    		return view("paginas.afiliados.exportar", array("afiliados"=>$afiliados));
    	}
    	
    	if (url()->current() == ($web["servidor"]."afiliados/exportarEmpresas")) {
    		$empresas = EmpresasModel::all();
    		return view("paginas.afiliados.exportarEmpresas", array("empresas"=>$empresas));
    	}

        if (url()->current() == ($web["servidor"]."empleados/exportar")) {
            $empleados = EmpleadosModel::all();
            $generos = GeneroModel::all();
            $tipos_documentos = TipoDocumentoModel::all();
            $roles = RolesModel::all();
            return view("paginas.empleados.exportar", array("empleados"=>$empleados, "generos"=>$generos, "tipos_documentos"=>$tipos_documentos, "roles"=>$roles));
        }
    }
}
