<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;

class Observacao extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = "observacoes";

    protected $fillable = [
        'anotacao',
        'usuario',
        'pessoa_id',
    ];

    public function pessoa() {
        return $this->belongsTo(Pessoa::class);
    }
}
