<?php

namespace Database\Seeders;

use App\Models\Observacoes;
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
        Model::withoutEvents(function() {
            Observacoes::factory(10)->create();
        });
    }
}
