<?php

namespace Database\Factories;

use App\CitasModel;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\CitasModel>
 */
class CitasModelFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    protected $model = CitasModel::class;

    public function definition()
    {
        return [
            'tipo_usuario_cita' => $this->faker->randomElement(['afiliado', 'interesado']),
            'id_empresa' => $this->faker->randomNumber(3, true),
            'cc_rprt_legal' => $this->faker->phoneNumber(),
            'cc_interesado' => $this->faker->phoneNumber(),
            'nombre_interesado' => $this->faker->firstName($gender = 'male').' '.$this->faker->firstName($gender = 'male').' '.$this->faker->lastName().' '.$this->faker->lastName(),
            'fecha_cita' => $this->faker->date('Y-m-d'),
            'hora_cita' => $this->faker->time('H:i:s'),
            'area' => $this->faker->randomElement(['Director ejecutivo', 'Subdirector administrativo y financiero', 'Subdirector de desarrollo empresarial', 'Subdirector juridico', 'Subdirector de comunicaciones y eventos', 'Asistente de dirección']),
            'estado_cita' => $this->faker->randomElement(['pendiente', 'atendida', 'perdida', 'cancelada']),
            'color' => '#ffc107'
        ];
    }
}
