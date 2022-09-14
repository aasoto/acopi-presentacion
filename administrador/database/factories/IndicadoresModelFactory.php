<?php

namespace Database\Factories;

use App\IndicadoresModel;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\IndicadoresModel>
 */
class IndicadoresModelFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = IndicadoresModel::class;

    public function definition()
    {
        return [
            "empresas_activas" => $this->faker->numberBetween(80, 100),
            "empresas_inactivas" => $this->faker->numberBetween(10, 20),
            "empresas_nuevas" => $this->faker->numberBetween(5, 15),
            "recibos_generados" => $this->faker->numberBetween(75, 90),
            "recibos_pendientes" => $this->faker->numberBetween(5, 15),
            "recibos_pagos" => $this->faker->numberBetween(70, 85),
            "recibos_negociados" => $this->faker->numberBetween(3, 10)
        ];
    }
}
