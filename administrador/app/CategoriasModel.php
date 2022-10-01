<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoriasModel extends Model
{
    use HasFactory;
    protected $table = 'categorias';

    protected $fillable = ['nombre_categoria'];
}
