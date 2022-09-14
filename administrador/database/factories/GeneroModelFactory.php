<?php

namespace Database\Factories;

use App\GeneroModel;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\GeneroModel>
 */
class GeneroModelFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = GeneroModel::class;

    public function definition()
    {
        return [
            'codigo_genero' => $this->faker->randomElement(['F', 'M']),
            'nombre_genero' => $this->faker->randomElement(['Femenino', 'Masculino'])
        ];
    }
}
