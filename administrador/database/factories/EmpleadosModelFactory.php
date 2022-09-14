<?php

namespace Database\Factories;

use App\EmpleadosModel;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\EmpleadosModel>
 */
class EmpleadosModelFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = EmpleadosModel::class;

    public function definition()
    {
        return [
            'tipo_documento' => 'CC',
            'num_documento' => $this->faker->phoneNumber(),
            'primer_nombre' => $this->faker->firstName($gender = 'male'),
            'segundo_nombre' => $this->faker->firstName($gender = 'male'),
            'primer_apellido' => $this->faker->lastName(),
            'segundo_apellido' => $this->faker->lastName(),
            'sexo' => $this->faker->randomElement(['M', 'F']),
            'fecha_nacimiento' => $this->faker->date('Y-m-d'),
            'email' => $this->faker->email(),
            'id_rol' => $this->faker->numberBetween(1, 7),
            'estado' => $this->faker->randomElement(['Empleado', 'Pasante']),
            'foto' => $this->faker->image('public/vistas/documentos/empleados/fotos/', 500, 500, null, false),
            'hoja_de_vida' => $this->faker->image('public/vistas/documentos/empleados/fotos/', 500, 500, null, false),
            'cedula' => $this->faker->image('public/vistas/documentos/empleados/fotos/', 500, 500, null, false)
        ];
    }
}
