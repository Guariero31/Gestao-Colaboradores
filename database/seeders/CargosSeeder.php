<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Cargo;

class CargosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Cargo::create(['nome_do_cargo' => 'Gerente', 'valor_do_salario' => 5000.00]);
        Cargo::create(['nome_do_cargo' => 'Desenvolvedor', 'valor_do_salario' => 3000.00]);
        Cargo::factory(5)->create();
    }
}
