<?php

namespace Database\Factories;

use App\Models\Observacoes;
use App\Models\Pessoa;
use Illuminate\Database\Eloquent\Factories\Factory;

class ObservacaoFactory extends Factory
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
            'pessoa_id' => Pessoa::pluck('id')->random(),
        ];
    }
}