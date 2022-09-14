<?php

namespace Database\Factories;

use App\EventosModel;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\EventosModel>
 */
class EventosModelFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = EventosModel::class;

    public function definition()
    {
        return [
            'nombre' => $this->faker->name(),
        'tematica' => $this->faker->paragraph(),
        'ponentes' => $this->faker->name(),
        'patrocinadores' => $this->faker->name(),
        'num_participantes' => $this->faker->randomNumber(3, false),
        'fecha_inicio' => $this->faker->date('Y-m-d'),
        'hora_inicio' => $this->faker->time('H:i:s'),
        'fecha_final' => $this->faker->date('Y-m-d'),
        'hora_final' => $this->faker->time('H:i:s'),
        'backgroundColor' => $this->faker->hexColor(),
        'borderColor' => $this->faker->hexColor(),
        'allDay' => $this->faker->boolean(),
        ];
    }
}
