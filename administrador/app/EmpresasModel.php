<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmpresasModel extends Model
{
    use HasFactory;
    protected $table = 'empresas';

    /*==================================================
    =            Inner Join desde el Modulo            =
    ==================================================*/
    public function sector(){
    	return $this->belongsTo('App\SectorEmpresaModel', 'id_sector_empresa', 'id_sector');
    }

    public function nombre(){
    	return $this->belongsTo('App\RepresentanteEmpresaModel', 'cc_rprt_legal', 'cc_rprt_legal');
    }

    /*=====  End of Inner Join desde el Modulo  ======*/
}
