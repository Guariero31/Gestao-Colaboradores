<?php

namespace Database\Factories;

use App\Models\Observacoes;
use App\Models\Pessoa;
use Illuminate\Database\Eloquent\Factories\Factory;

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
            'pessoa_id' => Pessoa::puck('id')->random(),
            'pessoa_id' => Pessoa::factory()->create()->id, // Crie uma nova pessoa e use o ID dela como pessoa_id
        ];
    }
}