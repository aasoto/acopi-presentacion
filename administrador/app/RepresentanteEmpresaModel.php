<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RepresentanteEmpresaModel extends Model
{
    use HasFactory;
    protected $table = "representante_empresa";

    public function empresa(){
    	return $this->belongsTo('App\EmpresasModel', 'cc_rprt_legal', 'cc_rprt_legal');
    }
}
