<?php

namespace Database\Factories;

use App\Models\Pessoa;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Observacoes>
 */
class ObservacoesFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'anotacao'  => $this->faker->paragraph,
            'usuario' => $this->faker->name,
            'data_hora' => $this->faker->dateTime(),
            'pessoa_id' => Pessoa::pluck('id')->random()
        ];
    }
}
