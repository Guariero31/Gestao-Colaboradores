<?php

namespace Database\Factories;

use App\Models\Cargo;
use App\Models\Pessoa;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\MudancasFuncaoProgramada>
 */
class MudancasFuncaoProgramadaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'data_troca' => $this->faker->dateTime(),
            'status' => $this->faker->randomElement(['Pendente', 'Concluido']),
            'pessoa_id' => Pessoa::pluck('nome','id')->random(),
            'novo_cargo_id' => Cargo::pluck('id')->random(),
        ];
    }
}
