<?php

namespace Database\Factories;

use App\DatosRangoModel;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\DatosRangoModel>
 */
class DatosRangoModelFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = DatosRangoModel::class;

    public function definition()
    {
        return [
            'rango' => 6,
            'nombre' => '6 meses'
        ];
    }
}
