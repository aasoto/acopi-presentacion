<?php

namespace Database\Factories;

use App\CategoriasModel;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\CategoriasModel>
 */
class CategoriasModelFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = CategoriasModel::class;

    public function definition()
    {
        return [
            "nombre_categoria" => $this->faker->randomElement(['Noticias','Capacitación','Eventos','Otros']),
        ];
    }
}
