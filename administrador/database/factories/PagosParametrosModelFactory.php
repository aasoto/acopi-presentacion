<?php

namespace Database\Factories;

use App\PagosParametrosModel;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\PagosParametrosModel>
 */
class PagosParametrosModelFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = PagosParametrosModel::class;
    public function definition()
    {
        return [
            'valor_cuota' => '80000',
            'periodo_activo' => '3'
        ];
    }
}
