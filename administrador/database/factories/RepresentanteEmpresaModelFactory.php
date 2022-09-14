<?php

namespace Database\Factories;

use App\RepresentanteEmpresaModel;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\RepresentanteEmpresaModel>
 */
class RepresentanteEmpresaModelFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = RepresentanteEmpresaModel::class;
    public function definition()
    {
        return [
            'tipo_documento_rprt' => 'cedula',
            'cc_rprt_legal' => $this->faker->randomNumber(3, true),
            'primer_nombre' => $this->faker->firstName($gender = 'male'),
            'segundo_nombre' => $this->faker->firstName($gender = 'male'),
            'primer_apellido' => $this->faker->lastName(),
            'segundo_apellido' => $this->faker->lastName(),
            'fecha_nacimiento' => $this->faker->date('Y-m-d'),
            'sexo_rprt' => $this->faker->randomElement(['m', 'f']),
            'email_rprt' => $this->faker->email(),
            'telefono_rprt' => $this->faker->phoneNumber(),
            'foto_rprt' => 'vistas/images/afiliados',
            'foto_cedula_rprt' => 'vistas/images/afiliados'
        ];
    }
}
