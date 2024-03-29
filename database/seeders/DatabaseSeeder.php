<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this ->call(UserSeeder::class);

        $this ->call(CargosSeeder::class);
        $this ->call(PessoaSeeder::class);
        $this ->call(HistoricoPagamentoSeeder::class);
        $this ->call(ObservacaoSeeder::class);
        $this ->call(MudancasFuncaoProgramadaSeeder::class);
    }
}
