<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProyectosModel extends Model
{
    use HasFactory;

    protected $table = 'proyectos';

    protected $fillable = ['sector_id', 'nombre', 'descripcion', 'imagen_proyecto'];
}
