<?php

namespace Database\Factories;

use App\TipoDocumentoModel;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\TipoDocumentoModel>
 */
class TipoDocumentoModelFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = TipoDocumentoModel::class;
    public function definition()
    {
        return [
            'codigo_doc' => 'CC',
            'nombre_doc' => 'Cedula de ciudadania'
        ];
    }
}
