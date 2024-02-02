<?php

namespace Database\Seeders;

use App\Models\HistoricoPagamento;
use App\Models\Pessoa;
use Illuminate\Database\Seeder;

class HistoricoPagamentoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        HistoricoPagamento::factory(15)->create();
    }
}
