<?php

namespace Database\Factories;

use App\SectorEmpresaModel;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\SectorEmpresaModel>
 */
class SectorEmpresaModelFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = SectorEmpresaModel::class;
    public function definition()
    {
        return [
            "nombre_sector" => $this->faker->randomElement(['Agroindustrial', 'Prestación de servicios', 'Tecnología', 'Industria Textil'])
        ];
    }
}
