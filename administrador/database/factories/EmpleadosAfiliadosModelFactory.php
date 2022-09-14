<?php

namespace Database\Factories;

use App\EmpleadosAfiliadosModel;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\EmpleadosAfiliadosModel>
 */
class EmpleadosAfiliadosModelFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = EmpleadosAfiliadosModel::class;

    public function definition()
    {
        return [
            'tipo_doc_empleado_afiliado' => 'cedula',
            'cc_empleado_afiliado' => $this->faker->phoneNumber(),
            'primer_nombre' => $this->faker->firstName($gender = 'male'),
            'segundo_nombre' => $this->faker->firstName($gender = 'male'),
            'primer_apellido' => $this->faker->lastName(),
            'segundo_apellido' => $this->faker->lastName(),
            'cargo_empleado_afiliado' => $this->faker->randomElement(['Receptacionista', 'Conductor', 'Repartidor', 'Aseador(a)', 'Secretaria']),
            'fecha_nacimiento' => $this->faker->date('Y-m-d'),
            'id_empresa_afiliado' => $this->faker->numberBetween(1, 100),
            'nit_empresa_afiliado' => $this->faker->numberBetween(1, 100),
            'imagen_cedula' => 'vistas/documentos/empresas/empleados/imagen.jpg'
        ];
    }
}
