<?php

namespace Database\Seeders;

use App\Models\MudancasFuncaoProgramada;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MudancasFuncaoProgramadaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        MudancasFuncaoProgramada::factory(15)->create();
    }
}
