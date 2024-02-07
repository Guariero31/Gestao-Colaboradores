<?php

namespace Database\Seeders;

use App\Models\Cargo;
use App\Models\Observacao;
use Illuminate\Database\Seeder;
use App\Models\Pessoa;

class PessoaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $cargos = Cargo::all();

        // Crie observações para cada pessoa
        $cargos->each(function ($cargos) {
            Pessoa::factory()->create(['cargo_id' => $cargos->id]);
        });
    }
}
