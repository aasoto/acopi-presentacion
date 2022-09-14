<?php

namespace Database\Factories;

use App\MunicipiosModel;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\MunicipiosModel>
 */
class MunicipiosModelFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = MunicipiosModel::class;
    public function definition()
    {
        return [
            'abreviatura' => $this->faker->randomElement(['VLL', 'ZRVLL', 'AGC', 'CDZ', 'AST', 'BCR', 'BSC', 'CHM', 'CHR'])
        ];
    }
}
