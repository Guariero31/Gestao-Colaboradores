<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MudancasFuncaoProgramada extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'data_troca',
        'status',
    ];

    public function Pessoa() {
        return $this -> belongsTo(Pessoa::class);
    }
    public function cargo() {
        return $this -> belongsTo(Cargo::class);
    }
}