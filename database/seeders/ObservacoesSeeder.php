<?php

namespace Database\Seeders;

use App\Models\Observacoes;
use App\Models\Pessoa;
use Database\Factories\ObservacoesFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;

class ObservacoesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Observacoes::factory(10)->create();
        // Obtenha todas as pessoas do banco de dados
        $pessoas = Pessoa::all();

        // Crie observações para cada pessoa
        $pessoas->each(function ($pessoa) {
            Observacoes::factory()->create(['pessoa_id' => $pessoa->id]);
        });
        Model::withoutEvents(function() {
            Observacoes::factory(10)->create();
        });
    }
}
