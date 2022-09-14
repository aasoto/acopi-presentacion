<?php

namespace Database\Factories;

use App\EntrevistasModel;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\EntrevistasModel>
 */
class EntrevistasModelFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = EntrevistasModel::class;

    public function definition()
    {
        return [
            'titulo_entrevista'        => $this->faker->sentence(),
            'descripcion_entrevista'   => $this->faker->paragraph(),
            'video_entrevista'          => 'https://www.youtube.com/watch?v=_GwqxAi_ly0'
        ];
    }
}
