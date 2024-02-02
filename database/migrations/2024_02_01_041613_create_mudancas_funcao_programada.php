<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('mudancas_funcao_programada', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pessoa_id')->constrained('pessoas');
            $table->foreignId('novo_cargo_id')->constrained('cargos');
            $table->date('data_troca');
            $table->enum('status', ['Pendente', 'Concluido'])->default('Pendente');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mudancas_funcao_programada');
    }
};
