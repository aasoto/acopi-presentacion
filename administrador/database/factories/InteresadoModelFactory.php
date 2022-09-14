<?php

namespace Database\Factories;

use App\InteresadoModel;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\InteresadoModel>
 */
class InteresadoModelFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = InteresadoModel::class;
    public function definition()
    {
        return [
            "nombre_interesado" => $this->faker->firstName($gender = 'male').' '.$this->faker->lastName(),
            "empresa_interesado" => $this->faker->company(),
            "email_interesado" => $this->faker->email(),
            "telefono_interesado" => $this->faker->phoneNumber(),
            "estado_interesado" => "no contactado"
        ];
    }
}
