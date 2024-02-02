<?php

namespace Database\Factories;

use App\Models\HistoricoPagamento;
use App\Models\Pessoa;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\HistoricoPagamento>
 */
class HistoricoPagamentoFactory extends Factory
{

    protected $model = HistoricoPagamento::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'data_de_pagamento' => $this->faker->date(),
            'valor_do_salario' => $this->faker->randomFloat(2, 10, 1000),
            'cargo_colaborador_data' => $this->faker->unique()->word,
            'pessoa_id' => Pessoa::pluck('id')->random()
        ];
    }
}
