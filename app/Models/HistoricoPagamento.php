<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class HistoricoPagamento extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'data_de_pagamento',
        'valor_do_salario',
        'cargo_colaborador_data',
        'pessoa_id'
    ];

    public function pessoa(){
        return $this -> belongsTo(Pessoa::class);
    }
    public function cargo(){
        return $this -> belongsTo(Cargo::class, 'cargo_colaborador_data');
    }
}
