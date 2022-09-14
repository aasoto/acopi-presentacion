<?php

namespace Database\Factories;

use App\PagosModel;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\PagosModel>
 */
class PagosModelFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = PagosModel::class;
    public function definition()
    {
        return [
            'id_empresa' => $this->faker->randomNumber(2, false),
            'valor_deuda' => '0',
            'valor_mes' => '80000',
            'valor_recibo' => '80000',
            'mes_recibo' => 'agosto',
            'year_recibo' => date('Y'),
            'fecha_limite' => '2022-07-31',
            'estado' => 'no pago',
            'id_reporta' => '1'
        ];
    }
}
