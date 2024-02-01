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
            $table->foreignId('colaborador_id')->constrained('pessoas');
            $table->string('novo_cargo');
            $table->date('data_troca');
            $table->string('status');
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
