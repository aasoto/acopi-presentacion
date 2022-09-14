<?php

namespace Database\Factories;

use App\EmpresasModel;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\EmpresasModel>
 */
class EmpresasModelFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = EmpresasModel::class;

    public function definition()
    {
        return [
            'nit_empresa' => $this->faker->phoneNumber(),
            'razon_social' => $this->faker->company(),
            'cc_rprt_legal' => $this->faker->randomNumber(7, true),
            'num_empleados' => $this->faker->randomNumber(2, true),
            'direccion_empresa' => $this->faker->streetAddress(),
            'telefono_empresa' => $this->faker->randomNumber(7, true),
            'fax_empresa' => $this->faker->randomNumber(7, true),
            'celular_empresa' => $this->faker->randomNumber(7, true),
            'email_empresa' => $this->faker->email(),
            'id_sector_empresa' => $this->faker->randomNumber(1, true),
            'productos_empresa' => $this->faker->word(),
            'ciudad_empresa' => $this->faker->city(),
            'estado_afiliacion_empresa' => $this->faker->randomElement(['nueva', 'activa', 'inactiva']),
            'numero_pagos_atrasados' => $this->faker->randomNumber(1, true),
            'fecha_afiliacion_empresa' =>$this->faker->date('Y-m-d'),
            'carta_bienvenida' => 'vistas/documentos/carta_bienvenida',
            'acta_compromiso' => 'vistas/documentos/acta_compromiso',
            'estudio_afiliacion' => 'vistas/documentos/estudio_afiliacion',
            'rut' => 'vistas/documentos/rut',
            'camara_comercio' => 'vistas/documentos/camara_comercio',
            'fechas_birthday' => 'vistas/documentos/fechas_birthday'
        ];
    }
}
