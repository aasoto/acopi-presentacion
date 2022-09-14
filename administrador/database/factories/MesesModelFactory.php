<?php

namespace Database\Factories;

use App\MesesModel;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\MesesModel>
 */
class MesesModelFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = MesesModel::class;

    public function definition()
    {
        return [
            "codigo_mes" => $this->faker->unique()->numberBetween(1, 12),
            "nombre_mes" => $this->faker->unique()->randomElement(['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre']),
            "nombre_mes_min" => $this->faker->unique()->randomElement(['enero', 'febrero', 'marzo', 'abril', 'mayo', 'junio', 'julio', 'agosto', 'septiembre', 'octubre', 'noviembre', 'diciembre'])
        ];
    }
}
