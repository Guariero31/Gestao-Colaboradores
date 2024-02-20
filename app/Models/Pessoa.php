<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pessoa extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'nome',
        'cpf',
        'telefone',
        'foto_perfil',
        'cargo_id'
    ];

    public function cargo() {
        return $this -> belongsTo(Cargo::class, 'cargo_id');
    }

    public function observacoes() {
        return $this->hasMany(Observacao::class);
    }
}
