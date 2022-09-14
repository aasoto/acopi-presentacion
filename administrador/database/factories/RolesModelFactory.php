<?php

namespace Database\Factories;

use App\RolesModel;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\RolesModel>
 */
class RolesModelFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = RolesModel::class;
    public function definition()
    {
        return [
            'rol' => $this->faker->randomElement(['Director ejecutivo', 'Subdirector administrativo y financiero', 'Subdirector de desarrollo empresarial', 'Subdirector juridico', 'Subdirector de comunicaciones y eventos', 'Asistente de dirección'])
        ];
    }
}
