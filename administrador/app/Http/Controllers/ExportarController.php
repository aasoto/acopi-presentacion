<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\EmpresasModel;
use App\RepresentanteEmpresaModel;
use App\PaginaWebModel;
use App\EmpleadosModel;
use App\GeneroModel;
use App\MunicipiosModel;
use App\TipoDocumentoModel;
use App\RolesModel;
use Illuminate\Support\Facades\DB;

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
            $empresas = DB::table('empresas')
                ->join('sector_empresa', 'empresas.id_sector_empresa', '=', 'sector_empresa.id_sector')
                ->join('representante_empresa', 'empresas.cc_rprt_legal', '=', 'representante_empresa.cc_rprt_legal')
                ->select('empresas.*', 'representante_empresa.*', 'sector_empresa.nombre_sector')
            ->get();
            $municipios = MunicipiosModel::all();
    		return view("paginas.afiliados.exportarEmpresas", array("empresas"=>$empresas, "municipios"=>$municipios));
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
