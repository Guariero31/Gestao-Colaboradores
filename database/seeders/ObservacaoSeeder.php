<?php

namespace Database\Seeders;

use App\Models\Observacao;
use App\Models\Pessoa;
use Database\Factories\ObservacaoFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;

class ObservacaoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Obtenha todas as pessoas do banco de dados
        $pessoas = Pessoa::all();

        // Crie observações para cada pessoa
        $pessoas->each(function ($pessoa) {
            Observacao::factory()->create(['pessoa_id' => $pessoa->id]);
        });
    }
}
